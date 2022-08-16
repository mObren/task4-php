<?php
require_once "scanner.php";
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Task4 folder scanner</title>
    </head>
    <body>
        <div>
            <h1>Task 4 - rekurzivno skeniranje foldera</h1>
            <?php
                $dirName = 'folder';
                if (!empty($_GET['dirname'])) {
                    $dirName = $_GET['dirname'];
                }
                $baseName = ltrim(dirname(__FILE__), $_SERVER['DOCUMENT_ROOT']);
                $dirContent = scanDirRecursively($dirName);
                foreach ($dirContent as $key => $value) {
                    if (strstr($value, '.')) {
                        echo "<pre> <a href='/$key'>$value</a> </pre>";
                    } else {
                        echo "<pre> <a href='/$baseName/index.php?dirname=$key'>$value</a> </pre>";
                    }
                }
            ?>
        </div>
    </body>
</html>