<?php

namespace App\Http\View\Composers;
use App\Category;
use App\Post;
use Illuminate\View\View;

class SidebarComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    public function compose(View $view) {
        $view->with('categories', $this->category());
        $view->with('recentPosts', $this->recentPost());
    }


    public function category() {
        return $categories = Category::Published()->Visibility()->get();
    }

    public function recentPost() {
        return $recentPosts = Post::limit(5)->orderBy('id','desc')->get();
    }
}
