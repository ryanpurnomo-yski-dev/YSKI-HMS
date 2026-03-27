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
<style>
    .nav-menu li {
        cursor: pointer;
        padding-bottom: 5px;
    }

    .nav-menu li.active {
        border-bottom: 3px solid #0d6efd;
        font-weight: 500;
    }
</style>
<div>
    <h3>Profile</h3>
    <div class="d-flex flex-row gap-4">
        <div class="card text-center" style="width: 18rem;">
            <div class="card-header">
                <h5>Informasi</h5>
            </div>
            <div class="card-body">
                <p class="mt-4">Nama : <b>{{ $user->name }}</b></p>
                <p>Role : {{ $user->role->name }}</p>
                <p>Role : {{ $user->email }}</p>
                    <div class="d-flex">
                        <i></i>
                        <i></i>
                        <i></i>
                    </div>
            </div>
        </div>
        <form action="/user/setting/profile" method="POST">
            @csrf
            <div class="card" style="width: 47.5rem;">
                <nav>
                    <ul class="d-flex flex-row gap-3 mt-2 nav-menu">
                        <!-- <li>Overview</li> -->
                        <li class="active">Edit Profile</li>
                        <li>Change Password</li>
                    </ul>
                    <hr>
                </nav>
                <div>
                    <!-- <div class="input-group input-group-sm px-3 py-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Profile Image</span>
                        </div>
                        <label class="form-control text-muted" for="profileUpload" style="cursor: pointer;">
                            Click to upload...
                        </label>
                        <input type="file" id="profileUpload" class="form-control" hidden>
                    </div> -->
                    <div class="input-group input-group-sm px-3 py-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Nama</span>
                        </div>
                        <input type="text" class="form-control">
                    </div>
                    <div class="input-group input-group-sm px-3 py-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Email</span>
                        </div>
                        <input type="email" class="form-control">
                    </div>
                    <div class="input-group input-group-sm px-3 py-2">
                        <div class="input-group-prepend">
                            <span class="input-group-text">Password</span>
                        </div>
                        <input type="password" class="form-control">
                    </div>
                    <div class="d-flex justify-content-end px-3">
                        <button class="btn bg-primary text-white mb-2">Save</button>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
<script>
    const items = document.querySelectorAll('.nav-menu li');

    items.forEach(item => {
        item.addEventListener('click', () => {
            items.forEach(i => i.classList.remove('active'));
            item.classList.add('active');
        });
    });
</script>