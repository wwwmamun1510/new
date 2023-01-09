<?php

namespace App\Http\Controllers;

use App\Models\Testimonial;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class TestimonialController extends Controller
{
    public function index()
    {
        $testimonial = Testimonial::all();
        return view('admin.Testimonials.index', compact('testimonial'));
    }

    public function store(Request $request)
    {
        $testimonial = new Testimonial;
        $testimonial->description = $request->input('description');
        $testimonial->testimonial_name = $request->input('testimonial_name');
        $testimonial->designation = $request->input('designation');
        $testimonial->save();
        return redirect()->back()->with('status','Testimonial Added Successfully!!!');
    }

    public function edit($id)
    {
        $testimonial = Testimonial::find($id);
        return view('admin.Testimonials.edit', compact('testimonial'));
    }

    public function update(Request $request, $id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->description = $request->input('description');
        $testimonial->testimonial_name = $request->input('testimonial_name');
        $testimonial->designation = $request->input('designation');
        $testimonial->update();
        return redirect()->back()->with('status','Testimonial Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $testimonial = Testimonial::find($id);
        $testimonial->delete();
        return redirect()->back()->with('status','Testimonial Deleted Successfully!!!');
    }
}