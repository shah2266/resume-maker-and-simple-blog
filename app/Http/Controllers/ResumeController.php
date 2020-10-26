<?php

namespace App\Http\Controllers;

use App\Education;
use App\Personal;
use App\Professional;
use App\Resume;
use App\Training;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;

class ResumeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index() {
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

        foreach($professionals as $professional) {
            $prof .= '<div class="col-sm-12 margin-bottom">
                    <div class="pro-header clearfix">
                        <div class="pull-left">';
            $prof .= '<strong>' . $professional->designation . ' (' . $professional->department . ') -- <em>' . $professional->company_name . '</em></strong>';
            $prof .= '</div>';
            $prof .= '<div class="pull-right">';
            $prof .= '<strong>'.$professional->employment_period.'</strong>';
            $prof .= '</div>';
            $prof .= '</div>';

            $prof .= '<div class="pro-body">';
            $prof .= '<ul>';
            //$res = explode(';', $professional->responsibilities);
            foreach (array_filter(explode(';', $professional->responsibilities)) as $title){
                $prof .= '<li>' . trim($title) . '</li>';
            }
            $prof .= '</ul>';
            $prof .= '</div>';
            $prof .= '</div>';

        }

        $professional = $prof;

        return view('admin.resume.index', compact('personal', 'slot_1', 'slot_2', 'educations', 'trainings','professional'));
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
}
