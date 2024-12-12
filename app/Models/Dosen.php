<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Dosen extends Model
{
    use HasFactory;

    /**
     * Nama tabel di database yang direpresentasikan oleh model ini.
     *
     * @var string
     */
    protected $table = 'dosens';

    /**
     * Atribut yang dapat diisi secara massal (mass assignable).
     *
     * @var array
     */
    protected $fillable = ['nama', 'NIP'];

    /**
     * Relasi: Dosen memiliki banyak mahasiswa.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function mahasiswas()
    {
        return $this->hasMany(Mahasiswa::class);
    }

    /**
     * Relasi: Dosen mengajar banyak mata kuliah (many-to-many).
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function matkuls()
    {
        return $this->belongsToMany(Makul::class);
    }
}
