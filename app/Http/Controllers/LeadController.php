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

    public function __construct()
    {
        $this->middleware(['permission:'.config('constant.Permission_Lead')]);
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

        $query = (new Lead)->setConnection($connection)->newQuery();

        if ($source === 'default') {
            $query->ownedByCompany();
        }

        $Leads = $query->paginate(10);

        return view('admin.lead.index',compact('Leads'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $Company = Company::userOwnedCompany()->pluck('code', 'id');
        $LeadTypes = LeadType::pluck('name', 'id');

        return view('admin.lead.create', compact('Company', 'LeadTypes'));
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
           'post_url' => 'required|string|max:255',
           'email' => 'required|email|max:255',
           'company_name' => 'required|string|max:255',
           'company_id' => 'required|exists:companies,id',
           'lead_type_id' => 'required|exists:lead_types,id',
           'message' => 'required|string',
        ]);

        $this->checkCompanyAccess($request->company_id);

        Lead::create($validated);

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
        $this->checkCompanyAccess($request->company_id);
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
