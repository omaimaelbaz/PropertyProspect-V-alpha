<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class agents extends Model
{
    use HasFactory;
    protected $fillable =[
        'agent_name',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
