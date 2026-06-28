<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Parcel extends Model
{
    protected $fillable = [
        'tracking_id',
        'sender_name',
        'sender_phone',
        'sender_email',
        'sender_hub_id',
        'sender_address',
        'receiver_name',
        'receiver_phone',
        'receiver_email',
        'receiver_hub_id',
        'receiver_address',
        'pickup_date',
        'estimated_delivery',
        'delivery_charge',
        'status',
        'booked_by',
    ];

    public function senderHub()
{
    return $this->belongsTo(Hub::class, 'sender_hub_id');
}

public function receiverHub()
{
    return $this->belongsTo(Hub::class, 'receiver_hub_id');
}
}
