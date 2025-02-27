<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Kelas extends Model
{
    use HasFactory;
    protected $table = "kelas";
    protected $primaryKey = "id";
    protected $fillable = [
        'nama_kelas', 'guru_bk', 'wali_kelas'
    ];

    public function guru()
    {
        return $this->belongsTo(Guru::class, 'guru_bk');
    }
    
    public function waliKelas()
    {
        return $this->belongsTo(WaliKelas::class, 'wali_kelas');
    }
}
