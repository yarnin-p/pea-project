<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPermissions extends Model
{
    use HasFactory, SoftDeletes;

    protected $table = 'user_permissions';

    protected $fillable = [
        'id', 'user_id', 'permission_id', 'created_at'
    ];

    protected $casts = [
        'created_at' => 'datetime'
    ];

    /**
     * @param $value
     * @return string
     */
    public function getCreatedAtAttribute($value)
    {
        return Carbon::parse($value)->format('Y-m-d H:i:s');
    }
}
