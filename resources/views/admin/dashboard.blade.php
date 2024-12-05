<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="bg-gray-100">
    @include('components.header')

    <div class="flex min-h-screen">
        @include('admin.sidebar')

        <!-- Content -->
        <div class="flex-1 p-8">
            <div class="bg-indigo-100 p-6 rounded-lg shadow-md mb-8">
                <h2 class="text-2xl font-bold text-indigo-700 mb-2">Welcome Admin</h2>
                <p class="text-indigo-600">Kejar Beasiswa, Raih Target Masa Depanmu!</p>
            </div>

            <!-- Button Tambah Data -->
            <div class="mb-6">
                <a href="{{ route('admin.tambahbeasiswa') }}" class="bg-indigo-600 text-white py-2 px-4 rounded-lg shadow hover:bg-indigo-700">
                    + Tambah Data Beasiswa
                </a>
            </div>

            <!-- Table -->
            <div class="bg-white rounded-lg shadow">
                <table class="min-w-full table-auto border-collapse">
                    <thead>
                        <tr class="bg-indigo-600 text-white">
                            <th class="py-2 px-4 border">No</th>
                            <th class="py-2 px-4 border">Nama Beasiswa</th>
                            <th class="py-2 px-4 border">Batas Pendaftaran</th>
                            <th class="py-2 px-4 border">Link Pendaftaran</th>
                            <th class="py-2 px-4 border">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($beasiswas as $key => $beasiswa)
                        <tr class="bg-gray-100 hover:bg-gray-200">
                            <td class="py-2 px-4 border text-center">{{ $key + 1 }}</td>
                            <td class="py-2 px-4 border">{{ $beasiswa->title }}</td>
                            <td class="py-2 px-4 border text-center">{{ $beasiswa->expired_date }}</td>
                            <td class="py-2 px-4 border text-center">
                                <a href="{{ $beasiswa->application_link }}" class="text-indigo-600 hover:underline" target="_blank">
                                    {{ $beasiswa->application_link }}
                                </a>
                            </td>
                            <td class="py-2 px-4 border text-center">
                                <a href="{{ route('beasiswa.edit', $beasiswa->id) }}" 
                                    class="bg-yellow-500 text-white py-1 px-4 rounded-lg shadow hover:bg-yellow-600">
                                    Edit
                                </a>
                                <form action="{{ route('beasiswa.destroy', $beasiswa->id) }}" method="POST" class="inline-block ml-2">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" 
                                        class="bg-red-500 text-white py-1 px-4 rounded-lg shadow hover:bg-red-600">
                                        Hapus
                                    </button>
                                </form>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="5" class="py-4 px-4 text-center text-gray-500">
                                Belum ada data beasiswa yang ditambahkan.
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                    
                </table>
            </div>
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
