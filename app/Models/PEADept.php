<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpseclib3\File\ASN1\Maps\Attribute;

class PEADept extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'pea_departments';

    protected $fillable = [
        'id', 'name', 'dept_code', 'created_at', 'updated_at', 'deleted_at'
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


    public function PEASecondDepts()
    {
        return $this->hasMany(PEASecondDept::class, 'pea_dept_id', 'dept_code');
    }
}
