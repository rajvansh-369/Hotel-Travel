<?php

namespace App\Models;

use Buildix\Timex\Traits\TimexTrait;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TimexEvents extends Model
{
    use HasFactory;

    use HasUuids;
    use TimexTrait;

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
        'invoice_no',
    ];



    protected $guarded = [];

    protected $casts = [
        'start' => 'date',
        'end' => 'date',
        'isAllDay' => 'boolean',
        'participants' => 'array',
        'attachments' => 'array',
    ];

    public function getTable()
    {
        return config('timex.tables.event.name', "timex_events");
    }

    public function __construct(array $attributes = [])
    {
        $attributes['organizer'] = \Auth::id();

        parent::__construct($attributes);

    }

    public function category()
    {
        return $this->hasOne(self::getCategoryModel());
    }

    public function hotel(){
        return $this->belongsTo(Listing::class,'listing_id');
    }

    public function user(){
        return $this->belongsTo(User::class,'user_id', 'id');
    }


    public function approved($id){
   

        

    }
    public function reject($id){

        
        dd($id);
     $x =  TimexEvents::where('id', $id)->update(['status' => 0, 'category' => 'danger']);

        
   
    }
}
