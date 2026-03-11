<?php

use Livewire\Component;
use function Livewire\Volt\layout;

new class extends Component
{
    
};
?>

<div class="bg-main-page">
    <div class="container-fluid d-flex mx-auto">
            <div class="col-md-6 mx-auto bg-secondary-subtle border border-light rounded">
                <div class="text-center mb-4 mt-4">
                    <img src="{{ asset('/images/logo_yski.png') }}" class="mx-auto">
                </div>
                <div class="card text-center bg-light">
                    <div class="card-header font-weight-bold">
                        Selamat Datang
                    </div> 
                    <div class="card-body">
                        <form action="{{ route('login.post') }}" method="POST">
                            @csrf
                            <div class="form-group">
                                <label>
                                    Email
                                </label>
                                <input name="email" type="email" class="form-control" wire:model.live="email" placeholder="enter your email">
                                
                                <br>
                                <label>
                                    Password
                                </label>
                                <input name="password" type="password" class="form-control" wire:model.live="email" placeholder="enter your password">
                            </div>
                            <br>
                            <button type="submit" class="btn form-control bg-primary text-white">Masuk</button>
                        </form>
                    </div>
                    <div class="card-footer">
                        <span class="small text-muted">Lupa Password? Silakan hubungin yayasan!</span>
                    </div>
                </div>
            </div>
    </div>
</div>