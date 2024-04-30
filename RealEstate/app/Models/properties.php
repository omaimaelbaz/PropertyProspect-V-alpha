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
        'user_id',
        'category_id',
        'is_published',
        'is_investment_property'
    ];

    public function images()
    {
            return $this->hasMany(Images::class,'property_id');
    }
    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }

    // public function PropertyTypes()
    // {
    //     return $this->belongsTo(PropertyTypes::class,'property_types_id');
    // }


    // public function user()
    // {
    //     return $this->belongsTo(User::class,'user_id');
    // }

    // public function wishlist()
    // {
    //     return $this->hasMany(wishlists::class);
    // }
    // public function investments()
    // {
    //     return $this->hasMany(investments::class);
    // }

}
