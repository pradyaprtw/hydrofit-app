<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="min-h-screen bg-white pb-24 font-sans">
        
        {{-- APP BAR --}}
        <div class="flex items-center px-4 py-4 bg-white sticky top-0 z-10">
            {{-- Tombol Hamburger (Buka Sidebar) --}}
            <button onclick="window.location.href='{{ route('dashboard') }}'" class="bg-gray-200 p-2 rounded-full text-gray-500">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
            <div class="flex-1"></div> 
        </div>

        {{-- KONTEN TENTANG APLIKASI --}}
        <div class="px-6 flex flex-col items-center text-center">
            
            {{-- Gambar Bulat --}}
            <div class="w-32 h-32 rounded-full overflow-hidden border-4 border-blue-100 mb-6 shadow-sm">
                {{-- Ganti asset('asset/air.jpg') dengan gambar gelasmu --}}
                <img src="{{ asset('asset/air.jpg') }}" class="w-full h-full object-cover">
            </div>

            {{-- Judul --}}
            <h1 class="text-xl font-bold text-black mb-2">
                HydroFit - Pemantau Hidrasi Atlet
            </h1>

            {{-- Deskripsi --}}
            <p class="text-gray-500 text-sm mb-6">
                Membantu pengguna mengetahui kebutuhan air dan mencegah dehidrasi
            </p>

            {{-- Pembuat --}}
            <div class="mb-4">
                <h3 class="font-bold text-black text-sm">Pembuat:</h3>
                <p class="text-gray-600 text-sm">Azzahra Fadhilla Amelia (2258011043)</p> {{-- Ganti Nama Kamu --}}
            </div>

            {{-- Sumber --}}
            <div class="mb-8">
                <h3 class="font-bold text-black text-sm mb-1">Sumber:</h3>
                <ul class="text-gray-800 text-sm font-medium leading-relaxed">
                    <li>1. Modul Sport Medicine FK Unila (2025)</li>
                    <li>2. Guyton & Hall, Textbook of Medicine Physiology (1996)</li>
                </ul>
            </div>

            {{-- Box Abu-Abu --}}
            <div class="bg-gray-100 rounded-xl p-4 w-full text-left">
                <p class="text-gray-700 text-sm leading-relaxed">
                    Dikembangkan untuk mendukung kesehatan dan performa atlet melalui hidrasi yang optimal.
                </p>
            </div>

        </div>

        {{-- BOTTOM NAV --}}
        <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 px-4 py-2 flex justify-between items-center z-50">
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                 <span class="text-[10px] mt-1">Dashboard</span>
            </a>
            <div class="flex flex-col items-center text-gray-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                <span class="text-[10px] mt-1">Hitung</span>
            </div>
            <div class="flex flex-col items-center text-gray-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <span class="text-[10px] mt-1">Pengingat</span>
            </div>
            <div class="flex flex-col items-center text-gray-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <span class="text-[10px] mt-1">Edukasi</span>
            </div>
             <div class="flex flex-col items-center text-gray-400">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                <span class="text-[10px] mt-1">Progress</span>
            </div>
        </div>

    </div>
</x-app-layout>