<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{

    protected $casts = [
        'lisitng_amenities' => 'array',
    ];
    use HasFactory;

    protected $fillable = [

        'user_id',
        'name',
        'description',
        'picture',
        'price_per_hour',
        'price_per_day',
        'review_stars',
        'status',
        'half_day_discount',
        'half_discount_rate',
        'full_day_discount',
        'full_discount_rate',
        'sale_tax',
        'full_day_start_time',
        'full_day_end_time',
        'min_hour',
        'advance_notice',
        'hosting_instruction',
        'cleaning_fee',
        'cleaning_fee_percent',
        'listing_type',

    ];
    public function address(){
        return $this->hasOne(Address::class);
    }
    public function amenities(){
        return $this->hasMany(Amenity::class);
    }


    public function lisitng_amenities(){
        return $this->hasMany(ListingAmenity::class,'listing_id' );
    }

    public function picture(){
        return $this->hasMany(Picture::class);
    }

    public function videos(){
        return $this->hasOne(Video::class);
    }
}
