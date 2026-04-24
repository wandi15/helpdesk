<?php

namespace App\Models;

use MongoDB\Laravel\Eloquent\Model;

class Ticket extends Model
{
    protected $connection = 'mongodb';
    protected $collection = 'tickets';

    protected $fillable = [
        'title',
        'description',
        'status',
        'priority',
        'user_id',
        'assigned_to',
        'division',
        'ticket_type',
        'system_type',
        'attachment',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
