<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Company;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Traits\HasCompanyScope;

class AppointmentController extends Controller
{
    use HasCompanyScope;

    public function __construct()
    {
        $this->middleware(['permission:'.config('constant.Permission_Appointment')]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $source = $request->get('tenant', 'default');
        $connection = $source === 'default' ? config('database.default') : $source;

        $query = (new Appointment)->setConnection($connection)->newQuery();

        if ($source === 'default') {
            $query->ownedByCompany();
        }

        $Appointments = $query->with(['company', 'customer'])->paginate(10);

        return view('admin.appointment.index', compact('Appointments'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Company = Company::userOwnedCompany()->pluck('code', 'id');
        $Customers = Customer::ownedByCompany()->pluck('name', 'id');

        return view('admin.appointment.create', compact('Company', 'Customers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'customer_id' => 'required|exists:customers,id',
            'company_id' => 'required|exists:companies,id',
            'description' => 'nullable|string',
            'status' => 'required|in:scheduled,completed,cancelled',
            'location' => 'nullable|string|max:255',
        ]);

        $this->checkCompanyAccess($request->company_id);

        Appointment::create($validated);

        return redirect()->route('appointment.index')->with('success', 'Appointment created successfully.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $Appointment = Appointment::with(['company', 'customer'])->findOrFail($id);

        $this->checkCompanyAccess($Appointment->company_id);

        return view('admin.appointment.show', compact('Appointment'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $Appointment = Appointment::findOrFail($id);

        $this->checkCompanyAccess($Appointment->company_id);

        $Company = Company::userOwnedCompany()->pluck('code', 'id');
        $Customers = Customer::ownedByCompany()->pluck('name', 'id');

        return view('admin.appointment.edit', compact('Appointment', 'Company', 'Customers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $Appointment = Appointment::findOrFail($id);

        $this->checkCompanyAccess($Appointment->company_id);

        // Validate input
        $validated = $request->validate([
            'title' => 'required|string|max:255',
            'appointment_date' => 'required|date',
            'appointment_time' => 'required|date_format:H:i',
            'customer_id' => 'required|exists:customers,id',
            'company_id' => 'required|exists:companies,id',
            'description' => 'nullable|string',
            'status' => 'required|in:scheduled,completed,cancelled',
            'location' => 'nullable|string|max:255',
        ]);

        $this->checkCompanyAccess($request->company_id);

        $Appointment->update($validated);

        return redirect()->route('appointment.index')->with('success', 'Appointment updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $Appointment = Appointment::findOrFail($id);

        $this->checkCompanyAccess($Appointment->company_id);

        $Appointment->delete();

        return redirect()->route('appointment.index')->with('success', 'Appointment deleted successfully.');
    }
}
