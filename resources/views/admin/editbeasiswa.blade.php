<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Beasiswa</title>
    @vite('resources/css/app.css')
</head>

<body class="bg-gray-100 font-roboto leading-normal tracking-normal">

    @include('components.header')

    <div class="flex min-h-screen">
        @include('admin.sidebar')

        <main class="flex-1 p-6 ml-48">
            <div class="p-8 bg-white rounded-lg shadow-md">
                <h2 class="text-2xl font-semibold mb-6 text-primary">Edit Data Beasiswa</h2>

                <form id="beasiswaForm" action="{{ route('beasiswa.update', $beasiswa->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT') <!-- Spoofing method PUT -->
                
                    <div class="grid grid-cols-4 gap-6">
                        <div class="col-span-2">
                            <div class="mb-4">
                                <label for="namaBeasiswa" class="block text-gray-700 font-medium">Nama Beasiswa:</label>
                                <input type="text" id="title" name="title" value="{{ old('title', $beasiswa->title) }}"
                                    class="w-full border-2 border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-300 ease-in-out" required>
                            </div>
                            <div class="mb-4">
                                <label for="batasPendaftaran" class="block text-gray-700 font-medium">Batas Pendaftaran:</label>
                                <input type="date" id="expired_date" name="expired_date" value="{{ old('expired_date', $beasiswa->expired_date) }}"
                                    class="w-full border-2 border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-300 ease-in-out" required>
                            </div>
                            <div class="mb-4">
                                <label for="linkPendaftaran" class="block text-gray-700 font-medium">Link Pendaftaran:</label>
                                <input type="url" id="application_link" name="application_link" value="{{ old('application_link', $beasiswa->application_link) }}"
                                    class="w-full border-2 border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-300 ease-in-out" required>
                            </div>
                        </div>
                
                        <div class="col-span-2">
                            <div class="mb-4">
                                <label for="deskripsi" class="block text-gray-700 font-medium">Deskripsi:</label>
                                <textarea id="description" name="description"
                                    class="w-full border-2 border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-300 ease-in-out" required>{{ old('description', $beasiswa->description) }}</textarea>
                            </div>
                            <div class="mb-4">
                                <label for="fotoBeasiswa" class="block text-gray-700 font-medium">Foto Beasiswa:</label>
                                <input type="file" id="fotoBeasiswa" name="fotoBeasiswa"
                                    class="w-full border-2 border-gray-300 rounded-lg px-3 py-2 focus:outline-none focus:ring-2 focus:ring-primary focus:border-primary transition duration-300 ease-in-out"
                                    accept=".jpg, .jpeg, .png">
                                <small class="text-gray-500 mt-1 block">Pilih gambar baru (JPEG/JPG/PNG), atau biarkan kosong untuk mempertahankan gambar lama.</small>
                                @if ($beasiswa->image_url)
                                    <img src="{{ asset('storage/' . $beasiswa->image_url) }}" alt="Gambar Beasiswa" class="mt-3 w-32 h-32 object-cover rounded">
                                @endif
                            </div>
                        </div>
                    </div>
                
                    <div class="flex justify-end space-x-4 mt-6">
                        <button type="button" onclick="window.location.href='{{ route('admin.dashboard') }}'"
                            class="bg-gray-500 text-white py-2 px-4 rounded-lg hover:bg-gray-700 transition-colors duration-200">
                            Kembali
                        </button>
                        <button type="submit"
                            class="bg-primary text-white px-4 py-2 rounded-lg hover:bg-primary-dark focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50 transition duration-200 ease-in-out">
                            Submit
                        </button>
                    </div>
                </form>
                
            </div>
        </main>
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
