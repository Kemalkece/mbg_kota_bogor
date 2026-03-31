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
                    ],
                    'rekap' => [
                        'kelompok_kecamatan' => [
                            ['kecamatan' => 'Bogor Utara', 'jml_sma' => '5', 'jml_smp' => '12', 'jml_sd' => '33', 'jml_tk' => '35', 'jml_posyandu' => '103'],
                            ['kecamatan' => 'Bogor Selatan', 'jml_sma' => '6', 'jml_smp' => '16', 'jml_sd' => '32', 'jml_tk' => '33', 'jml_posyandu' => '47'],
                            ['kecamatan' => 'Bogor Timur', 'jml_sma' => '3', 'jml_smp' => '7', 'jml_sd' => '18', 'jml_tk' => '19', 'jml_posyandu' => '39'],
                            ['kecamatan' => 'Bogor Barat', 'jml_sma' => '9', 'jml_smp' => '27', 'jml_sd' => '53', 'jml_tk' => '54', 'jml_posyandu' => '122'],
                            ['kecamatan' => 'Bogor Tengah', 'jml_sma' => '8', 'jml_smp' => '17', 'jml_sd' => '31', 'jml_tk' => '27', 'jml_posyandu' => '61'],
                            ['kecamatan' => 'Tanah Sareal', 'jml_sma' => '4', 'jml_smp' => '14', 'jml_sd' => '38', 'jml_tk' => '36', 'jml_posyandu' => '132']
                        ],
                        'penerima_kecamatan' => [
                            ['kecamatan' => 'Bogor Utara', 'jml_sma' => '1981', 'jml_smp' => '1366', 'jml_sd' => '6286', 'jml_tk' => '627'],
                            ['kecamatan' => 'Bogor Selatan', 'jml_sma' => '1220', 'jml_smp' => '5056', 'jml_sd' => '8631', 'jml_tk' => '901'],
                            ['kecamatan' => 'Bogor Timur', 'jml_sma' => '1023', 'jml_smp' => '527', 'jml_sd' => '4574', 'jml_tk' => '434'],
                            ['kecamatan' => 'Bogor Barat', 'jml_sma' => '3454', 'jml_smp' => '6894', 'jml_sd' => '17258', 'jml_tk' => '1936'],
                            ['kecamatan' => 'Bogor Tengah', 'jml_sma' => '3519', 'jml_smp' => '8895', 'jml_sd' => '12088', 'jml_tk' => '1026'],
                            ['kecamatan' => 'Tanah Sareal', 'jml_sma' => '2630', 'jml_smp' => '3925', 'jml_sd' => '13264', 'jml_tk' => '599']
                        ]
                    ]
                ]
            ];
        }

        return view('components.detail.detail_data', compact('posts'));
    }
    public static function getDashboardStats()
    {
        try {
            // Kita atur timeout 5 detik supaya loading tidak lama jika API sedang down/MT
            $response = Http::timeout(5)->withoutVerifying()->get('https://mbg-peta.kotabogor.go.id/Api/dashboard');

            if ($response->successful()) {
                $dashboardData = $response->json();
            } else {
                throw new \Exception("Server merespon dengan status: " . $response->status());
            }

        } catch (\Exception $e) {
            // FALLBACK DATA: Jika cURL Error / Time Out / API Mati
            $dashboardData = [
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

        $data = $dashboardData['data'] ?? [];

        return [
            [
                'icon' => '📍', 
                'value' => $data['jml_penerima_mbg'] ?? '164.087', 
                'label' => 'Total Penerima', 
                'sublabel' => 'Seluruh penerima manfaat', 
                'gradient' => 'linear-gradient(135deg, #6B5CE7, #8B7CF8)'
            ],
            [
                'icon' => '📍', 
                'value' => $data['jml_sppg'] ?? '96', 
                'label' => 'SPPG', 
                'sublabel' => 'Satuan Pelayanan Gizi', 
                'gradient' => 'linear-gradient(135deg, #F472B6, #EC4899)'
            ],
            [
                'icon' => '📍', 
                'value' => $data['jml_sekolah_mbg'] ?? '725', 
                'label' => 'Sekolah MBG', 
                'sublabel' => 'Sekolah yang terlibat', 
                'gradient' => 'linear-gradient(135deg, #38BDF8, #0EA5E9)'
            ],
            [
                'icon' => '📍', 
                'value' => $data['jml_posyandu_mbg'] ?? '504', 
                'label' => 'Posyandu MBG', 
                'sublabel' => 'Pos pelayanan terpadu', 
                'gradient' => 'linear-gradient(135deg, #FB923C, #FBBF24)'
            ],
        ];
    }
}
