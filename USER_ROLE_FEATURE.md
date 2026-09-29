# User Role Feature

## Overview
Sistem role user telah ditambahkan untuk mengatur akses menu berdasarkan tingkat otoritas user.

## Role Types

### 1. Administrator
- **Akses Penuh**: Dapat melihat dan mengakses semua menu
- **Menu yang dapat diakses**:
  - Dashboard
  - Tickets
  - Users (Master User Management)
  - Register

### 2. Admin
- **Akses Terbatas**: Dapat melihat beberapa menu utama
- **Menu yang dapat diakses**:
  - Dashboard
  - Tickets
  - Register

### 3. Operasional
- **Akses Minimal**: Hanya menu dasar
- **Menu yang dapat diakses**:
  - Dashboard
  - Tickets

## Implementation

### Model Changes
File: `app/Models/User.php`
- Menambahkan field `role` ke `fillable`
- Helper methods:
  - `isAdministrator()`: Mengecek apakah user adalah Administrator
  - `isAdmin()`: Mengecek apakah user adalah Admin
  - `isOperasional()`: Mengecek apakah user adalah Operasional
  - `canAccessAdminMenu()`: Mengecek apakah user dapat akses menu admin (Administrator & Admin)

### User Management
File: `app/Livewire/UserManagement.php`
- Form tambah/edit user sekarang include field role
- Validasi role: hanya menerima 'administrator', 'admin', atau 'operasional'
- Default role untuk user baru: 'operasional'

### Navigation
File: `resources/views/livewire/layout/navigation.blade.php`
- Menu visibility dikontrol berdasarkan role user
- Menggunakan directive `@if(auth()->user()->isAdministrator())` dll

## Setup untuk Existing Users

Jalankan seeder untuk update role existing users:

```bash
php artisan db:seed --class=UpdateUserRolesSeeder
```

Atau update manual via database/tinker:
```php
// Set user pertama sebagai Administrator
$user = User::first();
$user->update(['role' => 'administrator']);

// Set user tertentu berdasarkan email
$user = User::where('email', 'admin@example.com')->first();
$user->update(['role' => 'admin']);
```

## Role Display
- **Administrator**: Badge ungu (purple)
- **Admin**: Badge biru (blue)
- **Operasional**: Badge hijau (green)

## Security Notes
- User tidak bisa menghapus dirinya sendiri
- Role validation dilakukan di backend (server-side)
- Menu visibility di frontend untuk UX, pastikan juga ada authorization di route/controller
