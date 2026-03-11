<aside class="d-flex flex-column vh-100 flex-shrink-0 p-0 text-white bg-dark" style="width: 250px;">
    
    <div class="d-flex align-items-center justify-content-center bg-white" style="height: 8vh;">
        <img src="{{ asset('images/logo_yski.png') }}" alt="Logo YSKI" class="img-fluid" style="max-height: 80%;">
    </div>

    <div class="w-100 mb-2" style="height: 6vh; background-color: #0474d5;"></div>

    <ul class="nav nav-pills flex-column mb-auto">
        <li class="nav-item">
            <a href="/user/dashboard" class="nav-link text-white-50 custom-hover d-flex align-items-center gap-3 px-4 py-3 border-0">
                <i class="fas fa-th-large" style="width: 20px;"></i>
                <span>Dashboard</span>
            </a>
        </li>
        @php
            $menu = [
                'Data Barang' => [
                    'url' => '/user/items',
                    'icon' => 'fas fa-box'
                ],
                'Riwayat Permintaan' => [
                    'url' => '/user/requests',
                    'icon' => 'fas fa-history'
                ],
                'My Tickets' => [
                    'url' => '/user/tickets',
                    'icon' => 'fas fa-ticket-alt'
                ]
            ];
        @endphp
        @foreach(explode(',', $user->role->pages) as $page)
        @if(isset($menu[$page]))
        <li>
            <a href="{{ $menu[$page]['url'] }}" class="nav-link text-white-50 custom-hover d-flex align-items-center gap-3 px-4 py-3 border-0">
                <i class="{{ $menu[$page]['icon'] }}" style="width: 20px;"></i>
                <span>{{ $page }}</span>
            </a>
        </li>
        @endif
        @endforeach
    </ul>
</aside>

<style>
    /* Sedikit CSS custom untuk efek hover yang lebih halus */
    .custom-hover:hover {
        background-color: #2d3748 !important;
        color: white !important;
        transition: 0.3s;
    }
    
    /* Menghilangkan dekorasi link default */
    .nav-link {
        border-radius: 0 !important;
    }
</style>