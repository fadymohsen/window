<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use App\Mail\ContactAdminMail;
use App\Mail\ContactClientMail;
use App\Models\Contact;
use App\Models\WebsiteSetting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('front.contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $data = $request->validate([
            'full_name'    => 'required|string|max:255',
            'email'        => 'required|email|max:255',
            'phone_number' => 'required|digits_between:7,13',
            'service'      => 'nullable|string|max:255',
            'message'      => 'nullable|string|max:2000',
        ]);

        $contact = Contact::create($data);

        $adminEmail = optional(WebsiteSetting::first())->email ?? config('mail.from.address');

        try {
            // Notify admin
            Mail::to($adminEmail)->send(new ContactAdminMail($contact));

            // Confirm to client (only if email is real)
            if ($contact->email && !str_ends_with($contact->email, '@windowadv.com')) {
                Mail::to($contact->email)->send(new ContactClientMail($contact));
            }
        } catch (\Throwable $e) {
            \Log::error('Contact mail failed: ' . $e->getMessage());
        }

        return response()->json(['message' => __('custom.contact-sent-response')]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
