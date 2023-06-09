<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Image extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 'program_id'
    ];

    public function program()
    {
        return $this->belongsTo(Program::class);
    }
}
