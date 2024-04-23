<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use  App\Models\properties;
class Images extends Model
{

        use HasFactory;

        protected $fillable = [
            'url',
            'property_id',
        ];

        public function property()
        {
            return $this->belongsTo(Properties::class);
        }


}
