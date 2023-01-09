<?php

namespace App\Http\Controllers;
use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class ContactController extends Controller
{
    public function index()
    {
        $contact = Contact::all();
        return view('admin.Contacts.index', compact('contact'));
    }

    public function store(Request $request)
    {
        $contact = new Contact;
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        if($request->hasfile('icon_image'))
        {
            $file = $request->file('icon_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/contacts/', $filename);
            $contact->icon_image = $filename;
        }
        $contact->save();
        return redirect()->back()->with('status','Contact Added Successfully!!!');
    }

    public function edit($id)
    {
        $contact =  Contact::find($id);
        return view('admin.Contacts.edit', compact('contact'));
    }

    public function update(Request $request, $id)
    {
        $contact = Contact::find($id);
        $contact->phone = $request->input('phone');
        $contact->email = $request->input('email');
        if($request->hasfile('icon_image'))
        {
            $file = $request->file('icon_image');
            $extention = $file->getClientOriginalExtension();
            $filename = time().'.'.$extention;
            $file->move('public/uploads/contacts/', $filename);
            $contact->icon_image = $filename;
        }
        $contact ->update();
        return redirect()->back()->with('status','Contact Updated Successfully!!!');
    }
    public function delete($id)
    {
        $contact = Contact::find($id);
        $destination = 'public/uploads/contacts/'.$contact->icon_image;
        if(File::exists($destination))
        {
            File::delete($destination);
        }
        $contact->delete();
        return redirect()->back()->with('status','Contact Deleted Successfully!!!');
    }


}
