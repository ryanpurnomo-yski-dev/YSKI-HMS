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

        <div class="mt-2 d-flex gap-3 justify-content-center">
            <div class="text-white border rounded-3" style="background-color:rgb(124, 168, 168); padding: 10px 20px; width: 70%;">
                <h3>Permintaan Barang</h3> 
                <p>Ajukan permintaan barang yang anda butuhkan untuk keperluan kerja</p>
                <button class="btn btn-md bg-primary text-white">Buat Permintaan</button>
            </div>
            <div class="text-white border rounded-3" style="background-color:rgb(124, 168, 168); padding: 10px 20px; width: 70%;" onclick="window.location.href='/user/forms';">
                <h3>Keluhan</h3> 
                <p>Laporkan masalah atau keluhan yang anda alami</p>
                <button class="btn btn-md bg-warning text-white">Buat Permintaan</button>
            </div>
        </div>

    </div>
</div>