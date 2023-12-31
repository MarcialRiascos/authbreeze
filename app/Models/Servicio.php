<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servicio extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
        'precio',
        'tiempo',
        'file',
        'file2',
        'file3',
        'file4'
    ];
}
