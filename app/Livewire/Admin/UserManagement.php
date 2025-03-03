<?php

namespace App\Livewire\Admin;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Auth;

class UserManagement extends Component
{
    use WithPagination;

    public $search = '';
    public $showInactive = false;

    public function toggleUserStatus($userId)
    {
        try {
            $user = User::findOrFail($userId);
            
            // No modificar admins ni si mismo
            if ($user->id === Auth::id()) {
                session()->flash('error', 'No puedes cambiar tu propio estado.');
                return;
            }

            if ($user->hasRole('admin')) {
                session()->flash('error', 'No puedes modificar el estado de otros administradores.');
                return;
            }

            $user->is_active = !$user->is_active;
            $user->save();

            $status = $user->is_active ? 'activado' : 'desactivado';
            session()->flash('success', "Usuario {$user->name} {$status} exitosamente.");

        } catch (\Exception $e) {
            session()->flash('error', 'Ocurrió un error al cambiar el estado del usuario.');
        }
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function render()
    {
        $users = User::query()
            ->where('id', '!=', Auth::id())
            ->when($this->search, function($query) {
                $query->where(function($q) {
                    $q->where('name', 'like', '%' . $this->search . '%')
                      ->orWhere('email', 'like', '%' . $this->search . '%');
                });
            })
            ->when($this->showInactive, function($query) {
                $query->where('is_active', false);
            })
            ->latest()
            ->paginate(10);

        return view('livewire.admin.user-management', [
            'users' => $users
        ])->layout('layouts.app');
    }
}