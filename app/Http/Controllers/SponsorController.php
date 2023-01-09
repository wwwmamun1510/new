<?php

namespace App\Http\Controllers;

use App\Models\Sponsor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SponsorController extends Controller
{
    public function index()
    {
        $sponsor = Sponsor::all();
        return view('admin.Sponsors.index', compact('sponsor'));
    }

    public function store(Request $request)
    {
        $sponsor = new Sponsor;
        if($request->hasfile('sponsor_image'))
        {
            $file = $request->file('sponsor_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/sponsors/', $filename);
            $sponsor->sponsor_image = $filename;
        }
        $sponsor->save();
        return redirect()->back()->with('status','Sponsor Added Successfully!!!');
    }

    public function edit($id)
    {
        $sponsor = Sponsor::find($id);
        return view('admin.Sponsors.edit', compact('sponsor'));
    }

    public function update(Request $request, $id)
    {
        $sponsor = Sponsor::find($id);
        if($request->hasfile('sponsor_image'))
        {
            $destination = 'public/uploads/sponsors/'.$sponsor->sponsor_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('sponsor_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/sponsors/', $filename);
            $sponsor->sponsor_image = $filename;
        }

        $sponsor->update();
        return redirect()->back()->with('status','Sponsor Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $sponsor = Sponsor::find($id);
        $destination = 'public/uploads/sponsors/'.$sponsor->sponsor_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $sponsor->delete();
        return redirect()->back()->with('status','Sponsor Deleted Successfully!!!');
    }


}
