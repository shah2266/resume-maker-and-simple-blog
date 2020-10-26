<?php

namespace App\Http\Controllers\Blog;

use App\Category;
use App\Http\Controllers\Controller;
use App\Http\Requests\PostFormRequest;
use Illuminate\Support\Facades\Storage;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('admin.blog.post.index', compact('posts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        $post = new Post();
        $categories = Category::Published()->Visibility()->get();
        return view('admin.blog.post.create', compact('post', 'categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostFormRequest $request, Post $post)
    {
        //$post = new Post();
        $this->dataStore($post, $request);
        $this->storeImage($post->id);

        return redirect('control/blog/post')->with('success', 'Post add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param Post $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        return view('admin.blog.post.show', compact('post'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::where('id', $id)->first();
        $categories = Category::all();
        return view('admin.blog.post.edit', compact('post','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostFormRequest $request, Post $post)
    {

        //dd($post->id);
        $post = Post::find($post->id);
        $this->dataStore($post, $request);
        if(request()->hasFile('image')){
            //$image = DB::table('post')->where('id', '=', $id)->select('image')->first();
            Storage::delete('public/'.$post->image);
        }
        $this->storeImage($post->id);

        return redirect('control/blog/post')->with('success', 'Post update successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $post = Post::where('is_published','!=', 1)->where('id', request()->post_id)->first();


        if(!is_null($post)) {
            $post->delete();

            $path_img_sm = 'storage/'.$post->image;
            $path_img_lg = 'storage/'.$post->image_large;

            if(file_exists($path_img_sm) && file_exists($path_img_lg)) {
                unlink(public_path($path_img_sm));
                unlink(public_path($path_img_lg));
            }

            return redirect('control/blog/post')->with('success', 'Company deleted!');

        } else {
            return redirect('control/blog/post')->with('danger', 'Delete operation doesn\'t work for active value');
        }
    }

    //Request data store
    private  function dataStore($post, $request) {
        $post->category_id = $request->get('category_id');
        $post->user_id = $request->get('user_id');
        $post->title = $request->get('title');
        $post->slug = Str::slug($request->get('slug'));
        $post->description = $request->get('description');
        $post->is_published = $request->get('is_published');
        $post->save();
    }

    //Store image
    private function  storeImage($id) {

        if (request()->hasFile('image')) {

            Post::where('id', $id)->update([
                'image' => request()->file('image')->store('blog/post/small','public'),
                'image_large' => request()->file('image')->store('blog/post/large','public'),
            ]);

            $post = Post::where('id', $id)->select('image', 'image_large')->first();

            Image::make(public_path('storage/'.$post->image))->resize(800,600)->save();
            Image::make(public_path('storage/'.$post->image_large))->resize(1920, 1080)->save();
        }
    }

}
