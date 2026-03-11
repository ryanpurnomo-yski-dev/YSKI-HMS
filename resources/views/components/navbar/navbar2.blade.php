<nav class="navbar navbar-dark" style="background-color: #0e1a2f;">
    <div class="container-fluid px-4">
        <div class="d-flex ms-auto align-items-center gap-4">
            
            <a href="/user/setting/profile" class="text-white text-decoration-none custom-icon-hover">
                <i class="fas fa-user fa-lg"></i>
            </a>

            <form action="/user/logout" method="POST">
                @csrf
                <button type="submit" class="text-white text-decoration-none custom-icon-hover border-0 bg-transparent">
                    <i class="fas fa-power-off fa-lg"></i>
                </button>
            </form>
        </div>
    </div>
</nav>

<style>
    /* Efek hover agar lebih interaktif */
    .custom-icon-hover:hover {
        color: #0474d5 !important; /* Warna biru senada dengan sidebar sebelumnya */
        transition: 0.3s;
    }
</style>