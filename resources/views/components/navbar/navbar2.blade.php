<nav class="navbar navbar-dark" style="background-color: #0e1a2f; height: 10.4vh;">
    <div class="container-fluid px-4">
        <div class="d-flex ms-auto align-items-center gap-4">
            <button class="text-white btn btn-dark-blue">
                <i class="fas fa-bars"></i>
            </button>
            <!-- <a href="/user/setting/profile" class="text-white text-decoration-none custom-icon-hover">
                <i class="fas fa-user fa-lg"></i>
            </a> -->
            <a href="{{ route('profile') }}" class="text-white text-decoration-none custom-icon-hover">
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
    .custom-icon-hover:hover {
        color: #0474d5 !important;
        transition: 0.3s;
    }
</style>