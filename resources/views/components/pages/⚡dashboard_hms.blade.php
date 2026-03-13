<?php

use Livewire\Component;

new class extends Component
{
    
};
?>

<div> 
    <div class="content" style="display: flex; flex-direction: column;">
        
        <div style="padding: 10px 20px; border-radius: 10px; box-shadow: 2px 4px 2px 4px rgba(0, 0, 0, 0.2);">
            <h1>HMS (Helpdesk Management System)</h1>
        </div>

        <br>

        <div>
            Selamat Datang Pak  di HMS (Helpdesk Management System)
            <p>Sistem layanan permintaan & Ticketing</p>
        </div>

        <div style="display: flex; flex-direction: row; gap: 20px;">
            <div class="text-white border rounded-3" style="background-color:rgb(124, 168, 168); padding: 10px 20px;">
                <h1>Permintaan Barang</h1> 
                <p>Ajukan permintaan barang yang anda butuhkan untuk keperluan kerja</p>
                <button class="btn btn-md bg-primary text-white">Buat Permintaan</button>
            </div>
            <div class="text-white border rounded-3" style="background-color:rgb(124, 168, 168); padding: 10px 20px;">
                <h1>Keluhan</h1> 
                <p>Laporkan masalah atau keluhan yang anda alami</p>
                <button class="btn btn-md bg-warning text-white">Buat Permintaan</button>
            </div>
        </div>

    </div>
</div>