<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenity extends Model
{
    use HasFactory;
    
    protected $fillable = [
    
        'name',
        'icon',
        'description',
        'type',
    
    ];


    public function amenities(){
        return $this->belongsToMany(Listing::class);
    }

}
