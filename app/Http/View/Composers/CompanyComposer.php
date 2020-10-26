<?php

namespace App\Http\View\Composers;
use App\Company;
use Illuminate\View\View;
use DB;

class CompanyComposer
{
    /**
     * Bind data to the view.
     *
     * @param  View  $view
     * @return void
     */

    public function compose(View $view) {
        $view->with('company', $this->company());
    }


    public function company() {
        return $company = Company::where('status','=',1)->first();
    }
}
