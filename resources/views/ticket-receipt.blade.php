<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tanda Terima - Tiket #{{ $ticket->_id }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        @media print {
            body {
                margin: 0;
                padding: 20px;
            }
            .no-print {
                display: none !important;
            }
            .print-container {
                max-width: 100% !important;
                box-shadow: none !important;
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 min-h-screen py-8 px-4">
    <div class="max-w-4xl mx-auto print-container">
        <!-- Header dengan Logo dan Info -->
        <div class="bg-white rounded-3xl shadow-2xl overflow-hidden animate-fade-in">
            <!-- Banner Header -->
            <div class="bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 px-8 py-6">
                <div class="flex items-center justify-between">
                    <div>
                        <h1 class="text-3xl font-bold text-white flex items-center">
                            <svg class="w-10 h-10 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            Tanda Terima Digital
                        </h1>
                        <p class="text-indigo-100 mt-2">IT Support Helpdesk - Konfirmasi Penutupan Tiket</p>
                    </div>
                    <div class="hidden sm:block">
                        <div class="w-16 h-16 bg-white/20 backdrop-blur-sm rounded-2xl flex items-center justify-center">
                            <svg class="w-10 h-10 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Status Badge -->
            <div class="px-8 py-4 bg-gradient-to-r from-green-50 to-emerald-50 border-b-2 border-green-200">
                <div class="flex items-center justify-center gap-3">
                    <div class="w-12 h-12 bg-gradient-to-br from-green-500 to-emerald-600 rounded-full flex items-center justify-center shadow-lg">
                        <svg class="w-7 h-7 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="3" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-green-700">Status Konfirmasi</p>
                        <p class="text-lg font-bold text-green-900">Tiket Telah Dikonfirmasi & Ditutup</p>
                    </div>
                </div>
            </div>

            <!-- Content -->
            <div class="px-8 py-8 space-y-6">
                <!-- Informasi Tiket -->
                <div class="border-b pb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span>Informasi Tiket</span>
                    </h2>
                    
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- ID Tiket -->
                        <div class="bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                            <label class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                                ID Tiket
                            </label>
                            <p class="text-sm font-mono font-bold text-gray-900 break-all">#{{ $ticket->_id }}</p>
                        </div>

                        <!-- Status -->
                        <div class="bg-gradient-to-br from-green-50 to-emerald-50 rounded-xl p-4 border-2 border-green-200">
                            <label class="text-xs font-bold text-green-700 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Status
                            </label>
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-bold bg-green-600 text-white shadow-sm">
                                CLOSED
                            </span>
                        </div>

                        <!-- Priority -->
                        <div class="bg-white rounded-xl p-4 border-2 border-gray-200">
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                </svg>
                                Prioritas
                            </label>
                            <span class="inline-flex items-center px-3 py-1 rounded-xl text-sm font-bold shadow-sm {{ $ticket->priority === 'high' ? 'bg-gradient-to-r from-red-500 to-red-600 text-white' : ($ticket->priority === 'medium' ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white' : 'bg-gradient-to-r from-gray-500 to-gray-600 text-white') }}">
                                {{ strtoupper($ticket->priority) }}
                            </span>
                        </div>

                        <!-- Tanggal Dibuat -->
                        <div class="bg-white rounded-xl p-4 border-2 border-gray-200">
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                </svg>
                                Tanggal Dibuat
                            </label>
                            <p class="text-sm font-bold text-gray-900">{{ $ticket->created_at->format('d M Y, H:i') }}</p>
                        </div>
                    </div>

                    <!-- Judul -->
                    <div class="mt-4 bg-white rounded-xl p-4 border-2 border-gray-200">
                        <label class="text-xs font-bold text-gray-600 uppercase tracking-wider block mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                            </svg>
                            Judul Tiket
                        </label>
                        <p class="text-base font-bold text-gray-900 break-words">{{ $ticket->title }}</p>
                    </div>

                    <!-- Informasi Pengaju -->
                    <div class="mt-4 bg-gradient-to-br from-blue-50 to-indigo-50 rounded-xl p-5 border-2 border-blue-200">
                        <label class="text-xs font-bold text-blue-700 uppercase tracking-wider block mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                            Diajukan Oleh
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-blue-500 to-indigo-600 rounded-full flex items-center justify-center shadow-lg">
                                    <span class="text-lg font-bold text-white">
                                        {{ strtoupper(substr($ticket->user->name ?? 'U', 0, 2)) }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-xs text-blue-600 font-medium">Nama Lengkap</p>
                                    <p class="text-sm font-bold text-gray-900">{{ $ticket->user->name ?? 'Unknown User' }}</p>
                                </div>
                            </div>
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-purple-500 to-pink-600 rounded-full flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-purple-600 font-medium">Email</p>
                                    <p class="text-sm font-bold text-gray-900 break-all">{{ $ticket->user->email ?? 'N/A' }}</p>
                                </div>
                            </div>
                        </div>
                        @if($ticket->division)
                        <div class="mt-3 pt-3 border-t border-blue-200">
                            <div class="flex items-center gap-2">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                <span class="text-xs text-blue-600 font-medium">Divisi:</span>
                                <span class="text-sm font-bold text-gray-900">{{ $ticket->division }}</span>
                            </div>
                        </div>
                        @endif
                    </div>

                    @if($ticket->submitter_name || $ticket->submitter_email)
                    <!-- Pengaju Sebenarnya (jika berbeda) -->
                    <div class="mt-4 bg-gradient-to-br from-amber-50 to-orange-50 rounded-xl p-5 border-2 border-amber-200">
                        <label class="text-xs font-bold text-amber-700 uppercase tracking-wider block mb-3 flex items-center">
                            <svg class="w-5 h-5 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Diajukan Atas Nama
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            @if($ticket->submitter_name)
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-amber-500 to-orange-600 rounded-full flex items-center justify-center shadow-lg">
                                    <span class="text-lg font-bold text-white">
                                        {{ strtoupper(substr($ticket->submitter_name, 0, 2)) }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-xs text-amber-600 font-medium">Nama Pengaju</p>
                                    <p class="text-sm font-bold text-gray-900">{{ $ticket->submitter_name }}</p>
                                </div>
                            </div>
                            @endif
                            @if($ticket->submitter_email)
                            <div class="flex items-center gap-3">
                                <div class="flex-shrink-0 w-12 h-12 bg-gradient-to-br from-orange-500 to-red-600 rounded-full flex items-center justify-center shadow-lg">
                                    <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-orange-600 font-medium">Email Pengaju</p>
                                    <p class="text-sm font-bold text-gray-900 break-all">{{ $ticket->submitter_email }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                        <div class="mt-3 pt-3 border-t border-amber-200">
                            <p class="text-xs text-amber-700 flex items-center gap-1.5">
                                <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Tiket ini diajukan atas nama orang yang berbeda dari user yang menginput
                            </p>
                        </div>
                    </div>
                    @endif

                    @if($ticket->description)
                    <!-- Deskripsi -->
                    <div class="mt-4 bg-gradient-to-br from-gray-50 to-indigo-50 rounded-xl p-4 border-2 border-indigo-200">
                        <label class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-2 flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            Deskripsi
                        </label>
                        <p class="text-sm text-gray-800 whitespace-pre-wrap break-words leading-relaxed">{{ $ticket->description }}</p>
                    </div>
                    @endif
                </div>

                <!-- Informasi Konfirmasi -->
                <div class="border-b pb-6">
                    <h2 class="text-xl font-bold text-gray-900 mb-4 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span>Detail Konfirmasi</span>
                    </h2>

                    <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                        <!-- Nama Lengkap -->
                        <div class="bg-white rounded-xl p-4 border-2 border-gray-200">
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                                Nama Lengkap (Tanda Tangan Digital)
                            </label>
                            <p class="text-base font-bold text-gray-900 break-words">{{ $signature }}</p>
                        </div>

                        <!-- Waktu Konfirmasi -->
                        <div class="bg-white rounded-xl p-4 border-2 border-gray-200">
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Waktu Konfirmasi
                            </label>
                            <p class="text-base font-bold text-gray-900">{{ $ticket->confirmed_at->format('d M Y, H:i:s') }}</p>
                        </div>
                    </div>

                    @if($notes)
                    <!-- Catatan -->
                    <div class="mt-4 bg-gradient-to-br from-indigo-50 to-purple-50 rounded-xl p-4 border-2 border-indigo-200">
                        <label class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-3 flex items-center">
                            <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                            </svg>
                            Catatan dari User
                        </label>
                        <p class="text-sm text-gray-800 bg-white p-4 rounded-lg break-words leading-relaxed border border-indigo-100">{{ $notes }}</p>
                    </div>
                    @endif
                </div>

                <!-- Footer Info -->
                <div class="bg-gradient-to-r from-indigo-50 to-purple-50 rounded-xl p-5 border-2 border-indigo-200">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <div class="pt-1">
                            <p class="text-sm font-bold text-indigo-900 mb-1">Dokumen Sah</p>
                            <p class="text-sm text-indigo-800 leading-relaxed">
                                Tanda terima ini telah tersimpan di sistem dan merupakan bukti sah bahwa tiket dengan ID <span class="font-bold">#{{ $ticket->_id }}</span> telah dikonfirmasi penutupannya dan diselesaikan secara resmi pada tanggal <span class="font-bold">{{ $ticket->confirmed_at->format('d M Y') }}</span>.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- Buttons -->
                <div class="flex flex-col sm:flex-row gap-4 pt-4 no-print">
                    <button 
                        onclick="window.print()" 
                        class="flex-1 inline-flex items-center justify-center px-6 py-4 border-2 border-transparent text-base font-bold rounded-xl text-white bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105 active:scale-95"
                    >
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Cetak Tanda Terima
                    </button>
                    <a 
                        href="{{ route('public.tickets') }}" 
                        class="flex-1 inline-flex items-center justify-center px-6 py-4 border-2 border-indigo-300 text-base font-bold rounded-xl text-indigo-700 bg-white hover:bg-indigo-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 active:scale-95"
                    >
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                        </svg>
                        Kembali ke Daftar Tiket
                    </a>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <div class="text-center mt-6 text-sm text-gray-600 no-print">
            <p>© {{ date('Y') }} IT Support Helpdesk. All rights reserved.</p>
            <p class="mt-1">Dokumen ini dicetak pada {{ now()->format('d M Y, H:i:s') }}</p>
        </div>
    </div>
</body>
</html>
