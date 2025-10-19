<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ContactMessage;
use Toastr;

class ContactController extends Controller
{
    public function index()
    {
        return view('site.contact');
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'     => 'required|string|max:255',
            'surname'  => 'required|string|max:255',
            'email'    => 'required|email',
            'phone'    => 'nullable|string|max:50',
            'message'  => 'required|string',
        ]);

        ContactMessage::create([
            'first_name' => $validated['name'],
            'last_name'  => $validated['surname'],
            'email'      => $validated['email'],
            'phone'      => $validated['phone'],
            'message'    => $validated['message'],
        ]);

        Toastr::success(__('site.message_sent_successfully'));
        return back();
    }
}
