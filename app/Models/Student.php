<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table = 'students';
    protected $primarykey = 'id';
    protected $fillable = [
        'user_id',
        'guardian_user_id'
    ];
    public function user()
    {
        return $this->hasOne(User::class);
    }

    public function guardianUser()
    {
        return $this->hasOne(User::class, 'guardian_user_id');
    }
    public function classes()
    {
        return $this->belongsToMany(SchoolClass::class, 'student_class')
            ->withPivot('current')
            ->withTimestamps();
    }
    public function currentClass()
    {
        return $this->belongsToMany(SchoolClass::class, 'student_class')
            ->wherePivot('current', true)
            ->withTimestamps();
    }
    public function reports()
    {
        return $this->belongsToMany(Report::class, 'student_class')
            ->withTimestamps();
    }
}
