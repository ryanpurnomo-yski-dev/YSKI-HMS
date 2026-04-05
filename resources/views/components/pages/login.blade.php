<?php

use Livewire\Component;
use function Livewire\Volt\layout;

new class extends Component
{
    
};
?>
<style>
    .container-center{
        height: 90vh;
    }

    .modal-content{
        border-radius: 15px;
        transition: all 0.3s ease;
        animation: scaleIn 0.3s ease;
    }

    @keyframes scaleIn {
        0% {
            transform: scale(0.7);
            opacity: 0;
        }
        100% {
            transform: scale(1);
            opacity: 1;
        }
    }

    /* warna custom */
    .bg-success-soft {
        background: #d1e7dd !important;
    }

    .bg-error-soft {
        background: #f8d7da !important;
    }
</style>
<div class="bg-main-page">
    <div class="container-center container-fluid d-flex align-items-center justify-content-center">
            <div class="col-md-6 mx-auto align-middle bg-secondary-subtle border border-light rounded">
                <div class="text-center mb-4 mt-4">
                    <img src="{{ asset('/images/logo_yski.png') }}" class="mx-auto">
                </div>
                <div class="card text-center bg-light">
                    <div class="card-header font-weight-bold">
                        Selamat Datang
                    </div> 
                    <div class="card-body">
                        <form id="loginForm">
                            @csrf
                            <div class="form-group">
                                <label>
                                    Email
                                </label>
                                <input name="email" type="email" class="form-control" placeholder="enter your email">
                                
                                <br>
                                <label>
                                    Password
                                </label>
                                <input name="password" type="password" class="form-control" placeholder="enter your password">
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

    <div class="modal fade" id="alertModal"> 
        <div class="modal-dialog">
            <div id="modalContent" class="modal-content">
                <div class="modal-body py-4">
                    <div id="modalIcon" class="mb-3" style="font-size: 50px;"></div>
                    <h5 id="modalMessage" class="fw-bold"></h5>
                </div>
            </div>
        </div>
    </div>

</div>
<script>
    const loginUrl = "{{ route('login.post') }}";
    document.getElementById('loginForm').addEventListener('submit', function(e){
        e.preventDefault();
        let formData = new FormData(this);

        fetch("/user/login", {
            method: "POST",
            headers: {
                'X-CSRF-TOKEN': "{{ csrf_token() }}"
            },
            body: formData
        })
        .then(res => res.json())
        .then(res => {
            let icon = document.getElementById('modalIcon');
            let message = document.getElementById('modalMessage').innerText = res.message;
            let content = document.getElementById('modalContent');
            //document.getElementById('modalMessage').innerText = res.message;
            content.classList.remove('bg-success-soft', 'bg-error-soft');

            if(res.status === 'success'){
                icon.innerHTML = '<i class="bi bi-check-circle-fill text-success"></i>';
                content.classList.add('bg-success-soft');

            } else {
                icon.innerHTML = '<i class="bi bi-x-circle-fill text-danger"></i>';
                content.classList.add('bg-error-soft');
            }

            let modal = new bootstrap.Modal(document.getElementById('alertModal'));
            modal.show();

            if(res.status === 'success'){
                setTimeout(() => {
                    window.location.href = res.redirect;
                }, 1500);
            }
        })
        .catch(err => {
            console.log(err);
        });
    });
</script>