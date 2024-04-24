<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Requests extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'phone', 'message',
         'user_id', 'agent_id', 'property_id',
          'status', 'requested_at',
          'responded_at', 'response_message'
    ];

    /**
     * Get the user that made the request.
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Get the agent assigned to handle the request.
     */
    public function agent()
    {
        return $this->belongsTo(Agents::class);
    }

    /**
     * Get the property related to the request.
     */
    public function property()
    {
        return $this->belongsTo(properties::class);
    }
}
