<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegisterEvents extends Model
{
    use HasFactory;
    protected $table = 'register_events';
    public $timestamps = true;

    protected $fillable = [
        'contact_person',
        'email',
        'phone',
        'group_name',
        'number_members',
        'events_id',
    ];
    public function event()
    {
        return $this->belongsTo('App\Models\Event', 'events_id');
    }
}
