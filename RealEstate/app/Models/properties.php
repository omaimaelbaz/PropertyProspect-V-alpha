<?php


namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Images;
use App\Models\PropertyTypes;
use App\Models\Reservations; // Correct the import statement

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
        return $this->hasMany(Images::class, 'property_id');
    }

    public function category()
    {
        return $this->belongsTo(categories::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Define the relationship with Reservations model
    public function bookings()
    {
        return $this->hasMany(Reservations::class); // Change to Reservations::class
    }

    // Check if the property is available for booking for the given dates
    public function isAvailableForBooking($checkInDate, $checkOutDate)
    {
        // Check if any reservations overlap with the given date range
        $overlappingReservations = Reservations::where('property_id', $this->id)
            ->where(function ($query) use ($checkInDate, $checkOutDate) {
                $query->where(function ($q) use ($checkInDate, $checkOutDate) {
                    $q->where('start_date', '>=', $checkInDate)
                        ->where('start_date', '<=', $checkOutDate);
                })
                ->orWhere(function ($q) use ($checkInDate, $checkOutDate) {
                    $q->where('end_date', '>=', $checkInDate)
                        ->where('end_date', '<=', $checkOutDate);
                })
                ->orWhere(function ($q) use ($checkInDate, $checkOutDate) {
                    $q->where('start_date', '<', $checkInDate)
                        ->where('end_date', '>', $checkOutDate);
                });
            })
            ->exists();

        // If there are overlapping reservations, return an error message
        if ($overlappingReservations) {
            return "The property is not available for the selected dates. It is already reserved for another booking.";
        }

        // If there are no overlapping reservations, the property is available
        return null;
    }




    // Define other relationships and methods here...
}


// namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;
// use App\Models\Images;
// use App\Models\PropertyTypes;

// class properties extends Model
// {
//     use HasFactory;

//     protected $fillable = [
//         'name',
//         'address',
//         'city',
//         'year_built',
//         'country',
//         'size_area',
//         'num_bedrooms',
//         'num_bathrooms',
//         'status',
//         'price',
//         'description',
//         'listed_date',
//         'user_id',
//         'category_id',
//         'is_published',
//         'is_investment_property'
//     ];

//     public function images()
//     {
//             return $this->hasMany(Images::class,'property_id');
//     }
//     public function category()
//     {
//         return $this->belongsTo(categories::class, 'category_id');
//     }

//     public function user()
//     {
//         return $this->belongsTo(User::class);
//     }
//     public function isAvailableForBooking($checkInDate, $checkOutDate)
//     {
//         $booked = $this->bookings()
//             ->where('start_date', '>', $checkInDate)
//             ->where('end_date', '<', $checkOutDate)
//             ->exists();

//         return !$booked;
//     }

//     // public function PropertyTypes()
//     // {
//     //     return $this->belongsTo(PropertyTypes::class,'property_types_id');
//     // }




//     // public function wishlist()
//     // {
//     //     return $this->hasMany(wishlists::class);
//     // }
//     // public function investments()
//     // {
//     //     return $this->hasMany(investments::class);
//     // }

// }
