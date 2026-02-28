<?php

use Livewire\Component;

new class extends Component
{

};
?>

<div> 
    <div class="content" style="display: flex; flex-direction: column;">
        
        <div style="padding: 10px 20px; border-radius: 10px; box-shadow: 2px 4px 2px 4px rgba(0, 0, 0, 0.2);">
            <h1>Master Data Barang</h1>
        </div>

        <br>

        <div style="display: flex; flex-direction: row; gap: 20px;">
            <table style="border: 1px solid black">
                <thead>
                    <th>
                        <tr>Kode</tr>
                        <tr>Kategori</tr>
                        <tr>Nama</tr>
                        <tr>Merk</tr>
                    </th>
                </thead>
                <tbody>
                    <td>
                        <tr></tr>
                    </td>
                </tbody>
                <tfoot></tfoot>
            </table>
        </div>

    </div>
</div>