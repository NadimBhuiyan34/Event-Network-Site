<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Event;
use App\Models\Category;
use Illuminate\Support\Facades\Auth;

class EventController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $events = Event::latest()->get();
        $categories = Category::latest()->get();
        return view('admin.events.index', compact('events', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->hasFile('bannerImage'))
        {
            $bannerImage=$request->file('bannerImage');
            $bannerImageName=$bannerImage->getClientOriginalName();
            $bannerImage->storeAs('public/image/events',$bannerImageName);
        }
        if($request->hasFile('images'))
        {
            $images = $request->file('images');
            $imageNames = [];
            foreach($images as $image)
            {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/image/events/others', $imageName);
                $imageNames[] = $imageName;
            }
           
        }

        $event = new Event();
        $event->category_id = 2;
        $event->user_id =Auth::user()->id;
        $event->title=$request->title;
        $event->description=$request->description;
        $event->date=$request->date;
        $event->start_time=$request->startTime;
        $event->end_time=$request->endTime;
        $event->location=$request->location;
        $event->banner_image=$bannerImageName;
        $event->other_image = json_encode($imageNames); // Convert array to JSON before saving
        $event->save();

        return redirect()->back()->with('success','New event created');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
         $event=Event::where('id',$id)->first();
         $other_image=$event->other_image;
         $images=json_decode($other_image);
         return view('frontend.events.event_details',compact('event','images'));
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
        if ($request->hasFile('bannerImage')) {
            $bannerImage = $request->file('bannerImage');
            $bannerImageName = $bannerImage->getClientOriginalName();
            $bannerImage->storeAs('public/image/events', $bannerImageName);
        }
        if ($request->hasFile('images')) {
            $images = $request->file('images');
            $imageNames = [];
            foreach ($images as $image) {
                $imageName = $image->getClientOriginalName();
                $image->storeAs('public/image/events/others', $imageName);
                $imageNames[] = $imageName;
            }
        }

        $event = Event::where('id', $id)->first();
        
        // Update the event attributes
        $event->title = $request->title;
        $event->description = $request->description;
        $event->date = $request->date;
        $event->category_id = $request->category;
        $event->start_time = $request->startTime;
        $event->end_time = $request->endTime;
        $event->banner_image = $bannerImageName??$event->banner_image;
        if($request->hasFile('images'))
        {
               $event->other_image = json_encode($imageNames);
        }
        else
        {
            $event->other_image = $event->other_image;
        }
      

        // Save the changes to the database
        $event->save();

        return redirect()->back()->with('success','Event Updated');
        

    }

    public function admin_event()
    {
        
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Event::find($id)->delete();
        return redirect()->back()->with('success','Event deleted successfully');
    }
}
