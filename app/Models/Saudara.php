<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Saudara extends Model
{
    use HasFactory;

    protected $primaryKey = 'id';
    public $incrementing = false;
    protected $keyType = 'string';

    protected $fillable = [
        'orang_tuas_id', 
        'name', 
        'gender', 
        'status',
    ];

    public function orangtua(): BelongsTo
    {
        return $this->belongsTo(OrangTua::class, 'orang_tuas_id', 'id');
    }
}
