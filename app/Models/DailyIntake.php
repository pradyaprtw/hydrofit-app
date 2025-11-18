<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DailyIntake extends Model
{
    use HasFactory;

    // Izinkan kolom ini diisi
    protected $fillable = [
        'user_id',
        'user_name',
        'date',
        'total_glasses',
        'total_ml',
    ];
}