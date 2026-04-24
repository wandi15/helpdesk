<?php

namespace App\Livewire;

use App\Models\Ticket;
use Livewire\Component;

class TicketConfirmation extends Component
{
    public $ticket;
    public $token;
    public $signature;
    public $notes;
    public $confirmed = false;
    public $error = null;

    public function mount($token)
    {
        $this->token = $token;
        
        // Find ticket by confirmation token
        $this->ticket = Ticket::with('user')
            ->where('confirmation_token', $token)
            ->first();

        // Validate ticket
        if (!$this->ticket) {
            $this->error = 'Link konfirmasi tidak valid atau telah kadaluarsa.';
            return;
        }

        // Check if already confirmed
        if ($this->ticket->isConfirmed()) {
            $this->error = 'Tiket ini sudah dikonfirmasi sebelumnya pada ' . 
                           $this->ticket->confirmed_at->format('d M Y, H:i');
            return;
        }

        // Check if token is still valid (e.g., within 7 days)
        if ($this->ticket->confirmation_sent_at && 
            $this->ticket->confirmation_sent_at->diffInDays(now()) > 7) {
            $this->error = 'Link konfirmasi telah kadaluarsa. Silakan hubungi admin untuk mengirim ulang.';
            return;
        }
    }

    public function confirmTicket()
    {
        $this->validate([
            'signature' => 'required|min:3|max:255',
            'notes' => 'nullable|max:1000',
        ], [
            'signature.required' => 'Nama lengkap wajib diisi',
            'signature.min' => 'Nama lengkap minimal 3 karakter',
            'signature.max' => 'Nama lengkap maksimal 255 karakter',
            'notes.max' => 'Catatan maksimal 1000 karakter',
        ]);

        if (!$this->ticket || $this->error) {
            return;
        }

        try {
            // Confirm the ticket closure
            $this->ticket->confirmClosure($this->signature, $this->notes);
            
            $this->confirmed = true;
            
        } catch (\Exception $e) {
            session()->flash('error', 'Terjadi kesalahan: ' . $e->getMessage());
        }
    }

    public function render()
    {
        return view('livewire.ticket-confirmation')
            // ->layout('layouts.guest');
            ->layout('layouts.confirm');
    }
}
