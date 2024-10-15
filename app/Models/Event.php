<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
// use Illuminate\Support\Carbon;

class Event extends Model
{
    use HasFactory;
    protected $table = 'events';
    protected $primarykey = 'id';
    protected $fillable = [
        'title',
        'type',
        'start',
        'end',
        'school_class_id',
        'user_id',
        'student_id',
        'event_content_id'
    ];

    public function getStartAttributes($value) 
    {
        $dateStart = Carbon::createFromFormat('Y-m-d H-i-s', $value)->format('Y-m-d');
        $timeStart = Carbon::createFromFormat('Y-m-d H-i-s', $value)->format('H-i-s');

        return $this->start = $timeStart == '00:00:00' ? $dateStart : $value;
    }
    public function getEndAttributes($value) 
    {
        $dateEnd = Carbon::createFromFormat('Y-m-d H-i-s', $value)->format('Y-m-d');
        $timeEnd = Carbon::createFromFormat('Y-m-d H-i-s', $value)->format('H-i-s');

        return $this->end = $timeEnd == '00:00:00' ? $dateEnd : $value;
    }
    public function schoolClass()
    {
        return $this->belongsTo(SchoolClass::class, 'school_class_id');
    }

    public function eventContent()
    {
        return $this->belongsTo(EventContent::class, 'event_content_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
}