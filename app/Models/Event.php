<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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