<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Illuminate\Http\Request;

class TicketReceiptController extends Controller
{
    /**
     * Tampilkan halaman cetak tanda terima tiket
     */
    public function show($id)
    {
        // Cari tiket berdasarkan ID
        $ticket = Ticket::find($id);

        // Jika tiket tidak ditemukan
        if (!$ticket) {
            abort(404, 'Tiket tidak ditemukan');
        }

        // Jika tiket belum dikonfirmasi
        if (!$ticket->confirmed_at) {
            abort(403, 'Tiket belum dikonfirmasi. Tanda terima hanya tersedia untuk tiket yang sudah dikonfirmasi.');
        }

        // Jika status bukan closed
        if ($ticket->status !== 'closed') {
            abort(403, 'Tanda terima hanya tersedia untuk tiket yang sudah ditutup.');
        }

        // Load relasi user
        $ticket->load('user');

        // Tampilkan halaman tanda terima
        return view('ticket-receipt', [
            'ticket' => $ticket,
            'signature' => $ticket->confirmation_signature,
            'notes' => $ticket->confirmation_notes,
        ]);
    }
}
