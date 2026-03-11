<aside style="background-color: #1a222b; width: 250px; min-height: 100vh; font-family: sans-serif;">
    <div style="height: 8vh; color: white; font-weight: bold; background-color: #ffffff; text-align: center;">
        <img src="{{ asset('images/logo_yski.png') }}" alt="Logo YSKI">
    </div>
    <div style="height: 6vh; color: white; font-weight: bold; background-color: #0474d5; margin-bottom: 10px;"></div>

    <ul style="list-style: none; padding: 0; margin: 0; display: flex; flex-direction: column; gap: 5px;">
        
        <li class="sidebar-item" style="padding: 12px 20px; color: #cbd5e0; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 15px;" onclick="window.location.href='/';">
            <i class="fas fa-th-large" style="width: 20px;"></i>
            <span>Dashboard</span>
        </li>

        <li class="sidebar-item" style="padding: 12px 20px; color: #cbd5e0; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 15px;" onclick="window.location.href='/user/items';">
            <i class="fas fa-box" style="width: 20px;"></i>
            <span>Data Barang</span>
        </li>

        <li class="sidebar-item" style="padding: 12px 20px; color: #cbd5e0; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 15px;" onclick="window.location.href='/user/items';">
            <i class="fas fa-history" style="width: 20px;"></i>
            <span>Riwayat Permintaan</span>
        </li>

        <li class="sidebar-item" style="padding: 12px 20px; color: #cbd5e0; cursor: pointer; transition: 0.3s; display: flex; align-items: center; gap: 15px;" onclick="window.location.href='/user/items';">
            <i class="fas fa-ticket-alt" style="width: 20px;"></i>
            <span>My Tickets</span>
        </li>

    </ul>
</aside>

<style>
    .sidebar-item:hover {
        background-color: #2d3748;
        color: white !important;
    }
</style>