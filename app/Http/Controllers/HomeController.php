<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Portfolio;
use App\Models\PortfolioSlide; // Add this line to import the PortfolioSlide class


use App\Models\User;
use App\Models\Source; // Add this line to import the Source class
use App\Models\Slider; // Add this line to import the Slider class
use Illuminate\Http\Request;
use App\Models\AboutMe;
use App\Models\Guestbook;
use App\Models\Complaint; // Add this line to import the Complaint class
use App\Models\Video; // Add this line to import the Video class

class HomeController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = User::all();
      
        $portfolios = Portfolio::all();
        

        
        $guestbooks = Guestbook::all();

        $sources = Source::all(); // Add this line to get all sources
        
        $sliders = Slider::all();
        $aboutme = AboutMe::all();
        $complaints = Complaint::all();
        //portfolio slide
       $slides = PortfolioSlide::all();
       $videos = Video::all(); // Add this line to get all videos

        return view('home',compact('user','guestbooks','sources','sliders','aboutme','complaints','slides','videos','portfolios'));
    }
}
