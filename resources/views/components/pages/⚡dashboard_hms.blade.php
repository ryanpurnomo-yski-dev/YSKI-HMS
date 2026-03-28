<?php

use Livewire\Component;

new class extends Component
{
    public $user;

    public function mount()
    {
        $this->user = auth()->user();
    }
};
?>

<div> 
    <div class="content" style="display: flex; flex-direction: column;">
        
        <div style="padding: 10px 20px; border-radius: 3px; box-shadow: 2px 4px 2px 4px rgba(0, 0, 0, 0.2);">
            <h3>Dashboard</h3>
        </div>

        <br>

        <div class="alert alert-warning p-2 rounded-1">
            Selamat Datang <b>{{ $user->name }}</b>!
        </div>

        @switch($user->role->name)
            @case("Staff")
                @include("components.pages.dashboard_layouts.staff_layout")
            @break
            @case("SuperAdmin")
                @include("components.pages.dashboard_layouts.superadmin_layout")
            @break
            @case("Admin")
                @include("components.pages.dashboard_layouts.admin_layout")
            @break
        @endswitch
    </div>
</div>