<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;

    protected $fillable = ['first_name', 'last_name', 'subject', 'email', 'phone_number', 'message'];

    public function isRead()
    {
        return $this->read_at !== null;
    }
}
