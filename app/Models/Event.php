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
    public function schoolClasses()
    {
        return $this->belongsToMany(SchoolClass::class, 'school_class_id')
            ->withTimestamps();
    }
}
