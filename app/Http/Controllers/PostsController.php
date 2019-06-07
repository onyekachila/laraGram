<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post;
use Intervention\Image\Facades\Image;

class PostsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('posts.create');
    }

    public function store()
    {
        //dd(request()->all());

        $data = request()->validate([
            'caption' => 'required',
            'image' => ['required', 'image'],
        ]);

        // Post::create($data);

        // testing work around image upload
        // after which we link the page using artisan command
        // the save it as image path
        // dd(request('image')->store('uploads', 'public'));


        $imagePath = request('image')->store('uploads', 'public');
        $image = Image::make(public_path("storage/{$imagePath}"))->fit(1200, 1200);
        $image->save();


        // had to comment this line because of the image
        // auth()->user()->posts()->create($data);

        auth()->user()->posts()->create([
            'caption' => $data['caption'],
            'image' => $imagePath,
        ]);

        //dd(request()->all());

        return redirect('/profile/' . auth()->user()->id);  // returns back to the authenticated user's profile.

    }
}
