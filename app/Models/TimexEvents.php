<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimexEvents extends Model
{
    use HasFactory;

    protected $fillable = [

        'id',
        'attachments',
        'body',
        'category',
        'end',
        'endTime',
        'isAllDay',
        'organizer',
        'participants',
        'subject',
        'start',
        'startTime',
        'totalPrice',
        'user_id',
        'lisitng_id',
    ];
}
