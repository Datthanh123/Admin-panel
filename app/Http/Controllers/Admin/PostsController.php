<?php

namespace App\Http\Controllers\Admin;

use App\Http\Requests;
use App\Http\Controllers\Controller;

use App\Post;
use App\Category;
use Illuminate\Http\Request;

class PostsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\View\View
     */
    public function index(Request $request)
    {
        $keyword = $request->get('search');
        $perPage = 25;

        if (!empty($keyword)) {
            $posts = Post::where('post_title', 'LIKE', "%$keyword%")
                ->orWhere('post_tease', 'LIKE', "%$keyword%")
                ->orWhere('post_content', 'LIKE', "%$keyword%")
                ->orWhere('post_author', 'LIKE', "%$keyword%")
                ->orWhere('post_image', 'LIKE', "%$keyword%")
                ->orWhere('post_image_dec', 'LIKE', "%$keyword%")
                ->latest()->paginate($perPage);
        } else {
            $posts = Post::latest()->paginate($perPage);
        }

        return view('admin.posts.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        $cates = Category::pluck('cate_name', 'id');
        return view('admin.posts.create', compact('cates'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function store(Request $request)
    {
        
        $this->validate($request, [
            'post_title'=>'required',
            'post_tease'=>'required',
            'post_content'=>'required',
            'post_author'=>'required',
            'post_image_dec'=>'required',
            'post_image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $post = new Post();
        if($request->hasFile('post_image'))
        {
            $image = $request->file('post_image');

            $name = str_slug($request->post_title) . '.'. $image->getClientOriginalExtension();

            $location = public_path('public/Upload/News');
            $imagePath = $location. "/". $name;
            $image->move($location, $name);
            $post->post_image = $name;
        }
        $post->cate_id = $request->get('cate_id');
        $post->post_tease = $request->get('post_tease');
        $post->post_title = $request->get('post_title');
        $post->post_content = $request->get('post_content');
        $post->post_author = $request->get('post_author');
        $post->post_image_dec = $request->get('post_image_dec');
        $post->save();
        return redirect('admin/posts')->with('flash_message', 'Post added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function show($id)
    {
        $post = Post::findOrFail($id);
        
        return view('admin.posts.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     *
     * @return \Illuminate\View\View
     */
    public function edit($id)
    {
        $post = Post::findOrFail($id);
        $cates = Category::pluck('cate_name', 'id');
        return view('admin.posts.edit', compact('post','cates'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'post_title'=>'required',
            'post_tease'=>'required',
            'post_content'=>'required',
            'post_author'=>'required',
            'post_image_dec'=>'required',
            'post_image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
        $requestData = $request->all();
        
        $post = Post::findOrFail($id);
        $post->update($requestData);
        
            if($request->hasFile('post_image'))
            {
                $image = $request->file('post_image');
    
                $name = str_slug($request->post_title) . '.'. $image->getClientOriginalExtension();
    
                $location = public_path('public/Upload/News');
                $imagePath = $location. "/". $name;
                $image->move($location, $name);
                $post->post_image = $name;
            }
            $post->cate_id = $request->get('cate_id');
            $post->post_title = $request->get('post_title');
            $post->post_tease = $request->get('post_tease');
            $post->post_content = $request->get('post_content');
            $post->post_author = $request->get('post_author');
            $post->post_image_dec = $request->get('post_image_dec');
            $post->save();
            return redirect('admin/posts')->with('flash_message', 'Post added!');
       
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     *
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Routing\Redirector
     */
    public function destroy($id)
    {
        Post::destroy($id);

        return redirect('admin/posts')->with('flash_message', 'Post deleted!');
    }
}
