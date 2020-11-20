<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests;

use App\InvoiceSetting;
use Illuminate\Http\Request;

class InvoiceSettingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $invoicesettings = InvoiceSetting::where('title', 'LIKE', "%$keyword%")
                ->orWhere('content', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $invoicesettings = InvoiceSetting::latest()->paginate($perPage);
        }

        return view('admin.invoice-settings.index', compact('invoicesettings'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        return view('admin.invoice-settings.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $requestData = $request->all();
        
        InvoiceSetting::create($requestData);

        return redirect('admin/invoice-settings')->with('flash_message', 'InvoiceSetting added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $invoicesetting = InvoiceSetting::findOrFail($id);

        return view('admin.invoice-settings.show', compact('invoicesetting'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $invoicesetting = InvoiceSetting::findOrFail($id);

        return view('admin.invoice-settings.edit', compact('invoicesetting'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        
        $requestData = $request->all();
        
        $invoicesetting = InvoiceSetting::findOrFail($id);
        $invoicesetting->update($requestData);

        return redirect('admin/invoice-settings')->with('flash_message', 'InvoiceSetting updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        InvoiceSetting::destroy($id);

        return redirect('admin/invoice-settings')->with('flash_message', 'InvoiceSetting deleted!');
    }
}
