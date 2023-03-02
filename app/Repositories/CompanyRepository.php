<?php

namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use Illuminate\Support\Facades\Gate;

class CompanyRepository implements CompanyRepositoryInterface
{

    public function getFulfilledCompanies()
    {
        // TODO: Implement getFulfilledCompanies() method.
    }

    public function getAllCompany(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'companies' => Company::with('companyUsers')->get()
        ]);
    }

    public function getCompanyById(int $companyId): \Illuminate\Http\JsonResponse
    {
        Gate::authorize('company', $companyId);

        // The action is authorized...
        return response()->json(['company' => $companyId]);
    }

    public function deleteCompany(int $companyId)
    {
        Gate::authorize('company', $companyId);
        $companyId->delete();
    }

    public function createCompany(array $companyDetails): \Illuminate\Http\JsonResponse
    {
        $company = Company::create($companyDetails);

        Gate::authorize('company', $company);

        // $company->save();
        return response()->json([
            'message' => 'Company Created',
            'data' => $company
        ]);
    }

    public function updateCompany(int $compayId, array $newDetails)
    {
        Gate::authorize('company', $compayId);
        $compayId->update($newDetails->all());


        return response()->json([
            'status' => true,
            'message' => 'Company Updated',
            'company' => $compayId
        ], 200);
    }
}