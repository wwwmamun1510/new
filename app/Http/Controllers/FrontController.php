<?php

namespace App\Http\Controllers;

use App\Models\Front;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class FrontController extends Controller
{
    public function index()
    {
        $front = Front::all();
        return view('admin.Fronts.index', compact('front'));
    }

    public function store(Request $request)
    {
        $front= new Front;
        $front->title = $request->input('title');
        $front->description = $request->input('description');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/fronts/', $filename);
            $front->image = $filename;
        }
        $front->save();
        return redirect()->back()->with('status','Front Added Successfully!!!');
    }

    public function edit($id)
    {
        $front =  Front::find($id);
        return view('admin.Fronts.edit', compact('front'));
    }

    public function update(Request $request, $id)
    {
        $front =  Front::find($id);
        $front->title = $request->input('title');
        $front->description = $request->input('description');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/fronts/', $filename);
            $front->image = $filename;
        }
        $front ->update();
        return redirect()->back()->with('status','Front Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $front = Front::find($id);
        $destination = 'public/uploads/fronts/'.$front->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $front->delete();
        return redirect()->back()->with('status','Front Deleted Successfully!!!');
    }


}
