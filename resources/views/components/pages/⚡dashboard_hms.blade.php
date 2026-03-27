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
            @break
            @case("SuperAdmin")
            <div class="mt-2 d-flex gap-3 justify-content-center">
                <div class="border rounded-3" style="padding: 5px 10px; width: 70%;">
                    <h3>User | Active</h3> 
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="bg-light p-3 rounded-circle">
                            <i class="fas fa-users text-primary" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0">9</h2>
                            <small class="text-success">Active Users</small>
                        </div>
                    </div>
                </div>
                <div class="border rounded-3" style="padding: 10px 20px; width: 70%;">
                    <h3>Total Items Barang</h3> 
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="bg-light p-3 rounded-circle">
                            <i class="fas fa-box text-primary" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0">9</h2>
                            <small class="text-success">Items Barang</small>
                        </div>
                    </div>
                </div>
                <div class="border rounded-3" style="padding: 10px 20px; width: 70%;">
                    <h3>Ticket Done</h3> 
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="bg-light p-3 rounded-circle">
                            <i class="fas fa-ticket text-primary" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0">9</h2>
                            <small class="text-success">Verifikasi</small>
                        </div>
                    </div>
                </div>
                <div class="border rounded-3" style="padding: 10px 20px; width: 70%;">
                    <h3>Status Ticket</h3> 
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="bg-light p-3 rounded-circle">
                            <i class="fas fa-info text-primary" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0">9</h2>
                            <small class="text-success">Pending</small>
                        </div>
                    </div>
                </div>
            </div>

            <div class="mt-3 row g-3">
                <div class="col-md-6">
                    <div class="card shadow-sm p-3">
                        <h5 class="text-center mb-4">Traffic Permintaan Barang</h5>
                        <div style="height: 300px;">
                            <canvas id="itemChart"></canvas>
                        </div>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="card shadow-sm p-3">
                        <h5 class="text-center mb-4">Kategori Tickets</h5>
                        <div style="height: 300px;">
                            <canvas id="ticketChart"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            @break
            @case("Admin")
            <div class="mt-2 d-flex gap-3 justify-content-center">
                <div class="border rounded-3" style="padding: 5px 10px; width: 70%;">
                    <h3>User | Active</h3> 
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="bg-light p-3 rounded-circle">
                            <i class="fas fa-users text-primary" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0">9</h2>
                            <small class="text-success">Active Users</small>
                        </div>
                    </div>
                </div>
                <div class="border rounded-3" style="padding: 10px 20px; width: 70%;">
                    <h3>Total Items Barang</h3> 
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="bg-light p-3 rounded-circle">
                            <i class="fas fa-box text-primary" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0">9</h2>
                            <small class="text-success">Items Barang</small>
                        </div>
                    </div>
                </div>
                <div class="border rounded-3" style="padding: 10px 20px; width: 70%;">
                    <h3>Ticket Done</h3> 
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="bg-light p-3 rounded-circle">
                            <i class="fas fa-ticket text-primary" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0">9</h2>
                            <small class="text-success">Verifikasi</small>
                        </div>
                    </div>
                </div>
                <div class="border rounded-3" style="padding: 10px 20px; width: 70%;">
                    <h3>Status Ticket</h3> 
                    <div class="d-flex align-items-center justify-content-between">
                        <div class="bg-light p-3 rounded-circle">
                            <i class="fas fa-info text-primary" style="font-size: 24px;"></i>
                        </div>
                        <div>
                            <h2 class="fw-bold mb-0">9</h2>
                            <small class="text-success">Pending</small>
                        </div>
                    </div>
                </div>
            </div>
            @break
        @endswitch
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const itemCtx = document.getElementById('itemChart').getContext('2d');
        new Chart(itemCtx, {
            type: 'doughnut',
            data: {
                labels: ['Digunakan', 'Tersedia', 'Rusak'],
                datasets: [{
                    data: [12, 19, 3],
                    backgroundColor: [
                        '#4e73df', // Primary blue
                        '#1cc88a', // Success green
                        '#e74a3b'  // Danger red
                    ],
                    hoverOffset: 10
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });

        const ticketCtx = document.getElementById('ticketChart').getContext('2d');
        new Chart(ticketCtx, {
            type: 'pie',
            data: {
                labels: ['IT Support', 'Maintenance', 'HR Inquiry'],
                datasets: [{
                    data: [45, 25, 30],
                    backgroundColor: [
                        '#f6c23e', // Warning yellow
                        '#36b9cc', // Info cyan
                        '#858796'  // Secondary grey
                    ]
                }]
            },
            options: {
                maintainAspectRatio: false,
                plugins: {
                    legend: { position: 'bottom' }
                }
            }
        });
    });
</script>