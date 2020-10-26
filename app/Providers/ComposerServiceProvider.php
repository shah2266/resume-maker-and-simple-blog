<?php

namespace App\Providers;

use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        View::composer(
            [
                'website.includes.hamburger',
                'website.includes.header',
                'website.includes.footer',
                'website.contact',
            ],
            'App\Http\View\Composers\CompanyComposer'
        );


        View::composer([
            'website.includes.sidebar',
        ],
            'App\Http\View\Composers\SidebarComposer'
        );

        View::composer([
            'website.includes.blog-breadcrumb',
        ],
            'App\Http\View\Composers\BlogComposer'
        );
    }
}
