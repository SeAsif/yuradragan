<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
//
use App\User;
class Todo extends Model
{
    //
    protected $fillable = ['title','description','status','user_id'];

/**
     * Get todos for assigned user.
     */
    public function user(){
    return $this->belongsTo(User::class);
}

}
