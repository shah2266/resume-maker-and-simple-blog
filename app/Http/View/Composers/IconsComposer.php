<?php

namespace App\Http\View\Composers;
use Illuminate\View\View;
use App\Icons\iconsServices;

class IconsComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    public function compose(View $view) {
        $view->with('icons', $this->icons());
    }


    public function icons() {
        return iconsServices::Icons();
    }
}
