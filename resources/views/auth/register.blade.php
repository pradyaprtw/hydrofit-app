<script src="https://cdn.tailwindcss.com"></script>

<x-guest-layout>
    <div class="min-h-screen flex flex-col justify-center items-center bg-white px-6 font-sans py-10">
        
        {{-- HEADER --}}
        <div class="text-center mb-8">
            <h2 class="text-2xl font-bold text-gray-800">Buat Akun Baru</h2>
            <p class="text-gray-400 text-sm mt-1">Mulai hidup sehatmu hari ini!</p>
        </div>

        {{-- FORM REGISTER --}}
        <form method="POST" action="{{ route('register') }}" class="w-full max-w-md space-y-4">
            @csrf

            {{-- Nama --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Nama Lengkap</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                         <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z" /></svg>
                    </div>
                    <input type="text" name="name" required autofocus
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-[#40B7D5] focus:ring-2 focus:ring-blue-100 outline-none transition"
                        placeholder="Nama kamu">
                </div>
            </div>

            {{-- Email --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Email</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                    </div>
                    <input type="email" name="email" required 
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-[#40B7D5] focus:ring-2 focus:ring-blue-100 outline-none transition"
                        placeholder="Alamat email">
                </div>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            {{-- Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                    </div>
                    <input type="password" name="password" required 
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-[#40B7D5] focus:ring-2 focus:ring-blue-100 outline-none transition"
                        placeholder="Minimal 8 karakter">
                </div>
            </div>

            {{-- Confirm Password --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Konfirmasi Password</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <svg class="h-5 w-5 text-gray-400" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7" /></svg>
                    </div>
                    <input type="password" name="password_confirmation" required 
                        class="w-full pl-10 pr-4 py-3 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-[#40B7D5] focus:ring-2 focus:ring-blue-100 outline-none transition"
                        placeholder="Ulangi password">
                </div>
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>

            {{-- Tombol Register --}}
            <button type="submit" class="w-full py-3.5 bg-[#40B7D5] hover:bg-[#369kb3] text-white font-bold rounded-xl shadow-md transition transform active:scale-95 mt-2">
                Daftar Akun
            </button>

            {{-- Link ke Login --}}
            <div class="text-center mt-6">
                <p class="text-sm text-gray-500">Sudah punya akun?</p>
                <a href="{{ route('login') }}" class="text-[#40B7D5] font-bold hover:underline">
                    Masuk di sini
                </a>
            </div>
        </form>
    </div>
</x-guest-layout>