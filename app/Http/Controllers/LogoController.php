<?php

namespace App\Http\Controllers;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class LogoController extends Controller
{
    public function index()
    {
        $logo = Logo::all();
        return view('admin.Logos.index', compact('logo'));
    }

    public function store(Request $request)
    {
        $logo = new Logo;
        if($request->hasfile('logo_image'))
        {
            $file = $request->file('logo_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/logos/', $filename);
            $logo->logo_image = $filename;
        }
        $logo->save();
        return redirect()->back()->with('status','Logo Added Successfully!!!');
    }

    public function edit($id)
    {
        $logo = Logo::find($id);
        return view('admin.Logos.edit', compact('logo'));
    }

    public function update(Request $request, $id)
    {
        $logo = Logo::find($id);
        if($request->hasfile('logo_image'))
        {
            $destination = 'public/uploads/logos/'.$logo->logo_image;
            if(File::exists($destination))
            {
                File::delete($destination);
            }
            $file = $request->file('logo_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/logos/', $filename);
            $logo->logo_image = $filename;
        }

        $logo->update();
        return redirect()->back()->with('status','Logo Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $logo = Logo::find($id);
        $destination = 'public/uploads/logos/'.$logo->logo_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $logo->delete();
        return redirect()->back()->with('status','Logo Deleted Successfully!!!');
    }

}
