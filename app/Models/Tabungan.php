<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tabungan extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'judul',
        'foto',
        'target_nominal',
        'target_tanggal',
        'nominal_terkumpul',
        'tercapai',
    ];

    protected $casts = [
        'target_tanggal' => 'date',
        'tercapai' => 'boolean',
    ];

    protected $appends = ['status_text', 'foto_url'];

    public function updateNominalTerkumpul()
{
    $total = $this->menabungs()->sum('nominal');
    $this->nominal_terkumpul = $total;
    $this->tercapai = $total >= $this->target_nominal;
    $this->save();
}


    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function menabungs()
    {
        return $this->hasMany(Menabung::class);
    }

    // Menambahkan method untuk mendapatkan status "tercapai" atau tidak
    public function getStatusTextAttribute()
    {
        return $this->tercapai ? '✅ Tercapai' : '❌ Belum tercapai';
    }

    // Menambahkan method untuk mendapatkan URL foto
    public function getFotoUrlAttribute()
    {
        return $this->foto ? asset('storage/' . $this->foto) : asset('images/default.jpg');
    }
}
