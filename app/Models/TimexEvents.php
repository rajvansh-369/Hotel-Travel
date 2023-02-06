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
        'listing_id',
        'status',
    ];


    public function hotel(){
        return $this->belongsTo(Listing::class,'listing_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'listing_id', 'id');
    }
}
