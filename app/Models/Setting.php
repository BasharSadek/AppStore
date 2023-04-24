<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;
    protected $fillable = [
        'title', 'description', 'icon', 'logo'
    ];
    public static function checkSettings()
    {
        $settings = Self::all();
        if (count($settings) < 1) {
            $data = [
                'id' => 1,
                'title'=>'App Store website',
                'description' => 'App store where you can find all apps and games',
                'icon'=> 'images/apkpure-icon.png',
                'logo'=> 'images/apkpure-icon.png',
            ]; 
            Self::create($data);
        }
        return Self::first();
    }
}
