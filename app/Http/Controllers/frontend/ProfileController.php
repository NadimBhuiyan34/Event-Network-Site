<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
class ProfileController extends Controller
{
    public function index()
    {
        return view('frontend.profile.index');
    }
    
    public function update(Request $request, $id)
    {

        
         $request->validate([
            'name'=>'required|string|',
            'email'=>'required|string|email', 
             
         ]);
          
           if($request->hasFile('profile'))
           {
               $profileImage=$request->file('profile');
               $profileImageName=$profileImage->getClientOriginalName();
               $profileImage->storeAs('public/image/profiles',$profileImageName);

           }

           $profileUpdate=User::find($id);

            $profileUpdate->name=$request->input('name');
            $profileUpdate->email=$request->input('email');
            $profileUpdate->date_of_birth=$request->input('date_of_birth');
            $profileUpdate->profile_image=$profileImageName?? $profileUpdate->profile_image;
            


            $profileUpdate->save();

            return redirect()->back()->with('success','Profile updated succcessfully');


    }
    
    public function password(Request $request)
    {
        // $request->validate([
        //     'currentPassword' => 'required',
        //     'new_password' => ['required', 'confirmed', Rules\Password::defaults()],
        // ]);

        $user =User::where('id',Auth::user()->id)->first();

        if (!Hash::check($request->currentPassword, $user->password)) {
            return redirect()->back()->with('success', 'The current password is incorrect.');
        }
        else
        {
            $user->update([
                'password' => Hash::make($request->new_password)
            ]);

            return redirect()->back()->with('success', 'Password changed successfully!');
        }

       
    }
}
