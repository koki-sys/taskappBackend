<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    public function tasksmanage() {
        return $this->hasMany("App\Tasksmanage");
    }
}
