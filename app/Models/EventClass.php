<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventClass extends Model
{
    use HasFactory;
    protected $table = 'event_class';
    protected $primarykey = 'id';
    protected $fillable = [
        'school_class_id',
        'teacher_id',
        'course',
        'week_day',
        'time_start',
        'time_end',
        'event_content_id'
    ];
}
