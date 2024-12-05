<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="relative h-screen flex items-center justify-center bg-cover bg-center" style="background-image: url('/img/download1.jpg');">
        <!-- Overlay -->
        <div class="absolute inset-0 bg-black opacity-50"></div>

        <!-- Content -->
        <div class="relative text-center bg-gray-800 bg-opacity-75 rounded-lg px-8 py-10 shadow-lg">
            <h1 class="text-4xl font-bold text-white mb-4">Kejar Target</h1>
            <p class="text-gray-300 text-lg mb-6">
                Situs pencarian Beasiswa untuk mewujudkan impian Anda menjadi kaya. Langkah pertama menuju masa depan cerah. Jelajahi Beasiswa Anda di Kejar Target!
            </p>
            <a href="{{ route('register') }}" class="bg-purple-600 hover:bg-purple-800 text-white font-semibold py-2 px-6 rounded-full transition-all">
                More Info
            </a>
        </div>
    </div>
</body>
</html>
