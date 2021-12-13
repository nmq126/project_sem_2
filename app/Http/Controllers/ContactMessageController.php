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

    public function showMessages(Request $request)
    {
        $messages = ContactMessage::query();
        if ($request->has('name')) {
            $name = $request->input('name');
            $messages = $messages->where('name', 'LIKE', '%' . $name . '%');
        }
        if ($request->has('email')) {
            $email = $request->input('email');
            $messages = $messages->where('email', 'LIKE', '%' . $email . '%');
        }
        if ($request->has('start_date')) {
            $start_date = $request->input('start_date');
            if ($start_date != null) {
                $messages = $messages->whereDate('sent_at', '>=', $start_date);
            }
        }
        if ($request->has('end_date')) {
            $end_date = $request->input('end_date');
            if ($end_date != null) {
                $messages = $messages->whereDate('sent_at', '<=', $end_date);
            }
        }
        if ($request->has('status')) {
            $status = $request->input('status');
            switch ($status) {
                case 1:
                    $messages = $messages->where('is_read', '=', false);
                    break;
                case 2:
                    $messages = $messages->where('is_read', '=', true);
                    break;
            }
        }
        $messages = $messages->paginate(10);
        $messages->appends($request->all());
        return view('admin.contact-message.list', compact('messages'));
    }

    public function details($id)
    {
        $message = ContactMessage::find($id);
        $message->is_read = 1;
        $message->save();
        return view('admin.contact-message.details', compact('message'));
    }

    public function delete($id)
    {
        $message = ContactMessage::find($id);
        $message->delete();
        return redirect('/admin/messages/list');
    }

}
