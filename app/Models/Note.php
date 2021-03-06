<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Note extends Model
{
    use HasFactory;

    protected $fillable = [
        'body',
        'count',
    ];

    public function notable()
    {
        return $this->morphTo();
    }

    public function comments()
    {
        return $this->morphMany(Note::class, 'notable');
    }
}
