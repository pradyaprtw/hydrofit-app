<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="min-h-screen bg-white pb-24 font-sans">
        
        {{-- APP BAR --}}
        <div class="flex items-center px-4 py-4 bg-white sticky top-0 z-10 shadow-sm">
             <button onclick="window.history.back()" class="text-gray-500 mr-4">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </button>
            <h1 class="text-lg font-bold text-gray-800 text-center flex-1 mr-8">Progress</h1>
        </div>

        {{-- KONTEN UTAMA --}}
        <div class="px-6 mt-4">
            
            <h2 class="text-xl font-bold text-gray-900 text-center mb-6">
                Progress Minum Mingguan
            </h2>

            {{-- TABEL DATA --}}
            <div class="overflow-hidden rounded-lg border border-gray-200 shadow-sm">
                <table class="w-full text-sm text-left text-gray-500">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 border-b">
                        <tr>
                            <th class="px-4 py-3 font-bold text-left">HARI</th>
                            <th class="px-4 py-3 font-bold text-center">GELAS</th>
                            <th class="px-4 py-3 font-bold text-right">STATUS</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-gray-100">
                        @foreach($weeklyData as $data)
                        <tr class="bg-white hover:bg-gray-50">
                            {{-- Hari --}}
                            <td class="px-4 py-4 font-medium text-gray-900">
                                {{ $data['day'] }}
                            </td>
                            
                            {{-- Jumlah Gelas --}}
                            <td class="px-4 py-4 text-center font-bold text-gray-700">
                                {{ $data['glasses'] }}
                            </td>
                            
                            {{-- Status (Dengan Warna) --}}
                            <td class="px-4 py-4 text-right">
                                <span class="px-2 py-1 rounded-full text-xs font-bold {{ $data['color'] }}">
                                    {{ $data['status'] }}
                                </span>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            
            <p class="text-xs text-gray-400 mt-4 text-center italic">
                *Data direset setiap hari Senin
            </p>

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
            <a href="{{ route('education.index') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <span class="text-[10px] mt-1">Edukasi</span>
            </a>
            {{-- PROGRESS (ACTIVE) --}}
             <div class="flex flex-col items-center" style="color: #40B7D5;">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                <span class="text-[10px] mt-1 font-bold">Progress</span>
            </div>
        </div>

    </div>
</x-app-layout>