<?php

namespace App\Http\Controllers;

use App\Http\Requests\Employee\EmployeeStoreRequest;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Employee;
use App\Repositories\EmployeeRepository;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    protected EmployeeRepositoryInterface $employeeRepository;
    private EmployeeRepositoryInterface $employeeRepositoryy;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepositoryy = $employeeRepository;
    }

    /**
     * Display a listing of the resource.
     */
    public function index(): \Illuminate\Http\JsonResponse
    {
        return $this->employeeRepository;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EmployeeStoreRequest $request)
    {
        return $this->employeeRepository->createEmployee(\request());
    }

    /**
     * Display the specified resource.
     */
    public function show(Employee $employee)
    {
        return $this->employeeRepository->getEmployeeById($employee);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EmployeeStoreRequest $request, Employee $employee)
    {
        return $this->employeeRepository->updateEmployee($employee, $request->all());
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Employee $employee)
    {
        return $this->employeeRepository->deleteEmployee($employee);
    }
}
