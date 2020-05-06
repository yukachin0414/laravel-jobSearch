<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Models\Company;
use App\Http\Models\Job;
use App\Http\Models\JobFavorite;

class JobFavoriteController extends Controller
{
    public function create(Request $request)
    {
        $jobFavorite = new JobFavorite();
        $jobFavorite->job_id = $request->job_id;
        $jobFavorite->user_id = Auth::guard('user')->user()->id;
        $jobFavorite -> save();
        return redirect()->action('JobsController@show', [
            'id' => $request->job_id,
        ]);
    }
    public function destroy($id)
    {
        $jobFavorite = JobFavorite::findOrFail($id);
        $jobFavorite->delete();
//        $jobFavorite = JobFavorite::all();
            return redirect()->action('JobsController@show');
   }
}
