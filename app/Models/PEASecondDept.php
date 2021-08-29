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


    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    public function PEAFirstDept()
    {
        return $this->hasOne(PEADept::class, 'id', 'pea_dept_id');
    }

    public function PEAThirdDepts()
    {
        return $this->hasMany(PEAThirdDept::class, 'pea_dept_id', 'id');
    }
}
