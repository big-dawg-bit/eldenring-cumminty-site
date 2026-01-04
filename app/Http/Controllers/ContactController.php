<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\View\View;
use Illuminate\Http\RedirectResponse;
use App\Models\User;

class ContactController extends Controller
{
    /**
     * Show the contact form
     */
    public function index(): View
    {
        return view('contact.index');
    }

    /**
     * Handle the contact form submission
     */
    public function submit(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255'],
            'subject' => ['required', 'string', 'max:255'],
            'message' => ['required', 'string', 'max:2000'],
        ]);

        // Get the first admin user
        $admin = User::where('is_admin', true)->first();

        // Only send email if an admin exists
        if ($admin) {
            Mail::send('emails.contact', [
                'name' => $request->name,
                'email' => $request->email,
                'subject' => $request->subject,
                'messageContent' => $request->message,
            ], function ($message) use ($admin, $request) {
                $message->to($admin->email)
                    ->subject('Nieuw contactbericht: ' . $request->subject);
            });
        }

        return redirect()->route('contact.index')
            ->with('success', 'Bedankt voor je bericht! We nemen zo snel mogelijk contact met je op.');
    }
}
