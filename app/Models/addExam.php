<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class addExam extends Model
{
    protected $fillable=["exam_name","subject","date","time","type"];
}
