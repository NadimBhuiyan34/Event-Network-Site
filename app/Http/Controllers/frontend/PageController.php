<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;
class PageController extends Controller
{
    public function profile()
    {
        $events=Event::where('user_id',Auth::user()->id)->get();
        $categories=Category::latest()->get();
        return view('frontend.profile.profile_page',compact('events', 'categories'));
    }
    public function favourite()
    {
        return view('frontend.favourites.favourites');
    }
}
