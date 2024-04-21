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
            'properties_id',
        ];

        public function propertie()
        {
            return $this->belongsTo(Properties::class, 'properties_id');
        }


}
