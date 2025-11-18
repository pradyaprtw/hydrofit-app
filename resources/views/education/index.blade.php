{{-- <script src="https://cdn.tailwindcss.com"></script> --}}

<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="min-h-screen bg-white pb-24 font-sans">
        
        {{-- APP BAR --}}
        <div class="flex items-center px-4 py-4 bg-white sticky top-0 z-10">
            <button class="text-gray-500 mr-4">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path></svg>
            </button>
             {{-- Search Bar --}}
            <form action="{{ route('education.index') }}" method="GET" class="flex-1">
                <div class="relative">
                    <span class="absolute inset-y-0 left-0 flex items-center pl-3">
                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path></svg>
                    </span>
                    <input type="text" name="search" value="{{ $search }}" placeholder="Search" 
                        class="w-full py-2 pl-10 pr-4 bg-gray-100 rounded-lg text-sm focus:outline-none focus:ring-2 focus:ring-blue-300 border-none">
                </div>
            </form>
        </div>

        {{-- GRID CONTENT --}}
        <div class="px-4 mt-2">
            <div class="grid grid-cols-2 gap-4">
                
                @forelse($articles as $item)
                <a href="{{ route('education.show', $item['id']) }}" class="bg-gray-50 rounded-xl shadow-sm overflow-hidden border border-gray-100 active:scale-95 transition transform">
                    {{-- Gambar (Placeholder kalau user belum ganti) --}}
                    <div class="h-32 w-full bg-blue-100 flex items-center justify-center overflow-hidden">
                        <img src="{{ $item['image'] }}" alt="{{ $item['title'] }}" class="w-full h-full object-cover">
                    </div>
                    {{-- Judul --}}
                    <div class="p-3">
                        <h3 class="font-bold text-gray-800 text-sm leading-snug">{{ $item['title'] }}</h3>
                    </div>
                </a>
                @empty
                <div class="col-span-2 text-center py-10 text-gray-400">
                    <p>Artikel tidak ditemukan.</p>
                </div>
                @endforelse

            </div>
        </div>

        {{-- BOTTOM NAV --}}
        <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 px-4 py-2 flex justify-between items-center z-50">
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                 <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                 <span class="text-[10px] mt-1">Dashboard</span>
            </a>
            <a href="{{ route('calculate') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path></svg>
                <span class="text-[10px] mt-1">Hitung</span>
            </a>
            <a href="{{ route('reminder') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <span class="text-[10px] mt-1">Pengingat</span>
            </a>
            {{-- EDUKASI (ACTIVE) --}}
            <div class="flex flex-col items-center" style="color: #40B7D5;">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <span class="text-[10px] mt-1 font-bold">Edukasi</span>
            </div>
            <a href="{{ route('progress') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                <span class="text-[10px] mt-1">Progress</span>
            </a>
        </div>
    </div>
</x-app-layout>