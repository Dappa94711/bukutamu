<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BukuTamu extends Model
{
    use HasFactory;

    protected $table = 'bukutamu';
    protected $fillable = [
        'nama',
        'tlp',
        'alamat',
        'email',
        'kategori',
        'keperluan',
        'password',
        'updated_at',
        'created_at',
    ];
}