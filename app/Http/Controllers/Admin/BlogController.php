<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Blog;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class BlogController extends Controller
{

    public function index()
    {
        $blogs=BLog::latest()->get();

        return view('admin.blogs.index',compact('blogs'));
    }
    public function store(Request $request)
    {

        // image upload
        if ($request->hasFile('bannerImage')) {
            $image = $request->file('bannerImage');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/image/blogs', $imageName);
        }
        // data store
        $data = new Blog();
        $data->user_id = Auth::user()->id;
        $data->title = $request->input('title');
        $data->content = $request->input('content');
        $data->image = $imageName ?? "";
        $data->is_active = $request->is_active;

        $data->save();

        return redirect()->back()->with('success', 'Blog Created Successfully.');
    }
    public function destroy(string $id)
    {
        Blog::find($id)->delete();

        return redirect()->back()->with('success', 'Blog deleted successfuly');
    }
    
    public function update(Request $request, $id)
    {
        if ($request->hasFile('bannerImage')) {
            $image = $request->file('bannerImage');
            $imageName = $image->getClientOriginalName();
            $image->storeAs('public/image/blogs', $imageName);
        }

        $data = Blog::find($id);
        $data->title = $request->input('title');
        $data->content = $request->input('content');
        $data->image = $imageName ?? $data->image ;
        $data->is_active =$request->is_active ;
 
        $data->save();

        return redirect()->back()->with('success', 'Blogs Updated Successfully.');
    }

    public function blog_page()
    {
        $blogs = BLog::latest()->get();

        return view('frontend.blogs.index', compact('blogs')); 
    }

}
