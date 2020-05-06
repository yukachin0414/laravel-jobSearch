<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Models\Company;
use App\Http\Models\Job;
use App\Http\Models\CompanyJob;

class CompaniesController extends Controller
{
    public function new()
    {
        $jobs = Job::all();
        return view('admin.companies.new', compact('jobs'));
    }

    public function create(Request $request)
    {
        $company = new Company();
        $company->name = $request->name;
        $company->save();
        return redirect()->action('Admin\CompaniesController@show', [
            'id' => $company->id,
        ]);
    }

    public function show($id)
    {
        $company = Company::find($id);
        return view('admin.companies.show', compact('company'));
   }

    public function index()
    {
        $companies = Company::all();
        return view('admin.companies.index', compact('companies'));
   }

    public function edit($id)
    {
        $company = Company::find($id);
        return view('admin.companies.edit', compact('company'));
    }

    public function update(Request $request)
    {
        $company = Company::find($request->id);
        $company->name = $request->name;
        $company->save();
        return redirect()->action('Admin\CompaniesController@show', [
            'id' => $company->id,
        ]);
    }

    public function destroy($id)
    {
    $company = Company::findOrFail($id);
    $company->delete();
    $data = Company::all();
        return redirect()->action('Admin\CompaniesController@index');
   }
}

