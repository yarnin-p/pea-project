<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PEADept extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pea_departments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'name', 'created_at', 'updated_at', 'deleted_at'
    ];
}
