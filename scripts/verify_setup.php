<?php

/**
 * Database Setup Verification Script
 * Run this file in browser or CLI to verify database setup
 */

require __DIR__.'/vendor/autoload.php';

$app = require_once __DIR__.'/bootstrap/app.php';
$app->make('Illuminate\Contracts\Console\Kernel')->bootstrap();

echo "========================================\n";
echo "Database Setup Verification\n";
echo "========================================\n\n";

// Check database connection
try {
    DB::connection()->getPdo();
    echo "✅ Database connection: SUCCESS\n";
    echo "   Database: " . DB::connection()->getDatabaseName() . "\n\n";
} catch (\Exception $e) {
    echo "❌ Database connection: FAILED\n";
    echo "   Error: " . $e->getMessage() . "\n\n";
    exit(1);
}

// Check if social_media table exists
try {
    $tableExists = Schema::hasTable('social_media');
    if ($tableExists) {
        echo "✅ social_media table: EXISTS\n";
        
        // Count records
        $count = DB::table('social_media')->count();
        echo "   Records: {$count}\n\n";
    } else {
        echo "❌ social_media table: NOT FOUND\n";
        echo "   Run: php artisan migrate\n\n";
    }
} catch (\Exception $e) {
    echo "❌ Error checking table: " . $e->getMessage() . "\n\n";
}

// Check storage symlink
$storageLink = public_path('storage');
if (is_link($storageLink) || file_exists($storageLink)) {
    echo "✅ Storage symlink: EXISTS\n";
    $target = is_link($storageLink) ? readlink($storageLink) : 'Directory exists';
    echo "   Target: {$target}\n\n";
} else {
    echo "❌ Storage symlink: NOT FOUND\n";
    echo "   Run: php artisan storage:link\n\n";
}

// Check storage directory
$storageDir = storage_path('app/public/social_media');
if (is_dir($storageDir)) {
    echo "✅ Storage directory: EXISTS\n";
    $files = glob($storageDir . '/*');
    echo "   Files: " . count($files) . "\n\n";
} else {
    echo "⚠️  Storage directory: NOT FOUND (will be created on first upload)\n";
    echo "   Path: {$storageDir}\n\n";
}

// Check permissions
$storageWritable = is_writable(storage_path('app/public'));
if ($storageWritable) {
    echo "✅ Storage writable: YES\n\n";
} else {
    echo "❌ Storage writable: NO\n";
    echo "   Run: chmod -R 775 storage\n\n";
}

echo "========================================\n";
echo "Verification Complete\n";
echo "========================================\n";

