<?php

namespace App\Http\Controllers\Blog;

use App\Http\Controllers\Controller;
use App\BlogPage;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;

class BlogPageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $content = BlogPage::first();
        return view('admin.blog.page.index', compact('content'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $content = new BlogPage();
        return view('admin.blog.page.create', compact('content'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $content = BlogPage::create($this->validateRequest());
        $this->storeImage($content);
        return redirect('/control/blog/page')->with('success', 'Content add successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\BlogPage  $blogPage
     * @return \Illuminate\Http\Response
     */
    public function show(BlogPage $blogPage)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\BlogPage  $blogPage
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $content = BlogPage::find($id);
        return view('admin.blog.page.edit', compact('content'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\BlogPage  $blogPage
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $content = BlogPage::where('id', $id)->first();
        //Delete previous image from directory
        if(request()->hasFile('image')){
            Storage::delete('public/'.$content->image);
        }

        $content->update($this->validateRequest());
        $this->storeImage($content);

        return redirect('/control/blog/page')->with('success', 'Content updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\BlogPage  $blogPage
     * @return \Illuminate\Http\Response
     */
    public function destroy(BlogPage $blogPage)
    {
        //
    }

    //Store image
    private function  storeImage($content) {
        if (request()->hasFile('image')) {
            $content->update ([
                'image' => request()->file('image')->store('blog/bg/breadcrumb','public'),
            ]);
            Image::make(public_path('storage/'.$content->image))->resize(1920,1080)->save();
        }
    }

    //Request validation
    private function validateRequest() {
        return tap(request()->validate([
            'image'         => 'nullable|image|mimes:png,jpeg,jpg,gif|max:2048',
            'page_title'    => 'required|string|max:100',
            'description'   => 'nullable|string',
            'visibility'    => 'required|numeric',

        ]), function () {
            if(request()->method() == 'POST'){
                request()->validate([
                    'image'     => 'required|mimes:jpeg,jpg,png,gif|max:2048',
                ]);
            }
        });

    }
}
