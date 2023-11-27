<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\IApplicationService;

class ApplicationController extends Controller
{
    private IApplicationService $applicationService;

    public function __construct(IApplicationService $applicationService)
    {
        $this->applicationService = $applicationService;
    }

    public function addApplication(Request $request)
    {
        $application = $this->applicationService->addApplication($request);
        return $application;
    }

    // public function update(Request $request)
    // {
    //     $company = $this->companyService->updateCompany($request);
    //     return response()->json(['jobDataUpdated'=> $company]);
    // }

    public function getAllApplications()
    {
        $applications = $this->applicationService->getAllApplications();
        return $applications;
    }

}
