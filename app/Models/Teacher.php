<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table = 'teachers';
    protected $primarykey = 'id';
    protected $fillable = [
        'user_id',
        'educational_degree',
        'specialty'
    ];

    public function user()
    {
        return $this->hasOne(User::class, 'user_id');
    }
}
