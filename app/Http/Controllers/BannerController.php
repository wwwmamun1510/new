<?php

namespace App\Http\Controllers;
use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BannerController extends Controller
{
    public function index()
    {
        $banner = Banner::all();
        return view('admin.Banners.index', compact('banner'));
    }

    public function store(Request $request)
    {
        $banner = new Banner;
        $banner->introduction = $request->input('introduction');
        $banner->description = $request->input('description');
        $banner->btn = $request->input('btn');
        if($request->hasfile('banner_image'))
        {
            $file = $request->file('banner_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/banners/', $filename);
            $banner->banner_image = $filename;
        }
        $banner->save();
        return redirect()->back()->with('status','Banner Added Successfully!!!');
    }

    public function edit($id)
    {
        $banner= Banner::find($id);
        return view('admin.Banners.edit', compact('banner'));
    }

    public function update(Request $request, $id)
    {
        $banner = Banner::find($id);
        $banner->introduction = $request->input('introduction');
        $banner->description = $request->input('description');
        $banner->btn = $request->input('btn');
        if($request->hasfile('banner_image'))
        {
            $file = $request->file('banner_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/banners/', $filename);
            $banner->banner_image = $filename;
        }
        $banner->update();
        return redirect()->back()->with('status','Banner Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $banner = Banner::find($id);
        $destination = 'public/uploads/banners/'.$banner->banner_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $banner->delete();
        return redirect()->back()->with('status','Banner Deleted Successfully!!!');
    }
    public function change_status($id)
    {
        $item = Banner::find($id);

        if($item->status == 0)
        {
            $status = 1;
        }else{
            $status = 0;
        }

        Banner::find($id)->update([
            'status' => $status,
        ]);

        $notification= array(
            'message' =>'Status Changed Successfully!!!',
            'alert-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

}

