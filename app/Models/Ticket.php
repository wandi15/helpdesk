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
        'confirmation_token',
        'confirmation_sent_at',
        'confirmed_at',
        'confirmation_signature',
        'confirmation_notes',
    ];

    protected $casts = [
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
        'confirmation_sent_at' => 'datetime',
        'confirmed_at' => 'datetime',
    ];

    // Relationships
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Helper methods for confirmation
    public function generateConfirmationToken()
    {
        $this->confirmation_token = bin2hex(random_bytes(32));
        $this->confirmation_sent_at = now();
        $this->save();
        
        return $this->confirmation_token;
    }

    public function isConfirmed()
    {
        return !is_null($this->confirmed_at);
    }

    public function confirmClosure($signature = null, $notes = null)
    {
        $this->confirmed_at = now();
        $this->confirmation_signature = $signature;
        $this->confirmation_notes = $notes;
        $this->status = 'closed';
        $this->save();
    }
}
