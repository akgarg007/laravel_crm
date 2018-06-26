<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompaniesController extends Controller
{

    public function index()
    {
        // echo Auth::user()->id;
        if(Auth::check())
        {
            $companies = Company::where('user_id', Auth::user()->id)->get();
        }
        else{
            $companies = Company::all();
        }
        return view('companies.index',['companies'=>$companies]);
    }


    public function create()
    {
        return view('companies.create');
    }
 
    public function store(Request $request)
    {
        if(Auth::check())
        {
            $company = Company::create([
                'name'=> $request->input('name'),
                'description'=> $request->input('description'),
                'user_id'=> Auth::user()->id
            ]);

            if($company)
            {
                return redirect()->route('companies.index',['company'=>$company->id])
                ->with('success','Company Created Successfully!');
            }
        }

        return back()->with('errors','You are not loggedIn!');  
    }


    public function show(Company $company)
    {
        // echo $company->id;
        // $company_data = Company::where('id',$company->id)->first();

        $company = Company::find($company->id);
        return view('companies.show')->with(['company'=>$company]);
    }

    public function edit(Request $request,Company $company)
    {
        $company = Company::find($company->id);
        return view('companies.edit')->with(['company'=>$company]);
    }


    public function update(Request $request, Company $company)
    {   
        // save data, and than right it to the database
        // dd($request->input('description'));

        $companyUpdate = Company::where('id', $company->id)
                            ->update([
                                'name'=>$request->input('name'),
                                'description'=>$request->input('description')    
                            ]);
        if($companyUpdate){
            return redirect()->route('companies.show',['company'=>$company->id])->with('success','Company updated successfully.');
        }                        

        // if update request fails
        return back()->withInput();                            
    }


    public function destroy(Company $company)
    {
        $companydestroy = Company::destroy($company->id);
        if($companydestroy)
        {
            return redirect()->route('companies.index')->with('success','Company deleted successfully.');
        }

        // if company not deleted
        return back()->withInput()->with('error','Company could not be deleted.');
    }
}
