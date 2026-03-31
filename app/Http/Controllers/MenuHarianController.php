<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class MenuHarianController extends Controller
{
    /**
     * Fetch the daily menu from the API.
     * 
     * @param int $limit Max items to return
     * @return array
     */
    public static function getMenuHarian($limit = 10)
    {
        try {
            // Fetch from live API with 5s timeout
            $response = Http::timeout(5)->withoutVerifying()->get('https://mbg-peta.kotabogor.go.id/Api/menu_harian');

            if ($response->successful()) {
                $jsonData = $response->json();
                $menus = $jsonData['data'] ?? [];
            } else {
                throw new \Exception("Server merespon dengan status: " . $response->status());
            }

        } catch (\Exception $e) {
            // FALLBACK DATA: Use the sample JSON provided earlier if the API is offline
            $menus = [
                [
                    'sppg_nama' => 'Tanah Sareal Cibadak 2',
                    'tgl_kirim' => '2026-03-17',
                    'nama_menu' => "Menu makanan kering sekolah:\n1.Porsi besar :\n•wajik+roti+risol\n•Telur ayam rebus\n•Buah pear+pisang\n•Susu UHT\n\n2.Porsi kecil :\n•wajik+roti\n•Telur puyuh rebus\n•Buah pear+pisang\n•Susu UHT\n\nMenu makanan kering posyandu :\n1.Porsi besar :\n•Sus eclair\n•Telur ayam rebus\n•Buah pear\n•Susu kedelai\n\n2.Porsi kecil :\n•Sus eclair\n•Telur puyuh rebus\n•Buah pear\n•oatmilk",
                    'kandungan_gizi' => "Kandungan Gizi Makanan kering sekolah:\n1.Porsi Besar :\n•Energi  : 443 kkal\n•Protein  : 14 g\n•Karbohidrat : 60 g\n•Lemak  : 17 g\n•Serat pangan: 4 g\n\n2.Porsi kecil :\n•Energi  : 388 kkal\n•Protein  : 12 g\n•Karbohidrat : 40 g\n•Lemak  : 13 g",
                    'jml_sekolah' => '12',
                    'jml_posyandu' => '25',
                    'gradient' => 'linear-gradient(135deg, #10B981 0%, #059669 100%)'
                ],
                [
                    'sppg_nama' => 'SEMPLAK 002',
                    'tgl_kirim' => '2026-03-17',
                    'nama_menu' => "Menu makanan kering sekolah:\r\n1.Porsi besar :\r\n•goguma cream cheese\r\n•ayam ungkep+saus lada hitam\r\n•buah pear+pisang\r\n•Susu UHT\r\n\r\n2.Porsi kecil :\r\n•goguma cream cheese\r\n•ayam ungkep\r\n•buah pear+pisang\r\n•Susu UHT",
                    'kandungan_gizi' => "Energi: 624.5 kkal\nProtein: 18.9 gr\nLemak: 20.9 gr\nKarbohidrat: 87.7 gr",
                    'jml_sekolah' => '8',
                    'jml_posyandu' => '15',
                    'gradient' => 'linear-gradient(135deg, #3B82F6 0%, #2563EB 100%)'
                ],
                [
                    'sppg_nama' => 'Bogor Barat Pasir Kuda',
                    'tgl_kirim' => '2026-03-12',
                    'nama_menu' => "- nasi garlic\n- meat loaf sapi\n- saute wortel\n- jagung\n- pisang\n- kacang polong",
                    'kandungan_gizi' => "Energi: 634 kkal\nProtein: 14.6 gr\nLemak: 19.19 gr\nKarbohidrat: 99.8 gr",
                    'jml_sekolah' => '10',
                    'jml_posyandu' => '20',
                    'gradient' => 'linear-gradient(135deg, #F59E0B 0%, #D97706 100%)'
                ]
            ];
        }

        // Apply dynamic gradients to ensure a premium look
        $gradients = [
            'linear-gradient(135deg, #10B981 0%, #059669 100%)',
            'linear-gradient(135deg, #3B82F6 0%, #2563EB 100%)',
            'linear-gradient(135deg, #F59E0B 0%, #D97706 100%)',
            'linear-gradient(135deg, #8B5CF6 0%, #7C3AED 100%)',
            'linear-gradient(135deg, #EC4899 0%, #DB2777 100%)',
        ];

        foreach ($menus as $index => &$menu) {
            $menu['gradient'] = $gradients[$index % count($gradients)];
        }

        return array_slice($menus, 0, $limit);
    }
}
