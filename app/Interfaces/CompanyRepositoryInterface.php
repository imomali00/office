<?php


 namespace App\Interfaces;
 interface CompanyRepositoryInterface
 {
     public function getAllCompany();

     public function getCompanyById(int $companyId);

     public function deleteCompany(int $companyId);

     public function createCompany(array $companyDetails);

     public function updateCompany(int $companyId, array $newDetails);
     public function getFulfilledCompanies();
 }
