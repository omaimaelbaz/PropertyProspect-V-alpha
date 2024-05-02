<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\properties; // Import the properties model

class Reservations extends Model
{
    protected $fillable = [
        'start_date',
        'end_date',
        'status',
        'user_id',
        'agent_id',
        'property_id'
    ];

    // Define the relationship with the properties table
    public function property()
    {
        return $this->belongsTo(properties::class, 'property_id', 'id');
    }
}
