<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class StatuteItem extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'slug', 'content'];

    public function getRouteKeyName()
    {
        return 'slug';
    }
}
