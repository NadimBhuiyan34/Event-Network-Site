<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Models\Post; 
use App\Models\User; 
use App\Models\Category;
use App\Models\Event;
use App\Http\Controllers\Controller;

class DashboardController extends Controller
{
    public function index()
    {
        $categories=Category::latest()->get();
        $events=Event::latest()->get();
        $currentDate = now(); // Get the current date and time using the Carbon instance 'now()'

        $upcomingEvents = Event::where('date', '>=', $currentDate)
            ->orderBy('date', 'asc')
            ->limit(3)
            ->get();

        return view('frontend.dashboard',compact('categories','events', 'upcomingEvents'));
    }
    public function dashboard()
    {
        $events = Event::latest()->get();
        return view('admin.dashboard',compact('events'));
    }
}
