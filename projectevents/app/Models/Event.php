<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $table = 'events';
    public $timestamps = true;

    protected $fillable = [
        'title',
        'image',
        'date_event',
        'aadress',
        'description',
    ];
}
