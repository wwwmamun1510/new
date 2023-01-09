<?php

namespace App\Http\Controllers;
use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class BrandController extends Controller
{
    public function index()
    {
        $brand = Brand::all();
        return view('admin.Brands.index', compact('brand'));
    }

    public function store(Request $request)
    {
        $brand = new Brand;
        if($request->hasfile('brand_image'))
        {
            $file = $request->file('brand_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/brands/', $filename);
            $brand->brand_image = $filename;
        }
        $brand->save();
        return redirect()->back()->with('status','Brand Added Successfully!!!');
    }

    public function edit($id)
    {
        $brand = Brand::find($id);
        return view('admin.Brands.edit', compact('brand'));
    }

    public function update(Request $request, $id)
    {
        $brand = Brand::find($id);
        if($request->hasfile('brand_image'))
        {
            $file = $request->file('brand_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/brands/', $filename);
            $brand->brand_image = $filename;
        }
        $brand->update();
        return redirect()->back()->with('status','Brand Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $brand = Brand::find($id);
        $destination = 'public/uploads/brands/'.$brand->brand_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $brand->delete();
        return redirect()->back()->with('status','Brand Deleted Successfully!!!');
    }

}
