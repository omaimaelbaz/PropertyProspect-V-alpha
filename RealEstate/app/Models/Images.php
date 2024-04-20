<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\properties;

class Images extends Model
{
    use HasFactory;

    protected $fillable = [
        'url',
        'property_id',
    ];

    public function properties()
    {
        return $this->belongsTo(properties::class);
    }
}
