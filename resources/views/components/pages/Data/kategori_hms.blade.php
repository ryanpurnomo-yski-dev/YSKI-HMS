<?php

use Livewire\Component;

new class extends Component
{

};
?>

<style>
    table{
        border:1px solid;
        border-collapse:collapse;
        width:100%
    }
    td{
        border:1px solid;
        border-collapse:collapse;
        padding: 5px 20px 5px 10px;
    }
    th{
        border:1px solid;
        border-collapse:collapse;
        padding: 5px 20px 5px 10px;
        background-color: #14b9ff
    }
    tr:nth-child(even) {
        background-color: #D6EEEE;
    }
</style>
<div> 
    <h1>Kategori</h1>
    <div style="display:flex"><p>Home / Barang /&nbsp;</p><p style="color:#009dff">Kategori</p></div>
    <div class="pt-4 pb-4" style="padding-left:1.5vw;padding-right:1.5vw;background-color:#fafafa;border-radius:30px;box-shadow:1px 2px 1px 2px  rgba(0, 0, 0, 0.2)">
        <div style="display: block; margin-bottom:5vh"><h4 style="color:#009dff">Master Data Kategori</h4></div>
        <button class="btn btn-primary" style="margin-bottom:3vh">Tambah Kategori</button>
        <table>
            <tr>
                <th style="width:10%">No.</th>
                <th style="width:40%">Kategori</th>
                <th style="width:10%">Icon</th>
                <th>Action</th>
            </tr>
            <tr>
                <td>1</td>
                <td>Hah</td>
                <td><img src="{{ asset('images/logo_yski.png') }}" alt=""></td>
                <td><button class="btn btn-primary">Edit</button><button class="btn btn-outline-danger" style="margin-left:5px">Hapus</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Hah</td>
                <td><img src="{{ asset('images/logo_yski.png') }}" alt=""></td>
                <td><button class="btn btn-primary">Edit</button><button class="btn btn-outline-danger" style="margin-left:5px">Hapus</button></td>
            </tr>
            <tr>
                <td>1</td>
                <td>Hah</td>
                <td><img src="{{ asset('images/logo_yski.png') }}" alt=""></td>
                <td><button class="btn btn-primary">Edit</button><button class="btn btn-outline-danger" style="margin-left:5px">Hapus</button></td>
            </tr>
        </table>
    </div>
    
</div>