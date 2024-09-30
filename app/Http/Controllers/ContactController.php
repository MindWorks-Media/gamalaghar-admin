<?php

namespace App\Http\Controllers;

use App\Models\ContactUs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    public function index()
    {
        $messages = ContactUs::latest()->paginate(10);
        return view('admin.contact.contact', compact('messages'));
    }

    public function destroy($id){
        $message=ContactUs::find($id);
        if (is_null($message)) {
            return back()->with('error', 'Contact Details Not Found!');
        }
        try {
            $message=DB::transaction(function() use($message){
                $message->delete();
                return $message;
            });
            if ($message) {
                return back()->with('success', 'Message Deleted Successfuly!');
            }
        } catch (\Exception $e) {
            return back()->with('error', $e->getMessage());
        }
    }
}
