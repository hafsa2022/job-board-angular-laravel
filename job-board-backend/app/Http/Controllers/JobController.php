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
        $jobs = $this->jobService->updateJob($request);
        return response()->json(['jobs'=> $jobs]);
    }

    public function getAllJobs()
    {
        $jobs = $this->jobService->getAllJobs();
        return response()->json(['jobs'=> $jobs]);
    }

    public function getLastJobs()
    {
        $jobs = $this->jobService->getLastJobs();
        return response()->json(['jobs'=> $jobs]);
    }

    public function searchJobs(Request $request)
    {
        $jobs = $this->jobService->searchJobs($request);
        return response()->json(['jobs'=> $jobs]);
    }

}
