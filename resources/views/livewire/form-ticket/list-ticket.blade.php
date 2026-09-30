<div>
    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-4 gap-4 mb-6">
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-indigo-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Total Tickets</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $this->stats['total'] }}</p>
                </div>
                <div class="bg-indigo-100 rounded-full p-3">
                    <svg class="w-6 h-6 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-yellow-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Open</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $this->stats['open'] }}</p>
                </div>
                <div class="bg-yellow-100 rounded-full p-3">
                    <svg class="w-6 h-6 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-blue-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">In Progress</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $this->stats['in_progress'] }}</p>
                </div>
                <div class="bg-blue-100 rounded-full p-3">
                    <svg class="w-6 h-6 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                    </svg>
                </div>
            </div>
        </div>
        
        <div class="bg-white rounded-lg shadow p-5 border-l-4 border-green-500">
            <div class="flex items-center justify-between">
                <div>
                    <p class="text-sm text-gray-600 font-medium">Closed</p>
                    <p class="text-2xl font-bold text-gray-800 mt-1">{{ $this->stats['closed'] }}</p>
                </div>
                <div class="bg-green-100 rounded-full p-3">
                    <svg class="w-6 h-6 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                    </svg>
                </div>
            </div>
        </div>
    </div>

    <!-- Filters and Search -->
    <div class="bg-white rounded-lg shadow mb-6">
        <div class="p-6">
            <div class="grid grid-cols-1 md:grid-cols-4 gap-4">
                <!-- Search -->
                <div class="md:col-span-2">
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
                            placeholder="Search tickets by title or description..."
                        >
                    </div>
                </div>

                <!-- Status Filter -->
                <div>
                    <select 
                        wire:model.live="statusFilter"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    >
                        <option value="all">All Status</option>
                        <option value="open">Open</option>
                        <option value="in_progress">In Progress</option>
                        <option value="closed">Closed</option>
                    </select>
                </div>

                <!-- Priority Filter -->
                <div>
                    <select 
                        wire:model.live="priorityFilter"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    >
                        <option value="all">All Priority</option>
                        <option value="low">Low</option>
                        <option value="medium">Medium</option>
                        <option value="high">High</option>
                    </select>
                </div>
            </div>

            <!-- Period Filter -->
            <div class="mt-4 flex flex-col md:flex-row md:items-center gap-3">
                <span class="text-sm font-medium text-gray-700">Periode:</span>
                <div class="flex items-center gap-2">
                    <input
                        type="date"
                        wire:model.live="dateFrom"
                        max="{{ $dateTo ?: '' }}"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    >
                    <span class="text-sm text-gray-500">s/d</span>
                    <input
                        type="date"
                        wire:model.live="dateTo"
                        min="{{ $dateFrom ?: '' }}"
                        class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-indigo-500 focus:border-indigo-500"
                    >
                </div>
                @if($dateFrom || $dateTo)
                    <button
                        type="button"
                        wire:click="resetPeriod"
                        class="text-sm text-indigo-600 hover:text-indigo-800"
                    >
                        Reset periode
                    </button>
                @endif
            </div>
        </div>
    </div>

    <!-- Tickets Table -->
    <div class="bg-white rounded-lg shadow overflow-hidden">
        <div class="overflow-x-auto">
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left">
                            <button wire:click="sortBy('title')" class="group inline-flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700">
                                Ticket Info
                                @if($sortBy === 'title')
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
                            Submitter
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Division
                        </th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Type
                        </th>
                        <th scope="col" class="px-6 py-3 text-left">
                            <button wire:click="sortBy('status')" class="group inline-flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700">
                                Status
                                @if($sortBy === 'status')
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
                            <button wire:click="sortBy('priority')" class="group inline-flex items-center text-xs font-medium text-gray-500 uppercase tracking-wider hover:text-gray-700">
                                Priority
                                @if($sortBy === 'priority')
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
                                Created
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
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">
                            Actions
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @forelse($this->tickets as $ticket)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-start">
                                <div class="min-w-0 flex-1">
                                    <p class="text-sm font-medium text-gray-900 truncate">
                                        {{ Str::limit($ticket->title, 60) }}
                                    </p>
                                    <p class="text-sm text-gray-500 truncate mt-1">
                                        {{ Str::limit($ticket->description ?? 'No description', 80) }}
                                    </p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <span class="text-sm font-medium text-indigo-600">
                                        {{ strtoupper(substr($ticket->user->name ?? 'U', 0, 1)) }}
                                    </span>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm font-medium text-gray-900">{{ $ticket->user->name ?? 'Unknown' }}</p>
                                    <p class="text-xs text-gray-500">{{ $ticket->user->email ?? '-' }}</p>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="text-sm text-gray-900">{{ $ticket->division ?? '-' }}</div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @if($ticket->ticket_type)
                                <span class="inline-flex items-center px-2 py-0.5 rounded text-xs font-medium {{ $ticket->ticket_type === 'teknis' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                    {{ ucfirst($ticket->ticket_type) }}
                                </span>
                                @if($ticket->ticket_type === 'sistem' && $ticket->system_type)
                                    <span class="block text-xs text-gray-500 mt-0.5">{{ ucfirst($ticket->system_type) }}</span>
                                @endif
                            @else
                                <span class="text-sm text-gray-400">-</span>
                            @endif
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusConfig = [
                                    'open' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800', 'icon' => 'M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z'],
                                    'in_progress' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800', 'icon' => 'M13 10V3L4 14h7v7l9-11h-7z'],
                                    'closed' => ['bg' => 'bg-green-100', 'text' => 'text-green-800', 'icon' => 'M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z'],
                                ];
                                $config = $statusConfig[$ticket->status] ?? $statusConfig['open'];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                <svg class="-ml-0.5 mr-1.5 h-3 w-3" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="{{ $config['icon'] }}"/>
                                </svg>
                                {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $priorityConfig = [
                                    'high' => ['bg' => 'bg-red-100', 'text' => 'text-red-800'],
                                    'medium' => ['bg' => 'bg-orange-100', 'text' => 'text-orange-800'],
                                    'low' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800'],
                                ];
                                $pConfig = $priorityConfig[$ticket->priority] ?? $priorityConfig['medium'];
                            @endphp
                            <span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-medium {{ $pConfig['bg'] }} {{ $pConfig['text'] }}">
                                <span class="w-2 h-2 rounded-full bg-current mr-1.5"></span>
                                {{ ucfirst($ticket->priority) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            <div>
                                <p class="font-medium text-gray-900">{{ $ticket->created_at->format('M d, Y') }}</p>
                                <p class="text-xs">{{ $ticket->created_at->diffForHumans() }}</p>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
                            <div class="flex items-center justify-end gap-2">
                                <button 
                                    wire:click="viewDetail('{{ $ticket->_id }}')"
                                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-indigo-700 bg-indigo-100 hover:bg-indigo-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors"
                                >
                                    <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                </svg>
                                View
                            </button>
                            @auth
                                <button 
                                    wire:click="editTicket('{{ $ticket->_id }}')"
                                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-green-700 bg-green-100 hover:bg-green-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors"
                                >
                                    <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                    </svg>
                                    Update
                                </button>
                            @endauth
                            
                            <!-- Tombol Cetak Tanda Terima - Hanya tampil jika sudah dikonfirmasi -->
                            @if($ticket->status === 'closed' && $ticket->confirmed_at)
                                <a 
                                    href="{{ route('ticket.receipt', ['id' => $ticket->_id]) }}"
                                    target="_blank"
                                    class="inline-flex items-center px-3 py-1.5 border border-transparent text-xs font-medium rounded-md text-purple-700 bg-purple-100 hover:bg-purple-200 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-purple-500 transition-all transform hover:scale-105 shadow-sm"
                                    title="Cetak Tanda Terima"
                                >
                                    <svg class="-ml-0.5 mr-1.5 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 17h2a2 2 0 002-2v-4a2 2 0 00-2-2H5a2 2 0 00-2 2v4a2 2 0 002 2h2m2 4h6a2 2 0 002-2v-4a2 2 0 00-2-2H9a2 2 0 00-2 2v4a2 2 0 002 2zm8-12V5a2 2 0 00-2-2H9a2 2 0 00-2 2v4h10z"/>
                                    </svg>
                                    Cetak
                                </a>
                            @endif
                            </div>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="6" class="px-6 py-12 text-center">
                            <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                            </svg>
                            <h3 class="mt-2 text-sm font-medium text-gray-900">No tickets found</h3>
                            <p class="mt-1 text-sm text-gray-500">Try adjusting your search or filter to find what you're looking for.</p>
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination -->
        <div class="bg-white px-4 py-3 border-t border-gray-200 sm:px-6">
            {{ $this->tickets->links() }}
        </div>
    </div>

    <!-- Detail Modal -->
    @if($showDetailModal && $selectedTicket)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeModal"></div>
        
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal -->
            <div 
                class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full z-10"
            >
                <!-- Header -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-white">Ticket Details</h3>
                        {{-- <button type="button" wire:click="closeModal" class="text-white hover:text-gray-200 transition-colors focus:outline-none">
                            <svg class="h-6 w-6" wire:click="closeModal" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button> --}}
                    </div>
                </div>

                <!-- Body -->
                <div class="px-6 py-5 space-y-6">
                    <!-- Title -->
                    <div>
                        <h4 class="text-xl font-bold text-gray-900">{{ $selectedTicket->title }}</h4>
                    </div>

                    <!-- Meta Info Grid -->
                    <div class="grid grid-cols-2 gap-4">
                        <!-- Status -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Status</label>
                            @php
                                $statusConfig = [
                                    'open' => ['bg' => 'bg-yellow-100', 'text' => 'text-yellow-800'],
                                    'in_progress' => ['bg' => 'bg-blue-100', 'text' => 'text-blue-800'],
                                    'closed' => ['bg' => 'bg-green-100', 'text' => 'text-green-800'],
                                ];
                                $config = $statusConfig[$selectedTicket->status] ?? $statusConfig['open'];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $config['bg'] }} {{ $config['text'] }}">
                                {{ ucfirst(str_replace('_', ' ', $selectedTicket->status)) }}
                            </span>
                        </div>
                        
                        <!-- Priority -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Priority</label>
                            @php
                                $priorityConfig = [
                                    'high' => ['bg' => 'bg-red-100', 'text' => 'text-red-800'],
                                    'medium' => ['bg' => 'bg-orange-100', 'text' => 'text-orange-800'],
                                    'low' => ['bg' => 'bg-gray-100', 'text' => 'text-gray-800'],
                                ];
                                $pConfig = $priorityConfig[$selectedTicket->priority] ?? $priorityConfig['medium'];
                            @endphp
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $pConfig['bg'] }} {{ $pConfig['text'] }}">
                                {{ ucfirst($selectedTicket->priority) }}
                            </span>
                        </div>
                        
                        <!-- Division -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Division</label>
                            <p class="text-sm font-semibold text-gray-900">{{ $selectedTicket->division ?? '-' }}</p>
                        </div>
                        
                        <!-- Ticket Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Ticket Type</label>
                            @if($selectedTicket->ticket_type)
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium {{ $selectedTicket->ticket_type === 'teknis' ? 'bg-blue-100 text-blue-800' : 'bg-purple-100 text-purple-800' }}">
                                    {{ ucfirst($selectedTicket->ticket_type) }}
                                </span>
                            @else
                                <p class="text-sm text-gray-500">-</p>
                            @endif
                        </div>
                    </div>
                    
                    <!-- System Type (Conditional) -->
                    @if($selectedTicket->ticket_type === 'sistem' && $selectedTicket->system_type)
                    <div class="bg-purple-50 border border-purple-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">System Type</label>
                        <span class="inline-flex items-center px-3 py-1 rounded-full text-sm font-medium bg-purple-100 text-purple-800">
                            {{ ucfirst($selectedTicket->system_type) }}
                        </span>
                    </div>
                    @endif

                    <!-- Description -->
                    <div>
                        <label class="block text-sm font-medium text-gray-700 mb-2">Description</label>
                        <div class="bg-gray-50 rounded-lg p-4 text-sm text-gray-700 whitespace-pre-wrap">
                            {{ $selectedTicket->description ?? 'No description provided.' }}
                        </div>
                    </div>
                    
                    <!-- Attachment -->
                    @if($selectedTicket->attachment)
                    <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4 space-y-4">
                        <label class="block text-sm font-medium text-gray-700">
                            <svg class="inline-block w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                            </svg>
                            Attached Document
                        </label>
                        
                        @php
                            $extension = strtolower(pathinfo($selectedTicket->attachment, PATHINFO_EXTENSION));
                            $fileName = basename($selectedTicket->attachment);
                            $fileUrl = asset('storage/' . $selectedTicket->attachment);
                            $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                            $isPdf = $extension === 'pdf';
                        @endphp
                        
                        <!-- File Info Card -->
                        <div class="flex items-center gap-3 bg-white p-3 rounded-lg">
                            <!-- File Icon -->
                            <div class="flex-shrink-0">
                                @if($isImage)
                                    <svg class="w-8 h-8 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                    </svg>
                                @elseif($isPdf)
                                    <svg class="w-8 h-8 text-red-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                    </svg>
                                @else
                                    <svg class="w-8 h-8 text-gray-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                @endif
                            </div>
                            
                            <!-- File Info -->
                            <div class="flex-1 min-w-0">
                                <p class="text-sm font-medium text-gray-900 truncate">{{ $fileName }}</p>
                                <p class="text-xs text-gray-500 uppercase">{{ $extension }} File</p>
                            </div>
                            
                            <!-- Action Buttons -->
                            <div class="flex gap-2">
                                <a 
                                    href="{{ $fileUrl }}" 
                                    target="_blank"
                                    class="flex-shrink-0 inline-flex items-center px-3 py-2 border border-blue-300 rounded-lg text-sm font-medium text-blue-700 bg-white hover:bg-blue-50 transition-colors"
                                >
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M2.458 12C3.732 7.943 7.523 5 12 5c4.478 0 8.268 2.943 9.542 7-1.274 4.057-5.064 7-9.542 7-4.477 0-8.268-2.943-9.542-7z"/>
                                    </svg>
                                    View
                                </a>
                                <a 
                                    href="{{ $fileUrl }}" 
                                    download
                                    class="flex-shrink-0 inline-flex items-center px-3 py-2 border border-indigo-300 rounded-lg text-sm font-medium text-indigo-700 bg-white hover:bg-indigo-50 transition-colors"
                                >
                                    <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 10v6m0 0l-3-3m3 3l3-3m2 8H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                    </svg>
                                    Download
                                </a>
                            </div>
                        </div>
                        
                        <!-- Preview Section -->
                        @if($isImage)
                            <!-- Image Preview -->
                            <div class="bg-white rounded-lg p-3 border border-gray-200">
                                <p class="text-xs font-medium text-gray-600 mb-2">Preview:</p>
                                <div class="relative group">
                                    <img 
                                        src="{{ $fileUrl }}" 
                                        alt="{{ $fileName }}"
                                        class="w-full h-auto max-h-96 object-contain rounded-lg shadow-md cursor-pointer transition-transform hover:scale-[1.02]"
                                        onclick="window.open('{{ $fileUrl }}', '_blank')"
                                    >
                                    <div class="absolute inset-0 bg-black bg-opacity-0 group-hover:bg-opacity-10 transition-opacity rounded-lg flex items-center justify-center">
                                        <svg class="w-12 h-12 text-white opacity-0 group-hover:opacity-100 transition-opacity" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0zM10 7v3m0 0v3m0-3h3m-3 0H7"/>
                                        </svg>
                                    </div>
                                </div>
                                <p class="text-xs text-gray-500 mt-2 text-center">Click image to view in full size</p>
                            </div>
                        @elseif($isPdf)
                            <!-- PDF Preview -->
                            <div class="bg-white rounded-lg p-3 border border-gray-200">
                                <p class="text-xs font-medium text-gray-600 mb-2">PDF Preview:</p>
                                <div class="relative w-full overflow-hidden rounded-lg border border-gray-300" style="height: 600px;">
                                    <object 
                                        data="{{ $fileUrl }}#toolbar=0&navpanes=0&scrollbar=0" 
                                        type="application/pdf"
                                        class="w-full h-full"
                                        style="min-height: 600px;"
                                    >
                                        <!-- Fallback jika PDF tidak bisa ditampilkan -->
                                        <div class="flex flex-col items-center justify-center h-full bg-gray-50 text-gray-500 p-8">
                                            <svg class="w-16 h-16 mb-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                            </svg>
                                            <p class="text-sm font-medium text-gray-700 mb-2">Cannot preview PDF in this browser</p>
                                            <p class="text-xs text-gray-500 mb-4">Your browser does not support embedded PDFs</p>
                                            <a 
                                                href="{{ $fileUrl }}" 
                                                target="_blank" 
                                                class="inline-flex items-center px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors text-sm font-medium"
                                            >
                                                <svg class="w-4 h-4 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10 6H6a2 2 0 00-2 2v10a2 2 0 002 2h10a2 2 0 002-2v-4M14 4h6m0 0v6m0-6L10 14"/>
                                                </svg>
                                                Open in New Tab
                                            </a>
                                        </div>
                                    </object>
                                </div>
                                <p class="text-xs text-gray-500 mt-2 text-center">
                                    <a href="{{ $fileUrl }}" target="_blank" class="text-indigo-600 hover:text-indigo-800 underline">
                                        Click here to open PDF in new tab for better viewing
                                    </a>
                                </p>
                            </div>
                        @else
                            <!-- Other File Types -->
                            <div class="bg-white rounded-lg p-6 border border-gray-200 text-center">
                                <svg class="w-16 h-16 mx-auto mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <p class="text-sm text-gray-600">Preview not available for this file type</p>
                                <p class="text-xs text-gray-500 mt-1">Please download the file to view its contents</p>
                            </div>
                        @endif
                    </div>
                    @endif

                    <!-- Submitter Info -->
                    <div class="bg-gray-50 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">Submitted By</label>
                        <div class="flex items-center">
                            <div class="flex-shrink-0 h-10 w-10 bg-indigo-100 rounded-full flex items-center justify-center">
                                <span class="text-lg font-medium text-indigo-600">
                                    {{ strtoupper(substr($selectedTicket->user->name ?? 'U', 0, 1)) }}
                                </span>
                            </div>
                            <div class="ml-3">
                                <p class="text-sm font-medium text-gray-900">{{ $selectedTicket->user->name ?? 'Unknown User' }}</p>
                                <p class="text-sm text-gray-500">{{ $selectedTicket->user->email ?? 'No email' }}</p>
                            </div>
                        </div>
                    </div>

                    @if($selectedTicket->submitter_name || $selectedTicket->submitter_email)
                    <!-- Actual Submitter Info -->
                    <div class="bg-blue-50 border-2 border-blue-200 rounded-lg p-4">
                        <label class="block text-sm font-semibold text-blue-700 mb-3 flex items-center gap-2">
                            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                            </svg>
                            Diajukan Atas Nama
                        </label>
                        <div class="grid grid-cols-1 md:grid-cols-2 gap-3">
                            @if($selectedTicket->submitter_name)
                            <div class="flex items-center gap-2">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-200 rounded-full flex items-center justify-center">
                                    <span class="text-sm font-semibold text-blue-700">
                                        {{ strtoupper(substr($selectedTicket->submitter_name, 0, 1)) }}
                                    </span>
                                </div>
                                <div>
                                    <p class="text-xs text-blue-600">Nama Pengaju:</p>
                                    <p class="text-sm font-bold text-blue-900">{{ $selectedTicket->submitter_name }}</p>
                                </div>
                            </div>
                            @endif
                            @if($selectedTicket->submitter_email)
                            <div class="flex items-center gap-2">
                                <div class="flex-shrink-0 w-8 h-8 bg-blue-200 rounded-full flex items-center justify-center">
                                    <svg class="w-4 h-4 text-blue-700" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                </div>
                                <div>
                                    <p class="text-xs text-blue-600">Email Pengaju:</p>
                                    <p class="text-sm font-bold text-blue-900 break-all">{{ $selectedTicket->submitter_email }}</p>
                                </div>
                            </div>
                            @endif
                        </div>
                    </div>
                    @endif

                    <!-- Timestamps -->
                    <div class="grid grid-cols-2 gap-4 text-sm">
                        <div>
                            <label class="block text-gray-500 font-medium">Created At</label>
                            <p class="text-gray-900 mt-1">{{ $selectedTicket->created_at->format('M d, Y h:i A') }}</p>
                            <p class="text-gray-500 text-xs">{{ $selectedTicket->created_at->diffForHumans() }}</p>
                        </div>
                        <div>
                            <label class="block text-gray-500 font-medium">Last Updated</label>
                            <p class="text-gray-900 mt-1">{{ $selectedTicket->updated_at->format('M d, Y h:i A') }}</p>
                            <p class="text-gray-500 text-xs">{{ $selectedTicket->updated_at->diffForHumans() }}</p>
                        </div>
                    </div>

                    <!-- Confirmation Status -->
                    @if($selectedTicket->isConfirmed())
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="h-5 w-5 text-green-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div class="ml-3 flex-1">
                                    <h4 class="text-sm font-semibold text-green-800">Tiket Telah Dikonfirmasi</h4>
                                    <p class="text-sm text-green-700 mt-1">
                                        Dikonfirmasi oleh: <strong>{{ $selectedTicket->confirmation_signature }}</strong>
                                    </p>
                                    <p class="text-xs text-green-600 mt-1">
                                        Pada: {{ $selectedTicket->confirmed_at->format('d M Y, H:i') }}
                                    </p>
                                    @if($selectedTicket->confirmation_notes)
                                        <p class="text-sm text-green-700 mt-2 pt-2 border-t border-green-200">
                                            <strong>Catatan:</strong> {{ $selectedTicket->confirmation_notes }}
                                        </p>
                                    @endif
                                </div>
                            </div>
                        </div>
                    @elseif($selectedTicket->confirmation_sent_at)
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4">
                            <div class="flex items-start">
                                <svg class="h-5 w-5 text-blue-600 mt-0.5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <div class="ml-3">
                                    <h4 class="text-sm font-semibold text-blue-800">Email Konfirmasi Telah Dikirim</h4>
                                    <p class="text-xs text-blue-600 mt-1">
                                        Dikirim pada: {{ $selectedTicket->confirmation_sent_at->format('d M Y, H:i') }}
                                    </p>
                                    <p class="text-sm text-blue-700 mt-1">
                                        Menunggu konfirmasi dari pengguna...
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif

                    <!-- Flash Messages -->
                    @if(session()->has('success'))
                        <div class="bg-green-50 border border-green-200 rounded-lg p-4" x-data="{ show: true }" x-show="show" x-init="setTimeout(() => show = false, 5000)">
                            <div class="flex items-start">
                                <svg class="h-5 w-5 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                </svg>
                                <p class="ml-3 text-sm font-medium text-green-800">{{ session('success') }}</p>
                            </div>
                        </div>
                    @endif

                    @if(session()->has('error'))
                        <div class="bg-red-50 border border-red-200 rounded-lg p-4" x-data="{ show: true }" x-show="show">
                            <div class="flex items-start">
                                <svg class="h-5 w-5 text-red-600" fill="currentColor" viewBox="0 0 20 20">
                                    <path fill-rule="evenodd" d="M10 18a8 8 0 100-16 8 8 0 000 16zM8.707 7.293a1 1 0 00-1.414 1.414L8.586 10l-1.293 1.293a1 1 0 101.414 1.414L10 11.414l1.293 1.293a1 1 0 001.414-1.414L11.414 10l1.293-1.293a1 1 0 00-1.414-1.414L10 8.586 8.707 7.293z" clip-rule="evenodd"/>
                                </svg>
                                <p class="ml-3 text-sm font-medium text-red-800">{{ session('error') }}</p>
                            </div>
                        </div>
                    @endif
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 px-6 py-4 flex justify-between gap-3">
                    <div class="flex gap-2">
                        <button 
                            type="button"
                            wire:click="closeModal"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors"
                        >
                            Close
                        </button>
                    </div>
                    
                    <div class="flex gap-2">
                        @auth
                            @if(!$selectedTicket->isConfirmed())
                                <button 
                                    type="button"
                                    wire:loading.attr="disabled"
                                    wire:click="sendConfirmationEmail('{{ $selectedTicket->_id }}')"
                                    wire:target="sendConfirmationEmail"
                                    class="inline-flex items-center px-4 py-2 border border-blue-300 bg-blue-100 hover:bg-blue-200 rounded-lg text-sm font-medium text-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-blue-500 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed"
                                    @if($selectedTicket->submitter_email && $selectedTicket->submitter_email !== $selectedTicket->user->email)
                                    title="Email akan dikirim ke: {{ $selectedTicket->user->email }} dan {{ $selectedTicket->submitter_email }}"
                                    @else
                                    title="Kirim email konfirmasi penutupan tiket ke {{ $selectedTicket->user->email }}"
                                    @endif
                                >
                                    <svg wire:loading.remove wire:target="sendConfirmationEmail" class="-ml-0.5 mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
                                    </svg>
                                    <svg wire:loading.class.remove="hidden" wire:target="sendConfirmationEmail" class="hidden animate-spin -ml-0.5 mr-2 h-4 w-4" fill="none" viewBox="0 0 24 24">
                                        <circle class="opacity-25" cx="12" cy="12" r="10" stroke="currentColor" stroke-width="4"></circle>
                                        <path class="opacity-75" fill="currentColor" d="M4 12a8 8 0 018-8V0C5.373 0 0 5.373 0 12h4zm2 5.291A7.962 7.962 0 014 12H0c0 3.042 1.135 5.824 3 7.938l3-2.647z"></path>
                                    </svg>
                                    <span wire:loading.remove wire:target="sendConfirmationEmail">
                                        {{ $selectedTicket->confirmation_sent_at ? 'Kirim Ulang Email' : 'Kirim Email Konfirmasi' }}
                                        @if($selectedTicket->submitter_email && $selectedTicket->submitter_email !== $selectedTicket->user->email)
                                            <span class="ml-1 text-xs">(2 penerima)</span>
                                        @endif
                                    </span>
                                    <span wire:loading.class.remove="hidden" wire:target="sendConfirmationEmail" class="hidden">Mengirim...</span>
                                </button>
                            @endif
                            
                            <button 
                                type="button"
                                wire:click="editTicket('{{ $selectedTicket->_id }}')"
                                class="inline-flex items-center px-4 py-2 border border-green-700 bg-green-100 hover:bg-green-200 rounded-lg text-sm font-medium text-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors shadow-sm"
                            >
                                <svg class="-ml-0.5 mr-2 h-4 w-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z"/>
                                </svg>
                                Update Ticket
                            </button>
                        @endauth
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endif

    <!-- Edit Modal -->
    @if($showEditModal && $editingTicket)
    <div class="fixed inset-0 z-50 overflow-y-auto" aria-labelledby="modal-title" role="dialog" aria-modal="true">
        <!-- Overlay -->
        <div class="fixed inset-0 bg-gray-500 bg-opacity-75 transition-opacity" wire:click="closeEditModal"></div>
        
        <div class="flex items-center justify-center min-h-screen pt-4 px-4 pb-20 text-center sm:block sm:p-0">
            <!-- This element is to trick the browser into centering the modal contents. -->
            <span class="hidden sm:inline-block sm:align-middle sm:h-screen" aria-hidden="true">&#8203;</span>

            <!-- Modal -->
            <div 
                class="relative inline-block align-bottom bg-white rounded-lg text-left overflow-hidden shadow-xl transform transition-all sm:my-8 sm:align-middle sm:max-w-2xl sm:w-full z-10"
            >
                <!-- Header -->
                <div class="bg-gradient-to-r from-indigo-600 to-purple-600 px-6 py-4">
                    <div class="flex items-center justify-between">
                        <h3 class="text-lg font-semibold text-white">Update Ticket</h3>
                    </div>
                </div>

                <!-- Body -->
                <form wire:submit="updateTicket">
                    <div class="px-6 py-5 space-y-6">
                        <!-- Title -->
                        <div>
                            <label for="edit_title" class="block text-sm font-medium text-gray-700 mb-2">
                                Title <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="edit_title"
                                wire:model="editForm.title"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('editForm.title') border-red-500 @enderror"
                                placeholder="Enter ticket title"
                            >
                            @error('editForm.title')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Division -->
                        <div>
                            <label for="edit_division" class="block text-sm font-medium text-gray-700 mb-2">
                                Division <span class="text-red-500">*</span>
                            </label>
                            <input 
                                type="text" 
                                id="edit_division"
                                wire:model="editForm.division"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('editForm.division') border-red-500 @enderror"
                                placeholder="e.g., IT, Finance, HR"
                            >
                            @error('editForm.division')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>
                        
                        <!-- Ticket Type & System Type -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="edit_ticket_type" class="block text-sm font-medium text-gray-700 mb-2">
                                    Ticket Type <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="edit_ticket_type"
                                    wire:model.live="editForm.ticket_type"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('editForm.ticket_type') border-red-500 @enderror"
                                >
                                    <option value="">Select Type</option>
                                    <option value="teknis">Teknis</option>
                                    <option value="sistem">Sistem</option>
                                </select>
                                @error('editForm.ticket_type')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            
                            @if(isset($editForm['ticket_type']) && $editForm['ticket_type'] === 'sistem')
                            <div>
                                <label for="edit_system_type" class="block text-sm font-medium text-gray-700 mb-2">
                                    System Type <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="edit_system_type"
                                    wire:model="editForm.system_type"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('editForm.system_type') border-red-500 @enderror"
                                >
                                    <option value="">Select System Type</option>
                                    <option value="baru">Baru</option>
                                    <option value="perubahan">Perubahan</option>
                                    <option value="penambahan">Penambahan</option>
                                </select>
                                @error('editForm.system_type')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                            @endif
                        </div>

                        <!-- Description -->
                        <div>
                            <label for="edit_description" class="block text-sm font-medium text-gray-700 mb-2">
                                Description <span class="text-red-500">*</span>
                            </label>
                            <textarea 
                                id="edit_description"
                                wire:model="editForm.description"
                                rows="5"
                                class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('editForm.description') border-red-500 @enderror"
                                placeholder="Describe your ticket in detail..."
                            ></textarea>
                            @error('editForm.description')
                                <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                            @enderror
                        </div>

                        <!-- Priority and Status -->
                        <div class="grid grid-cols-2 gap-4">
                            <div>
                                <label for="edit_priority" class="block text-sm font-medium text-gray-700 mb-2">
                                    Priority <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="edit_priority"
                                    wire:model="editForm.priority"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('editForm.priority') border-red-500 @enderror"
                                >
                                    <option value="low">Low</option>
                                    <option value="medium">Medium</option>
                                    <option value="high">High</option>
                                </select>
                                @error('editForm.priority')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>

                            <div>
                                <label for="edit_status" class="block text-sm font-medium text-gray-700 mb-2">
                                    Status <span class="text-red-500">*</span>
                                </label>
                                <select 
                                    id="edit_status"
                                    wire:model="editForm.status"
                                    class="block w-full px-3 py-2 border border-gray-300 rounded-lg focus:ring-2 focus:ring-green-500 focus:border-green-500 @error('editForm.status') border-red-500 @enderror"
                                >
                                    <option value="open">Open</option>
                                    <option value="in_progress">In Progress</option>
                                    <option value="closed">Closed</option>
                                </select>
                                @error('editForm.status')
                                    <p class="mt-1 text-sm text-red-600">{{ $message }}</p>
                                @enderror
                            </div>
                        </div>
                        
                        <!-- Existing Attachment Info (Read-only) -->
                        @if(isset($editForm['attachment']) && $editForm['attachment'])
                        <div class="bg-blue-50 border border-blue-200 rounded-lg p-4 space-y-3">
                            <label class="block text-sm font-medium text-gray-700">
                                <svg class="inline-block w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                                </svg>
                                Current Attachment
                            </label>
                            
                            @php
                                $extension = strtolower(pathinfo($editForm['attachment'], PATHINFO_EXTENSION));
                                $fileName = basename($editForm['attachment']);
                                $fileUrl = asset('storage/' . $editForm['attachment']);
                                $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                                $isPdf = $extension === 'pdf';
                            @endphp
                            
                            <!-- File Info -->
                            <div class="flex items-center gap-2 bg-white p-3 rounded-lg">
                                <svg class="w-5 h-5 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
                                </svg>
                                <span class="truncate text-sm text-gray-900 font-medium flex-1">{{ $fileName }}</span>
                                <a 
                                    href="{{ $fileUrl }}" 
                                    target="_blank"
                                    class="text-blue-600 hover:text-blue-800 text-sm font-medium underline"
                                >
                                    View
                                </a>
                            </div>
                            
                            <!-- Preview -->
                            @if($isImage)
                                <div class="bg-white p-2 rounded-lg">
                                    <img 
                                        src="{{ $fileUrl }}" 
                                        alt="{{ $fileName }}"
                                        class="w-full h-auto max-h-48 object-contain rounded-lg cursor-pointer"
                                        onclick="window.open('{{ $fileUrl }}', '_blank')"
                                    >
                                </div>
                            @elseif($isPdf)
                                <div class="bg-white rounded-lg border border-gray-300 overflow-hidden" style="height: 320px;">
                                    <object 
                                        data="{{ $fileUrl }}#toolbar=0&navpanes=0&scrollbar=0" 
                                        type="application/pdf"
                                        class="w-full h-full"
                                        style="min-height: 320px;"
                                    >
                                        <!-- Fallback -->
                                        <div class="flex flex-col items-center justify-center h-full bg-gray-50 p-4">
                                            <svg class="w-12 h-12 mb-3 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M7 21h10a2 2 0 002-2V9.414a1 1 0 00-.293-.707l-5.414-5.414A1 1 0 0012.586 3H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                                            </svg>
                                            <p class="text-xs text-gray-600 mb-2">PDF preview not available</p>
                                            <a href="{{ $fileUrl }}" target="_blank" class="text-xs text-indigo-600 hover:text-indigo-800 underline">
                                                Open in new tab
                                            </a>
                                        </div>
                                    </object>
                                </div>
                            @endif
                            
                            <p class="text-xs text-blue-600">📌 Attachment cannot be changed. Create a new ticket to upload different file.</p>
                        </div>
                        @endif

                        <!-- Success Message -->
                        @if($updateSuccess)
                            <div class="rounded-lg bg-green-50 p-4">
                                <div class="flex">
                                    <div class="flex-shrink-0">
                                        <svg class="h-5 w-5 text-green-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z"/>
                                        </svg>
                                    </div>
                                    <div class="ml-3">
                                        <p class="text-sm font-medium text-green-800">Ticket updated successfully!</p>
                                    </div>
                                </div>
                            </div>
                        @endif
                    </div>

                    <!-- Footer -->
                    <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3">
                        <button 
                            type="button"
                            wire:click="closeEditModal"
                            class="px-4 py-2 border border-gray-300 rounded-lg text-sm font-medium text-gray-700 bg-white hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors"
                        >
                            Cancel
                        </button>
                        <button 
                            type="submit"
                            wire:loading.attr="disabled"
                            class="px-4 py-2 border border-green-300 bg-green-100 hover:bg-green-200 rounded-lg text-sm font-medium text-green-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-green-500 transition-colors shadow-sm disabled:opacity-50 disabled:cursor-not-allowed"
                        >
                            <span wire:loading.remove>Save Changes</span>
                            <span wire:loading>Saving...</span>
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endif
</div>

@script
<script>
    $wire.on('ticket-updated', () => {
        setTimeout(() => {
            $wire.closeEditModal();
        }, 1500);
    });

    $wire.on('confirmation-sent', () => {
        // Refresh the ticket data to show updated confirmation status
        setTimeout(() => {
            $wire.$refresh();
        }, 2000);
    });
</script>
@endscript
