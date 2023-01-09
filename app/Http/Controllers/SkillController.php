<?php

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function index()
    {
        $skill = Skill::all();
        return view('admin.Skills.index', compact('skill'));
    }

    public function store(Request $request)
    {
        $skill = new Skill;
        $skill->skill_type = $request->input('skill_type');
        $skill->percentage = $request->input('percentage');
        $skill->save();
        return redirect()->back()->with('status','Skill Added Successfully!!!');
    }

    public function edit($id)
    {
        $skill = Skill::find($id);
        return view('admin.Skills.edit', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $skill =  Skill::find($id);
        $skill->skill_type = $request->input('skill_type');
        $skill->percentage = $request->input('percentage');
        $skill->update();
        return redirect()->back()->with('status','Skill Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $skill = Skill::find($id);
        $skill->delete();
        return redirect()->back()->with('status','Skill Deleted Successfully!!!');
    }
}
