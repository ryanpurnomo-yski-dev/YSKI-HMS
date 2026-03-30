<div class="mt-2 d-flex gap-3 justify-content-center">
    <div class="border rounded-3" style="padding: 10px 20px; width: 70%;">
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
    <div class="card">
        <div class="card-header">
            <h5>Stock Barang Menipis</h5>
        </div>
        <div class="card-body">
        </div>
    </div>

    <div class="card">
        <div class="card-header">
            <h5>Permintaan Terbanyak</h5>
        </div>
        <div class="card-body">
        </div>
    </div>
</div>