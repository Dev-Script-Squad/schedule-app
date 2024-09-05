<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $primarykey = 'id';
    protected $fillable = [
        'title',
        'description',
        'date',
        'type',
        'school_class_event_id',
        'student_id'
    ];

    public function student()
    {
        return $this->belongsToMany(Student::class, 'student_class')
            ->withTimestamps();
    }

}
