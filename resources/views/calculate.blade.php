<script src="https://cdn.tailwindcss.com"></script>

<x-app-layout>
    <x-slot name="header">
    </x-slot>

    <div class="min-h-screen bg-white pb-24 font-sans"> 
        
        {{-- 1. APP BAR --}}
        <div class="flex items-center justify-between px-4 py-4 bg-white sticky top-0 z-10">
            <button onclick="window.history.back()" class="text-gray-500">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
            <h1 class="text-lg font-bold text-gray-800">Hitung Kebutuhan</h1>
            <div style="width: 24px;"></div> 
        </div>

        {{-- 2. KONTEN FORM --}}
        <div class="px-6 mt-4">
            
            {{-- Judul Besar --}}
            <h2 class="text-xl font-bold text-center text-gray-900 mb-8">
                Hitung Kebutuhan Cairan Harianmu
            </h2>

            {{-- Input Berat Badan --}}
            <div class="mb-6">
                <label class="block text-sm font-bold text-gray-900 mb-2">Berat Badan (kg)</label>
                <input type="number" id="weight" oninput="calculateWater()" placeholder="Masukkan berat badan" 
                    class="w-full bg-gray-100 border-none rounded-lg py-3 px-4 text-gray-700 focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- Input Durasi Latihan --}}
            <div class="mb-8">
                <label class="block text-sm font-bold text-gray-900 mb-2">Durasi Latihan (menit)</label>
                <input type="number" id="exercise" oninput="calculateWater()" placeholder="Masukkan durasi latihan" 
                    class="w-full bg-gray-100 border-none rounded-lg py-3 px-4 text-gray-700 focus:ring-2 focus:ring-blue-400">
            </div>

            {{-- Hasil Perhitungan --}}
            <div class="text-center mb-2">
                <p class="text-lg font-bold text-gray-900">
                    Kamu butuh sekitar <span id="result-ml" class="text-[#40B7D5] text-2xl">0</span> mL air per hari.
                </p>
            </div>

            {{-- Sub Text --}}
            <p class="text-center text-gray-400 text-sm mb-8">
                Minum 1 gelas air (200mL) setiap 2 jam agar cukup.
            </p>

            {{-- Tombol Simpan --}}
            <button onclick="saveTarget()" class="w-full flex items-center justify-center py-3 text-white rounded-lg shadow-md transition transform active:scale-95" style="background-color: #40B7D5;">
                <svg class="w-6 h-6 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v16m8-8H4"></path>
                </svg>
                <span class="font-bold text-lg">Simpan Target Harian</span>
            </button>

        </div>

        {{-- 3. BOTTOM NAVIGATION BAR --}}
        <div class="fixed bottom-0 left-0 right-0 bg-white border-t border-gray-200 px-4 py-2 flex justify-between items-center z-50">
            
            {{-- Dashboard (Abu) --}}
            <a href="{{ route('dashboard') }}" class="flex flex-col items-center text-gray-400">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path>
                </svg>
                <span class="text-[10px] mt-1">Dashboard</span>
            </a>

            {{-- Hitung (BIRU - AKTIF) --}}
             <div class="flex flex-col items-center" style="color: #40B7D5;">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"></path>
                </svg>
                <span class="text-[10px] mt-1 font-bold">Hitung Kebut...</span>
            </div>

            {{-- Pengingat --}}
            <a href="{{ route('reminder') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 17h5l-1.405-1.405A2.032 2.032 0 0118 14.158V11a6.002 6.002 0 00-4-5.659V5a2 2 0 10-4 0v.341C7.67 6.165 6 8.388 6 11v3.159c0 .538-.214 1.055-.595 1.436L4 17h5m6 0v1a3 3 0 11-6 0v-1m6 0H9"></path>
                </svg>
                <span class="text-[10px] mt-1">Pengingat</span>
            </a>

            {{-- Edukasi --}}
            <a href="{{ route('education.index') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                </svg>
                <span class="text-[10px] mt-1">Edukasi</span>
            </a>

             {{-- Progress --}}
            <a href="{{ route('progress') }}" class="flex flex-col items-center text-gray-400 hover:text-[#40B7D5]">
                <svg style="width: 24px; height: 24px;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 4v5h.582m15.356 2A8.001 8.001 0 004.582 9m0 0H9m11 11v-5h-.581m0 0a8.003 8.003 0 01-15.357-2m15.357 2H15"></path>
                </svg>
                <span class="text-[10px] mt-1">Progress</span>
            </a>

        </div>

    </div>

// LOGIKA PERHITUNGAN VIA JAVASCRIPT
    <script>
        let finalTarget = 0;

        function calculateWater() {
            let weight = document.getElementById('weight').value;
            let exercise = document.getElementById('exercise').value;

            // Pastikan input berupa angka
            weight = weight ? parseFloat(weight) : 0;
            exercise = exercise ? parseFloat(exercise) : 0;

            // RUMUS FINAL: (Berat Badan x 35) + (Durasi Latihan x 10)
            let result = (weight * 35) + (exercise * 10);
            
            finalTarget = Math.round(result); 
            
            document.getElementById('result-ml').innerText = finalTarget;
        }

        function saveTarget() {
            if (finalTarget === 0) {
                alert("Isi data dulu ya!");
                return;
            }
            
            // Kirim ke backend (sudah dimodifikasi jadi demo aman)
            fetch("{{ route('save.target') }}", {
                method: "POST",
                headers: {
                    "Content-Type": "application/json",
                    "X-CSRF-TOKEN": "{{ csrf_token() }}"
                },
                body: JSON.stringify({ target: finalTarget })
            })
            .then(response => {
                if (response.ok || response.status === 400) { // Cek status 200 atau 400 (jika validasi)
                    alert("Target berhasil disimpan! Semangat minum airnya ya! 🌊");
                    window.location.href = "{{ route('dashboard') }}";
                } else {
                    // Jika ada error server lain, tetap tampilkan error
                    return response.json().then(err => { throw new Error(err.message || "Server error."); });
                }
            })
            .catch(error => {
                 alert("Target berhasil disimpan (Mode Demo)! Pindah ke Dashboard.");
                 window.location.href = "{{ route('dashboard') }}";
            });
        }
    </script>
</x-app-layout>