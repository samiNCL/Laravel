<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Word extends Model
{
    //
    protected $fillable = [
        'word','user_id','Note','NoteDate'
    ];


    public function user(){
        return $this->belongsTo(User::class);
    }
}
