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
                            <button class="text-indigo-600 hover:text-indigo-900 transition-colors">View</button>
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
</div>
