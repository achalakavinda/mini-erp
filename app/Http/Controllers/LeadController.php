<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Crm\Lead;
use App\Models\Company;
use App\Models\Crm\LeadType;
use Illuminate\Support\Facades\DB;
use App\Traits\HasCompanyScope;

class LeadController extends Controller
{
    use HasCompanyScope;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $source = $request->get('tenant', 'default');
        $connection = $source === 'default' ? config('database.default') : $source;

        $query = (new Lead)->setConnection($connection)->newQuery();

        if ($source === 'default') {
            $query->ownedByCompany();
        }

        $Customers = $query->paginate(10);

        return view('admin.lead.index',compact('Customers'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Company = Company::whereIn('id', $this->companyIds())->pluck('code', 'id');
        $LeadTypes = LeadType::pluck('name', 'id');

        return view('admin.crm.lead.create', compact('Company', 'LeadTypes'));
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
        $request->validate([
           'post_url' => 'required|string|max:255',
           'email' => 'required|email|max:255',
            'company_name' => 'required|string|max:255',
            'company_id' => 'required|exists:companies,id',
            'lead_type_id' => 'required|exists:lead_types,id',
            'message' => 'required|string',
           ]);

        if (!in_array($request->company_id, $this->companyIds())) {
            abort(403, 'Unauthorized company access.');
        }

        
        Lead::create([
            'post_url' => $request->post_url,
            'email' => $request->email,
            'company_name' => $request->company_name,
            'company_id' => $request->company_id,
            'lead_type_id' => $request->lead_type_id,
            'message' => $request->message,
        ]);

        return redirect()->route('lead.index')->with('success', 'Lead created successfully.');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
