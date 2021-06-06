<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Modules\Service\Entities\Models\Service;
use Modules\Service\Entities\Models\ServiceLocation;

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
        $locations = ServiceLocation::where('status', 1)->get();
        $primaryServices = Service::where(['service_type' => 'primary', 'status' => 1])->get();
        $secondaryServices = Service::where(['service_type' => 'secondary', 'status' => 1])->get();
        return view('frontend.pages.online', compact('locations', 'primaryServices', 'secondaryServices'));
    }

    public function contactPage() {
        return view('frontend.pages.contact');
    }
}
