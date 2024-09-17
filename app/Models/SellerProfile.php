<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SellerProfile extends Model
{
    use HasFactory;

    protected $table = 'seller_profiles_tables';

    protected $fillable = [
        'user_id',
        'no_telepon',
        'alamat',
        'timezone',
        'device_info',
        'latitude',
        'longitude',
        'last_login_time',
        'last_login_ip',
        'last_location',
    ];

    // Relasi ke user
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
