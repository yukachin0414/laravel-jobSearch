<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use App\Http\Models\Skill;

class SkillsController extends Controller
{
    public function new()
    {
        return view('Admin.skills.new');
    }
    public function create(Request $request)
    {
        $skill = new Skill();
        $skill->name = $request->name;
        $skill->save();
        return redirect()->action('Admin\SkillsController@show', [
            'id' => $skill->id,
        ]);
    }

    public function show($id)
    {
        $skill = Skill::find($id);
        return view('Admin.skills.show', compact('skill'));
   }

    public function index()
    {
        $skills = Skill::all();
        return view('Admin.skills.index', compact('skills'));
   }

    public function edit($id)
    {
        $skill = Skill::find($id);
        return view('Admin.skills.edit', compact('skill'));
    }

    public function update(Request $request)
    {
        $skill = Skill::find($request->id);
        $skill->name = $request->name;
        $skill->save();
        return redirect()->action('Admin\SkillsController@show', [
            'id' => $skill->id,
        ]);
    }

    public function destroy($id)
    {
    $skill = Skill::findOrFail($id);
    $skill->delete();
    $data = Skill::all();
        return redirect()->action('Admin\SkillsController@index');
   }

}
