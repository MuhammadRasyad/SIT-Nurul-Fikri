@extends('visitors.layouts.nav-app')

@section('content')

<!-- Importing Google Fonts -->
<link href="https://fonts.googleapis.com/css2?family=Roboto:wght@400;700&display=swap" rel="stylesheet">

<!-- Tailwind CSS and DaisyUI -->
<link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
<link href="https://cdn.jsdelivr.net/npm/daisyui@1.22.1/dist/full.css" rel="stylesheet">
<script src="https://code.iconify.design/2.1.0/iconify.min.js"></script>
<!-- SweetAlert2 -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<style>
    body {
        font-family: 'Roboto', sans-serif;
        background: linear-gradient(to right, #6EE7B7, #3B82F6); /* Gradient background */
    }
    .login-container {
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .login-box {
        background-color: white; /* White background for the form */
        border-radius: 10px; /* Rounded corners */
        box-shadow: 0 4px 30px rgba(0, 0, 0, 0.1); /* Subtle shadow */
        padding: 2rem;
        width: 90%; /* Responsive width */
        max-width: 400px; /* Max width for larger screens */
    }
    .login-header {
        color: #34D399; /* Green color */
    }
    .input-icon {
        position: relative; /* Set relative positioning */
    }
    .input-icon input {
        padding-left: 2.5rem; /* Space for icon */
    }
    .input-icon .iconify {
        position: absolute;
        left: 0.75rem; /* Position the icon */
        top: 50%;
        transform: translateY(-50%); /* Center the icon vertically */
        color: #34D399; /* Icon color */
    }
</style>

<div class="login-container mt-10">
    <div class="login-box">
        <h2 class="text-2xl font-bold text-center login-header mb-2">Login</h2>
        <form id="login-form" action="{{ route('login.process') }}" method="POST">
            @csrf
            <div class="form-control mb-4 input-icon">
                <input type="email" name="email" placeholder="you@example.com" class="input input-bordered w-full" required />
                <span class="iconify" data-icon="ic:baseline-email"></span>
            </div>
            <div class="form-control mb-4 input-icon">
                <input type="password" name="password" placeholder="Your password" class="input input-bordered w-full" required />
                <span class="iconify" data-icon="ic:baseline-lock"></span>
            </div>
            <div class="form-control mb-4">
                <button type="submit" class="btn bg-green-500 hover:bg-green-600 text-white w-full">Login</button>
            </div>
        </form>
    </div>
</div>


<script>
    document.getElementById('login-form').addEventListener('submit', function (e) {
        e.preventDefault(); // Mencegah form untuk submit secara default

        // Mengambil data dari form
        let formData = new FormData(this);

        // Melakukan AJAX POST request
        fetch(this.action, {
            method: 'POST',
            body: formData,
            headers: {
                'X-Requested-With': 'XMLHttpRequest',
                'X-CSRF-TOKEN': '{{ csrf_token() }}'
            }
        })
        .then(response => response.json())
        .then(data => {
            if (data.success) {
                // Menampilkan SweetAlert jika login berhasil
                Swal.fire({
                    icon: 'success',
                    title: 'Login Berhasil',
                    text: 'Selamat datang!',
                    confirmButtonText: 'OK'
                }).then(() => {
                    window.location.href = data.redirect; // Redirect ke halaman sesuai peran setelah klik OK
                });
            } else {
                // Menampilkan SweetAlert jika ada kesalahan
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: data.message || 'Kredensial tidak valid.',
                    confirmButtonText: 'OK'
                });
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Error',
                text: 'Terjadi kesalahan saat menghubungi server.',
                confirmButtonText: 'OK'
            });
        });
    });
</script>

@endsection
