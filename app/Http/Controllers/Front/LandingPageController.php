<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;

class LandingPageController extends Controller
{
    public function nationalDay()
    {
        $website_settings = WebsiteSetting::first();
        return view('front.landing.national-day', compact('website_settings'));
    }

    public function storeNationalDayLead(Request $request)
    {
        $request->validate([
            'full_name'    => 'required|string|max:255',
            'phone_number' => 'required|digits_between:7,13',
            'email'        => 'nullable|email|max:255',
            'company_name' => 'required|string|max:255',
        ]);

        Contact::create([
            'full_name'    => $request->full_name,
            'phone_number' => $request->phone_number,
            'email'        => $request->email ?: 'no-email@windowadv.com',
            'site_url'     => '[ND96-LP] ' . $request->company_name,
        ]);

        return response()->json(['message' => 'تم إرسال طلبك بنجاح! سيتواصل معك فريقنا في أقرب وقت.']);
    }
}
