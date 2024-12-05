<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kejar Target</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-roboto leading-normal tracking-normal">

    <div class="flex min-h-screen flex-col">
        @include('components.header')

        <div class="flex flex-1 bg-gray-100">
            @include('components.sidebar')

            <main class="flex-1 ml-56 p-6">
                <!-- Welcome Section -->
                @include('components.welcome')

                <!-- Cards Section -->
                <section class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-3 gap-6">
                    @foreach ($beasiswas as $beasiswa)
                    <div class="bg-white p-6 rounded-lg shadow-md hover:shadow-lg transition-shadow duration-300">
                        <h2 class="text-xl font-semibold text-primary">{{ $beasiswa->title }}</h2>
                        <p class="text-gray-600 mt-2">Batas Pendaftaran: {{ \Carbon\Carbon::parse($beasiswa->expired_date)->format('d-m-Y') }}</p>
                        <p class="text-gray-600 mt-2 truncate">{{ $beasiswa->description }}</p>
                        <button onclick="window.location.href='{{ route('detail', ['id' => $beasiswa->id]) }}'"
                            class="mt-4 bg-primary text-white py-2 px-4 rounded-lg hover:bg-primary_dark transition-colors duration-200">
                            Detail
                        </button>
                    </div>
                    @endforeach
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
