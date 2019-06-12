<?php

namespace Sinjirite\Http\Controllers;

use Carbon\Carbon;
use Sinjirite\Http\Requests\ContactFormRequest;
use Sinjirite\Http\Requests\ReservationFormRequest;
use Sinjirite\Message;
use Sinjirite\Offer;

class PagesController extends Controller
{
    public function home()
    {
        return view('home');
    }

    public function about()
    {
        return view('about');
    }

    public function rooms()
    {
        return view('rooms');
    }
	
	public function menuto()
    {
        return view('menuto');
    }

    public function terms()
    {
        return view('terms');
    }

    public function prices()
    {
        $today = Carbon::now()->format('U');

        $offers = Offer::where('published_at', '<=', $today)
            ->where('down_at', '>=', $today)
            ->orderBy('published_at', 'asc')
            ->get();

        $messages = Message::where('published_at', '<=', $today)
            ->where('down_at', '>=', $today)
            ->orderBy('published_at', 'asc')
            ->get();

        return view('prices', compact('offers', 'messages'));
    }

    public function makeReservation(ReservationFormRequest $request)
    {
        $name = $request->get('name');
        $email = $request->get('email');
        $from = empty($email) ? 'contact@sinjirite.bg' : $email;
        $phone = $request->get('phone');
        $arrive = $request->get('arrive_date');
        $leave = $request->get('leave_date');
        $adults = $request->get('adults');
        $children = empty($request->get('children')) ? '0' : $request->get('children');
        $details = $request->get('details');

        \Mail::send('emails.reservation', [
            'name' => $name,
            'email' => empty($email) ? '-' : $email,
            'phone' => $phone,
            'arrive' => $arrive,
            'leave' => $leave,
            'adults' => $adults,
            'children' => $children,
            'details' => $details
        ], function($message) use ($from, $name) {
            $message->from($from, $name);
            $message->to('contact@sinjirite.bg');
            $message->subject('Sinjirite.bg - Резервация');
        });


        return redirect(route('tseni'))
            ->with('message', 'Благодарим Ви! Ще се свържем с Вас възможно най-скоро за потвърждаване на резервацията.');
    }

    public function gallery()
    {
        return view('gallery');
    }

    public function entertainment()
    {
        return view('entertainment');
    }

    public function contacts()
    {
        return view('contacts');
    }

    public function store(ContactFormRequest $request)
    {
        $about = $request->get('about');
        $email = $request->get('email');
        $name = $request->get('name');
        $user_message = $request->get('message');

        \Mail::send('emails.contact',[
            'name' => $name,
            'email' => $email,
            'about' => $about,
            'user_message' => $user_message
        ], function($message) use ($about, $email, $name) {
            $message->from($email, $name);
            $message->to('contact@sinjirite.bg');
            $message->subject('Sinjirite.bg - ' . $about);
        });


        return redirect(route('contact'))
            ->with('message', 'Благодарим Ви, че се свързахте с нас! Ще Ви отговорим възможно най-скоро.');
    }
}
