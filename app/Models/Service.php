<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Service extends Model
{
    protected $table = 'services';

    protected $fillable = [
        'name',
        'description',
        'duration',
        'price',
        'image'
    ];

    public function schedules()
{
    return $this->hasMany(Schedule::class);
}

}
