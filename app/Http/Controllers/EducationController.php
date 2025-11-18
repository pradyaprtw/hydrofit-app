<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EducationController extends Controller
{
    // DATA DUMMY (Ganti Text/Gambar di sini aja)
    private $articles = [
        [
            'id' => 1,
            'title' => 'Kenapa Minum Air Penting?',
            'image' => 'asset/air.jpg', // Nanti ganti URL gambar kamu
            'content' => 'Air membantu tubuh menjaga suhu, membawa oksigen, dan mencegah kelelahan. Saat berolahraga, tubuh kehilangan banyak cairan lewat keringat, jadi penting untuk menggantinya segera agar performa tetap terjaga.',
        ],
        [
            'id' => 2,
            'title' => 'Tanda-Tanda Dehidrasi',
            'image' => 'asset/dehidrasi.jpg', 
            'content' => 'Mulut kering, pusing, urin berwarna gelap, dan lemas adalah tanda utama dehidrasi. Jika kamu merasakan ini, segera minum air putih dan istirahat sejenak di tempat sejuk.',
        ],
        [
            'id' => 3,
            'title' => 'Tips Hidrasi Sehat',
            'image' => 'asset/hidrasi.jpg',
            'content' => 'Minumlah sebelum haus. Bawa botol minum kemana-mana. Tambahkan irisan lemon atau buah lain jika bosan dengan air tawar. Hindari minuman berkafein berlebihan karena bisa memicu buang air kecil terus menerus.',
        ],
    ];

    public function index(Request $request)
    {
        $search = $request->query('search');
        $articles = collect($this->articles);

        // Logika Search
        if ($search) {
            $articles = $articles->filter(function ($item) use ($search) {
                return stripos($item['title'], $search) !== false;
            });
        }

        return view('education.index', ['articles' => $articles, 'search' => $search]);
    }

    public function show($id)
    {
        // Cari artikel berdasarkan ID
        $article = collect($this->articles)->firstWhere('id', $id);
        
        if (!$article) {
            abort(404); // Kalau id ngawur, error 404
        }

        return view('education.show', ['article' => $article]);
    }
}