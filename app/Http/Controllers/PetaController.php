<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PetaController extends Controller
{
    public function index()
    {
        return view('peta');
    }

    /**
     * Fetch maps data from the live MBG API.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getMapsData()
    {
        try {
            $response = Http::withHeaders([
                'X-API-KEY' => 'Mh252hja;!'
            ])
            ->timeout(30)
            ->withoutVerifying()
            ->get('https://mbg-peta.kotabogor.go.id/Api/get_maps_data');

            if ($response->successful()) {
                return response()->json($response->json());
            }

            return response()->json([
                'status' => false,
                'message' => 'Gagal mengambil data dari server: ' . $response->status()
            ], $response->status());

        } catch (\Exception $e) {
            return response()->json([
                'status' => false,
                'message' => 'Terjadi kesalahan sistem: ' . $e->getMessage()
            ], 500);
        }
    }
}
