<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Livewire\Component;
use Livewire\WithPagination;
use Livewire\Attributes\Computed;
use Livewire\Attributes\Url;

class UserManagement extends Component
{
    use WithPagination;

    #[Url(keep: true)]
    public $search = '';
    
    #[Url(keep: true)]
    public $sortBy = 'created_at';
    
    #[Url(keep: true)]
    public $sortDirection = 'desc';
    
    public $perPage = 15;
    
    // Modal Properties
    public $showModal = false;
    public $editingUser = null;
    public $isEditing = false;
    public $updateSuccess = false;
    
    public $userForm = [
        'name' => '',
        'email' => '',
        'password' => '',
        'password_confirmation' => '',
        'role' => 'operasional',
    ];

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function sortBy($field)
    {
        if ($this->sortBy === $field) {
            $this->sortDirection = $this->sortDirection === 'asc' ? 'desc' : 'asc';
        } else {
            $this->sortBy = $field;
            $this->sortDirection = 'asc';
        }
    }

    public function createUser()
    {
        $this->reset(['userForm', 'editingUser', 'isEditing', 'updateSuccess']);
        $this->showModal = true;
    }

    public function editUser($userId)
    {
        $this->editingUser = User::find($userId);
        
        if ($this->editingUser) {
            $this->userForm = [
                'name' => $this->editingUser->name,
                'email' => $this->editingUser->email,
                'password' => '',
                'password_confirmation' => '',
                'role' => $this->editingUser->role ?? 'operasional',
            ];
            
            $this->isEditing = true;
            $this->showModal = true;
            $this->updateSuccess = false;
        }
    }

    public function saveUser()
    {
        if ($this->isEditing) {
            $rules = [
                'userForm.name' => 'required|min:3|max:255',
                'userForm.email' => 'required|email|unique:users,email,' . $this->editingUser->_id . ',_id',
                'userForm.role' => 'required|in:administrator,admin,operasional',
            ];
            
            // Only validate password if it's being changed
            if (!empty($this->userForm['password'])) {
                $rules['userForm.password'] = 'required|min:8|confirmed';
            }
        } else {
            $rules = [
                'userForm.name' => 'required|min:3|max:255',
                'userForm.email' => 'required|email|unique:users,email',
                'userForm.password' => 'required|min:8|confirmed',
                'userForm.role' => 'required|in:administrator,admin,operasional',
            ];
        }

        $this->validate($rules, [
            'userForm.name.required' => 'Nama harus diisi.',
            'userForm.name.min' => 'Nama minimal 3 karakter.',
            'userForm.email.required' => 'Email harus diisi.',
            'userForm.email.email' => 'Format email tidak valid.',
            'userForm.email.unique' => 'Email sudah terdaftar.',
            'userForm.password.required' => 'Password harus diisi.',
            'userForm.password.min' => 'Password minimal 8 karakter.',
            'userForm.password.confirmed' => 'Konfirmasi password tidak cocok.',
            'userForm.role.required' => 'Role harus dipilih.',
            'userForm.role.in' => 'Role tidak valid.',
        ]);

        if ($this->isEditing && $this->editingUser) {
            // Update existing user
            $updateData = [
                'name' => $this->userForm['name'],
                'email' => $this->userForm['email'],
                'role' => $this->userForm['role'],
            ];
            
            // Only update password if provided
            if (!empty($this->userForm['password'])) {
                $updateData['password'] = Hash::make($this->userForm['password']);
            }
            
            $this->editingUser->update($updateData);
            
            session()->flash('message', 'User berhasil diperbarui.');
        } else {
            // Create new user
            User::create([
                'name' => $this->userForm['name'],
                'email' => $this->userForm['email'],
                'password' => Hash::make($this->userForm['password']),
                'role' => $this->userForm['role'],
            ]);
            
            session()->flash('message', 'User berhasil ditambahkan.');
        }

        $this->updateSuccess = true;
        $this->closeModal();
    }

    public function deleteUser($userId)
    {
        $user = User::find($userId);
        
        if ($user && $user->_id !== Auth::id()) {
            $user->delete();
            session()->flash('message', 'User berhasil dihapus.');
        } else {
            session()->flash('error', 'Tidak dapat menghapus user sendiri.');
        }
    }

    public function closeModal()
    {
        $this->showModal = false;
        $this->reset(['userForm', 'editingUser', 'isEditing']);
    }

    #[Computed]
    public function users()
    {
        $query = User::query();

        // Search
        if (!empty($this->search)) {
            $query->where(function($q) {
                $q->where('name', 'like', '%' . $this->search . '%')
                  ->orWhere('email', 'like', '%' . $this->search . '%');
            });
        }

        // Sort
        $query->orderBy($this->sortBy, $this->sortDirection);

        return $query->paginate($this->perPage);
    }

    public function render()
    {
        return view('livewire.user-management', [
            'users' => $this->users,
        ]);
    }
}
