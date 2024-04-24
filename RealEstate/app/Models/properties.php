<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images;
use App\Models\PropertyTypes;

class properties extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'address',
        'city',
        'year_built',
        'country',
        'size_area',
        'num_bedrooms',
        'num_bathrooms',
        'status',
        'price',
        'description',
        'listed_date',
        'agent_id',
        'listed_by',
        'property_type_id',
    ];

    public function images()
    {
            return $this->hasMany(Images::class,'property_id');
    }

    public function PropertyTypes()
    {
        return $this->belongsTo(PropertyTypes::class,'property_types_id');
    }


    public function user()
    {
        return $this->belongsTo(User::class, 'listed_by');
    }

    public function wishlist()
    {
        return $this->hasMany(wishlists::class);
    }

}
