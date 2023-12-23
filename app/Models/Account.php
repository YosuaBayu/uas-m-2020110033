<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    protected $fillable = ['id', 'nama', 'jenis'];

    public function transactions()
    {
        return $this->hasMany(Transaction::class);
    }
}
