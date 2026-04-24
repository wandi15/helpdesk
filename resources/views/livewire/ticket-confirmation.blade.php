<div>
    <style>
        @keyframes slideUp {
            from {
                opacity: 0;
                transform: translateY(30px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }
        
        @keyframes fadeIn {
            from { opacity: 0; }
            to { opacity: 1; }
        }
        
        @keyframes scaleIn {
            from {
                opacity: 0;
                transform: scale(0.9);
            }
            to {
                opacity: 1;
                transform: scale(1);
            }
        }
        
        .animate-slide-up {
            animation: slideUp 0.6s ease-out forwards;
        }
        
        .animate-fade-in {
            animation: fadeIn 0.5s ease-out forwards;
        }
        
        .animate-scale-in {
            animation: scaleIn 0.5s ease-out forwards;
        }
        
        .info-card {
            transition: all 0.3s cubic-bezier(0.4, 0, 0.2, 1);
        }
        
        .info-card:hover {
            transform: translateY(-2px);
            box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.2), 0 8px 10px -6px rgba(99, 102, 241, 0.1);
        }
        
        .form-input {
            transition: all 0.3s ease;
        }
        
        .form-input:focus {
            transform: translateY(-1px);
            box-shadow: 0 10px 25px -5px rgba(99, 102, 241, 0.15);
        }
        
        @media print {
            body {
                background: white !important;
            }
            .no-print,
            button:not(.print-button),
            a.no-print {
                display: none !important;
            }
            .animate-bounce {
                animation: none !important;
            }
            * {
                box-shadow: none !important;
                animation: none !important;
            }
        }
    </style>
    
    {{-- <div class="min-h-screen bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 py-8 px-4 sm:px-6 lg:px-8"> --}}
    <div>    
        <div class="max-w-5xl mx-auto">
            @if($error)
            <!-- Error State -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 pb-16 sm:p-10 sm:pb-20 lg:p-12 lg:pb-24 text-center animate-scale-in">
                <div class="bg-red-600 mx-auto flex items-center justify-center h-24 w-24 rounded-full mb-6 shadow-xl animate-pulse">
                    <svg class="h-12 w-12 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </div>
                <h2 class="bg-yellow-500 text-4xl font-bold  bg-clip-text text-transparent mb-4">Link Tidak Valid</h2>
                <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto">{{ $error }}</p>
                <a href="{{ route('public.tickets') }}" class="inline-flex items-center px-8 py-4 border-2 border-transparent text-lg font-bold rounded-xl text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105 active:scale-95">
                    <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2.5">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 19l-7-7m0 0l7-7m-7 7h18"/>
                    </svg>
                    Kembali ke Daftar Tiket
                </a>
            </div>
        @elseif($confirmed)
            <!-- Success State -->
            <div class="bg-white rounded-3xl shadow-2xl p-8 sm:p-10 lg:p-12 text-center animate-scale-in">
                <div class="bg-green-100 no-print">
                    <div class="mx-auto flex items-center justify-center h-24 w-24 rounded-full bg-gradient-to-br from-green-500 to-emerald-600 mb-6 shadow-xl">
                        <svg class="h-12 w-12 text-white animate-bounce" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="3">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M5 13l4 4L19 7"/>
                        </svg>
                    </div>
                    <h2 class="text-4xl font-bold bg-gradient-to-r from-green-600 to-emerald-700 bg-clip-text text-transparent mb-4">Konfirmasi Berhasil!</h2>
                    <p class="text-lg text-gray-600 mb-8 max-w-md mx-auto">Terima kasih telah mengkonfirmasi penutupan tiket.</p>
                </div>
                
                <!-- Receipt -->
                <div class="bg-gradient-to-br from-indigo-50 via-purple-50 to-pink-50 rounded-2xl p-8 text-left mb-8 shadow-lg animate-slide-up" style="animation-delay: 0.2s">
                    <h3 class="text-2xl font-bold text-gray-900 mb-6 flex items-center justify-center">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                        </div>
                        <span>Tanda Terima Digital</span>
                    </h3>
                    
                    <div class="space-y-5 bg-white rounded-xl p-6 border-2 border-indigo-200 shadow-sm">
                        <div class="py-3 border-b-2 border-gray-100">
                            <span class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                                ID Tiket:
                            </span>
                            <span class="text-base font-mono font-bold text-gray-900 break-all">#{{ $ticket->_id }}</span>
                        </div>
                        <div class="py-3 border-b-2 border-gray-100">
                            <span class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                </svg>
                                Judul:
                            </span>
                            <span class="text-base font-bold text-gray-900 break-words">{{ $ticket->title }}</span>
                        </div>
                        <div class="py-3 border-b-2 border-gray-100">
                            <span class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                                Nama Lengkap:
                            </span>
                            <span class="text-base font-bold text-gray-900 break-words">{{ $signature }}</span>
                        </div>
                        <div class="py-3 border-b-2 border-gray-100">
                            <span class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                Waktu Konfirmasi:
                            </span>
                            <span class="text-base font-bold text-gray-900">{{ now()->format('d M Y, H:i:s') }}</span>
                        </div>
                        @if($notes)
                        <div class="bg-white pt-3">
                            <span class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Catatan:
                            </span>
                            <p class="text-sm text-gray-800 bg-gradient-to-br from-gray-50 to-indigo-50 p-4 rounded-lg break-words leading-relaxed border border-indigo-100">{{ $notes }}</p>
                        </div>
                        @endif
                    </div>
                    
                    <div class="mt-6 flex items-start gap-3 text-sm text-indigo-900 bg-white p-5 rounded-xl border-2 border-indigo-200 shadow-sm">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center flex-shrink-0 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span class="leading-relaxed font-medium pt-2">Tanda terima ini telah tersimpan di sistem. Tiket dengan ID <span class="font-bold">#{{ $ticket->_id }}</span> telah ditutup secara resmi.</span>
                    </div>
                </div>

                <div class="flex flex-col sm:flex-row gap-4 justify-center animate-fade-in no-print" style="animation-delay: 0.4s">
                    <button 
                        onclick="window.print()" 
                        class="inline-flex items-center justify-center px-8 py-4 border-2 border-indigo-300 text-lg font-bold rounded-xl text-indigo-700 bg-white hover:bg-indigo-50 transition-all duration-300 shadow-lg hover:shadow-xl transform hover:scale-105 active:scale-95"
                    >
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                        </svg>
                        Cetak Tanda Terima
                    </button>
                    <a 
                        href="{{ route('public.tickets') }}" 
                        class="inline-flex items-center justify-center px-8 py-4 border-2 border-transparent text-lg font-bold rounded-xl text-white bg-gradient-to-r from-indigo-600 to-purple-600 hover:from-indigo-700 hover:to-purple-700 transition-all duration-300 shadow-xl hover:shadow-2xl transform hover:scale-105 active:scale-95"
                    >
                        <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                        </svg>
                        Kembali ke Beranda
                    </a>
                </div>
            </div>
        @else
            <!-- Confirmation Form -->
            {{-- <div class="bg-gray-100 rounded-3xl shadow-2xl p-8 sm:p-10 lg:p-12 animate-scale-in overflow-hidden"> --}}
                <!-- Header dengan Gradient Accent -->
                <div class="-mx-8 -mt-8 sm:-mx-10 sm:-mt-10 lg:-mx-12 lg:-mt-12 mb-8 px-8 sm:px-10 lg:px-12 pt-8 pb-6 bg-gradient-to-r from-indigo-500 to-purple-600">
                    <h1 class="text-2xl sm:text-3xl font-bold text-white text-center flex items-center animate-slide-up">
                        <svg class="w-8 h-8 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                        </svg>
                        Konfirmasi Penutupan Tiket
                    </h1>
                    <p class="text-indigo-100 mt-2 animate-fade-in">Mohon tinjau informasi tiket dan berikan konfirmasi Anda</p>
                </div>
                
                <!-- Ticket Information -->
                <div class="mb-8 px-4 sm:px-6 lg:px-8 animate-slide-up" style="animation-delay: 0.1s">
                    <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                        <div class="w-10 h-10 bg-gradient-to-br from-indigo-500 to-purple-600 rounded-xl flex items-center justify-center mr-4 shadow-lg">
                            <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                        </div>
                        <span>Informasi Tiket</span>
                    </h2>
                    
                    <div class="space-y-4">
                        <!-- ID Tiket - Full Width -->
                        <div class="info-card bg-blue-50 rounded-xl p-5 border-2 border-yellow-300 relative overflow-hidden group">
                            <div class="absolute top-0 right-0 w-32 h-32 bg-gradient-to-br from-indigo-400/10 to-purple-400/10 rounded-full -mr-16 -mt-16 group-hover:scale-150 transition-transform duration-500"></div>
                            <label class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-2 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 20l4-16m2 16l4-16M6 9h14M4 15h14"/>
                                </svg>
                                ID Tiket
                            </label>
                            <p class="text-base font-mono font-bold text-gray-900 break-all relative z-10">#{{ $ticket->_id }}</p>
                        </div>
                        
                        <!-- Priority and Date - Grid -->
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                            <div class="info-card bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 shadow-sm">
                                <label class="text-xs font-bold text-gray-600 uppercase tracking-wider block mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                    </svg>
                                    Prioritas
                                </label>
                                <span class="inline-flex items-center px-4 py-2 rounded-xl text-sm font-bold shadow-sm
                                    {{ $ticket->priority === 'high' ? 'bg-gradient-to-r from-red-500 to-red-600 text-white' : ($ticket->priority === 'medium' ? 'bg-gradient-to-r from-orange-500 to-orange-600 text-white' : 'bg-gradient-to-r from-gray-500 to-gray-600 text-white') }}">
                                    <svg class="w-4 h-4 mr-1.5" fill="currentColor" viewBox="0 0 20 20">
                                        <path d="M10 2a8 8 0 100 16 8 8 0 000-16zm1 11H9v-2h2v2zm0-4H9V5h2v4z"/>
                                    </svg>
                                    {{ strtoupper($ticket->priority) }}
                                </span>
                            </div>
                            
                            <div class="info-card bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 shadow-sm">
                                <label class="text-xs font-bold text-gray-600 uppercase tracking-wider block mb-3 flex items-center">
                                    <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                    Tanggal Dibuat
                                </label>
                                <p class="text-base font-bold text-gray-900 flex items-center">
                                    <span class="w-2 h-2 bg-indigo-500 rounded-full mr-2 animate-pulse"></span>
                                    {{ $ticket->created_at->format('d M Y') }}
                                </p>
                            </div>
                        </div>
                        
                        <!-- Title - Full Width -->
                        <div class="info-card bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 shadow-sm">
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider block mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 8h10M7 12h4m1 8l-4-4H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-3l-4 4z"/>
                                </svg>
                                Judul
                            </label>
                            <p class="text-base font-bold text-gray-900 break-words leading-relaxed">{{ $ticket->title }}</p>
                        </div>
                        
                        <!-- Division - Full Width -->
                        <div class="info-card bg-white rounded-xl p-5 border-2 border-gray-200 hover:border-indigo-300 shadow-sm">
                            <label class="text-xs font-bold text-gray-600 uppercase tracking-wider block mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                                </svg>
                                Divisi
                            </label>
                            <p class="text-base font-semibold text-gray-900">{{ $ticket->division ?? '-' }}</p>
                        </div>

                        <!-- Description - Full Width -->
                        @if($ticket->description)
                        <div class="info-card bg-white rounded-xl p-5 border-2 border-indigo-200 shadow-sm">
                            <label class="text-xs font-bold text-indigo-700 uppercase tracking-wider block mb-3 flex items-center">
                                <svg class="w-4 h-4 mr-1.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                Deskripsi
                            </label>
                            <p class="text-base text-gray-800 whitespace-pre-wrap break-words leading-relaxed">{{ $ticket->description }}</p>
                        </div>
                        @endif
                    </div>
                </div>

                <!-- Confirmation Form -->
                <form wire:submit="confirmTicket" class="mt-10 px-4 sm:px-6 lg:px-8 animate-slide-up" style="animation-delay: 0.2s">
                    <div class="border-t-2 border-gray-200 pt-8">
                        <h2 class="text-xl font-bold text-gray-900 mb-6 flex items-center">
                            <div class="w-10 h-10 bg-gradient-to-br from-green-500 to-emerald-600 rounded-xl flex items-center justify-center mr-3 shadow-lg">
                                <svg class="w-6 h-6 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                            </div>
                            <span>Form Konfirmasi</span>
                        </h2>
                    </div>
                    
                    <div class="space-y-6 mt-6">
                        <!-- Signature Field -->
                        <div class="transform transition-all duration-300 hover:scale-[1.01]">
                            <label for="signature" class="block text-base font-bold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.232 5.232l3.536 3.536m-2.036-5.036a2.5 2.5 0 113.536 3.536L6.5 21.036H3v-3.572L16.732 3.732z"/>
                                </svg>
                                Nama Lengkap (Tanda Tangan Digital) 
                                <span class="ml-1 text-red-500 text-lg">*</span>
                            </label>
                            <div class="relative">
                                <input 
                                    type="text" 
                                    id="signature"
                                    wire:model="signature"
                                    class="form-input block w-full px-5 py-4 text-base border-2 border-gray-300 rounded-xl focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 @error('signature') border-red-500 ring-4 ring-red-500/20 @enderror"
                                    placeholder="Masukkan nama lengkap Anda"
                                    required
                                >
                                <div class="absolute inset-y-0 right-0 flex items-center pr-4 pointer-events-none">
                                    <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                                    </svg>
                                </div>
                            </div>
                            @error('signature')
                                <p class="mt-2 text-sm text-red-600 flex items-center bg-red-50 p-3 rounded-lg border border-red-200">
                                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="font-medium">{{ $message }}</span>
                                </p>
                            @enderror
                            <p class="mt-3 text-sm text-indigo-600 flex items-center bg-indigo-50 p-3 rounded-lg">
                                <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <span>Nama lengkap Anda akan digunakan sebagai tanda tangan digital</span>
                            </p>
                        </div>

                        <!-- Notes Field -->
                        <div class="transform transition-all duration-300 hover:scale-[1.01]">
                            <label for="notes" class="block text-base font-bold text-gray-900 mb-3 flex items-center">
                                <svg class="w-5 h-5 mr-2 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Catatan (Opsional)
                            </label>
                            <textarea 
                                id="notes"
                                wire:model="notes"
                                rows="5"
                                class="form-input block w-full px-5 py-4 text-base border-2 border-gray-300 rounded-xl focus:ring-4 focus:ring-indigo-500/20 focus:border-indigo-500 @error('notes') border-red-500 ring-4 ring-red-500/20 @enderror"
                                placeholder="Tambahkan catatan atau feedback (opsional)..."
                            ></textarea>
                            @error('notes')
                                <p class="mt-2 text-sm text-red-600 flex items-center bg-red-50 p-3 rounded-lg border border-red-200">
                                    <svg class="w-5 h-5 mr-2 flex-shrink-0" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-7 4a1 1 0 11-2 0 1 1 0 012 0zm-1-9a1 1 0 00-1 1v4a1 1 0 102 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                    <span class="font-medium">{{ $message }}</span>
                                </p>
                            @enderror
                            <p class="mt-3 text-sm text-gray-500 flex items-center">
                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 10h.01M12 10h.01M16 10h.01M9 16H5a2 2 0 01-2-2V6a2 2 0 012-2h14a2 2 0 012 2v8a2 2 0 01-2 2h-5l-5 5v-5z"/>
                                </svg>
                                Berikan feedback atau catatan tambahan mengenai penyelesaian tiket ini
                            </p>
                        </div>

                        <!-- Confirmation Notice -->
                        {{-- <div class="bg-gradient-to-r from-gray-50 to-orange-50 border-2 border-yellow-300 p-6 rounded-xl shadow-md transform transition-all duration-300 hover:scale-[1.01]"> --}}
                        {{-- <div class="bg-gradient-to-r from-gray-200 rounded-xl shadow-md transform transition-all duration-300 hover:scale-[1.01]" style="background-color: rgba(253, 224, 71, 0.2); border-color: rgba(253, 224, 71, 0.5);">     --}}
                        <div class="bg-yellow-50 border-2 border-yellow-300 p-6 rounded-xl shadow-md transform transition-all duration-300 hover:scale-[1.01]">    
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <div class="w-10 h-10 bg-yellow-400 rounded-xl flex items-center justify-center shadow-lg">
                                        <svg class="h-6 w-6 text-yellow-900" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z"/>
                                        </svg>
                                    </div>
                                </div>
                                <div class="ml-4">
                                    <p class="text-base text-yellow-900 font-bold mb-2">
                                        Dengan mengkonfirmasi, Anda menyatakan bahwa:
                                    </p>
                                    <ul class="space-y-2">
                                        <li class="flex items-start text-sm text-yellow-800">
                                            <svg class="w-5 h-5 mr-2 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Masalah pada tiket ini telah diselesaikan dengan memuaskan</span>
                                        </li>
                                        <li class="flex items-start text-sm text-yellow-800">
                                            <svg class="w-5 h-5 mr-2 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Tiket akan ditutup secara otomatis setelah konfirmasi</span>
                                        </li>
                                        <li class="flex items-start text-sm text-yellow-800">
                                            <svg class="w-5 h-5 mr-2 text-yellow-600 flex-shrink-0 mt-0.5" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                                            </svg>
                                            <span>Tanda terima digital akan tersimpan di sistem</span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <!-- Error Message -->
                        @if(session()->has('error'))
                            <div class="bg-gradient-to-r from-red-50 to-pink-50 border-2 border-red-300 p-5 rounded-xl shadow-md animate-slide-up">
                                <div class="flex items-start">
                                    <div class="flex-shrink-0">
                                        <div class="w-10 h-10 bg-red-500 rounded-xl flex items-center justify-center shadow-lg">
                                            <svg class="h-6 w-6 text-white" fill="currentColor" viewBox="0 0 20 20">
                                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                            </svg>
                                        </div>
                                    </div>
                                    <div class="ml-4">
                                        <p class="text-sm font-bold text-red-900 mb-1">Terjadi Kesalahan</p>
                                        <p class="text-sm text-red-800">{{ session('error') }}</p>
                                    </div>
                                </div>
                            </div>
                        @endif

                        <!-- Submit Button -->
                        <div class="flex gap-3 pt-4">
                            <button 
                                type="submit"
                                wire:loading.attr="disabled"
                                class="flex-1 group relative inline-flex items-center justify-center px-8 py-6 border border-transparent text-lg font-bold rounded-xl text-white bg-gradient-to-r from-indigo-600 via-purple-600 to-pink-600 hover:from-indigo-700 hover:via-purple-700 hover:to-pink-700 focus:outline-none focus:ring-4 focus:ring-indigo-500/50 transition-all duration-300 transform hover:scale-105 hover:shadow-2xl active:scale-95 disabled:opacity-50 disabled:cursor-not-allowed disabled:transform-none shadow-xl overflow-hidden"
                            >
                                <div class="absolute inset-0 bg-gradient-to-r from-white/0 via-white/20 to-white/0 transform -skew-x-12 -translate-x-full group-hover:translate-x-full transition-transform duration-1000"></div>
                                <svg wire:loading.remove class="w-6 h-6 mr-3 relative z-10 group-hover:rotate-12 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <svg wire:loading.class.remove="hidden" class="hidden animate-spin h-6 w-6 mr-3 relative z-10" fill="none" viewBox="0 0 24 24">
                                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                </svg>
                                <span wire:loading.remove class="text-lg relative z-10 group-hover:tracking-wide transition-all duration-300">Konfirmasi Penutupan Tiket</span>
                                <span wire:loading.class.remove="hidden" class="hidden text-lg relative z-10">Memproses...</span>
                                <svg wire:loading.remove class="w-5 h-5 ml-2 relative z-10 group-hover:translate-x-1 transition-transform duration-300" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M13 7l5 5m0 0l-5 5m5-5H6"/>
                                </svg>
                            </button>
                        </div>
                    </div>
                </form>
            {{-- </div> --}}
        @endif
        </div>
    </div>
</div>
