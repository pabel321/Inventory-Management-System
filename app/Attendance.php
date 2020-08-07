<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Attendance extends Model
{
    protected $fillable = [
        'emp_id', 'Attendance', 'att_date', 'att_year', 'edit_date', 'month'
    ];
}
