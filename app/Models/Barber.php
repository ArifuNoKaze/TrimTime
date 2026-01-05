<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

use App\Models\User;

class Barber extends Model
{
    protected $table = 'barbers';

    protected $fillable = [
        'user_id',
        'specialization',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function schedules()
    {
        return $this->hasMany(Schedule::class);
    }
}
