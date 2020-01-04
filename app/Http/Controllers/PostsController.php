<?php

namespace App\Http\Controllers;

use App\Post;
use App\User;
use Illuminate\Http\Request;


class PostsController extends Controller
{
    


    public function __construct()  //user must be login then he can see the site. construct is a predefine method in laravel so we can use it
    {
            $this->middleware('auth');
    }




    //used for displaying a list of posts
    public function index(User $user)
    {
        $posts = Post::all();
        return view('home')-> with(('posts'),auth()->user()->posts);

    }




    //will show a view with a form for creating a post
    public function create()
    {
        return view('create');

    }




    //used for insert a post inside the database. Note: create method submits to store method
    public function store(Request $request)
    {
        $validatedData  = $request->validate([ //for validation of form data
            'caption' => 'required',
            'diary' => [ 'required' ], ]); 
        //insert data to database     
        auth()->user()->posts()->create($validatedData);// should not use this code --->  $post = Post::create($validatedData); because here just call Post so the user that loged in not consider
        return redirect('/posts' )->with('success','خاطره اضافه شد');        
      
    }






    //will show a form for editing a post. Form will be filled with the existing post data
    public function edit($id)
    {
    $post = Post::findOrFail($id);

    return view('edit', compact('post'));
    }






    //Used for updating a post inside the database. Note: edit submits to update method

    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'caption' => 'required',
            'diary' => 'required',
        ]);
        Post::whereId($id)->update($validatedData);

        return redirect('/posts')->with('success', 'خاطره مورد نظر با موفقیت ویرایش شد');
    }





    //used for deleting a specified post
    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        return redirect('/posts')->with('success', 'خاطره مورد نظر حذف گردید');
    }


    public function show(Post $post)
    {
       
       return view('show', compact('post'));
       

    }

}
