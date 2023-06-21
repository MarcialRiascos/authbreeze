<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;

    protected $fillable = ['event', 'start_date', 'user_id', 'useri_id'];

    public function cliente()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }

    public function operario()
    {
        return $this->hasOne(User::class, 'id', 'useri_id');
    }
}
