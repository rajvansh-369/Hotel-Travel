<?php

namespace App\Models;

use App\Http\Livewire\BedroomType;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BedroomAmenity extends Model
{
    use HasFactory;
    protected $fillable = [
    
        'name',
        'icon',
        'bedrooms_type_id',
    
    ];

    public function bedroomType(){
        return $this->belongsToMany(BedroomType::class);
    }

}
