<?php

namespace App\Http\Controllers;

use App\Models\Ticket;
use Carbon\Carbon;
use Illuminate\Http\Request;

class TicketExportController extends Controller
{
    /**
     * Export tiket ke CSV, mengikuti filter yang aktif di halaman list tiket
     */
    public function export(Request $request)
    {
        $request->validate([
            'dateFrom' => 'nullable|date',
            'dateTo' => 'nullable|date',
        ]);

        $search = $request->query('search', '');
        $statusFilter = $request->query('statusFilter', 'all');
        $priorityFilter = $request->query('priorityFilter', 'all');
        $dateFrom = $request->query('dateFrom');
        $dateTo = $request->query('dateTo');
        $sortBy = $request->query('sortBy', 'created_at');
        $sortDirection = $request->query('sortDirection') === 'asc' ? 'asc' : 'desc';

        $allowedSorts = ['created_at', 'updated_at', 'title', 'status', 'priority', 'division'];
        if (!in_array($sortBy, $allowedSorts, true)) {
            $sortBy = 'created_at';
        }

        $query = Ticket::with('user');

        if ($search) {
            $query->where(function ($q) use ($search) {
                $q->where('title', 'like', '%' . $search . '%')
                  ->orWhere('description', 'like', '%' . $search . '%');
            });
        }

        if ($statusFilter !== 'all') {
            $query->where('status', $statusFilter);
        }

        if ($priorityFilter !== 'all') {
            $query->where('priority', $priorityFilter);
        }

        if ($dateFrom) {
            $query->where('created_at', '>=', Carbon::parse($dateFrom)->startOfDay());
        }

        if ($dateTo) {
            $query->where('created_at', '<=', Carbon::parse($dateTo)->endOfDay());
        }

        $tickets = $query->orderBy($sortBy, $sortDirection)->get();

        $filename = 'tickets-' . now()->format('Ymd-His') . '.csv';

        return response()->streamDownload(function () use ($tickets) {
            $out = fopen('php://output', 'w');

            // BOM agar Excel membaca UTF-8 dengan benar
            fwrite($out, "\xEF\xBB\xBF");

            fputcsv($out, [
                'ID',
                'Judul',
                'Deskripsi',
                'Status',
                'Prioritas',
                'Divisi',
                'Tipe Tiket',
                'Tipe Sistem',
                'Pelapor',
                'Email Pelapor',
                'User',
                'Dibuat',
                'Diperbarui',
                'Dikonfirmasi',
                'Konfirmasi Catatan'
            ]);

            foreach ($tickets as $ticket) {
                fputcsv($out, [
                    (string) $ticket->id,
                    $ticket->title,
                    $ticket->description,
                    $ticket->status,
                    $ticket->priority,
                    $ticket->division,
                    $ticket->ticket_type,
                    $ticket->system_type,
                    $ticket->submitter_name,
                    $ticket->submitter_email,
                    $ticket->user?->name,
                    $ticket->created_at?->format('Y-m-d H:i'),
                    $ticket->updated_at?->format('Y-m-d H:i'),
                    $ticket->confirmed_at?->format('Y-m-d H:i'),
                    $ticket->confirmed_note,

                ]);
            }

            fclose($out);
        }, $filename, [
            'Content-Type' => 'text/csv; charset=UTF-8',
        ]);
    }
}
