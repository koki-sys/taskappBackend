<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tasksmanage extends Model
{
    public function task() {
        return $this->belongsTo('App\Task');
    }

    public function team() {
        return $this->belongsTo('App\Team');
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
