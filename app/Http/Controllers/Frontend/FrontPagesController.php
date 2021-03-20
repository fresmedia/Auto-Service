<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontPagesController extends Controller
{
    public function index() {
        return view('frontend.pages.index');
    }

    public function servicePage() {
        return view('frontend.pages.service');
    }

    public function aboutPage() {
        return view('frontend.pages.about');
    }

    public function offerPage() {
        return view('frontend.pages.offer');
    }

    public function pricePage() {
        return view('frontend.pages.price');
    }

    public function onlinePage() {
        return view('frontend.pages.online');
    }

    public function contactPage() {
        return view('frontend.pages.contact');
    }
}
