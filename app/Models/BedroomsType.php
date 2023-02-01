<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedroomsType extends Model
{
    use HasFactory;

    protected $fillable = [

        'listing_id',
        'bedroom_name',
        'bedroom_price',
        'bedroom_image',
        'status',
    ];

    public function hotel(){
        return $this->belongsTo(Listing::class,'listing_id', 'id');
    }

    public function bedroomPicture(){
        return $this->hasMany(BedroomPicture::class);
    }

    public function BedroomAmenities(){
        return $this->hasMany(BedroomAmenity::class);
    }

}
