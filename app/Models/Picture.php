<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'listing_id',
        'picture',
        'picture_type',

    
    ];
      
    public function picture(){
        return $this->belongsTo(Listing::class);
    }
}
