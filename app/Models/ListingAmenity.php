<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ListingAmenity extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'listing_id',
        'amenity_id',
    ];
  
    public function listing(){
        return $this->belongsToMany(Listing::class,'listing_id');
    }

    public function amenity(){
        return $this->belongsToMany(Amenity::class,'amenity_id');
    }


}
