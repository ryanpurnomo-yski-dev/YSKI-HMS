<div class="mt-2 d-flex gap-3 justify-content-center">
    <div class="border rounded-3" style="padding: 10px 20px; width: 70%;">
        <h3>User | Active</h3> 
            <div class="d-flex align-items-center justify-content-between">
                <div class="bg-light p-3 rounded-circle">
                    <i class="fas fa-users text-primary" style="font-size: 24px;"></i>
                </div>
                <div>
                    <h2 class="fw-bold mb-0">{{ is_array($User) || $User instanceof \Countable ? count($User) : 0 }}</h2>
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
                <h2 class="fw-bold mb-0">{{ is_array($Barang) || $Barang instanceof \Countable ? count($Barang) : 0 }}</h2>
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
                <h2 class="fw-bold mb-0">{{ is_array($Tickets) && $Tickets->where('status', 'Resolved') ? count($Tickets) : 0 }}</h2>
                <small class="text-success">Verifikasi</small>
            </div>
        </div>
    </div>
    <div class="border rounded-3" style="padding: 10px 20px; width: 70%;">
        <h3>Status Ticket</h3> 
        <div class="d-flex align-items-center justify-content-between">
            <div
                wire:click="switchStatus" 
                class="bg-light border border-secondary p-3 rounded-circle d-flex align-items-center justify-content-center"
                style="width: 60px; height: 60px; cursor: pointer;">
                <i class="fas fa-info text-primary" style="font-size: 24px;"></i>
            </div>
            <div>
                <h2 class="fw-bold mb-0">{{ $Approvals->where('status', $currentStatus)->count() }}</h2>
                <small class="text-success">{{ $currentStatus }}</small>
            </div>
        </div>
    </div>
</div>

<div class="mt-3 row g-3">
    <div class="col-md-6">
        <div class="card shadow-sm p-3">
            <h5 class="text-center mb-4">Traffic Permintaan Barang</h5>
            <div class="d-flex justify-content-center" style="height: 300px;">
                <canvas id="itemChart"></canvas>
            </div>
        </div>
    </div>
    <div class="col-md-6">
        <div class="card shadow-sm p-3">
            <h5 class="text-center mb-4">Kategori Tickets</h5>
            <div class="d-flex justify-content-center" style="height: 300px;">
                <canvas id="ticketChart"></canvas>
            </div>
        </div>
    </div>
</div>

@push('scripts')
<script>
    function renderCharts() {
        const itemEl = document.getElementById('itemChart');
        const ticketEl = document.getElementById('ticketChart');

        if (itemEl) {
            const itemCtx = itemEl.getContext('2d');
            new Chart(itemCtx, {
                type: 'doughnut',
                data: {
                    labels: ['Digunakan', 'Tersedia', 'Rusak'],
                    datasets: [{
                        data: [12, 19, 3],
                        backgroundColor: ['#4e73df','#1cc88a','#e74a3b']
                    }]
                }
            });
        }

        if (ticketEl) {
            const ticketCtx = ticketEl.getContext('2d');
            new Chart(ticketCtx, {
                type: 'pie',
                data: {
                    labels: ['IT Support', 'Maintenance', 'HR Inquiry'],
                    datasets: [{
                        data: [45, 25, 30],
                        backgroundColor: ['#f6c23e','#36b9cc','#858796']
                    }]
                }
            });
        }

        console.log('Chart rendered');
    }
    renderCharts();
</script>
@endpush

<div class="mt-3 d-flex gap-3">
    <div class="card col-md-6">
        <div class="card-header">
            <h5>Stock Barang Menipis</h5>
        </div>
        <div class="card-body">
            <table class="table items-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Nama Barang</th>
                        <th>Stock</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Switch Unmanaged Port</td>
                        <td class="bg-danger text-white rounded-2 text-center p-2">1</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>

    <div class="card col-md-6">
        <div class="card-header">
            <h5>Permintaan Terbanyak</h5>
        </div>
        <div class="card-body">
            <canvas id="myChart" style="max-height: 300px;"></canvas>
        </div>
    </div>
    <script>
        const data = {
            labels: ['Internet', 'Hardware', 'Software', 'AC', 'Bangunan'],
            datasets: [{
                label: 'Jumlah Tiket/Permintaan',
                data: [65, 45, 30, 20, 10], // Contoh angka statis
                backgroundColor: [
                    'rgba(54, 162, 235, 0.8)',  // Biru
                    'rgba(255, 99, 132, 0.8)',  // Merah
                    'rgba(255, 206, 86, 0.8)',  // Kuning
                    'rgba(75, 192, 192, 0.8)',  // Hijau Toska
                    'rgba(153, 102, 255, 0.8)'  // Ungu
                ],
                borderColor: [
                    'rgb(54, 162, 235)',
                    'rgb(255, 99, 132)',
                    'rgb(255, 206, 86)',
                    'rgb(75, 192, 192)',
                    'rgb(153, 102, 255)'
                ],
                borderWidth: 1,
                borderRadius: 5 // Membuat ujung bar sedikit melengkung (Chart.js v3+)
            }]
        };

        // 2. Konfigurasi
        const config = {
            type: 'bar',
            data: data,
            options: {
                indexAxis: 'y', // Ini yang membuat bar menjadi horizontal
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        display: false // Sembunyikan label dataset jika hanya satu
                    }
                },
                scales: {
                    x: {
                        beginAtZero: true,
                        grid: {
                            display: false // Hilangkan garis vertikal agar lebih bersih
                        }
                    },
                    y: {
                        grid: {
                            display: false
                        }
                    }
                }
            }
        };

        // 3. Render Chart
        const myChart = new Chart(
            document.getElementById('myChart'),
            config
        );
    </script>
</div>

