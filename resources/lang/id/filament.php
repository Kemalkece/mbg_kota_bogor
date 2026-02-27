<?php

return [
    // Filament panel messages
    'panels' => [
        'resources' => [
            'pages' => [
                'create_record' => [
                    'breadcrumb' => 'Buat',
                    'title' => 'Buat :label',
                    'form' => [
                        'actions' => [
                            'create' => [
                                'label' => 'Buat',
                            ],
                            'create_another' => [
                                'label' => 'Buat & Buat Lagi',
                            ],
                            'cancel' => [
                                'label' => 'Batal',
                            ],
                        ],
                    ],
                    'notifications' => [
                        'created' => [
                            'title' => ':label berhasil dibuat',
                        ],
                    ],
                ],
                'edit_record' => [
                    'breadcrumb' => 'Ubah',
                    'title' => 'Ubah :label',
                    'form' => [
                        'actions' => [
                            'save' => [
                                'label' => 'Simpan',
                            ],
                            'cancel' => [
                                'label' => 'Batal',
                            ],
                        ],
                    ],
                    'notifications' => [
                        'saved' => [
                            'title' => ':label berhasil disimpan',
                        ],
                    ],
                ],
                'list_records' => [
                    'breadcrumb' => 'Daftar',
                    'title' => ':label',
                    'table' => [
                        'empty' => [
                            'heading' => 'Tidak ada data',
                            'description' => 'Mulai dengan membuat :model pertama Anda.',
                        ],
                    ],
                    'actions' => [
                        'create' => [
                            'label' => 'Buat :label',
                        ],
                    ],
                ],
            ],
        ],
    ],
];
