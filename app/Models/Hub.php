<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    protected $fillable = [
        'name',
    ];

    public function senderParcels()
{
    return $this->hasMany(Parcel::class, 'sender_hub_id');
}

public function receiverParcels()
{
    return $this->hasMany(Parcel::class, 'receiver_hub_id');
}
}
