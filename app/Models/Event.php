<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    protected $fillable = [
        'event_name',
        'event_date',
        'event_location',
        'event_description',
        'event_attendees',
        'event_category',
        'event_organizer',
        'event_website',
        'event_hashtag',
        'event_sponsor',
    ];

    protected $casts = [
        'event_date' => 'date',
        'event_attendees' => 'integer',
    ];
}
