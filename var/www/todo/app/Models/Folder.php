<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'user_id'];

    public function tasks()
    {
        return $this->hasMany('App\Models\Task');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }
}