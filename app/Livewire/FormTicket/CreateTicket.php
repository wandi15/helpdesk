<?php

namespace App\Livewire\FormTicket;

use App\Models\Ticket;
use App\Models\User;
use Livewire\Component;
use Livewire\Attributes\Validate;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

class CreateTicket extends Component
{
    #[Validate('required|min:2')]
    public $name = '';
    
    #[Validate('required|email')]
    public $email = '';
    
    #[Validate('required|min:2')]
    public $division = '';
    
    public $submitterName = '';
    public $submitterEmail = '';
    
    #[Validate('required|min:5|max:255')]
    public $title = '';
    
    #[Validate('required|in:teknis,sistem')]
    public $ticketType = '';
    
    public $systemType = '';
    
    #[Validate('required|in:low,medium,high')]
    public $priority = 'medium';
    
    #[Validate('required|min:10')]
    public $description = '';
    
    public $attachment = null;
    public $attachmentData = null;
    
    public $successMessage = '';
    public $uploadError = '';
    
    public $isAuthenticated = false;
    public $userRole = null;

    public function mount()
    {
        if (Auth::check()) {
            $this->isAuthenticated = true;
            $this->name = Auth::user()->name;
            $this->email = Auth::user()->email;
            $this->userRole = Auth::user()->role ?? null;
        }
    }

    public function setAttachment($fileData)
    {
        try {
            $this->attachmentData = $fileData;
            $this->uploadError = '';
            
            Log::info('File attachment set:', [
                'name' => $fileData['name'] ?? 'unknown',
                'size' => $fileData['size'] ?? 0,
                'type' => $fileData['type'] ?? 'unknown'
            ]);
        } catch (\Exception $e) {
            $this->uploadError = 'Gagal menyimpan file: ' . $e->getMessage();
            Log::error('File attachment error:', ['error' => $e->getMessage()]);
        }
    }
    
    public function clearAttachment()
    {
        $this->attachmentData = null;
        $this->attachment = null;
        $this->uploadError = '';
    }

    public function rules()
    {
        $rules = [
            'name' => 'required|min:2',
            'email' => 'required|email',
            'division' => 'required|min:2',
            'submitterName' => 'nullable|min:2',
            'submitterEmail' => 'nullable|email',
            'title' => 'required|min:5|max:255',
            'ticketType' => 'required|in:teknis,sistem',
            'priority' => 'required|in:low,medium,high',
            'description' => 'required|min:10',
        ];

        // Add systemType validation if ticketType is 'sistem'
        if ($this->ticketType === 'sistem') {
            $rules['systemType'] = 'required|in:baru,perubahan,penambahan';
        }

        return $rules;
    }

    public function messages()
    {
        return [
            'name.required' => 'Nama wajib diisi.',
            'email.required' => 'Email wajib diisi.',
            'division.required' => 'Divisi wajib diisi.',
            'submitterName.min' => 'Nama pengaju minimal 2 karakter.',
            'submitterEmail.email' => 'Format email pengaju tidak valid.',
            'title.required' => 'Judul tiket wajib diisi.',
            'ticketType.required' => 'Pilih jenis tiket.',
            'systemType.required' => 'Jenis sistem wajib dipilih.',
            'priority.required' => 'Prioritas wajib dipilih.',
            'description.required' => 'Deskripsi wajib diisi.',
            'description.min' => 'Deskripsi minimal 10 karakter.',
        ];
    }

    public function submit()
    {
        $this->validate();

        // Find or create user
        $user = User::firstOrCreate(
            ['email' => $this->email],
            ['name' => $this->name, 'password' => bcrypt(str()->random(16))]
        );

        // Handle file upload from base64
        $attachmentPath = null;
        if ($this->attachmentData && isset($this->attachmentData['data'])) {
            try {
                // Extract base64 data
                $base64File = $this->attachmentData['data'];
                $fileName = $this->attachmentData['name'];
                
                // Remove base64 prefix (data:image/png;base64,)
                if (strpos($base64File, 'base64,') !== false) {
                    $base64File = explode('base64,', $base64File)[1];
                }
                
                // Decode base64
                $fileContent = base64_decode($base64File);
                
                // Generate unique filename
                $extension = pathinfo($fileName, PATHINFO_EXTENSION);
                $uniqueFileName = time() . '_' . uniqid() . '.' . $extension;
                
                // Save to storage
                $attachmentPath = 'attachments/' . $uniqueFileName;
                Storage::disk('public')->put($attachmentPath, $fileContent);
                
                Log::info('File saved successfully:', ['path' => $attachmentPath]);
            } catch (\Exception $e) {
                Log::error('File save error:', ['error' => $e->getMessage()]);
                $this->uploadError = 'Gagal menyimpan file: ' . $e->getMessage();
                return;
            }
        }

        // Create ticket
        $ticketData = [
            'title' => $this->title,
            'description' => $this->description,
            'priority' => $this->priority,
            'status' => 'open',
            'user_id' => $user->_id,
            'division' => $this->division,
            'ticket_type' => $this->ticketType,
        ];

        // Add systemType if ticketType is 'sistem'
        if ($this->ticketType === 'sistem') {
            $ticketData['system_type'] = $this->systemType;
        }

        // Add attachment path if exists
        if ($attachmentPath) {
            $ticketData['attachment'] = $attachmentPath;
        }

        // Add submitter info if provided
        if (!empty($this->submitterName)) {
            $ticketData['submitter_name'] = $this->submitterName;
        }
        if (!empty($this->submitterEmail)) {
            $ticketData['submitter_email'] = $this->submitterEmail;
        }

        Ticket::create($ticketData);

        // Show success message
        $this->successMessage = 'Tiket Anda telah berhasil dikirim! Kami akan segera menindaklanjutinya.';
        
        // Reset form (keep name, email, division for authenticated users)
        if ($this->isAuthenticated) {
            $this->reset(['title', 'description', 'ticketType', 'systemType', 'submitterName', 'submitterEmail', 'attachmentData']);
        } else {
            $this->reset(['title', 'description', 'priority', 'email', 'name', 'division', 'ticketType', 'systemType', 'submitterName', 'submitterEmail', 'attachmentData']);
        }
        $this->priority = 'medium';
        
        Log::info('Ticket created successfully');
    }

    public function render()
    {
        return view('livewire.form-ticket.create-ticket');
    }
}
