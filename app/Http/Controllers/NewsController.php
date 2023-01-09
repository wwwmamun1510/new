<?php

namespace App\Http\Controllers;

use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();
        return view('admin.Newses.index', compact('news'));
    }

    public function store(Request $request)
    {
        $news = new News;
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/newses/', $filename);
            $news->image = $filename;
        }
        $news->save();
        return redirect()->back()->with('status','News Added Successfully!!!');
    }

    public function edit($id)
    {
        $news =  News::find($id);
        return view('admin.Newses.edit', compact('news'));
    }

    public function update(Request $request, $id)
    {
        $news = News::find($id);
        $news->title = $request->input('title');
        $news->description = $request->input('description');
        if($request->hasfile('image'))
        {
            $file = $request->file('image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/newses/', $filename);
            $news->image = $filename;
        }
        $news ->update();
        return redirect()->back()->with('status','News Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $news = News::find($id);
        $destination = 'public/uploads/newses/'.$news->image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $news->delete();
        return redirect()->back()->with('status','News Deleted Successfully!!!');
    }


}
