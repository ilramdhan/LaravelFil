<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Anak extends Model
{
    use HasFactory;

    public function orangtua(): BelongsTo
    {
        return $this->belongsTo(OrangTua::class, 'orang_tuas_id', 'id');
    }

    protected $fillable = [
        'orang_tuas_id',
        'name', 
        'gender', 
        'education_sd', 
        'education_smp', 
        'education_sma', 
        'education_s1', 
        'education_s2',
    ];

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';
}
