<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addTask extends Model
{
    protected $fillable=["task_name","subject","date","level","completed","user_id"];
}
