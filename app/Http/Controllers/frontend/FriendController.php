<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\FriendInvitation;
use App\Models\AcceptInvite;
use App\Models\FriendInvite;
use App\Models\User;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;
class FriendController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

       $friends=FriendInvite::where('email',Auth::user()->email)->where('accepted',1)->get();
       $acceptfrineds = AcceptInvite::where('invite_id', Auth::user()->id)->get();
       $friendsCount=$friends->count();
    
        $acceptfrinedsCount= $acceptfrineds->count();

        $friendsNumber = $acceptfrinedsCount + $friendsCount;
        
       return view('frontend.friends.friend_page',compact('friends', 'acceptfrineds', 'friendsNumber'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function inviteFriend(Request $request)
    {
        $request->validate([
            'email' => 'required|email|',
        ]);
        
        $checkInvite=FriendInvite::where('user_id',Auth::user()->id)->where('email',$request->email)->count();
          
        if($checkInvite <= 0)
        {

            $invitation = FriendInvite::create([
                'user_id' => Auth::user()->id,
                'email' => $request->input('email'),
                'accepted' => false,
            ]);

             Mail::to($request->input('email'))->send(new FriendInvitation($invitation));

    
            return redirect()->back()->with('success', 'Invitation sent successfully!');
           
        }
        else{

            $checkFriend = FriendInvite::where('user_id', Auth::user()->id)->where('email', $request->email)->where('accepted',true)->count();

             if($checkFriend > 0)
             {
                     return redirect()->back()->with('success','You are allready friend');
             }
             else{
                return redirect()->back()->with('success', 'You are allready invited use this email');
             }
           
        }

       

       
    }


    public function acceptInvitation(Request $request, $email, $id)
    {
        
          $checkUserCount=User::where('email',$email)->count();

          if($checkUserCount <=0)
          {

             
              return redirect()->route('register')->with('user_id',$id);
          }
          else
          {
            $updateInvit = FriendInvite::where('user_id', $id)->where('email',$email)->first();
            $checkUser = User::where('email', $email)->first();
            $acceptInvite=AcceptInvite::create([
                'user_id'=>$checkUser->id,
                'invite_id'=>$id
            ]);
            

            $updateInvit->update([
                'accepted' => true
            ]);


             
               
          }
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
