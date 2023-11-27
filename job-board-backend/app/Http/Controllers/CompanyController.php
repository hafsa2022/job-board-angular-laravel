<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\ICompanyService;

class CompanyController extends Controller
{
    private ICompanyService $companyService;

    public function __construct(ICompanyService $companyService)
    {
        $this->companyService = $companyService;
    }

    public function addCompany(Request $request)
    {
        $company = $this->companyService->addCompany($request);
        return $company;
    }

    public function updateCompany(Request $request)
    {
        $company = $this->companyService->updateCompany($request);
        return response()->json(['jobDataUpdated'=> $company]);
    }

    public function getAllCompanies()
    {
        $companies = $this->companyService->getAllCompanies();
        return $companies;
    }

}
