<?php

namespace App\Http\Controllers;

use App\Http\Requests\Company\CompanyStoreRequest;
use App\Interfaces\CompanyRepositoryInterface;
use App\Models\Company;
use App\Repositories\CompanyRepository;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CompanyController extends Controller
{
    protected CompanyRepositoryInterface $companyRepository;
    private CompanyRepositoryInterface $postRepository;

    public function __construct(CompanyRepositoryInterface $companyRepository)
    {
        $this->postRepository = $companyRepository;
        $this->middleware('auth')->except(['index', 'store', 'show']);
        $this->authorizeResource(Company::class, 'company');
    }
    /**
     * Display a listing of the resource.
     */
    public function index(): CompanyRepositoryInterface
    {
        return $this->companyRepository;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CompanyStoreRequest $request)
    {
        return $this->companyRepository->createCompany(\request());
    }

    /**
     * Display the specified resource.
     */
    public function show(Company $company)
    {
        return $this->companyRepository->getCompanyById($company);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CompanyStoreRequest $request, Company $company)
    {
        return $this->companyRepository->updateCompany($company, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Company $company)
    {
        return $this->companyRepository->deleteCompany($company);
    }
}
