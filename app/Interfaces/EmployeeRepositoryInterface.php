<?php

namespace App\Interfaces;

interface EmployeeRepositoryInterface
{
    public function getAllEmployee();

    public function getEmployeeById(int $employeeId);

    public function deleteEmployee(int $employeeId);

    public function createEmployee(array $employeeDetails);

    public function updateEmployee(int $employeeId, array $newDetails);
    public function getFulfilledEmployees();
}
