<div>
    <!-- Stats Grid -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6 mb-8">
        <!-- Total Tickets -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Total Tickets</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $this->stats['total'] }}</p>
                    </div>
                    <div class="bg-indigo-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-indigo-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-indigo-50 px-6 py-3">
                <span class="text-xs text-indigo-600 font-medium">All time</span>
            </div>
        </div>

        <!-- Open Tickets -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Open Tickets</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $this->stats['open'] }}</p>
                    </div>
                    <div class="bg-yellow-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-yellow-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-yellow-50 px-6 py-3">
                <span class="text-xs text-yellow-600 font-medium">Awaiting response</span>
            </div>
        </div>

        <!-- In Progress -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">In Progress</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $this->stats['in_progress'] }}</p>
                    </div>
                    <div class="bg-blue-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-blue-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-blue-50 px-6 py-3">
                <span class="text-xs text-blue-600 font-medium">Being worked on</span>
            </div>
        </div>

        <!-- Closed Tickets -->
        <div class="bg-white rounded-xl shadow-sm hover:shadow-lg transition-shadow duration-300 overflow-hidden">
            <div class="p-6">
                <div class="flex items-center justify-between">
                    <div>
                        <p class="text-sm font-medium text-gray-600">Closed</p>
                        <p class="text-3xl font-bold text-gray-900 mt-2">{{ $this->stats['closed'] }}</p>
                    </div>
                    <div class="bg-green-100 rounded-full p-3">
                        <svg class="w-8 h-8 text-green-600" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />
                        </svg>
                    </div>
                </div>
            </div>
            <div class="bg-green-50 px-6 py-3">
                <span class="text-xs text-green-600 font-medium">Resolved</span>
            </div>
        </div>
    </div>

    <!-- Recent Tickets Table -->
    <div class="bg-white rounded-xl shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-gray-200 flex items-center justify-between">
            <div>
                <h3 class="text-lg font-semibold text-gray-900">Recent Tickets</h3>
                <p class="text-sm text-gray-500 mt-1">Latest support requests and their status</p>
            </div>
            <div class="flex gap-2">
                <button wire:click="$set('statusFilter', 'all')" class="px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ $statusFilter === 'all' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    All
                </button>
                <button wire:click="$set('statusFilter', 'open')" class="px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ $statusFilter === 'open' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Open
                </button>
                <button wire:click="$set('statusFilter', 'in_progress')" class="px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ $statusFilter === 'in_progress' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    In Progress
                </button>
                <button wire:click="$set('statusFilter', 'closed')" class="px-4 py-2 text-sm font-medium rounded-lg transition-colors {{ $statusFilter === 'closed' ? 'bg-indigo-600 text-white' : 'bg-gray-100 text-gray-700 hover:bg-gray-200' }}">
                    Closed
                </button>
            </div>
        </div>

        <div class="overflow-x-auto">
            @if($this->recentTickets->count() > 0)
            <table class="min-w-full divide-y divide-gray-200">
                <thead class="bg-gray-50">
                    <tr>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Ticket</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Submitter</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Status</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Priority</th>
                        <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">Created</th>
                        <th scope="col" class="px-6 py-3 text-right text-xs font-medium text-gray-500 uppercase tracking-wider">Actions</th>
                    </tr>
                </thead>
                <tbody class="bg-white divide-y divide-gray-200">
                    @foreach($this->recentTickets as $ticket)
                    <tr class="hover:bg-gray-50 transition-colors">
                        <td class="px-6 py-4">
                            <div class="flex items-center">
                                <div>
                                    <div class="text-sm font-medium text-gray-900">{{ Str::limit($ticket->title, 50) }}</div>
                                    <div class="text-sm text-gray-500">{{ Str::limit($ticket->description ?? 'No description', 60) }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            <div class="flex items-center">
                                <div class="flex-shrink-0 h-8 w-8 bg-indigo-100 rounded-full flex items-center justify-center">
                                    <span class="text-xs font-semibold text-indigo-600">
                                        {{ strtoupper(substr($ticket->user->name ?? 'U', 0, 2)) }}
                                    </span>
                                </div>
                                <div class="ml-3">
                                    <div class="text-sm font-medium text-gray-900">{{ $ticket->user->name ?? 'Unknown' }}</div>
                                    <div class="text-xs text-gray-500">{{ $ticket->user->email ?? '-' }}</div>
                                </div>
                            </div>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $statusColors = [
                                    'open' => 'bg-yellow-100 text-yellow-800',
                                    'in_progress' => 'bg-blue-100 text-blue-800',
                                    'closed' => 'bg-green-100 text-green-800',
                                ];
                                $statusColor = $statusColors[$ticket->status] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $statusColor }}">
                                {{ ucfirst(str_replace('_', ' ', $ticket->status)) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap">
                            @php
                                $priorityColors = [
                                    'high' => 'bg-red-100 text-red-800',
                                    'medium' => 'bg-orange-100 text-orange-800',
                                    'low' => 'bg-gray-100 text-gray-800',
                                ];
                                $priorityColor = $priorityColors[$ticket->priority] ?? 'bg-gray-100 text-gray-800';
                            @endphp
                            <span class="px-3 py-1 inline-flex text-xs leading-5 font-semibold rounded-full {{ $priorityColor }}">
                                {{ ucfirst($ticket->priority) }}
                            </span>
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                            {{ $ticket->created_at->diffForHumans() }}
                        </td>
                        <td class="px-6 py-4 whitespace-nowrap text-right text-sm font-medium">
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
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            @else
            <div class="text-center py-12">
                <svg class="mx-auto h-12 w-12 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z" />
                </svg>
                <h3 class="mt-2 text-sm font-medium text-gray-900">No tickets found</h3>
                <p class="mt-1 text-sm text-gray-500">Get started by creating a new ticket.</p>
                <div class="mt-6">
                    <button type="button" class="inline-flex items-center px-4 py-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 transition-colors">
                        <svg class="-ml-1 mr-2 h-5 w-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4" />
                        </svg>
                        New Ticket
                    </button>
                </div>
            </div>
            @endif
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
                        <button type="button" wire:click="closeModal" class="text-white hover:text-gray-200 transition-colors focus:outline-none">
                            <svg class="h-6 w-6" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
                            </svg>
                        </button>
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
                        
                        <!-- Submitter -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Submitter</label>
                            <p class="text-sm font-semibold text-gray-900">{{ $selectedTicket->user->name ?? 'Unknown' }}</p>
                            <p class="text-xs text-gray-500">{{ $selectedTicket->user->email ?? '-' }}</p>
                        </div>

                        @if($selectedTicket->submitter_name || $selectedTicket->submitter_email)
                        <!-- Actual Submitter (if different) -->
                        <div class="md:col-span-2">
                            <div class="bg-blue-50 border border-blue-200 rounded-lg p-3">
                                <label class="block text-sm font-medium text-blue-700 mb-2 flex items-center gap-2">
                                    <svg class="w-4 h-4" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z"/>
                                    </svg>
                                    Diajukan Atas Nama
                                </label>
                                <div class="grid grid-cols-1 md:grid-cols-2 gap-2">
                                    @if($selectedTicket->submitter_name)
                                    <div>
                                        <p class="text-xs text-blue-600">Nama:</p>
                                        <p class="text-sm font-semibold text-blue-900">{{ $selectedTicket->submitter_name }}</p>
                                    </div>
                                    @endif
                                    @if($selectedTicket->submitter_email)
                                    <div>
                                        <p class="text-xs text-blue-600">Email:</p>
                                        <p class="text-sm font-semibold text-blue-900">{{ $selectedTicket->submitter_email }}</p>
                                    </div>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @endif
                        
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

                        <!-- Created At -->
                        <div>
                            <label class="block text-sm font-medium text-gray-500 mb-1">Created</label>
                            <p class="text-sm font-semibold text-gray-900">{{ $selectedTicket->created_at->format('M d, Y H:i') }}</p>
                            <p class="text-xs text-gray-500">{{ $selectedTicket->created_at->diffForHumans() }}</p>
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
                    <div class="bg-indigo-50 border border-indigo-200 rounded-lg p-4">
                        <label class="block text-sm font-medium text-gray-700 mb-2">
                            <svg class="inline-block w-5 h-5 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15.172 7l-6.586 6.586a2 2 0 102.828 2.828l6.414-6.586a4 4 0 00-5.656-5.656l-6.415 6.585a6 6 0 108.486 8.486L20.5 13"/>
                            </svg>
                            Attachment
                        </label>
                        
                        @php
                            $extension = strtolower(pathinfo($selectedTicket->attachment, PATHINFO_EXTENSION));
                            $fileName = basename($selectedTicket->attachment);
                            $fileUrl = asset('storage/' . $selectedTicket->attachment);
                            $isImage = in_array($extension, ['jpg', 'jpeg', 'png', 'gif', 'webp']);
                        @endphp
                        
                        @if($isImage)
                            <div class="mt-2">
                                <img src="{{ $fileUrl }}" alt="Attachment" class="rounded-lg max-w-full h-auto">
                            </div>
                        @endif
                        
                        <a href="{{ $fileUrl }}" target="_blank" class="mt-2 inline-flex items-center text-indigo-600 hover:text-indigo-800">
                            <svg class="w-4 h-4 mr-1" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"/>
                            </svg>
                            Download {{ $fileName }}
                        </a>
                    </div>
                    @endif
                </div>

                <!-- Footer -->
                <div class="bg-gray-50 px-6 py-4 flex justify-end gap-3">
                    <button 
                        type="button"
                        wire:click="closeModal"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-gray-700 bg-white border border-gray-300 rounded-md hover:bg-gray-50 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        Close
                    </button>
                    <a 
                        href="{{ route('tickets') }}"
                        class="inline-flex justify-center px-4 py-2 text-sm font-medium text-white bg-indigo-600 border border-transparent rounded-md hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500"
                    >
                        View All Tickets
                    </a>
                </div>
            </div>
        </div>
    </div>
    @endif
</div>
