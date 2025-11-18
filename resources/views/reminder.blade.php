<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header"></x-slot>

    <div class="min-h-screen bg-white pb-24 font-sans">
        
        {{-- APP BAR --}}
        <div class="flex items-center justify-between px-4 py-4 bg-white sticky top-0 z-10 shadow-sm">
            {{-- Tombol Kembali ke Dashboard --}}
            <a href="{{ route('dashboard') }}" class="text-gray-500 p-2">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 19l-7-7 7-7"></path></svg>
            </a>
            <h1 class="text-lg font-bold text-gray-800">Pengingat</h1>
            <div style="width: 24px;"></div> 
        </div>

        {{-- KONTEN UTAMA --}}
        <div class="px-6 mt-2 text-center">
            <h2 class="text-xl font-bold text-gray-900">Cek Asupan Air Hari Ini!</h2>
            <p class="text-gray-400 text-sm mt-1 mb-6">Target: 8 gelas per hari</p>

            {{-- Tombol Atur Pengingat --}}
            <div class="flex justify-end mb-6">
                <button type="button" onclick="setReminder()" class="flex items-center px-4 py-2 rounded-lg shadow-sm text-white text-sm font-bold transition transform active:scale-95 hover:bg-opacity-90" style="background-color: #40B7D5;">
                    <span class="mr-2">🔔</span> Atur pengingat!
                </button>
            </div>

            {{-- LIST GELAS --}}
            <div class="space-y-4 text-left px-4">
                @for ($i = 1; $i <= 8; $i++)
                    <div onclick="toggleGlass({{ $i }})" class="flex items-center cursor-pointer select-none group p-1 hover:bg-gray-50 rounded-lg transition">
                        <div class="relative w-10 h-10 mr-4">
                            {{-- Gelas Kosong --}}
                            <svg id="glass-empty-{{ $i }}" class="w-10 h-10 text-gray-300 absolute top-0 left-0 transition-opacity duration-300 {{ $i <= $currentGlasses ? 'opacity-0' : 'opacity-100' }}" fill="none" stroke="currentColor" viewBox="0 0 24 24" stroke-width="2">
                                <path stroke-linecap="round" stroke-linejoin="round" d="M6 4h12a1 1 0 0 1 1 1v11.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 5 16.5V5a1 1 0 0 1 1-1z" />
                                <path stroke-linecap="round" stroke-linejoin="round" d="M9 12h6" />
                            </svg>
                            {{-- Gelas Terisi --}}
                            <svg id="glass-full-{{ $i }}" class="w-10 h-10 text-[#40B7D5] absolute top-0 left-0 transition-opacity duration-300 {{ $i <= $currentGlasses ? 'opacity-100' : 'opacity-0' }}" fill="currentColor" viewBox="0 0 24 24">
                                <path d="M6 4h12a1 1 0 0 1 1 1v11.5a2.5 2.5 0 0 1-2.5 2.5h-9A2.5 2.5 0 0 1 5 16.5V5a1 1 0 0 1 1-1z" />
                            </svg>
                        </div>
                        <span class="text-gray-700 text-lg font-medium">{{ $i }} Gelas</span>
                    </div>
                @endfor
            </div>

            {{-- TEKS MOTIVASI --}}
            <div class="mt-8 min-h-[4rem] flex items-center justify-center">
                <p id="motivation-text" class="text-lg font-bold text-gray-800 transition-all duration-300">
                    Tetap hidrasi ya!
                </p>
            </div>

            {{-- Tombol Simpan (FIXED) --}}
            <button type="button" onclick="saveData()" class="w-full mt-6 flex items-center justify-center py-3 text-white rounded-lg shadow-md transition transform active:scale-95 hover:bg-opacity-90" style="background-color: #40B7D5;">
                <span class="mr-2 text-xl">💧</span>
                <span class="font-bold text-lg">Simpan Asupan Air</span>
            </button>

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
            <div class="flex flex-col items-center" style="color: #40B7D5;">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path></svg>
                <span class="text-[10px] mt-1 font-bold">Pengingat</span>
            </div>

            <a href="{{ route('education.index') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                <span class="text-[10px] mt-1">Edukasi</span>
            </a>
            <a href="{{ route('progress') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path></svg>
                <span class="text-[10px] mt-1 font-bold">Progress</span>
            </a>
        </div>
        
    </div>
    
    {{-- SCRIPT LOGIKA YANG DULU KEPOTONG --}}
    <div class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
    <script>
        let currentGlasses = {{ $currentGlasses }};
        
        // Panggil pas pertama load biar teksnya bener
        updateText(currentGlasses);

        // Logika Toggle Gelas
        function toggleGlass(index) {
            if (currentGlasses === index) {
                currentGlasses = index - 1; 
            } else {
                currentGlasses = index; 
            }
            renderGlasses();
            updateText(currentGlasses);
        }

        // Render Ulang Icon Gelas
        function renderGlasses() {
            for (let i = 1; i <= 8; i++) {
                const empty = document.getElementById(`glass-empty-${i}`);
                const full = document.getElementById(`glass-full-${i}`);
                
                if (i <= currentGlasses) {
                    empty.classList.add('opacity-0');
                    empty.classList.remove('opacity-100');
                    full.classList.add('opacity-100');
                    full.classList.remove('opacity-0');
                } else {
                    empty.classList.add('opacity-100');
                    empty.classList.remove('opacity-0');
                    full.classList.add('opacity-0');
                    full.classList.remove('opacity-100');
                }
            }
        }

        // Update Teks Motivasi
        function updateText(count) {
            const textElem = document.getElementById('motivation-text');
            let message = "";

            if (count === 0) {
                message = "Tetap hidrasi ya!";
            } else if (count < 3) {
                message = "Baru dikit banget nih... yuk tambah lagi biar tubuhmu segar 🌸";
            } else if (count === 3) {
                message = "Kamu sudah minum 3 gelas hari ini! Tetap semangat🦾";
            } else if (count < 8) {
                message = "Teruskan ya! Sedikit lagi mencapai target!";
            } else {
                message = "Keren! Kamu sudah mencapai target air hari ini! 🎉";
            }
            textElem.innerText = message;
        }

        // FUNGSI SIMPAN (Ini yang kemarin hilang!)
        function saveData() {
            console.log("Tombol simpan ditekan! Mengirim data...");

            fetch("{{ route('water.update') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ glasses: currentGlasses })
            })
            .then(response => response.json())
            .then(data => {
                console.log("Sukses:", data);
                // Alert Sukses
                alert("Data asupan air berhasil disimpan! ✅");
            })
            .catch(error => {
                console.error('Error:', error);
                alert("Gagal menyimpan data. Cek koneksi atau server.");
            });
        }

        // Fungsi Pengingat
        function setReminder() {
            alert("Pengingat Aktif! 🔔\n\nSistem akan mengingatkanmu setiap 2 jam.");
            // Timer 2 Jam (7200000 ms)
            setTimeout(() => {
                if(currentGlasses < 8) alert("Waktunya Minum! 💧\nSudah 2 jam berlalu, ayo minum!");
            }, 7200000); 
        }
    </script>
</x-app-layout>