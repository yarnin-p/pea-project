<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SecondDimension extends Model
{
    use HasFactory;

    protected $table = 'second_dimensions';

    protected $fillable = [
        'id', 'pea_dept_id', 'level_dept', 'name', 'raw_data', 'created_at', 'updated_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];
}
