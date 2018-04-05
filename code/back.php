<?php

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {

        $tmpName = $_FILES['file']['tmp_name'];
        $nameNew=$_FILES['file']['name'];
        $sizeNew=$_FILES['file']['size'];
        if ($sizeNew < 4194304 && $sizeNew != 0) {
            if (file_exists('uploaded_files' . DIRECTORY_SEPARATOR . $nameNew)) {
                $fileExistsAllert = 'Sorry, file with the same name is already uploaded';
            } else {
                move_uploaded_file($tmpName, 'uploaded_files' . DIRECTORY_SEPARATOR . $nameNew);
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }
        } elseif ($sizeNew > 4194304 || $sizeNew == 0 && $nameNew) {
            $maxSizeAllert = 'Sorry, size of your file is more than 4Mb.';
        }

    } else {

        $request = $_SERVER['REQUEST_URI'];
        $param = explode('/', trim($request, '/'));

        if ($param[0] == 'delete' && isset($param[1])) {
            $filePath = UPLOAD_FILES . urldecode($param[1]);

            if (file_exists($filePath)) {

                unlink(urldecode($filePath));
            }
            header('Location: ' . $_SERVER['HTTP_REFERER']);
        }

    }

    $filesUploaded = [];
    if ($fileList = array_diff( scandir(UPLOAD_FILES), array('..', '.'))) {
        foreach($fileList as $value) {
            $filesUploaded[] = [
                'name' => $value,
                'size' => filesize(UPLOAD_FILES . $value)
            ];
        }
    }
