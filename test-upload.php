<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Test Upload Configuration</title>
    <style>
        body { font-family: Arial, sans-serif; max-width: 800px; margin: 50px auto; padding: 20px; }
        .section { background: #f5f5f5; padding: 20px; margin: 20px 0; border-radius: 8px; }
        .success { color: green; font-weight: bold; }
        .error { color: red; font-weight: bold; }
        table { width: 100%; border-collapse: collapse; margin: 10px 0; }
        th, td { padding: 10px; text-align: left; border: 1px solid #ddd; }
        th { background: #333; color: white; }
    </style>
</head>
<body>
    <h1>🔍 Upload Configuration Test</h1>
    
    <div class="section">
        <h2>PHP Configuration</h2>
        <table>
            <?php
            $phpSettings = [
                'upload_max_filesize' => ini_get('upload_max_filesize'),
                'post_max_size' => ini_get('post_max_size'),
                'max_execution_time' => ini_get('max_execution_time'),
                'memory_limit' => ini_get('memory_limit'),
                'file_uploads' => ini_get('file_uploads') ? 'Enabled' : 'Disabled',
            ];
            
            foreach ($phpSettings as $key => $value) {
                $status = $key === 'file_uploads' && $value === 'Enabled' ? 
                    '<span class="success">✓</span>' : 
                    '<span class="success">✓</span>';
                    
                if (($key === 'upload_max_filesize' || $key === 'post_max_size') && (int)$value < 10) {
                    $status = '<span class="error">✗ Too small!</span>';
                }
                
                echo "<tr><th>$key</th><td>$value</td><td>$status</td></tr>";
            }
            ?>
        </table>
    </div>
    
    <div class="section">
        <h2>Directory Permissions</h2>
        <table>
            <?php
            $directories = [
                'storage' => __DIR__ . '/storage',
                'storage/app' => __DIR__ . '/storage/app',
                'storage/app/public' => __DIR__ . '/storage/app/public',
                'storage/app/public/attachments' => __DIR__ . '/storage/app/public/attachments',
                'storage/livewire-tmp' => __DIR__ . '/storage/livewire-tmp',
            ];
            
            foreach ($directories as $name => $path) {
                $exists = is_dir($path);
                $writable = $exists && is_writable($path);
                
                $status = $exists ? 
                    ($writable ? '<span class="success">✓ Exists & Writable</span>' : '<span class="error">✗ Not Writable</span>') :
                    '<span class="error">✗ Does not exist</span>';
                
                echo "<tr><th>$name</th><td>$path</td><td>$status</td></tr>";
            }
            ?>
        </table>
    </div>
    
    <div class="section">
        <h2>Storage Symlink</h2>
        <?php
        $publicStorage = __DIR__ . '/public/storage';
        $target = __DIR__ . '/storage/app/public';
        
        if (is_link($publicStorage)) {
            $linkTarget = readlink($publicStorage);
            echo "<p class='success'>✓ Symlink exists</p>";
            echo "<p>Link: <code>$publicStorage</code></p>";
            echo "<p>Target: <code>$linkTarget</code></p>";
        } else {
            echo "<p class='error'>✗ Symlink does not exist</p>";
            echo "<p>Run: <code>php artisan storage:link</code></p>";
        }
        ?>
    </div>
    
    <div class="section">
        <h2>Test File Upload Form</h2>
        <form enctype="multipart/form-data" method="POST" action="">
            <input type="file" name="test_file" accept=".pdf,.doc,.docx,.jpg,.jpeg,.png">
            <button type="submit">Test Upload (Basic PHP)</button>
        </form>
        
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['test_file'])) {
            echo '<div style="margin-top: 20px;">';
            if ($_FILES['test_file']['error'] === UPLOAD_ERR_OK) {
                echo '<p class="success">✓ File received successfully!</p>';
                echo '<p>Name: ' . htmlspecialchars($_FILES['test_file']['name']) . '</p>';
                echo '<p>Size: ' . number_format($_FILES['test_file']['size'] / 1024, 2) . ' KB</p>';
                echo '<p>Type: ' . htmlspecialchars($_FILES['test_file']['type']) . '</p>';
                
                // Try to move to temp
                $tempPath = __DIR__ . '/storage/livewire-tmp/' . $_FILES['test_file']['name'];
                if (move_uploaded_file($_FILES['test_file']['tmp_name'], $tempPath)) {
                    echo '<p class="success">✓ File moved to storage successfully!</p>';
                    echo '<p>Path: ' . $tempPath . '</p>';
                } else {
                    echo '<p class="error">✗ Failed to move file to storage</p>';
                }
            } else {
                echo '<p class="error">✗ Upload error code: ' . $_FILES['test_file']['error'] . '</p>';
                $errors = [
                    UPLOAD_ERR_INI_SIZE => 'File exceeds upload_max_filesize',
                    UPLOAD_ERR_FORM_SIZE => 'File exceeds MAX_FILE_SIZE',
                    UPLOAD_ERR_PARTIAL => 'File was only partially uploaded',
                    UPLOAD_ERR_NO_FILE => 'No file was uploaded',
                    UPLOAD_ERR_NO_TMP_DIR => 'Missing temporary folder',
                    UPLOAD_ERR_CANT_WRITE => 'Failed to write file to disk',
                    UPLOAD_ERR_EXTENSION => 'PHP extension stopped the upload',
                ];
                echo '<p>' . ($errors[$_FILES['test_file']['error']] ?? 'Unknown error') . '</p>';
            }
            echo '</div>';
        }
        ?>
    </div>
    
    <div class="section">
        <h2>Recommended Actions</h2>
        <ol>
            <li><strong>PHP Settings:</strong> Ensure upload_max_filesize and post_max_size are at least 20M</li>
            <li><strong>Permissions:</strong> Run <code>chmod -R 775 storage</code></li>
            <li><strong>Symlink:</strong> Run <code>php artisan storage:link</code></li>
            <li><strong>Clear Cache:</strong> Run <code>php artisan config:clear && php artisan cache:clear</code></li>
            <li><strong>Restart Server:</strong> Restart Laravel Herd or your web server</li>
        </ol>
    </div>
</body>
</html>
