<?php
function scanDirRecursively($folder, &$results = []) {
    $files = scandir($folder);

    foreach ($files as $value) {
        $path = realpath($folder . DIRECTORY_SEPARATOR . $value);
        if (!is_dir($path)) {
            $results[ltrim($path, $_SERVER['DOCUMENT_ROOT'])] = basename($path);
        } else if ($value != "." && $value != "..") {
            scanDirRecursively($path, $results);
            $results[$path] = basename($path);
        }
    }
    return $results;
}

