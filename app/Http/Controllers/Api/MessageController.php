<?php

namespace App\Http\Controllers\Api;
use App\Mail\SendNewMail;
use Illuminate\Support\Facades\Mail;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Message;


class MessageController extends Controller
{
  function sendmessage(Request $request) {

    $data = $request->all();
    if(empty($data)){
      $response = false;
    }
     $newmessage = new Message;
     $newmessage->flat_id = $data['id'];
     $newmessage->email = $data['mail'];
     $newmessage->name = $data['name'];
     $newmessage->number_phone='123432123445';
     $newmessage->message= $data['request'];
     $newmessage->save();

     if($newmessage->save()) {
      //Mail::to('nino@iffo.ecio')->send(new SendNewMail());
      $response = true;
      return response()->json($response);
     }

    return response()->json($response);
  }
}
