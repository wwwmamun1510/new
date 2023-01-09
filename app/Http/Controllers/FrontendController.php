<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use App\Models\Brand;
use App\Models\Contact;
use App\Models\Experience;
use App\Models\Front;
use App\Models\Introduction;
use App\Models\Logo;
use App\Models\News;
use App\Models\Politely;
use App\Models\Project;
use App\Models\Skill;
use App\Models\Sponsor;
use App\Models\Testimonial;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    function welcome(){

        $all_introductions= Introduction::all();
        $all_skills= Skill::all();
        $all_fronts= Front::all();
        $all_experiences= Experience::all();
        $all_projects= Project::all();
        $all_testimonials= Testimonial::all();
        $all_newses= News::all();
        $all_sponsors= Sponsor::all();
        $all_contacts= Contact::all();
        $all_banners= Banner::all();
        $all_logos= Logo::all();
        $all_brands= Brand::all();
        $all_politelies= Politely::all();
       return view('frontend.index',[

            'all_introductions'=> $all_introductions,
            'all_skills'=> $all_skills,
            'all_fronts'=> $all_fronts,
            'all_experiences'=> $all_experiences,
            'all_projects'=> $all_projects,
            'all_testimonials'=> $all_testimonials,
            'all_newses'=> $all_newses,
            'all_sponsors'=> $all_sponsors,
            'all_contacts'=> $all_contacts,
            'all_banners'=> $all_banners,
            'all_logos'=> $all_logos,
            'all_brands'=> $all_brands,
            'all_politelies'=> $all_politelies,

          ]);

    }

    function about(){

        return view('about');
    }
    function contact(){

        return view('contact');
    }
}
