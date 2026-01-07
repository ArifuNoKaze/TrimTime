<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;
use App\Models\User;

class Booking extends Model
{
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function service()
    {
        return $this->belongsTo(Service::class);
    }

    public function schedule()
    {
        return $this->belongsTo(Schedule::class);
    }

    protected $fillable = [
        'user_id',
        'service_id',
        'schedule_id',
        'status',
    ];


    public function canBeCancelled()
    {
        $scheduleTime = Carbon::parse(
            $this->schedule->date . ' ' . $this->schedule->start_time
        );

        return now()->diffInHours($scheduleTime, false) >= 24;
    }

}
