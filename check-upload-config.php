<?php
// Jalankan file ini via browser untuk cek konfigurasi upload
// Akses: http://localhost/check-upload-config.php

echo "<h2>Konfigurasi PHP Upload</h2>";
echo "<table border='1' cellpadding='10'>";
echo "<tr><th>Setting</th><th>Value</th><th>Status</th></tr>";

$settings = [
    'upload_max_filesize' => ini_get('upload_max_filesize'),
    'post_max_size' => ini_get('post_max_size'),
    'max_execution_time' => ini_get('max_execution_time'),
    'max_input_time' => ini_get('max_input_time'),
    'memory_limit' => ini_get('memory_limit'),
];

foreach ($settings as $key => $value) {
    $status = '✅ OK';
    if ($key === 'upload_max_filesize' || $key === 'post_max_size') {
        // Convert to MB for comparison
        $valueInMB = (int)$value;
        if ($valueInMB < 10) {
            $status = '❌ Terlalu kecil (minimum 10M)';
        }
    }
    echo "<tr><td><strong>$key</strong></td><td>$value</td><td>$status</td></tr>";
}

echo "</table>";

echo "<h3>Rekomendasi php.ini:</h3>";
echo "<pre>";
echo "upload_max_filesize = 20M\n";
echo "post_max_size = 20M\n";
echo "max_execution_time = 300\n";
echo "memory_limit = 256M\n";
echo "</pre>";

echo "<h3>Cek Storage Directory</h3>";
$storagePath = __DIR__ . '/storage/app/public/attachments';
if (!file_exists($storagePath)) {
    echo "❌ Directory tidak ada: $storagePath<br>";
    echo "Jalankan: <code>mkdir -p storage/app/public/attachments && chmod -R 775 storage</code>";
} else {
    echo "✅ Directory ada: $storagePath<br>";
    if (is_writable($storagePath)) {
        echo "✅ Directory writable";
    } else {
        echo "❌ Directory TIDAK writable<br>";
        echo "Jalankan: <code>chmod -R 775 storage</code>";
    }
}
