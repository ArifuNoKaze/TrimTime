<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'date',
        'start_time',
        'end_time',
        'is_available',
    ];

    public function barber()
    {
        return $this->belongsTo(Barber::class);
    }

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

}
