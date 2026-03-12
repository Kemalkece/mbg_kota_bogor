<?php

namespace App\Examples;

/**
 * CONTOH PENGGUNAAN TRAIT LOGACTIVITY
 * 
 * File ini menunjukkan bagaimana menggunakan LogActivity trait
 * untuk mencatat aktivitas user di sistem.
 */

class LogActivityExample
{
    /**
     * Contoh 1: Log Create Activity
     * 
     * Gunakan saat membuat data baru
     */
    public function exampleCreate()
    {
        // Kode membuat berita
        // $berita = Berita::create($data);

        // Catat aktivitas
        // LogActivity::logCreate('Berita', $berita->id, $data);
        
        /*
        Output di Activity Log:
        - User: John Doe
        - Aksi: Menambah
        - Target: Berita
        - Deskripsi: Menambah Berita
        - IP Address: 192.168.1.1
        */
    }

    /**
     * Contoh 2: Log Update Activity
     * 
     * Gunakan saat mengubah data
     */
    public function exampleUpdate()
    {
        // Kode mengubah berita
        // $oldData = $berita->toArray();
        // $berita->update($newData);

        // Catat aktivitas - catat perubahan yang terjadi
        // $changes = array_diff_assoc($newData, $oldData);
        // LogActivity::logUpdate('Berita', $berita->id, $changes);
        
        /*
        Output di Activity Log:
        - User: John Doe
        - Aksi: Mengubah
        - Target: Berita
        - Deskripsi: Mengubah Berita
        - Changes: {"judul": "Judul Lama -> Judul Baru"}
        */
    }

    /**
     * Contoh 3: Log Delete Activity
     * 
     * Gunakan saat menghapus data
     */
    public function exampleDelete()
    {
        // Kode menghapus berita
        // $berita->delete();

        // Catat aktivitas
        // LogActivity::logDelete('Berita', $berita->id);
        
        /*
        Output di Activity Log:
        - User: John Doe
        - Aksi: Menghapus
        - Target: Berita
        - Deskripsi: Menghapus Berita
        */
    }

    /**
     * Contoh 4: Log Custom Activity
     * 
     * Untuk aktivitas custom atau khusus
     */
    public function exampleCustom()
    {
        // Contoh: Download laporan
        // LogActivity::logActivity(
        //     action: 'download',
        //     modelName: 'Laporan',
        //     modelId: $laporan->id,
        //     description: 'Download laporan bulanan Januari'
        // );
        
        /*
        Output di Activity Log:
        - User: John Doe
        - Aksi: Download
        - Target: Laporan
        - Deskripsi: Download laporan bulanan Januari
        */
    }

    /**
     * Contoh 5: Implementasi di Controller
     * 
     * Cara mengintegrasikan LogActivity di Controller
     */
    public function controllerExample()
    {
        /*
        use App\Models\Berita;
        use App\Traits\LogActivity;

        class BeritaController extends Controller
        {
            // Store (Create)
            public function store(Request $request)
            {
                $berita = Berita::create($request->validated());
                LogActivity::logCreate('Berita', $berita->id, $request->validated());
                return response()->json(['message' => 'Berita berhasil dibuat']);
            }

            // Update
            public function update(Request $request, Berita $berita)
            {
                $old = $berita->toArray();
                $berita->update($request->validated());
                LogActivity::logUpdate('Berita', $berita->id, $request->validated());
                return response()->json(['message' => 'Berita berhasil diubah']);
            }

            // Destroy (Delete)
            public function destroy(Berita $berita)
            {
                $id = $berita->id;
                $berita->delete();
                LogActivity::logDelete('Berita', $id);
                return response()->json(['message' => 'Berita berhasil dihapus']);
            }

            // Download
            public function download(Berita $berita)
            {
                LogActivity::logActivity(
                    action: 'download',
                    modelName: 'Berita',
                    modelId: $berita->id,
                    description: "Download berita: {$berita->judul}"
                );
                return response()->download($path);
            }
        }
        */
    }

    /**
     * Contoh 6: Implementasi di Model Observer
     * 
     * Cara menggunakan Model Observer untuk auto-logging
     */
    public function observerExample()
    {
        /*
        // File: app/Observers/BeritaObserver.php
        use App\Traits\LogActivity;

        class BeritaObserver
        {
            public function created(Berita $berita): void
            {
                LogActivity::logCreate('Berita', $berita->id, $berita->toArray());
            }

            public function updated(Berita $berita): void
            {
                $changes = $berita->getChanges();
                LogActivity::logUpdate('Berita', $berita->id, $changes);
            }

            public function deleted(Berita $berita): void
            {
                LogActivity::logDelete('Berita', $berita->id);
            }
        }

        // Register di AppServiceProvider:
        use App\Models\Berita;
        use App\Observers\BeritaObserver;

        public function boot(): void
        {
            Berita::observe(BeritaObserver::class);
        }
        */
    }

    /**
     * Contoh 7: Melihat Activity Log
     * 
     * Cara query activity log
     */
    public function queryActivityExample()
    {
        /*
        use App\Models\ActivityLog;

        // Ambil semua activity
        $activities = ActivityLog::all();

        // Ambil activity user tertentu
        $activities = ActivityLog::where('user_id', auth()->id())->get();

        // Ambil activity dengan action tertentu
        $activities = ActivityLog::where('action', 'create')
            ->where('model_type', 'Berita')
            ->get();

        // Ambil dengan pagination
        $activities = ActivityLog::paginate(15);

        // Ambil dengan relasi user
        $activities = ActivityLog::with('user')
            ->orderBy('created_at', 'desc')
            ->paginate(15);

        // Cari activity dalam date range
        $activities = ActivityLog::whereDate('created_at', '>=', Date::today())
            ->get();
        */
    }

    /**
     * Method-method yang tersedia di LogActivity
     */
    public function availableMethods()
    {
        /*
        LogActivity::logActivity() 
            -> Mencatat aktivitas custom
            -> Params: action, modelName, modelId, changes, description

        LogActivity::logCreate()
            -> Mencatat create activity
            -> Params: modelName, modelId, data

        LogActivity::logUpdate()
            -> Mencatat update activity
            -> Params: modelName, modelId, changes

        LogActivity::logDelete()
            -> Mencatat delete activity
            -> Params: modelName, modelId

        LogActivity::logLogin()
            -> Mencatat login (auto dicatat via event)

        LogActivity::logLogout()
            -> Mencatat logout (auto dicatat via event)
        */
    }
}
