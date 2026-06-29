<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Hub extends Model
{
    protected $fillable = [
        'name',
        'code',
        'district',
        'area',
        'address',
        'phone',
        'email',
        'status',
    ];

    public function senderParcels()
{
    return $this->hasMany(Parcel::class, 'sender_hub_id');
}

public function receiverParcels()
{
    return $this->hasMany(Parcel::class, 'receiver_hub_id');
}

public function users()
{
    return $this->hasMany(User::class);
}
    public function manager()
    {
        return $this->hasOne(User::class, 'hub_id')
                    ->where('role', 'manager');
    }


}
