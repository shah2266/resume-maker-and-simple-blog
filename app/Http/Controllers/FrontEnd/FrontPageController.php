<?php

namespace App\Http\Controllers\FrontEnd;

use App\BannerType;
use App\Banner;
use App\Contact;
use App\ContactPage;
use App\Education;
use App\Http\Controllers\Controller;
use App\Personal;
use App\Professional;
use App\Training;
use Illuminate\Http\Request;

class FrontPageController extends Controller
{
    public function index() {
        $bannerType = BannerType::all()->first();
        $image = Banner::Publish()->Image()->first();
        $sliders = Banner::Publish()->Slider()->get();
        return view('website.home', compact('bannerType', 'image', 'sliders'));
    }

    public function myResume() {
        $personal = Personal::all()->first();

        $slot_1 = '';
        $slot_2 = '';
        if(!empty($personal->skills)) {
            $skills = array_chunk(array_filter(explode(";",$personal->skills)), ceil(count(array_filter(explode(";",$personal->skills)))/2));

            foreach($skills[0] as $skill) {
                $slot_1 .= '<li>'.trim($skill).'</li>';
            }

            if(count($skills) > 1) {
                foreach($skills[1] as $skill) {
                    $slot_2 .= '<li>'.trim($skill).'</li>';
                }
            }
        }


        $educations = Education::all();
        $trainings = Training::all();
        $professionals = Professional::all();

        $prof = '';
        $res_slot_1 = '';
        $res_slot_2 = '';

        foreach($professionals as $professional) {
            $prof .= '<div class="col-xl-12 mb-3">
                    <div class="pro-header clearfix">
                        <div class="float-left">';
            $prof .= '<strong>' . $professional->designation . ' (' . $professional->department . ') -- <em>' . $professional->company_name . '</em></strong>';
            $prof .= '</div>';
            $prof .= '<div class="float-right">';
            $prof .= '<strong>'.$professional->employment_period.'</strong>';
            $prof .= '</div>';
            $prof .= '</div>';

            $prof .= '<div class="pro-body"><div class="row">';
            //$res = explode(';', $professional->responsibilities);
            $responsibilities = array_chunk(array_filter(explode(";",$professional->responsibilities)), ceil(count(array_filter(explode(";",$professional->responsibilities)))/2));

            $prof .= (count($responsibilities) > 1) ? '<div class="col-xl-6">': '<div class="col-xl-12">';
            $prof .= '<ul>';
                foreach($responsibilities[0] as $res) {
                    $prof .= '<li>'.trim($res).'</li>';
                }
            $prof .= '</ul>';
            $prof .= '</div>';
                if(count($responsibilities) > 1) {
                    $prof .= '<div class="col-xl-6">';
                    $prof .= '<ul>';
                    foreach($responsibilities[1] as $res) {
                        $prof .= '<li>' . trim($res) . '</li>';
                    }
                    $prof .= '</ul>';
                    $prof .= '</div>';
                }


            $prof .= '</div></div></div>';

        }

        $professional = $prof;

        return view('website.resume', compact('personal', 'slot_1', 'slot_2', 'educations', 'trainings','professional'));
    }



    //Download resume
    public function downloadable() {
        $data = Personal::first();
        $file = public_path(). '/storage/'.$data->file;

        $headers = [
            'Content-Type' => 'application/pdf',
        ];

        return response()->download($file);
    }


    public function contact() {
        $contact = ContactPage::first();
        return view('website.contact', compact('contact'));
    }

    public function storeContactMessage(Request $request) {

        Contact::create($this->validateRequest());

        return redirect('contact')->with('success', 'Your message has been sent. Thank you!');
    }

    private function validateRequest() {
        return request()->validate([
            'name' => 'required|string|max:40',
            'email' => 'required|email|string|max:50',
            'subject' => 'required|string|max:200',
            'message' => 'required|string|min:20|max:500'
        ]);
    }

}
