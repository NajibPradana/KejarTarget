<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body>
    <div class="relative flex min-h-screen items-center justify-center bg-cover bg-center" style="background-image: url('/img/download1.jpg');">
        <div class="absolute inset-0 bg-black opacity-50"></div> <!-- Overlay untuk latar belakang gelap -->

        <div class="relative bg-gray-800 bg-opacity-50 px-8 py-10 rounded-lg shadow-xl backdrop-blur-md w-full max-w-md z-10">
            <div class="text-center text-white mb-8">
                <img src="img/logo.jpg" alt="Logo" width="100" class="mx-auto mb-6">
                <h1 class="text-2xl font-bold mb-2">Daftar Akun</h1>
                <p class="text-gray-300">Silakan buat akun untuk melanjutkan</p>
            </div>

            <form method="POST" action="{{ route('register') }}">
                @csrf

                <!-- Name -->
                <div class="mb-4">
                    <input id="name" type="text" name="name" :value="old('name')" required autofocus autocomplete="name"
                        class="w-full rounded-3xl bg-indigo-400 bg-opacity-50 px-6 py-2 text-center text-white placeholder-gray-300 shadow-lg outline-none backdrop-blur-md"
                        placeholder="Nama Lengkap">
                    <x-input-error :messages="$errors->get('name')" class="mt-2" />
                </div>

                <!-- Email Address -->
                <div class="mb-4">
                    <input id="email" type="email" name="email" :value="old('email')" required autocomplete="username"
                        class="w-full rounded-3xl bg-indigo-400 bg-opacity-50 px-6 py-2 text-center text-white placeholder-gray-300 shadow-lg outline-none backdrop-blur-md"
                        placeholder="Email">
                    <x-input-error :messages="$errors->get('email')" class="mt-2" />
                </div>

                <!-- Password -->
                <div class="mb-4">
                    <input id="password" type="password" name="password" required autocomplete="new-password"
                        class="w-full rounded-3xl bg-indigo-400 bg-opacity-50 px-6 py-2 text-center text-white placeholder-gray-300 shadow-lg outline-none backdrop-blur-md"
                        placeholder="Password">
                    <x-input-error :messages="$errors->get('password')" class="mt-2" />
                </div>

                <!-- Confirm Password -->
                <div class="mb-4">
                    <input id="password_confirmation" type="password" name="password_confirmation" required autocomplete="new-password"
                        class="w-full rounded-3xl bg-indigo-400 bg-opacity-50 px-6 py-2 text-center text-white placeholder-gray-300 shadow-lg outline-none backdrop-blur-md"
                        placeholder="Konfirmasi Password">
                    <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                </div>

                <div class="flex items-center justify-between text-sm mb-4">
                    <a href="{{ route('login') }}" class="text-indigo-200 hover:underline">Sudah punya akun?</a>
                </div>

                <div>
                    <button type="submit" class="w-full rounded-3xl bg-indigo-500 bg-opacity-50 px-6 py-2 text-white shadow-lg backdrop-blur-md transition-colors duration-300 hover:bg-indigo-600">
                        Daftar
                    </button>
                </div>
            </form>
        </div>
    </div>
</body>
</html>
