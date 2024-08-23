<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StudentClass extends Model
{
    use HasFactory;
    protected $table = 'student_class';
    protected $fillable = [
        'student_id',
        'class_id',
        'current'
    ];
    public function students()
    {
        return $this->hasOne(User::class);
    }
}
