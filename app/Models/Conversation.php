<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conversation extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_1',
        'user_2',
        'title',
    ];

    public function Messages()
    {
        return $this->hasMany(Message::class);
    }
}