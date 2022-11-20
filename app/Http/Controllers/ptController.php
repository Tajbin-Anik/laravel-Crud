<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class ptController extends Controller
{

    //index page
    public function index()
    {
        $posts = Blog::select('id', 'title', 'body', 'image', 'category_id')->paginate(1);

        return view('practice.index', compact('posts'));
    }

    //creat form
    public function creat()
    {

        $categories = Category::all();
        return view('practice.creat', compact('categories'));
    }

    //insert table

    public function insert(Request $request)
    {

        $request->validate([
            'title' => 'required|max:40',
            'body' => 'required|max:200',
            'image' => 'nullable|max:512',
        ]);

        // image insert

        $image = $request->file('image');

        $image_name = uniqid() . '.' . $image->getClientOriginalExtension();

        Image::make($image)->crop(700, 500)->save(public_path('storage/photos/' . $image_name));

        // image insert end


        $blog = new Blog();
        $blog->category_id = $request->category;
        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->image = $image_name;
        $blog->save();

        return redirect(route('practice.index'))->with('success', "DATA INSERT SUCCESFULL");
    }

    //singal view

    public function view(Blog $blog)
    {
        return view('practice.view', compact('blog'));
    }

    // edit data
    public function edit(Blog $blog)
    {

        return view('practice.edit', compact('blog'));
    }

    //update data
    public function update(Request $request, Blog $blog)
    {
        $request->validate([
            'title' => 'required|max:40',
            'body' => 'required|max:200'
        ]);


        $blog->title = $request->title;
        $blog->body = $request->body;
        $blog->body = $request->body;
        $blog->save();

        return redirect(route('practice.index'))->with('success', "DATA UPDATE SUCCESFULL");
    }

    //data delete

    public function delete(Blog $blog)
    {
        $blog->delete();
        return redirect(route('practice.index'))->with('success', "DATA DELETE SUCCESFULL");
    }
}
