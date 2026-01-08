<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schedule extends Model
{
    protected $fillable = [
        'service_id',
        'date',
        'start_time',
        'end_time',
        'is_available',
    ];

    protected $casts = [
        'date' => 'date',
    ];

    public function booking()
    {
        return $this->hasOne(Booking::class);
    }

    public function service()
{
    return $this->belongsTo(Service::class);
}


}
