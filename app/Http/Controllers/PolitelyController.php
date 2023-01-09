<?php

namespace App\Http\Controllers;

use App\Models\Politely;
use Illuminate\Http\Request;

class PolitelyController extends Controller
{
    public function index()
    {
        $politely = Politely::all();
        return view('admin.Politelies.index', compact('politely'));
    }

    public function store(Request $request)
    {
        $politely = new Politely;
        $politely->name = $request->input('name');
        $politely->email = $request->input('email');
        $politely->message = $request->input('message');
        $politely->save();
        return redirect()->back()->with('status','Politely Added Successfully!!!');
    }

    public function edit($id)
    {
        $politely = Politely::find($id);
        return view('admin.Politelies.edit', compact('politely'));
    }

    public function update(Request $request, $id)
    {
        $politely =  Politely::find($id);
        $politely->name = $request->input('name');
        $politely->email = $request->input('email');
        $politely->message = $request->input('message');
        $politely->update();
        return redirect()->back()->with('status','Politely Updated Successfully!!!');
    }
   
    public function delete($id)
    {
        $politely = Politely::find($id);
        $politely->delete();
        return redirect()->back()->with('status','Politely Deleted Successfully!!!');
    }
}


