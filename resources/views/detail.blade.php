<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejar Target - Detail Beasiswa</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-roboto leading-normal tracking-normal">

    <div class="flex min-h-screen flex-col">
        
        @include('components.header')

        <div class="flex flex-1 bg-gray-100">
            
            @include('components.sidebar')

            <main class="flex-1 ml-56 p-6">
                <section class="bg-white p-8 rounded-lg shadow-md">
                    <h1 class="text-2xl font-bold text-primary mb-6">{{ $beasiswa->title }}</h1>
                    
                    <div class="flex flex-col md:flex-row items-center md:items-start space-y-6 md:space-y-0 md:space-x-8">
                        
                        <!-- Bagian Gambar -->
                        <div class="flex-shrink-0 w-full md:w-1/3">
                            @if ($beasiswa->image_url)
                                <img src="{{ asset('storage/' . $beasiswa->image_url) }}" alt="Gambar Beasiswa" class="w-full h-auto object-contain rounded-lg">
                            @else
                                <img src="{{ asset('images/default-image.png') }}" alt="Gambar Default" class="w-full h-auto object-contain rounded-lg">
                            @endif
                        </div>
                        
                        <!-- Bagian Informasi -->
                        <div class="w-full md:w-2/3">
                            <h2 class="text-lg font-semibold text-primary mb-2">Deskripsi:</h2>
                            <p class="text-gray-700 mb-4">
                                {{ $beasiswa->description }}
                            </p>
                            <p class="text-gray-600 mb-4">
                                <strong>Batas Pendaftaran:</strong> {{ \Carbon\Carbon::parse($beasiswa->expired_date)->format('d-m-Y') }}
                            </p>
                            <a href="{{ $beasiswa->application_link }}" target="_blank" 
                               class="inline-block text-primary font-medium text-base py-2 px-4 border border-primary rounded-lg hover:bg-primary hover:text-white transition-all duration-300 mb-4">
                                Kunjungi Link Beasiswa
                            </a>
                            <button onclick="window.location.href='{{ route('dashboard') }}'" 
                                    class="mt-4 bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary_dark transition-colors duration-200">
                                Kembali
                            </button>
                        </div>
                    </div>
                </section>
            </main>
        </div>

        <div class="fixed bottom-4 left-4">
            <form method="POST" action="{{ route('logout') }}" class="m-0 p-0">
                @csrf
                <button type="submit" class="bg-white text-primary py-2 px-4 rounded-full shadow-md hover:bg-gray-100 transition-colors duration-200">
                    Logout
                </button>
            </form>
        </div>
    </div>

</body>

</html>
