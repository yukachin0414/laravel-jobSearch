<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Models\Company;
use App\Http\Models\Job;
use App\Http\Models\CompanyJob;
use App\Http\Models\JobSKill;
use App\Http\Models\JobFavorite;
use App\Http\Models\Favorite;

class JobsController extends Controller
{

    public function index(Request $request)
    {
        $jobs = Job::leftJoin('companies', 'companies.id', '=', 'jobs.company_id')
            ->select('jobs.id', 'jobs.name as job_name', 'companies.name as company_name');
        if (isset($request->job_name)) {
            $jobs = $jobs->where('jobs.name', 'LIKE', "%$request->job_name%");
        }
        if (isset($request->company_id)) {
            $jobs = $jobs->where('companies.id', $request->company_id);
        }
        $jobs = $jobs->get();
        $jobSkills = JobSkill::leftJoin('skills', 'skills.id', '=', 'job_skills.skill_id')
            ->select('skills.name')
            ->get();

        $companies = Company::all();

        $search_conditions = [
            'job_name'   => $request->job_name,
            'company_id' => $request->company_id,
        ];

        return view('jobs.index', compact('jobs','jobSkills', 'companies', 'search_conditions'));
   }

    public function show($id)
    {
        $job = Job::leftJoin('companies', 'companies.id', '=', 'jobs.company_id')
            ->select('jobs.name as job_name', 'companies.name as company_name')
            ->find($id);
        $user_id = Auth::guard('user')->user()->id;
        $job_favored = !JobFavorite::where('job_id', $id)
            ->where('user_id', $user_id)
            ->get()
            ->isEmpty();
        $company = Company::find($id);
        $jobSkills = JobSkill::leftJoin('skills', 'skills.id', '=', 'job_skills.skill_id')
            ->where('job_id', $id)
            ->select('skills.name')
            ->get();
        return view('jobs.show', compact('job','jobSkills', 'company', 'job_favored'));
    }
}

