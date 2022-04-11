<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;

class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['content', 'image', 'user_id'];

    public function creator()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
