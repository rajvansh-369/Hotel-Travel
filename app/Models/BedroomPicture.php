<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedroomPicture extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'bedrooms_type_id',
        'picture',
        'picture_type',

    
    ];

    public function bedroomType(){
        return $this->belongsToMany(BedroomType::class);
    }
}
