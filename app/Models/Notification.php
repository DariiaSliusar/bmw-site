<?php

namespace App\Models;

use App\Enums\NotificationStatusEnum;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Notification extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'payload',
        'status'
    ];

    protected $casts = [
        'payload' => 'array',
        'status' => NotificationStatusEnum::class
    ];
}
