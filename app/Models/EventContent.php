<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EventContent extends Model
{
    use HasFactory;
    protected $table = 'reports';
    protected $primarykey = 'id';
    protected $fillable = [
        'title',
        'subtitle',
        'description',
        'background_image',
        'card_image',
        'card_color'
    ];
}
