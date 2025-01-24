<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'Dashboard')</title>
    <!-- DaisyUI and TailwindCSS -->
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/axios/dist/axios.min.js"></script>

    <!-- Loading Spinner Styles -->
    <style>
        #loadingOverlay {
            display: none;
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.5);
            z-index: 9999;
            justify-content: center;
            align-items: center;
        }

        .spinner {
            border: 4px solid #f3f3f3;
            border-top: 4px solid #3498db;
            border-radius: 50%;
            width: 40px;
            height: 40px;
            animation: spin 2s linear infinite;
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
</head>

<body class="bg-gray-50">

    <!-- Navigation Bar -->
    <nav class="bg-blue-800 text-white shadow-md">
        <div class="max-w-7xl mx-auto px-2 sm:px-6 lg:px-8">
            <div class="relative flex items-center justify-between h-16">
                <div class="absolute inset-y-0 left-0 flex items-center sm:hidden">
                    <button type="button" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-white hover:bg-blue-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-offset-blue-800 focus:ring-white" aria-controls="mobile-menu" aria-expanded="false">
                        <span class="sr-only">Open main menu</span>
                        <svg class="block h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" viewBox="0 0 24 24" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                        </svg>
                    </button>
                </div>
                <div class="flex-1 flex items-center justify-center sm:items-stretch sm:justify-start">
                    <div class="flex-shrink-0 text-xl font-bold">MyApp</div>
                    <div class="hidden sm:block sm:ml-6">
                        <div class="flex space-x-4">
                            <a href="{{ route('class.index') }}" class="text-white hover:text-gray-300 px-3 py-2 rounded-md text-sm font-medium">Kelas</a>
                            <a href="{{ route('rfid.index') }}" class="text-white hover:text-gray-300 px-3 py-2 rounded-md text-sm font-medium">RFID</a>
                            <a href="{{ route('attendance.index') }}" class="text-white hover:text-gray-300 px-3 py-2 rounded-md text-sm font-medium">Absensi</a>
                            <!-- Optionally you can add a logout link if needed -->
                            <!-- <a href="{{ route('logout') }}" class="text-white hover:text-gray-300 px-3 py-2 rounded-md text-sm font-medium">Logout</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile Menu -->
        <div class="sm:hidden" id="mobile-menu">
            <div class="px-2 pt-2 pb-3 space-y-1 sm:px-3">
                <a href="{{ route('class.index') }}" class="text-white hover:text-gray-300 block px-3 py-2 rounded-md text-base font-medium">Kelas</a>
                <a href="{{ route('rfid.index') }}" class="text-white hover:text-gray-300 block px-3 py-2 rounded-md text-base font-medium">RFID</a>
                <a href="{{ route('attendance.index') }}" class="text-white hover:text-gray-300 block px-3 py-2 rounded-md text-base font-medium">Absensi</a>
                <!-- Add logout if needed -->
                <!-- <a href="{{ route('logout') }}" class="text-white hover:text-gray-300 block px-3 py-2 rounded-md text-base font-medium">Logout</a> -->
            </div>
        </div>
    </nav>

    <!-- Main Content -->
    <div class="container mx-auto px-4 py-6">
        @yield('content')
    </div>

    <!-- Loading Overlay -->
    <div id="loadingOverlay" class="flex">
        <div class="spinner"></div>
    </div>

    <!-- SweetAlert2 Notifications -->
    <script>
        // Show success or error messages
        @if (session('success'))
            Swal.fire({
                icon: 'success',
                title: 'Berhasil',
                text: '{{ session('success') }}',
            });
        @endif

        @if (session('error'))
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: '{{ session('error') }}',
            });
        @endif

        // Show loading spinner
        function showLoading() {
            document.getElementById('loadingOverlay').style.display = 'flex';
        }

        // Hide loading spinner
        function hideLoading() {
            document.getElementById('loadingOverlay').style.display = 'none';
        }

        // Example function to show loading on AJAX request
        function submitFormWithLoading(formId) {
            showLoading();
            let form = document.getElementById(formId);

            // Send AJAX request or form submission here
            axios.post(form.action, new FormData(form))
                .then(response => {
                    hideLoading();  // Hide loading spinner after success
                    // Handle success
                    Swal.fire('Success', 'Data berhasil disubmit!', 'success');
                })
                .catch(error => {
                    hideLoading();  // Hide loading spinner after error
                    // Handle error
                    Swal.fire('Error', 'Terjadi kesalahan', 'error');
                });
        }
    </script>
</body>

</html>
