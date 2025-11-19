<?php
// app/Http/Controllers/WaterIntakeController.php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\DailyIntake;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;

class WaterIntakeController extends Controller
{
    // Tampilkan Dashboard
    public function index()
    {
        $user = Auth::user();
        $today = Carbon::today();
        $intake = DailyIntake::where('user_id', $user->id)
                             ->where('date', $today)->first();

        $consumedGlasses = $intake ? $intake->total_glasses : 0;
        return view('dashboard', compact('consumedGlasses'));
    }

    // [1] UPDATE ASUPAN AIR (Dipanggil dari Reminder)
    public function update(Request $request)
    {
        $user = Auth::user();
        
        // PENTING: Safety Check untuk mencegah server crash saat sesi hilang
        if (!$user) {
            return response()->json(['status' => 'error', 'message' => 'Unauthorized'], 401);
        }
        
        $today = Carbon::today();
        $glasses = $request->glasses;
        $glass_size = 250; 

        DailyIntake::updateOrCreate(
            ['user_id' => $user->id, 'date' => $today],
            [
                'user_name' => $user->name,
                'total_glasses' => $glasses,
                'total_ml' => $glasses * $glass_size,
            ]
        );

        return response()->json(['status' => 'success']);
    }

    // [2] LOGIKA HITUNG KEBUTUHAN (Hanya tampilkan view)
    public function calculate()
    {
        return view('calculate');
    }

    // [3] SIMPAN TARGET HARIAN (Diubah jadi Mode Demo)
    public function saveTarget(Request $request)
    {
        // Karena tidak ada kolom target di tabel users, kita buat mode demo aman
        $target = $request->target;
        if ($target < 1000 || $target > 10000) {
             return response()->json(['status' => 'error', 'message' => 'Target tidak valid.'], 400);
        }
        return response()->json(['status' => 'success', 'message' => 'Target berhasil disimpan!'], 200);
    }
    
    // [4] Tampilkan Halaman Pengingat
    public function reminder()
    {
        $user = Auth::user();
        $today = Carbon::today();
        $intake = DailyIntake::where('user_id', $user->id)
                             ->where('date', $today)->first();
        $currentGlasses = $intake ? $intake->total_glasses : 0;
        return view('reminder', compact('currentGlasses'));
    }

    // [5] Tampilkan Halaman Progress (Logika Mingguan)
    public function progress()
    {
        $user = Auth::user();
        $startOfWeek = Carbon::now()->startOfWeek(); 
        $endOfWeek = Carbon::now()->endOfWeek();     

        $records = DailyIntake::where('user_id', $user->id)
                    ->whereBetween('date', [$startOfWeek, $endOfWeek])
                    ->get()
                    ->keyBy('date'); 

        $weeklyData = [];
        $period = \Carbon\CarbonPeriod::create($startOfWeek, $endOfWeek);

        foreach ($period as $date) {
            $dateStr = $date->format('Y-m-d');
            $dayName = [ 'Mon' => 'Senin', 'Tue' => 'Selasa', 'Wed' => 'Rabu', 
                         'Thu' => 'Kamis', 'Fri' => 'Jumat', 'Sat' => 'Sabtu', 'Sun' => 'Minggu'
                       ][$date->format('D')];

            $glasses = isset($records[$dateStr]) ? $records[$dateStr]->total_glasses : 0;

            $status = ""; $color = ""; 
            
            if ($glasses >= 8) {
                $status = "✅ Cukup"; $color = "text-green-600 bg-green-100";
            } elseif ($glasses == 7) {
                $status = "⚠️ Sedikit Kurang"; $color = "text-yellow-600 bg-yellow-100";
            } else {
                $status = "❌ Kurang"; $color = "text-red-600 bg-red-100";
            }

            $weeklyData[] = ['day' => $dayName, 'glasses' => $glasses, 'status' => $status, 'color' => $color];
        }

        return view('progress', compact('weeklyData'));
    }


    
    // [6] Tampilkan Halaman About
    public function about()
    {
        return view('about');
    }
}