<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Favourite;
use Illuminate\Support\Facades\Auth;

class FavouriteController extends Controller
{

    public function index()
    {
        $favourites=Favourite::where('user_id',Auth::user()->id)->get();
        return view('frontend.favourites.favourites',compact('favourites'));
    }
    public function store(Request $request)
    {
                  $eventcheck=Favourite::where('event_id', $request->eventId)->where('user_id',Auth::user()->id)->count();

                  if
        ($eventcheck <= 0)
        {
            $eventFavourite = Favourite::create([

                'event_id' => $request->eventId,
                'user_id' => Auth::user()->id
            ]);

            return response()->json(['status' => 'success', 'message' => 'Add favourite event']);
        }
        else
        {
            return response()->json(['status' => 'success', 'message' => 'Allready add favourite event']);
        }
     


    }
    
    
}
