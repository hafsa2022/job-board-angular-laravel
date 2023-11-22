<?php

namespace App\Services;
use Illuminate\Http\Request;
use App\Services\Interfaces\ICompanyService;
use App\Repositories\Interfaces\ICompanyRepository;
use App\Models\Company;

class CompanyService implements ICompanyService
{
    protected $repository;

    public function __construct(ICompanyRepository $companyRepository)
    {
        $this->repository = $companyRepository;
    }

    public function addCompany(Request $request){
        $request->validate([
            'name' => 'required',
            'description' => 'required',
            'logo' => 'required'
        ]);

        $company = new Company();
        $company->name = $request->name;
        $company->description = $request->description;

        if($request->file('logo')){
            $completeName = $request->file('logo')->getClientOriginalName();
            $fileName = pathinfo($completeName,PATHINFO_FILENAME);
            $extension = $request->file('logo')->getClientOriginalExtension();
            $compPic= str_replace(' ','_',$fileName).'_'.time().'.'.$extension;
            $imagePath = $request->file('logo')->storeAs('public/images/companiesLogos',$compPic);
            $company->image = $imagePath ;
        }

        $company->website = $request->websiteUrl;
        $company->user_id = $request->userId;

        $company = $this->repository->addCompany($company);

        return response()->json([
            "company" => $company
        ]);
    }

    public function updateCompany(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        $company = $this->repository->updateCompany($request);

        return response()->json([
            "comapnyUpdated" => $company
        ]);
    }

}
