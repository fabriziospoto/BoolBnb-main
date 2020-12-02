<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Message as MessageResources;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Message extends Controller {
    public function index($id) {

        //   Visualizzo messaggi
        $messages = DB::select('select count(message_date) as num_message,message_date from messages where apartment_id=' . $id . ' group by message_date ');

        return MessageResources::collection($messages);
    }
}
