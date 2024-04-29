<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class investments extends Model
{
    use HasFactory;
    protected $fillable = ['montant_investi', 'date_investissement', 'user_id', 'property_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function properties()
    {
        return $this->belongsTo(properties::class);
    }

}
