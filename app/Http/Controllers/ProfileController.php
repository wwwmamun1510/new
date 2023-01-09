<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Intervention\Image\Facades\Image;

class ProfileController extends Controller
{
    function update(Request $request){
      User::find(Auth::id())->update([
          'name'=>$request->name,
      ]);
  return back()->with('update_name', 'Update Successful!');
    }

function profile(){
 
      return view('admin.profile.edit');
  }

  function pass_update(Request $request){
       $request->validate([
          'password'=> ['required', 'confirmed', Password::min(8)
          ->letters()
          ->mixedCase()
          ->numbers()
          ->symbols()]
       ]);
       if(hash::check($request->old_password, auth::user()->password)){
           user::find(Auth::id())->update([
              'password'=>bcrypt($request->password),
           ]);
           return back()->with('update', 'Password Updated');
       }
       else{
          return back()->with('old_pass', 'Old password Incorrect');
       }
  }
  function photo_edit(Request $request){
      $request->validate([
          'photo'=>'image',
          'photo'=>'file|max:512',
          
      ]);

      $new_profile_photo = $request->photo;
      $extension = $new_profile_photo->getClientOriginalExtension();
      $new_name = Auth::id().'.'.$extension;
    

      Image::make($new_profile_photo)->resize(600, 500)->save(base_path('public/uploads/users/'.$new_name));
      User::find(Auth::id())->update([
        'photo'=>$new_name,
    ]);
    return back();     

      
  }

}


