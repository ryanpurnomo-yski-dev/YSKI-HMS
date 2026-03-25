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
    <h3>Profile</h3>
    <div class="d-flex flex-row gap-4">
        <div class="card text-center d-flex flex-column align-items-center" style="width: 18rem;">
            <div class="card-header">
                <h4>Informasi</h4>
            </div>
                <p class="mt-4">Nama : <b>{{ $user->name }}</b></p>
                <p>Role : {{ $user->role->name }}</p>
                <p>Role : {{ $user->email }}</p>
                    <div class="d-flex">
                        <i></i>
                        <i></i>
                        <i></i>
                    </div>
        </div>
        <div class="card" style="width: 47.5rem;">
            <nav>
                <ul class="d-flex flex-row gap-3 mt-2">
                    <li>Overview</li>
                    <li>Edit Profile</li>
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
            </div>
        </div>
    </div>
</div>