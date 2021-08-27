<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PEASecondDept extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pea_second_departments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'pea_dept_id', 'name', 'created_at', 'updated_at', 'deleted_at'
    ];
}
