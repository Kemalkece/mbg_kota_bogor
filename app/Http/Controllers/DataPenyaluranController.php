<?php

namespace App\Http\Controllers;

use App\Models\DataPenyaluran;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class DataPenyaluranController extends Controller
{
    public function index()
    {
        $dataPenyalurans = DataPenyaluran::all();
        return view('components.data', compact('dataPenyalurans'));
    }

    public function apiDataPenyaluran()
    {
        try {
            // Kita atur timeout 5 detik supaya loading tidak lama jika API sedang down/MT
            $response = Http::timeout(5)->withoutVerifying()->get('https://mbg-peta.kotabogor.go.id/Api/dashboard');

            if ($response->successful()) {
                $posts = $response->json();
            } else {
                throw new \Exception("Server merespon dengan status: " . $response->status());
            }

        } catch (\Exception $e) {
            // FALLBACK DATA: Jika cURL Error / Time Out / API Mati
            // Saya memasukkan JSON yang Anda berikan sebelumnya sebagai data darurat sementara
            $posts = [
                'status' => true,
                'message' => 'Data offline fallback aktif',
                'data' => [
                    'jml_kecamatan' => 6,
                    'jml_sppg' => 96,
                    'jml_sekolah_mbg' => 725,
                    'jml_posyandu_mbg' => 504,
                    'jml_kelompok_penerima' => 1229,
                    'jml_penerima_mbg' => '164.087',
                    'sekolah_mbg' => [
                        'sma' => ['jumlah' => 117, 'siswa' => '30.044'],
                        'smp' => ['jumlah' => 108, 'siswa' => '30.922'],
                        'sd'  => ['jumlah' => 237, 'siswa' => '67.561'],
                        'tk'  => ['jumlah' => 235, 'siswa' => '6.887'],
                    ],
                    'posyandu_mbg' => [
                        'jml_balita' => '14.119',
                        'jml_bumil' => '1.548',
                        'jml_busui' => '3.728'
                    ]
                ]
            ];
        }

        return view('components.detail.detail_data', compact('posts'));
    }
}
