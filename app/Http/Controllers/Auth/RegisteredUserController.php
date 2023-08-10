<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\FriendInvite;
use App\Models\User;
use App\Models\AcceptInvite;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Session;

class RegisteredUserController extends Controller
{
    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): Response
    {

       

        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:' . User::class],
            'date_of_birth' => ['required'],
            'country' => ['required'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
        ]);


        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'date_of_birth' => $request->date_of_birth,
            'country' => $request->country,
            'role' => 'user',
            'profile_image' => 'profile.jpg',
            'password' => Hash::make($request->password),
        ]);


        $checkRequest = FriendInvite::where('user_id', $request->user_id)->where('email', $request->email)->count();

        if ($checkRequest <= 0) {

            event(new Registered($user));

            Auth::login($user);


            return response()->noContent();
            return redirect()->route('dashboard');
        } else {

              $acceptUser=User::where('email', $request->email)->first();

            $acceptInvite = AcceptInvite::create([
                'user_id' => $acceptUser->id,
                'invite_id' => $request->user_id
            ]);


            FriendInvite::where('user_id', $request->user_id)
                ->where('email', $request->email)
                ->update(['accepted' => true]);




            event(new Registered($user));
            Auth::login($user);

            return response()->noContent();
            return redirect()->route('dashboard');
        }
    }
}
