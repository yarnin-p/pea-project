<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PEADeptDimensions extends Model
{
    use HasFactory;

    protected $table = 'pea_dept_dimensions';

    protected $fillable = [
        'id', 'pea_dept_id', 'dimension_parent_id', 'name', 'created_at'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function PEADeptDimensionFiles()
    {
        return $this->hasMany(PEADeptDimensions::class, 'id', 'pea_dept_id');
    }
}
