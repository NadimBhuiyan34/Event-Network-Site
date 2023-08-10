<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use App\Models\Event;
use App\Models\AcceptInvite;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class DashboardController extends Controller
{
    public function index()
    {
        $categories = Category::latest()->get();
        // $events=Event::latest()->get();
        // $events = [];
        $acceptfrineds = AcceptInvite::where('invite_id', Auth::user()->id)->get();
        foreach ($acceptfrineds as $friend) {

            $eventsData = Event::where('user_id', $friend->user_id)->latest()->get();

            $events[] = $eventsData;
        }


        
        $acceptfrineds1 = AcceptInvite::where('user_id', Auth::user()->id)->latest()->get();
       
        foreach ($acceptfrineds1 as $friend) {

            $eventsData = Event::where('user_id', $friend->invite_id)->latest()->get();
               
            $events[] = $eventsData; 
        }
        
       
         
         
        $currentDate = now(); // Get the current date and time using the Carbon instance 'now()'
       
        $count = 0;
        $upcomingEvents = [];

        foreach ($events as $eventsData) {
            foreach ($eventsData as $event) {
                if ($event['date'] >= $currentDate && $count < 3) {
                    $upcomingEvents[] = $event;
                    $count++;
                }
            }
        }

        return view('frontend.dashboard', compact('categories', 'events', 'upcomingEvents'));
    }
    public function dashboard()
    {
        $events = Event::latest()->get();
        return view('admin.dashboard', compact('events'));
    }
}
