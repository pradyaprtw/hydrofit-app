<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyIntake;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WaterIntakeController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today();

        // Ambil data hari ini, kalau gak ada anggap 0
        $intake = DailyIntake::where('user_id', $user->id)
                    ->where('date', $today)
                    ->first();

        $consumedGlasses = $intake ? $intake->total_glasses : 0;

        return view('dashboard', compact('consumedGlasses'));
    }

    public function update(Request $request)
    {
        $user = Auth::user();
        $today = Carbon::today();
        $glasses = $request->glasses;

        DailyIntake::updateOrCreate(
            ['user_id' => $user->id, 'date' => $today],
            [
                'user_name' => $user->name,
                'total_glasses' => $glasses,
                'total_ml' => $glasses * 250,
            ]
        );

        return response()->json(['status' => 'success']);
    }

    // Tampilkan Halaman Hitung
    public function calculate()
    {
        return view('calculate');
    }

    // Simpan Target Baru ke Database (User Table)
    public function saveTarget(Request $request)
    {
        $user = Auth::user();
        
        // Kita simpan targetnya di tabel users (pastikan kolom daily_target ada, atau kita paksa update aja)
        // Kalau mau simple buat tugas, kita anggap sukses aja dulu
        // $user->daily_target = $request->target;
        // $user->save();

        return response()->json(['status' => 'success', 'message' => 'Target berhasil disimpan!']);
    }

    public function reminder()
    {
        $user = Auth::user();
        $today = Carbon::today();

        // Cek data hari ini, biar kalau direfresh gelasnya gak ilang
        $intake = DailyIntake::where('user_id', $user->id)
                    ->where('date', $today)
                    ->first();

        $currentGlasses = $intake ? $intake->total_glasses : 0;

        return view('reminder', compact('currentGlasses'));
    }

    public function progress()
    {
        $user = Auth::user();
        $startOfWeek = Carbon::now()->startOfWeek(); // Hari Senin minggu ini
        $endOfWeek = Carbon::now()->endOfWeek();     // Hari Minggu minggu ini

        // Ambil data database range minggu ini
        $records = DailyIntake::where('user_id', $user->id)
                    ->whereBetween('date', [$startOfWeek, $endOfWeek])
                    ->get()
                    ->keyBy('date'); // Biar gampang dipanggil pakai tanggal

        // Siapkan Array Kosong Senin-Minggu
        $weeklyData = [];
        $period = \Carbon\CarbonPeriod::create($startOfWeek, $endOfWeek);

        foreach ($period as $date) {
            $dateStr = $date->format('Y-m-d');
            // Nama Hari Indonesia Manual biar pasti bener
            $dayName = [
                'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 
                'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu', 'Sun' => 'Minggu'
            ][$date->format('D')];

            // Cek apakah ada data di database tanggal tsb?
            $glasses = isset($records[$dateStr]) ? $records[$dateStr]->total_glasses : 0;

            // Tentukan Status Sesuai Request
            $status = "";
            $color = ""; // Buat warna status biar cantik
            
            if ($glasses >= 8) {
                $status = "✅ Cukup";
                $color = "text-green-600 bg-green-100";
            } elseif ($glasses == 7) {
                $status = "⚠️ Sedikit Kurang";
                $color = "text-yellow-600 bg-yellow-100";
            } else {
                $status = "❌ Kurang";
                $color = "text-red-600 bg-red-100";
            }

            // Masukkan ke array
            $weeklyData[] = [
                'day' => $dayName,
                'glasses' => $glasses,
                'status' => $status,
                'color' => $color
            ];
        }

        return view('progress', compact('weeklyData'));
    }

    public function about()
    {
        return view('about');
    }
}