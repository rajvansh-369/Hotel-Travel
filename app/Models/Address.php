<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Address extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'listing_id',
        'formatted_address',
        'postal_code',
        'address',
        'city',
        'state',
        'lat',
        'lng',
    
    ];

    public function address(){
        return $this->belongsTo(Listing::class);
    }
}
