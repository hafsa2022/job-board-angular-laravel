<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\Interfaces\IProfileService;

class ProfileController extends Controller
{
    private IProfileService $profileService;

    public function __construct(IProfileService $profileService)
    {
        $this->profileService = $profileService;
    }

    public function addProfile(Request $request)
    {
        $profile = $this->profileService->addProfile($request);
        return response()->json(['profileData'=> $profile]);
    }

    public function updateProfile(Request $request)
    {
        $profile = $this->profileService->updateProfile($request);
        return response()->json(['profile'=> $profile]);
    }

    public function getProfile(Request $request)
    {
        $profile = $this->profileService->getProfile($request);
        return response()->json(['profile'=> $profile]);
    }

    public function getAllProfiles()
    {
        $profiles = $this->profileService->getAllProfiles();
        return response()->json(['profiles'=> $profiles]);
    }

    // public function getProfiles(Request $request){
    //     $profiles = $this->profileService->getProfiles($request);
    //     return $profiles;
    // }
}
