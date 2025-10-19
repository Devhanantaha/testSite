<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ContactMessage;

class ContactMessageController extends Controller
{
    public function index()
    {
        $rows = ContactMessage::latest()->paginate(10);
        $title ='رسائل التواصل';
        return view('admin.contact_messages.index', compact('rows','title'));
    }

    public function show(ContactMessage $message)
    {
        return view('admin.contact_messages.show', compact('message'));
    }
}
