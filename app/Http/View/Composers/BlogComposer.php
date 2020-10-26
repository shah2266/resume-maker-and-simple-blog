<?php

namespace App\Http\View\Composers;
use App\BlogPage;
use Illuminate\View\View;
use App\Post;

class BlogComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    public function compose(View $view) {
        $view->with('breadcrumb', $this->breadcrumb());
        $view->with('postImage', $this->post());
    }
    public function breadcrumb () {
        return $breadcrumb = BlogPage::first();
    }

    public function post() {
       return Post::where('slug',request()->slug)->select('image_large')->first();
    }
}
