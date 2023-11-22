<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\IJobService;

class JobController extends Controller
{
    private IJobService $jobService;

    public function __construct(IJobService $jobService)
    {
        $this->jobService = $jobService;
    }

    public function addJob(Request $request)
    {
        $job = $this->jobService->addJob($request);
        return response()->json(['jobData'=> $job]);
    }

    public function updateJob(Request $request)
    {
        $job = $this->jobService->updateJob($request);
        return response()->json(['jobDataUpdated'=> $job]);
    }

    public function getAllJobs()
    {
        $jobs = $this->jobService->getAllJobs();
        return $jobs;
    }

}
