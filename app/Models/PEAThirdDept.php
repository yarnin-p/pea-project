<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PEAThirdDept extends Model
{
    use HasFactory, SoftDeletes;


    protected $table = 'pea_third_departments';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'pea_dept_id', 'created_at', 'updated_at', 'deleted_at'
    ];
}
