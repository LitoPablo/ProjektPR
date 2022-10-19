<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ticket extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'ticket_level_id',
        'ticket_status_id',
        'title',
        'description'
    ];

    public function messages()
    {
        return $this->hasMany(Message::class);
    }

    public function ticket_status()
    {
        return $this->belongsTo(TicketStatus::class);
    }
}
