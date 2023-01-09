<?php

namespace App\Http\Controllers;

use App\Models\Social;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SocialController extends Controller
{
    public function index()
    {
        $social = Social::all();
        return view('admin.Socials.index', compact('social'));
    }

    public function store(Request $request)
    {
        $social = new Social;
        if($request->hasfile('icon_image'))
        {
            $file = $request->file('icon_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/socials/', $filename);
            $social->icon_image = $filename;
        }
        $social->save();
        return redirect()->back()->with('status','Social Added Successfully!!!');
    }

    public function edit($id)
    {
        $social = Social::find($id);
        return view('admin.Socials.edit', compact('social'));
    }

    public function update(Request $request, $id)
    {
        $social  = Social::find($id);
        if($request->hasfile('icon_image'))
        {
            $file = $request->file('icon_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/socials/', $filename);
            $social->icon_image = $filename;
        }
        $social->update();
        return redirect()->back()->with('status','Social Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $social = Social::find($id);
        $destination = 'public/uploads/socials/'.$social->icon_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $social->delete();
        return redirect()->back()->with('status','Social Deleted Successfully!!!');
    }
}

