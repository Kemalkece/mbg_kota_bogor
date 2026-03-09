<?php

// Test file untuk diagnose memory issue
// URL: http://localhost/test-memory.php

echo "Memory Info:\n";
echo "Memory Limit: " . ini_get('memory_limit') . "\n";
echo "Memory Used: " . round(memory_get_usage(true) / 1024 / 1024, 2) . " MB\n";
echo "Peak Memory: " . round(memory_get_peak_usage(true) / 1024 / 1024, 2) . " MB\n\n";

// Test loading framework
try {
    echo "Attempting to load Laravel...\n";
    require_once __DIR__ . '/bootstrap/app.php';
    
    $app = require_once __DIR__ . '/bootstrap/app.php';
    $kernel = $app->make(\Illuminate\Contracts\Http\Kernel::class);
    
    echo "✓ Laravel loaded successfully!\n";
    echo "Memory after Laravel: " . round(memory_get_usage(true) / 1024 / 1024, 2) . " MB\n";
    
} catch (\Exception $e) {
    echo "✗ Error loading Laravel:\n";
    echo $e->getMessage() . "\n";
    echo $e->getFile() . " on line " . $e->getLine() . "\n";
}
