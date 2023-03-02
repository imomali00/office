<?php


namespace App\Repositories;

use App\Interfaces\CompanyRepositoryInterface;
use App\Interfaces\EmployeeRepositoryInterface;
use App\Models\Company;
use App\Models\Employee;
use Illuminate\Support\Facades\Gate;

class EmployeeRepository implements EmployeeRepositoryInterface
{


    public function getAllEmployee(): \Illuminate\Http\JsonResponse
    {
        return response()->json([
            'employees' => Employee::get()
        ]);
    }

    public function getEmployeeById(int $employeeId): \Illuminate\Http\JsonResponse
    {
        return response()->json(['employee' => $employeeId]);
    }

    public function deleteEmployee(int $employeeId)
    {
        $employeeId->delete();
    }

    public function createEmployee(array $employeeDetails)
    {
        $employee = Employee::create($employeeDetails->all());
        return response()->json([
            'message' => 'Employee Created',
            'employees' => $employee
        ]);

    }

    public function updateEmployee(int $employeeId, array $newDetails): \Illuminate\Http\JsonResponse
    {
        $employeeId->update($newDetails->all());


        return response()->json([
            'status' => true,
            'message' => 'Employee Updated',
            'company' => $employeeId
        ], 200);
    }

    public function getFulfilledEmployees()
    {
        // TODO: Implement getFulfilledEmployees() method.
    }
}
