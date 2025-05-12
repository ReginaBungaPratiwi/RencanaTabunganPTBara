<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menabung extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'tabungan_id',
        'nominal',
        'tanggal',
    ];

    protected $casts = [
        'tanggal' => 'date',
        'nominal' => 'float',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tabungan()
    {
        return $this->belongsTo(Tabungan::class);
    }
}
