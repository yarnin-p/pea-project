<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PEASecondDept extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pea_second_departments';

    protected $fillable = [
        'id', 'pea_dept_id', 'name', 'dept_code', 'created_at', 'updated_at', 'deleted_at'
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'deleted_at' => 'datetime'
    ];

    /**
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    /**
     * @param $value
     * @return string
     */
    public function getUpdatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }

    public function PEAFirstDept()
    {
        return $this->hasOne(PEADept::class, 'dept_code', 'pea_dept_id');
    }

    public function PEAThirdDepts()
    {
        return $this->hasMany(PEAThirdDept::class, 'pea_dept_id', 'dept_code');
    }
}
