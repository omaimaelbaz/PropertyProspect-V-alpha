<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\images;

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
        return $this->hasMany(Image::class);

    }
}
