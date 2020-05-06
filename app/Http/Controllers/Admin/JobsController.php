<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Models\Job;
use App\Http\Models\Skill;
use App\Http\Models\JobSkill;
use App\Http\Models\Company;

class JobsController extends Controller
{
    public function new()
    {
        $companies = Company::all();
        $skills = Skill::all();
        return view('admin.jobs.new', compact('companies','skills'));
    }

    public function create(Request $request)
    {
        $job = new Job();
        $job->name = $request->name;
        $job->company_id = $request->company_id;
        $job->save();
        if (isset($request->skill)) {
            foreach ($request->skill as $skill_id) {
                $jobSkill = new JobSkill();
                $jobSkill->job_id = $job->id;
                $jobSkill->skill_id = $skill_id;
                $jobSkill->save();
            }
        }
        return redirect()->action('Admin\JobsController@show', [
            'id' => $job->id,
        ]);
    }

    public function show($id)
    {
        $job = Job::leftJoin('companies', 'companies.id', '=', 'jobs.company_id')
            ->select('jobs.name as job_name', 'companies.name as company_name')
            ->find($id);
        $jobSkills = JobSkill::leftJoin('skills', 'skills.id', '=', 'job_skills.skill_id')
            ->where('job_id', $id)
            ->select('skills.name')
            ->get();
        return view('admin.jobs.show', compact('job','jobSkills'));
   }

    public function index()
    {
        $jobs = Job::all();
        return view('admin.jobs.index', compact('jobs'));
   }

    public function edit($id)
    {
        $job = Job::find($id);
        $companies = Company::all();
        $skills = Skill::all();
        $_jobSkills = JobSkill::where('job_id', $id)->get('skill_id');
        $jobSkills = [];
        foreach ($_jobSkills as $_jobSkill) {
            $jobSkills[] = $_jobSkill->skill_id;
        }
        return view('admin.jobs.edit', compact('job', 'skills','companies','skills', 'jobSkills'));
    }

    public function update(Request $request)
    {
        $job = Job::find($request->id);
        $job->name = $request->name;
        $job->company_id = $request->company_id;
        $job->save();
        JobSkill::where('job_id', $request->id)->delete();
        if (isset($request->skill)) {
            foreach ($request->skill as $skill_id) {
                $jobSkill = new JobSkill();
                $jobSkill->job_id = $request->id;
                $jobSkill->skill_id = $skill_id;
                $jobSkill->save();
            }
        }
        return redirect()->action('Admin\JobsController@show', [
            'id' => $job->id,
        ]);
    }
    
    public function destroy($id)
    {
    $job = Job::findOrFail($id);
    $job->delete();
    $data = Job::all();
        return redirect()->action('Admin\JobsController@index');
   }
}

