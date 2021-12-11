<?php

namespace App\Http\Controllers;

use App\Models\ContactMessage;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContactMessageController extends Controller
{
    public function saveMessage(Request $request)
    {
        $message = new ContactMessage();
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->content = $request->input('content');
        $message->sent_at = Carbon::now();
        $message->save();
        return redirect('/contact-us')->with('success', 'Chúng tôi đã nhận được phản hồi của bạn. Chúng tôi sẽ trả lời bạn trong thời gian sớm nhất.');
    }
}
