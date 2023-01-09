<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function index()
    {
        $experience = Experience::all();
        return view('admin.Experiences.index', compact('experience'));
    }

    public function store(Request $request)
    {
        $experience = new Experience;
        $experience->duration = $request->input('duration');
        $experience->company_name = $request->input('company_name');
        $experience->designation = $request->input('designation');
        $experience->details = $request->input('details');
        $experience->save();
        return redirect()->back()->with('status','Experience Added Successfully!!!');
    }

    public function edit($id)
    {
        $experience = Experience::find($id);
        return view('admin.Experiences.edit', compact('experience'));
    }

    public function update(Request $request, $id)
    {
        $experience =  Experience::find($id);
        $experience->duration = $request->input('duration');
        $experience->company_name = $request->input('company_name');
        $experience->designation = $request->input('designation');
        $experience->details = $request->input('details');
        $experience->update();
        return redirect()->back()->with('status','Experience Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $experience = Experience::find($id);
        $experience->delete();
        return redirect()->back()->with('status','Experience Deleted Successfully!!!');
    }
}

