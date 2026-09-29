<div class="w-full">
    @if($successMessage)
    <div class="mb-6 bg-green-50 border border-green-200 rounded-xl p-4 flex items-start gap-3 animate-pulse">
        <svg class="w-6 h-6 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
        </svg>
        <div class="flex-1">
            <h4 class="font-semibold text-green-900">Success!</h4>
            <p class="text-sm text-green-700 mt-1">{{ $successMessage }}</p>
        </div>
        <button wire:click="$set('successMessage', '')" class="text-green-600 hover:text-green-800">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>
    @endif

    <!-- User Information Banner (for authenticated users) -->
    @if($isAuthenticated)
    <div class="mb-6 bg-gradient-to-r from-indigo-50 to-purple-50 border border-indigo-200 rounded-xl p-5">
        <div class="flex items-start gap-4">
            <div class="flex-shrink-0">
                <div class="w-12 h-12 bg-indigo-100 rounded-full flex items-center justify-center">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
            </div>
            <div class="flex-1">
                <div class="flex items-center gap-2 mb-2">
                    <h4 class="font-semibold text-indigo-900">Informasi User Terautentikasi</h4>
                    <svg class="w-5 h-5 text-green-500" fill="currentColor" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                    </svg>
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 gap-3 text-sm">
                    <div>
                        <span class="text-gray-600">Nama:</span>
                        <span class="ml-2 font-medium text-gray-900">{{ $name }}</span>
                    </div>
                    <div>
                        <span class="text-gray-600">Email:</span>
                        <span class="ml-2 font-medium text-gray-900">{{ $email }}</span>
                    </div>
                    @if($userRole)
                    <div class="md:col-span-2">
                        <span class="text-gray-600">Role:</span>
                        @php
                            $roleColors = [
                                'administrator' => 'bg-purple-100 text-purple-800 border-purple-200',
                                'admin' => 'bg-blue-100 text-blue-800 border-blue-200',
                                'operasional' => 'bg-green-100 text-green-800 border-green-200',
                            ];
                            $roleLabels = [
                                'administrator' => 'Administrator',
                                'admin' => 'Admin',
                                'operasional' => 'Operasional',
                            ];
                            $roleColor = $roleColors[$userRole] ?? 'bg-gray-100 text-gray-800 border-gray-200';
                            $roleLabel = $roleLabels[$userRole] ?? ucfirst($userRole);
                        @endphp
                        <span class="ml-2 inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold border {{ $roleColor }}">
                            {{ $roleLabel }}
                        </span>
                    </div>
                    @endif
                </div>
                <p class="text-xs text-indigo-700 mt-2">
                    <svg class="w-4 h-4 inline mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    Data ini diambil dari akun Anda dan tidak dapat diubah. Ticket akan secara otomatis terhubung dengan akun Anda.
                </p>
            </div>
        </div>
    </div>
    @endif

    <form wire:submit="submit" class="space-y-6">
        <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
            <!-- Name -->
            <div>
                <label for="name" class="block text-sm font-semibold text-gray-700 mb-2">
                    Nama <span class="text-red-500">*</span>
                    @if($isAuthenticated)
                        <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Terverifikasi
                        </span>
                    @endif
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 {{ $isAuthenticated ? 'text-indigo-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        id="name" 
                        wire:model="name"
                        {{ $isAuthenticated ? 'readonly' : '' }}
                        class="block w-full pl-10 pr-4 py-3 border rounded-lg transition duration-200 
                            {{ $isAuthenticated 
                                ? 'bg-gray-50 border-gray-300 text-gray-700 cursor-not-allowed' 
                                : 'border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500' 
                            }}
                            @error('name') border-red-500 @enderror"
                        placeholder="Masukkan nama lengkap"
                    >
                    @if($isAuthenticated)
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                @error('name') 
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div>
                <label for="email" class="block text-sm font-semibold text-gray-700 mb-2">
                    Email <span class="text-red-500">*</span>
                    @if($isAuthenticated)
                        <span class="ml-2 inline-flex items-center px-2 py-0.5 rounded text-xs font-medium bg-green-100 text-green-800">
                            <svg class="w-3 h-3 mr-1" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M2.166 4.999A11.954 11.954 0 0010 1.944 11.954 11.954 0 0017.834 5c.11.65.166 1.32.166 2.001 0 5.225-3.34 9.67-8 11.317C5.34 16.67 2 12.225 2 7c0-.682.057-1.35.166-2.001zm11.541 3.708a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                            Terverifikasi
                        </span>
                    @endif
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 {{ $isAuthenticated ? 'text-indigo-500' : 'text-gray-400' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                        </svg>
                    </div>
                    <input 
                        type="email" 
                        id="email" 
                        wire:model="email"
                        {{ $isAuthenticated ? 'readonly' : '' }}
                        class="block w-full pl-10 pr-4 py-3 border rounded-lg transition duration-200 
                            {{ $isAuthenticated 
                                ? 'bg-gray-50 border-gray-300 text-gray-700 cursor-not-allowed' 
                                : 'border-gray-300 focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500' 
                            }}
                            @error('email') border-red-500 @enderror"
                        placeholder="nama@perusahaan.com"
                    >
                    @if($isAuthenticated)
                        <div class="absolute inset-y-0 right-0 pr-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z"/>
                            </svg>
                        </div>
                    @endif
                </div>
                @error('email') 
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>

            <!-- Division -->
            <div class="md:col-span-2">
                <label for="division" class="block text-sm font-semibold text-gray-700 mb-2">
                    Divisi <span class="text-red-500">*</span>
                </label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        id="division" 
                        wire:model="division"
                        class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 @error('division') border-red-500 @enderror"
                        placeholder="Contoh: IT, Finance, HR, Marketing"
                    >
                </div>
                @error('division') 
                    <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                @enderror
            </div>
        </div>

        <!-- Separator with info text -->
        <div class="border-t border-gray-200 pt-6">
            <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 mb-6">
                <div class="flex items-start gap-3">
                    <svg class="w-5 h-5 text-blue-600 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                    <div class="flex-1">
                        <h4 class="text-sm font-semibold text-blue-900 mb-1">Informasi Pengaju (Opsional)</h4>
                        <p class="text-xs text-blue-700">Jika tiket ini diajukan atas nama orang lain, silakan isi nama dan email pengaju di bawah ini.</p>
                    </div>
                </div>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Submitter Name -->
                <div>
                    <label for="submitterName" class="block text-sm font-semibold text-gray-700 mb-2">
                        Nama yang Mengajukan
                        <span class="ml-1 text-xs font-normal text-gray-500">(Opsional)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                        </div>
                        <input 
                            type="text" 
                            id="submitterName" 
                            wire:model="submitterName"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('submitterName') border-red-500 @enderror"
                            placeholder="Nama lengkap pengaju"
                        >
                    </div>
                    @error('submitterName') 
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Nama orang yang sebenarnya mengajukan tiket ini</p>
                </div>

                <!-- Submitter Email -->
                <div>
                    <label for="submitterEmail" class="block text-sm font-semibold text-gray-700 mb-2">
                        Email yang Mengajukan
                        <span class="ml-1 text-xs font-normal text-gray-500">(Opsional)</span>
                    </label>
                    <div class="relative">
                        <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                            <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207"/>
                            </svg>
                        </div>
                        <input 
                            type="email" 
                            id="submitterEmail" 
                            wire:model="submitterEmail"
                            class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-blue-500 focus:border-blue-500 transition duration-200 @error('submitterEmail') border-red-500 @enderror"
                            placeholder="email.pengaju@perusahaan.com"
                        >
                    </div>
                    @error('submitterEmail') 
                        <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
                    @enderror
                    <p class="mt-1 text-xs text-gray-500">Email untuk menghubungi pengaju langsung</p>
                </div>
            </div>
        </div>

        <!-- Title -->
        <div>
            <label for="title" class="block text-sm font-semibold text-gray-700 mb-2">
                Judul Tiket <span class="text-red-500">*</span>
            </label>
            <div class="relative">
                <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                    <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"/>
                    </svg>
                </div>
                <input 
                    type="text" 
                    id="title" 
                    wire:model="title"
                    class="block w-full pl-10 pr-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 @error('title') border-red-500 @enderror"
                    placeholder="Ringkasan singkat permasalahan Anda"
                >
            </div>
            @error('title') 
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Ticket Type -->
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Pilihan Tiket <span class="text-red-500">*</span>
            </label>
            <div class="grid grid-cols-2 gap-4">
                <label class="relative cursor-pointer">
                    <input 
                        type="radio" 
                        wire:model.live="ticketType" 
                        value="teknis" 
                        class="sr-only"
                    >
                    <div class="w-full py-4 px-4 border-2 rounded-lg transition-all hover:shadow-sm
                        @if($ticketType === 'teknis') 
                            border-blue-500 bg-blue-50 ring-2 ring-blue-200
                        @else 
                            border-gray-300 bg-white hover:border-blue-300
                        @endif">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="h-5 w-5 @if($ticketType === 'teknis') text-blue-600 @else text-gray-400 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                            </svg>
                            <span class="font-semibold @if($ticketType === 'teknis') text-blue-700 @else text-gray-700 @endif">Teknis</span>
                        </div>
                        <!-- Checkmark indicator -->
                        {{-- @if($ticketType === 'teknis')
                        <div class="absolute top-2 right-2">
                            <svg class="h-5 w-5 text-blue-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        @endif --}}
                    </div>
                </label>
                <label class="relative cursor-pointer">
                    <input 
                        type="radio" 
                        wire:model.live="ticketType" 
                        value="sistem" 
                        class="sr-only"
                    >
                    <div class="w-full py-4 px-4 border-2 rounded-lg transition-all hover:shadow-sm
                        @if($ticketType === 'sistem') 
                            border-blue-500 bg-blue-50 ring-2 ring-blue-200
                        @else 
                            border-gray-300 bg-white hover:border-blue-300
                        @endif">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="h-5 w-5 @if($ticketType === 'sistem') text-blue-600 @else text-gray-400 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9.75 17L9 20l-1 1h8l-1-1-.75-3M3 13h18M5 17h14a2 2 0 002-2V5a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                            </svg>
                            <span class="font-semibold @if($ticketType === 'sistem') text-blue-700 @else text-gray-700 @endif">Sistem</span>
                        </div>
                        <!-- Checkmark indicator -->
                        {{-- @if($ticketType === 'sistem')
                        <div class="absolute top-2 right-2">
                            <svg class="h-5 w-5 text-purple-600" fill="currentColor" viewBox="0 0 20 20">
                                <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zm3.707-9.293a1 1 0 00-1.414-1.414L9 10.586 7.707 9.293a1 1 0 00-1.414 1.414l2 2a1 1 0 001.414 0l4-4z" clip-rule="evenodd"/>
                            </svg>
                        </div>
                        @endif --}}
                    </div>
                </label>
            </div>
            @error('ticketType') 
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- System Type (Conditional) -->
        @if($ticketType === 'sistem')
        <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
            <label class="block text-sm font-semibold text-gray-700 mb-3">
                Jenis Sistem <span class="text-red-500">*</span>
            </label>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-3">
                <label class="relative cursor-pointer">
                    <input 
                        type="radio" 
                        wire:model.live="systemType" 
                        value="baru" 
                        class="sr-only"
                    >
                    <div class="w-full py-3 px-3 border-2 rounded-lg transition-all hover:shadow-sm
                        @if($systemType === 'baru') 
                            border-red-300 bg-red-120 ring-2 ring-red-300
                        @else 
                            border-purple-300 bg-white hover:border-purple-400
                        @endif">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="h-4 w-4 @if($systemType === 'baru') text-red-700 @else text-purple-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                            </svg>
                            <span class="font-semibold @if($systemType === 'baru') text-red-800 @else text-purple-700 @endif text-sm">Baru</span>
                        </div>
                    </div>
                </label>
                <label class="relative cursor-pointer">
                    <input 
                        type="radio" 
                        wire:model.live="systemType" 
                        value="perubahan" 
                        class="sr-only"
                    >
                    <div class="w-full py-3 px-3 border-2 rounded-lg transition-all hover:shadow-sm
                        @if($systemType === 'perubahan') 
                            border-red-300 bg-red-120 ring-2 ring-red-300
                        @else 
                            border-purple-300 bg-white hover:border-purple-400
                        @endif">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="h-4 w-4 @if($systemType === 'perubahan') text-red-700 @else text-purple-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"/>
                            </svg>
                            <span class="font-semibold @if($systemType === 'perubahan') text-red-800 @else text-purple-700 @endif text-sm">Perubahan</span>
                        </div>
                    </div>
                </label>
                <label class="relative cursor-pointer">
                    <input 
                        type="radio" 
                        wire:model.live="systemType" 
                        value="penambahan" 
                        class="sr-only"
                    >
                    <div class="w-full py-3 px-3 border-2 rounded-lg transition-all hover:shadow-sm
                        @if($systemType === 'penambahan') 
                            border-red-300 bg-red-120 ring-2 ring-red-300
                        @else 
                            border-purple-300 bg-white hover:border-purple-400
                        @endif">
                        <div class="flex items-center justify-center gap-2">
                            <svg class="h-4 w-4 @if($systemType === 'penambahan') text-red-700 @else text-purple-600 @endif" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v3m0 0v3m0-3h3m-3 0H9m12 0a9 9 0 11-18 0 9 9 0 0118 0z"/>
                            </svg>
                            <span class="font-semibold @if($systemType === 'penambahan') text-red-800 @else text-purple-700 @endif text-sm">Penambahan</span>
                        </div>
                    </div>
                </label>
            </div>
            @error('systemType') 
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>
        @endif

        <!-- Priority -->
        <div>
            <label for="priority" class="block text-sm font-semibold text-gray-700 mb-2">
                Prioritas Tiket <span class="text-red-500">*</span>
            </label>
            <div class="grid grid-cols-3 gap-4">
                <label class="relative flex items-center justify-center cursor-pointer">
                    <input 
                        type="radio" 
                        wire:model="priority" 
                        value="low" 
                        class="sr-only peer"
                    >
                    <div class="w-full py-3 px-4 border-2 border-gray-300 rounded-lg peer-checked:border-gray-500 peer-checked:bg-gray-50 transition-all hover:border-gray-400">
                        <div class="flex items-center justify-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-gray-500"></div>
                            <span class="font-medium text-gray-700">Rendah</span>
                        </div>
                    </div>
                </label>
                <label class="relative flex items-center justify-center cursor-pointer">
                    <input 
                        type="radio" 
                        wire:model="priority" 
                        value="medium" 
                        class="sr-only peer"
                    >
                    <div class="w-full py-3 px-4 border-2 border-orange-300 rounded-lg peer-checked:border-orange-500 peer-checked:bg-orange-50 transition-all hover:border-orange-400">
                        <div class="flex items-center justify-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-orange-500"></div>
                            <span class="font-medium text-orange-700">Sedang</span>
                        </div>
                    </div>
                </label>
                <label class="relative flex items-center justify-center cursor-pointer">
                    <input 
                        type="radio" 
                        wire:model="priority" 
                        value="high" 
                        class="sr-only peer"
                    >
                    <div class="w-full py-3 px-4 border-2 border-red-300 rounded-lg peer-checked:border-red-500 peer-checked:bg-red-50 transition-all hover:border-red-400">
                        <div class="flex items-center justify-center gap-2">
                            <div class="w-3 h-3 rounded-full bg-red-500"></div>
                            <span class="font-medium text-red-700">Tinggi</span>
                        </div>
                    </div>
                </label>
            </div>
            @error('priority') 
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
        </div>

        <!-- Description -->
        <div>
            <label for="description" class="block text-sm font-semibold text-gray-700 mb-2">
                Deskripsi <span class="text-red-500">*</span>
            </label>
            <textarea 
                id="description" 
                wire:model="description"
                rows="6"
                class="block w-full px-4 py-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 transition duration-200 @error('description') border-red-500 @enderror"
                placeholder="Jelaskan permasalahan Anda secara detail..."
            ></textarea>
            @error('description') 
                <p class="mt-2 text-sm text-red-600">{{ $message }}</p>
            @enderror
            <p class="mt-2 text-sm text-gray-500">Minimal 10 karakter</p>
        </div>

        <!-- Upload Document -->
        <div id="file-upload-container">
            <label class="block text-sm font-semibold text-gray-700 mb-2">
                Dokumen Pendukung
                <span class="text-gray-500 font-normal">(Opsional)</span>
            </label>
            <div class="flex items-center justify-center w-full">
                <label for="attachment-input" id="upload-area" 
                    class="flex flex-col items-center justify-center w-full h-32 border-2 border-dashed rounded-lg cursor-pointer transition-colors border-gray-300 bg-gray-50 hover:bg-gray-100">
                    <div class="flex flex-col items-center justify-center pt-5 pb-6">
                        <!-- Upload Icon -->
                        <svg id="upload-icon" class="w-8 h-8 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"/>
                        </svg>
                        <!-- Loading Spinner -->
                        <svg id="upload-spinner" class="animate-spin w-8 h-8 mb-3 text-indigo-600 hidden" fill="none" viewBox="0 0 24 24">
                            <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                            <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                        </svg>
                        
                        <p id="upload-text" class="mb-2 text-sm text-gray-500">
                            <span class="font-semibold">Klik untuk upload</span> atau drag and drop
                        </p>
                        <p id="upload-progress" class="mb-2 text-sm font-semibold text-indigo-600 hidden">
                            Mengupload <span id="progress-percentage">0%</span>
                        </p>
                        <p class="text-xs text-gray-500">PDF, DOC, DOCX, JPG, PNG (Max. 10MB)</p>
                    </div>
                    <input 
                        id="attachment-input" 
                        type="file" 
                        accept=".pdf,.doc,.docx,.jpg,.jpeg,.png"
                        class="hidden"
                    />
                </label>
            </div>
            
            <!-- File Preview -->
            <div id="file-preview" class="mt-3 hidden flex items-center gap-2 text-sm text-gray-600 bg-green-50 border border-green-200 rounded-lg p-3">
                <svg class="h-5 w-5 text-green-600 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div class="flex-1 min-w-0">
                    <p class="font-medium text-green-900 truncate" id="file-name"></p>
                    <p class="text-xs text-green-600" id="file-size"></p>
                </div>
                <button type="button" id="remove-file-btn" class="text-red-600 hover:text-red-800 flex-shrink-0">
                    <svg class="h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                    </svg>
                </button>
            </div>
            
            <!-- Error Message -->
            <div id="upload-error" class="mt-2 hidden flex items-start gap-2 text-sm text-red-600 bg-red-50 border border-red-200 rounded-lg p-3">
                <svg class="h-5 w-5 flex-shrink-0 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4m0 4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                </svg>
                <div>
                    <p class="font-semibold">Upload Gagal</p>
                    <p id="error-message"></p>
                </div>
            </div>
            
            <!-- Upload Tips -->
            <div class="mt-2 text-xs text-gray-500">
                <p>💡 Tips: Pastikan ukuran file tidak melebihi 10MB dan format file yang didukung.</p>
            </div>
        </div>

        <!-- Submit Button -->
        <div class="flex items-center justify-between pt-4">
            <p class="text-sm text-gray-600">
                <span class="text-red-500">*</span> Field wajib diisi
            </p>
            <button 
                type="submit"
                wire:loading.attr="disabled"
                wire:target="submit"
                class="inline-flex items-center px-8 py-3 bg-indigo-600 border border-transparent rounded-lg font-semibold text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-all shadow-lg disabled:opacity-50 disabled:cursor-not-allowed"
            >
                <svg wire:loading.remove wire:target="submit" class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 19l9 2-9-18-9 18 9-2zm0 0v-8"/>
                </svg>
                <svg wire:loading wire:target="submit" class="animate-spin -ml-1 mr-2 h-5 w-5" fill="none" viewBox="0 0 24 24">
                    <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                    <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                </svg>
                <span wire:loading.remove wire:target="submit">Kirim Tiket</span>
                <span wire:loading wire:target="submit">Mengirim...</span>
            </button>
        </div>
    </form>
</div>

@script
<script>
    console.log('🚀 Script loaded');
    
    // Wait for Livewire to be ready
    document.addEventListener('livewire:initialized', () => {
        console.log('✓ Livewire initialized');
        initUpload();
    });
    
    // Also try immediate initialization
    if (document.readyState === 'complete') {
        console.log('✓ Document already ready');
        initUpload();
    }
    
    function initUpload() {
        console.log('→ Attempting to initialize upload...');
        
        const fileInput = document.getElementById('attachment-input');
        const uploadArea = document.getElementById('upload-area');
        const uploadIcon = document.getElementById('upload-icon');
        const uploadSpinner = document.getElementById('upload-spinner');
        const uploadText = document.getElementById('upload-text');
        const uploadProgress = document.getElementById('upload-progress');
        const progressPercentage = document.getElementById('progress-percentage');
        const filePreview = document.getElementById('file-preview');
        const fileNameElement = document.getElementById('file-name');
        const fileSizeElement = document.getElementById('file-size');
        const uploadError = document.getElementById('upload-error');
        const errorMessageElement = document.getElementById('error-message');
        const removeFileBtn = document.getElementById('remove-file-btn');
        
        console.log('→ Element check:', {
            fileInput: !!fileInput,
            uploadArea: !!uploadArea,
            filePreview: !!filePreview,
            removeFileBtn: !!removeFileBtn
        });
        
        if (!fileInput) {
            console.error('❌ File input not found!');
            return;
        }
        
        let currentFile = null;
        const allowedTypes = ['application/pdf', 'application/msword', 
            'application/vnd.openxmlformats-officedocument.wordprocessingml.document',
            'image/jpeg', 'image/jpg', 'image/png'];
        const maxFileSize = 10 * 1024 * 1024;
        
        function formatFileSize(bytes) {
            if (bytes === 0) return '0 Bytes';
            const k = 1024;
            const sizes = ['Bytes', 'KB', 'MB', 'GB'];
            const i = Math.floor(Math.log(bytes) / Math.log(k));
            return Math.round(bytes / Math.pow(k, i) * 100) / 100 + ' ' + sizes[i];
        }
        
        function showPreview(file) {
            console.log('→ Showing preview for:', file.name);
            fileNameElement.textContent = file.name;
            fileSizeElement.textContent = formatFileSize(file.size);
            filePreview.classList.remove('hidden');
            uploadSpinner.classList.add('hidden');
            uploadIcon.classList.remove('hidden');
            uploadText.classList.remove('hidden');
            uploadProgress.classList.add('hidden');
            uploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
            console.log('✓ Preview shown');
        }
        
        function hidePreview() {
            filePreview.classList.add('hidden');
            uploadError.classList.add('hidden');
        }
        
        function showError(msg) {
            errorMessageElement.textContent = msg;
            uploadError.classList.remove('hidden');
            uploadArea.classList.add('border-red-500', 'bg-red-50');
            uploadSpinner.classList.add('hidden');
            uploadIcon.classList.remove('hidden');
            uploadText.classList.remove('hidden');
            uploadProgress.classList.add('hidden');
        }
        
        function hideError() {
            uploadError.classList.add('hidden');
            uploadArea.classList.remove('border-red-500', 'bg-red-50');
        }
        
        function showLoading() {
            uploadIcon.classList.add('hidden');
            uploadSpinner.classList.remove('hidden');
            uploadText.classList.add('hidden');
            uploadProgress.classList.remove('hidden');
            uploadArea.classList.add('border-indigo-500', 'bg-indigo-50');
        }
        
        // Main file handler
        async function processFile(file) {
            console.log('📁 Processing file:', file.name, file.type, formatFileSize(file.size));
            
            hideError();
            
            // Validate type
            if (!allowedTypes.includes(file.type)) {
                showError('Tipe file tidak didukung. Gunakan: PDF, DOC, DOCX, JPG, PNG');
                console.error('❌ Invalid type:', file.type);
                return;
            }
            
            // Validate size
            if (file.size > maxFileSize) {
                showError('File terlalu besar. Maksimal 10MB');
                console.error('❌ Too large:', formatFileSize(file.size));
                return;
            }
            
            console.log('✓ Validation passed');
            currentFile = file;
            showLoading();
            
            try {
                const reader = new FileReader();
                
                reader.onprogress = (e) => {
                    if (e.lengthComputable) {
                        const pct = Math.round((e.loaded / e.total) * 100);
                        progressPercentage.textContent = pct + '%';
                    }
                };
                
                reader.onload = async (e) => {
                    console.log('✓ File read complete');
                    try {
                        const fileData = {
                            name: file.name,
                            size: file.size,
                            type: file.type,
                            data: e.target.result
                        };
                        
                        console.log('📤 Sending to backend...');
                        await @this.call('setAttachment', fileData);
                        console.log('✓ Backend call complete');
                        
                        showPreview(file);
                        console.log('✅ Upload successful');
                        
                    } catch (error) {
                        console.error('❌ Backend error:', error);
                        showError('Gagal mengirim file: ' + error.message);
                        currentFile = null;
                        fileInput.value = '';
                    }
                };
                
                reader.onerror = () => {
                    console.error('❌ Reader error');
                    showError('Gagal membaca file');
                    currentFile = null;
                    fileInput.value = '';
                };
                
                reader.readAsDataURL(file);
                
            } catch (error) {
                console.error('❌ Process error:', error);
                showError('Terjadi kesalahan: ' + error.message);
                currentFile = null;
                fileInput.value = '';
            }
        }
        
        // Attach event: File input change
        fileInput.addEventListener('change', (e) => {
            console.log('🎯 Change event fired');
            const file = e.target.files[0];
            if (file) {
                console.log('→ File selected:', file.name);
                processFile(file);
            } else {
                console.warn('⚠️ No file in input');
            }
        });
        
        // Attach event: Remove button
        if (removeFileBtn) {
            removeFileBtn.addEventListener('click', () => {
                console.log('🗑️ Remove clicked');
                currentFile = null;
                fileInput.value = '';
                hidePreview();
                hideError();
                @this.call('clearAttachment');
            });
        }
        
        // Attach event: Drag & drop
        if (uploadArea) {
            uploadArea.addEventListener('dragover', (e) => {
                e.preventDefault();
                uploadArea.classList.add('border-indigo-500', 'bg-indigo-50');
            });
            
            uploadArea.addEventListener('dragleave', (e) => {
                e.preventDefault();
                if (!currentFile) {
                    uploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
                }
            });
            
            uploadArea.addEventListener('drop', (e) => {
                e.preventDefault();
                uploadArea.classList.remove('border-indigo-500', 'bg-indigo-50');
                
                const file = e.dataTransfer.files[0];
                if (file) {
                    console.log('📥 File dropped:', file.name);
                    const dt = new DataTransfer();
                    dt.items.add(file);
                    fileInput.files = dt.files;
                    processFile(file);
                }
            });
        }
        
        console.log('✅ Upload handler initialized successfully');
    }
</script>
@endscript
