<?php

namespace App\Services\Interfaces;

use Illuminate\Http\Request;

interface IJobService
{
    public function addJob(Request $request);

    public function updateJob(Request $request);

    public function getAllJobs();

}
