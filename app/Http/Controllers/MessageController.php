<?php

namespace App\Http\Controllers;

use App\Message;
use Carbon\Carbon;
use Illuminate\Http\Request;

class MessageController extends Controller {
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store() {
        $data = request()->all();

        request()->validate([
            'name' => 'required|min:3|max:30',
            'email' => 'required|email',
            'message_obj' => 'required|min:4|max:50',
            'message_body' => 'required|min:10|max:1500',
        ],
            [
                'name.required' => 'Nome non può essere vuoto',
                'name.min' => 'Nome non può essere inferiore a :min caratteri',
                'name.max' => 'Nome non può essere maggiore di :max caratteri',
                'email.required' => 'Email non può essere vuoto',
                'email.email' => 'Inserire indirizzo email valida',
                'message_obj.required' => 'Oggetto non può essere vuoto',
                'message_obj.min' => 'Oggetto non può essere inferiore a :min caratteri',
                'message_obj.max' => 'Oggetto non può essere maggiore di :max caratteri',
                'message_body.required' => 'Il campo non può essere vuoto',
                'message_body.min' => 'Il campo non può essere inferiore a :min caratteri',
                'message_body.max' => 'Il campo non può essere maggiore di :max caratteri',
            ]
        );

        $data['read'] = false;
        $data['created_at'] = Carbon::now('Europe/Rome');
        $data['message_date'] = Carbon::now('Europe/Rome');

        $newMessage = new Message;
        $newMessage->fill($data);

        $result = $newMessage->save();

        if ($result) {
            return redirect(route('guest.show', $newMessage->apartment->id))->with('status', "{$newMessage->name}, messaggio inviato");
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show($id) {
        $messages = Message::where('apartment_id', $id)->orderBy('created_at', 'desc')->get();
        return view('user/apartments/messages/show', compact('messages'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message) {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message) {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message) {
        // dd($message);
        $message->delete();
        return redirect(route('message.show', $message->apartment_id))->with('status', "Messaggio eliminato");
    }
}
