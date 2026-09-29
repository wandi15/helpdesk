<div class="py-12">
    <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <h2 class="text-2xl font-bold text-gray-800">Master User</h2>
            <button 
                wire:click="createUser" 
                class="inline-flex items-center px-4 py-2 bg-indigo-600 border border-transparent rounded-lg font-semibold text-xs text-white uppercase tracking-widest hover:bg-indigo-700 focus:bg-indigo-700 active:bg-indigo-900 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 transition ease-in-out duration-150"
            >
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"/>
                </svg>
                Tambah User
            </button>
        </div>

        <!-- Success Message -->
        @if (session()->has('message'))
            <div class="mb-4 p-4 bg-green-100 border-l-4 border-green-500 text-green-700">
                <p class="font-medium">{{ session('message') }}</p>
            </div>
        @endif

        @if (session()->has('error'))
            <div class="mb-4 p-4 bg-red-100 border-l-4 border-red-500 text-red-700">
                <p class="font-medium">{{ session('error') }}</p>
            </div>
        @endif

        <!-- Search -->
        <div class="bg-white rounded-lg shadow mb-6">
            <div class="p-6">
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"/>
                        </svg>
                    </div>
                    <input 
                        type="text" 
                        wire:model.live.debounce.300ms="search"
                        class="block w-full pl-10 pr-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                        placeholder="Cari user berdasarkan nama atau email..."
                    >
                </div>
            </div>
        </div>

        <!-- Users Table -->
        <div class="bg-white rounded-lg shadow overflow-hidden">
            <div class="overflow-x-auto">
                <table class="min-w-full divide-y divide-gray-200">
                    <thead class="bg-gray-50">
                        <tr>
                            <th scope="col" class="px-6 py-3 text-left">
                                <button wire:click="sortBy('name')" class="group inline-flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700">
                                    Nama
                                    @if($sortBy === 'name')
                                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($sortDirection === 'asc')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            @endif
                                        </svg>
                                    @endif
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                <button wire:click="sortBy('email')" class="group inline-flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700">
                                    Email
                                    @if($sortBy === 'email')
                                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($sortDirection === 'asc')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            @endif
                                        </svg>
                                    @endif
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                <button wire:click="sortBy('role')" class="group inline-flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700">
                                    Role
                                    @if($sortBy === 'role')
                                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($sortDirection === 'asc')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            @endif
                                        </svg>
                                    @endif
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left">
                                <button wire:click="sortBy('created_at')" class="group inline-flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700">
                                    Tanggal Dibuat
                                    @if($sortBy === 'created_at')
                                        <svg class="ml-1 w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            @if($sortDirection === 'asc')
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 15l7-7 7 7"/>
                                            @else
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"/>
                                            @endif
                                        </svg>
                                    @endif
                                </button>
                            </th>
                            <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                Aksi
                            </th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y divide-gray-200">
                        @forelse($users as $user)
                            <tr class="hover:bg-gray-50 transition-colors">
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="flex items-center">
                                        <div class="flex-shrink-0 h-10 w-10">
                                            <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                                <span class="text-indigo-600 font-semibold text-sm">
                                                    {{ strtoupper(substr($user->name, 0, 2)) }}
                                                </span>
                                            </div>
                                        </div>
                                        <div class="ml-4">
                                            <div class="text-sm font-medium text-gray-900">{{ $user->name }}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-900">{{ $user->email }}</div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    @php
                                        $roleColors = [
                                            'administrator' => 'bg-purple-100 text-purple-800',
                                            'admin' => 'bg-blue-100 text-blue-800',
                                            'operasional' => 'bg-green-100 text-green-800',
                                        ];
                                        $roleLabels = [
                                            'administrator' => 'Administrator',
                                            'admin' => 'Admin',
                                            'operasional' => 'Operasional',
                                        ];
                                        $roleColor = $roleColors[$user->role ?? 'operasional'] ?? 'bg-gray-100 text-gray-800';
                                        $roleLabel = $roleLabels[$user->role ?? 'operasional'] ?? 'Unknown';
                                    @endphp
                                    <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full {{ $roleColor }}">
                                        {{ $roleLabel }}
                                    </span>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap">
                                    <div class="text-sm text-gray-500">
                                        {{ $user->created_at ? $user->created_at->format('d M Y, H:i') : '-' }}
                                    </div>
                                </td>
                                <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                    <button 
                                        wire:click="editUser('{{ $user->_id }}')"
                                        class="text-indigo-600 hover:text-indigo-900 mr-3"
                                    >
                                        Edit
                                    </button>
                                    @if($user->_id !== auth()->id())
                                        <button 
                                            wire:click="deleteUser('{{ $user->_id }}')"
                                            wire:confirm="Apakah Anda yakin ingin menghapus user ini?"
                                            class="text-red-600 hover:text-red-900"
                                        >
                                            Hapus
                                        </button>
                                    @endif
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="5" class="px-6 py-12 text-center">
                                    <div class="flex flex-col items-center justify-center">
                                        <svg class="w-12 h-12 text-gray-400 mb-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
                                        </svg>
                                        <p class="text-gray-500 text-lg font-medium">Tidak ada user ditemukan</p>
                                        <p class="text-gray-400 text-sm mt-1">Coba ubah filter pencarian Anda</p>
                                    </div>
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <!-- Pagination -->
            <div class="px-6 py-4 border-t border-gray-200">
                {{ $users->links() }}
            </div>
        </div>
    </div>

    <!-- Modal -->
    @if($showModal)
        <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
            <div class="flex items-end justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
                <!-- Background overlay -->
                <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" aria-hidden="true" wire:click="closeModal"></div>

                <!-- Modal panel -->
                <div class="inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-lg sm:w-full">
                    <form wire:submit.prevent="saveUser">
                        <div class="bg-white px-4 pt-5 pb-4 sm:p-6 sm:pb-4">
                            <div class="sm:flex sm:items-start">
                                <div class="mt-3 text-center sm:mt-0 sm:text-left w-full">
                                    <h3 class="text-lg leading-6 font-medium text-gray-900 mb-4" id="modal-title">
                                        {{ $isEditing ? 'Edit User' : 'Tambah User Baru' }}
                                    </h3>
                                    
                                    <div class="mt-4">
                                        <!-- Name -->
                                        <div class="mb-4">
                                            <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Nama</label>
                                            <input 
                                                type="text" 
                                                id="name"
                                                wire:model="userForm.name"
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('userForm.name') border-red-500 @enderror"
                                                placeholder="Masukkan nama lengkap"
                                            >
                                            @error('userForm.name')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Email -->
                                        <div class="mb-4">
                                            <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                                            <input 
                                                type="email" 
                                                id="email"
                                                wire:model="userForm.email"
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('userForm.email') border-red-500 @enderror"
                                                placeholder="user@example.com"
                                            >
                                            @error('userForm.email')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Role -->
                                        <div class="mb-4">
                                            <label for="role" class="block text-sm font-medium text-gray-700 mb-1">Role</label>
                                            <select 
                                                id="role"
                                                wire:model="userForm.role"
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('userForm.role') border-red-500 @enderror"
                                            >
                                                <option value="administrator">Administrator</option>
                                                <option value="admin">Admin</option>
                                                <option value="operasional">Operasional</option>
                                            </select>
                                            @error('userForm.role')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                            <p class="mt-1 text-xs text-gray-500">
                                                <span class="font-medium">Administrator:</span> Akses penuh ke semua menu<br>
                                                <span class="font-medium">Admin:</span> Akses terbatas ke menu tertentu<br>
                                                <span class="font-medium">Operasional:</span> Akses terbatas untuk operasional
                                            </p>
                                        </div>

                                        <!-- Password -->
                                        <div class="mb-4">
                                            <label for="password" class="block text-sm font-medium text-gray-700 mb-1">
                                                Password {{ $isEditing ? '(kosongkan jika tidak ingin mengubah)' : '' }}
                                            </label>
                                            <input 
                                                type="password" 
                                                id="password"
                                                wire:model="userForm.password"
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500 @error('userForm.password') border-red-500 @enderror"
                                                placeholder="Minimal 8 karakter"
                                            >
                                            @error('userForm.password')
                                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                            @enderror
                                        </div>

                                        <!-- Password Confirmation -->
                                        <div class="mb-4">
                                            <label for="password_confirmation" class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                                            <input 
                                                type="password" 
                                                id="password_confirmation"
                                                wire:model="userForm.password_confirmation"
                                                class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                                                placeholder="Ulangi password"
                                            >
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="bg-gray-50 px-4 py-3 sm:px-6 sm:flex sm:flex-row-reverse">
                            <button 
                                type="submit"
                                class="w-full inline-flex justify-center rounded-md border border-transparent shadow-sm px-4 py-2 bg-indigo-600 text-base font-medium text-white hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                {{ $isEditing ? 'Perbarui' : 'Simpan' }}
                            </button>
                            <button 
                                type="button"
                                wire:click="closeModal"
                                class="mt-3 w-full inline-flex justify-center rounded-md border border-gray-300 shadow-sm px-4 py-2 bg-white text-base font-medium text-gray-700 hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 sm:mt-0 sm:ml-3 sm:w-auto sm:text-sm"
                            >
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endif
</div>
