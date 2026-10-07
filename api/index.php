<?php

// Prepare serverless /tmp storage directories for read-only environments like Vercel
$storage = '/tmp/storage';
$dirs = [
    $storage,
    $storage.'/app',
    $storage.'/framework',
    $storage.'/framework/cache',
    $storage.'/framework/cache/data',
    $storage.'/framework/sessions',
    $storage.'/framework/views',
    $storage.'/logs',
];

foreach ($dirs as $dir) {
    if (! is_dir($dir)) {
        mkdir($dir, 0755, true);
    }
}

// Copy sqlite database to /tmp if it exists in the repository
$sourceDb = __DIR__.'/../database/database.sqlite';
$targetDb = '/tmp/database.sqlite';

if (file_exists($sourceDb) && ! file_exists($targetDb)) {
    copy($sourceDb, $targetDb);
}

require __DIR__.'/../public/index.php';
