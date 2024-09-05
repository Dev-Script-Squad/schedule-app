<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SchoolClass extends Model
{
    use HasFactory;
    protected $table = 'school_classes';
    protected $primarykey = 'id';
    protected $fillable = [
        'name',
    ];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'student_class')
            ->withPivot('current')
            ->withTimestamps();
    }
    public function currentStudents()
    {
        return $this->belongsToMany(Student::class, 'student_class')
            ->wherePivot('current', true)
            ->withTimestamps();
    }
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_id')
            ->withTimestamps();
    }

}
