<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    public function tasksmanage() {
        return $this->hasMany("App\Tasksmanage");
    }

    public function user() {
        return $this->hasMany('App\User');
    }
}
