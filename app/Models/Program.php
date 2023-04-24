<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Program extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'name', 'description', 'logo', 'Downloads', 'status', 'path'
    ];

    public function image()
    {
        return $this->hasMany(Image::class);
    }

    public function comment()
    {
        return $this->belongsTo(Comment::class);
    }
    public function archive()
    {
        return $this->belongsTo(Archive::class);
    }
}
