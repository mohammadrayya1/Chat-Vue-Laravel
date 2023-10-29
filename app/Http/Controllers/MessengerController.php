<?php

namespace App\Http\Controllers;

use App\Models\Conversation;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class MessengerController extends Controller
{

        public function index($id=null){

            $user=Auth::user();
            $friends =User::where('id','<>',$user->id)
                ->orderBy('name')
                ->paginate();


            $chats= $user->conversation()->with([
                'lastMessage',
                'participants'=>function($builder) use ($user){
                $builder->where('id','<>',$user->id);
            }
            ])->get();

            $messages=[];

            $activchat=new Conversation();
            if ($id ){
                $activchat=$chats->where('id',$id)->first();
                $messages=$activchat->messages()->with('user')->paginate();
            }

            return view('messenger',[
                'friends'=>$friends,
                'chats'=>$chats,
                'activchat'=>$activchat,
                'messages'=>$messages
            ]);
}
}
