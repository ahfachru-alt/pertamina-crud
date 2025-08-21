<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class ThemeToggle extends Component
{
    public string $theme = 'system';

    public function mount(): void
    {
        $this->theme = Auth::user()?->theme ?? 'system';
    }

    public function setTheme(string $theme): void
    {
        $this->theme = $theme;
        if (Auth::check()) {
            $user = Auth::user();
            $user->theme = $theme;
            $user->save();
        }
        $this->dispatch('theme-updated', theme: $theme);
    }

    public function render()
    {
        return view('livewire.theme-toggle');
    }
}

