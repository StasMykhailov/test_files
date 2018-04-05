<?php

$files = [
    'back',
    'front'
];

define('UPLOAD_FILES', __DIR__ . DIRECTORY_SEPARATOR . 'uploaded_files' . DIRECTORY_SEPARATOR);

foreach ($files as $file) {
    include_once(__DIR__ . DIRECTORY_SEPARATOR . 'code' . DIRECTORY_SEPARATOR . $file . '.php');
}
