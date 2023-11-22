<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Services\Interfaces\IJobService;
use App\Repositories\Interfaces\IJobRepository;
use App\Models\Job;

class JobService implements IJobService
{
    protected $repository;

    public function __construct(IJobRepository $jobRepository)
    {
        $this->repository = $jobRepository;
    }

    public function addJob(Request $request){
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'salary' => 'required',
            'city' => 'required',
            'country'=>'required',
            'startDate' => 'required',
        ]);

        $job = new Job();
        $job->title = $request->title;
        $job->description = $request->description;
        $job->salary = $request->salary;
        $job->city = $request->city;
        $job->country = $request->country;
        $job->type = $request->type;
        $job->category = $request->category;
        $job->start_date = $request->startDate;
        $job->company_id = $request->companyId;
        $job->user_id=$request->userId;

        $job = $this->repository->addJob($job);

        return $job;
    }

    public function updateJob(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'type' => 'required',
            'salary' => 'required',
            'city' => 'required',
            'country' => 'required',
        ]);

        $job = $this->repository->updateJob($request);

        return $job;
    }

    public function getAllJobs()
    {

        $jobs = $this->repository->getAllJobs();
        return $jobs;
    }

    public function getJobs(Request $request)
    {
        $jobs = $this->repository->getJobs($request);
        return $jobs;
    }

}
