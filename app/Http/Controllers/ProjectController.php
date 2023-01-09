<?php

namespace App\Http\Controllers;


use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ProjectController extends Controller
{
    public function index()
    {
        $project = Project::all();
        return view('admin.Projects.index', compact('project'));
    }

    public function store(Request $request)
    {
        $project = new Project;
        $project->title = $request->input('title');
        $project->category = $request->input('category');
        $project->client = $request->input('client');
        $project->completion = $request->input('completion');
        $project->type = $request->input('type');
        $project->author = $request->input('author');
        $project->budget = $request->input('budget');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/projects/', $filename);
            $project->image = $filename;
        }
        $project->save();
        return redirect()->back()->with('status','Project Added Successfully!!!');
    }

    public function edit($id)
    {
        $project =  Project::find($id);
        return view('admin.Projects.edit', compact('project'));
    }

    public function update(Request $request, $id)
    {
        $project  = Project::find($id);
        $project->title = $request->input('title');
        $project->category = $request->input('category');
        $project->client = $request->input('client');
        $project->completion = $request->input('completion');
        $project->type = $request->input('type');
        $project->author = $request->input('author');
        $project->budget = $request->input('budget');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/projects/', $filename);
            $project->image = $filename;
        }
        $project ->update();
        return redirect()->back()->with('status','Project  Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $project = Project::find($id);
        $destination = 'public/uploads/projects/'.$project->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $project->delete();
        return redirect()->back()->with('status','Project Deleted Successfully!!!');
    }


}
