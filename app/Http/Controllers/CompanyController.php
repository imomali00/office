<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyStoreRequest;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return response()->json([
            'companies' => Company::with('companyUsers')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request)
    {
        $company = Company::create($request->all());
        // $company->company_name = $request->company_name;
        // $company->boss_full_name = $request->boss_full_name;
        // $company->address = $request->address;
        // $company->email = $request->email;
        // $company->company_site = $request->company_site;
        // $company->phone_number = $request->phone_number;
        
        // $company->save();
        return response()->json([
            'message' => 'Company Created',
            'data' => $company
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return response()->json(['company' => $company]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyStoreRequest $request, Company $company)
    {
       $company->update($request->all());
        
       
        return response()->json([
            'status' => true,
            'message' => 'Company Updated',
            'company' => $company
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        $company->delete();
    }
}