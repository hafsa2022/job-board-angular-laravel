<?php

namespace App\Repositories;

use App\Repositories\Interfaces\ICompanyRepository;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;



class CompanyRepository implements ICompanyRepository
{
    protected $model;

    public function _construct(Company $company)
    {
        $this->model = $company;
    }

    public function AddCompany(Company $company)
    {
        $company->save();
        return $company;
    }

    public function updateCompany(Request $request)
    {
        $company = Company::where('id', $request->id)->first();

        if($request->file('image')){
            $completeName = $request->file('image')->getClientOriginalName();
            $fileName = pathinfo($completeName,PATHINFO_FILENAME);
            $extension = $request->file('image')->getClientOriginalExtension();
            $compPic= str_replace(' ','_',$fileName).'_'.time().'.'.$extension;
            $imagePath = $request->file('image')->storeAs('public/images/companiesLogos',$compPic);
            // dd($path);
        }

        $company->update([
            'name' => $request->input('name'),
            'description' => $request->input('description'),
            'image' => $imagePath,
            ]);

        return $company;

    }
}
