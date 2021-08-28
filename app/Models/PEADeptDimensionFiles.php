<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PEADeptDimensionFiles extends Model
{
    use HasFactory;

    protected $table = 'pea_dept_dimension_files';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id', 'pea_dept_dimension_id', 'url', 'created_at'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    public function PEADeptDimension()
    {
        return $this->hasOne(PEADeptDimensions::class, 'id', 'pea_dept_dimension_id');
    }
}
