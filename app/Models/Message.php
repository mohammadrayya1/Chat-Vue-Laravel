<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Message extends Model
{
    use HasFactory,SoftDeletes;


    protected $fillable=[
        'user_id',"body",'type','conversation_id'
    ];

   protected $with=['user'];

    public function conversation(){
        return $this->belongsTo(Conversation::class);
    }

    public function user(){
        return $this->belongsTo(User::class)->withDefault([
            'name'=>__('User')
        ]);
    }



    public function recipients(){

        return $this->belongsToMany(User::class,"recipients")->withPivot('read_at','deleted_at');
    }
}
