<?php

namespace App\Http\Controllers\backend;

use App\Models\message;
use App\Http\Requests\BackEnd\messages\store;
use Illuminate\Support\Facades\Mail;
use App\Mail\ReplyContact;

class messages extends BackendController
{
  public function __construct(message $model)
  {
      parent::__construct($model);

    }   
    public function reply($id, store $request)
    {
      $message =$this->model->findOrFail($id);
      Mail::send(new ReplyContact($message,$request->message));
      return redirect()->route('messages.edit',['id'=>$message->id]);

    }
}
