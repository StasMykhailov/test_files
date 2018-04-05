<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8"">
        <title>Files</title>
    </head>
    <body>

        <h1><?php if (isset( $maxSizeAllert)) {echo $maxSizeAllert;} ?></h1>
        <h1><?php if (isset( $fileExistsAllert)) {echo $fileExistsAllert;} ?></h1>
        <br>
        <h>Please, upload your files. Size should be less than 4Mb.</h>
        <br>
        <form method='POST' enctype='multipart/form-data' >
            <input type='hidden' name='MAX_FILE_SIZE' value='4194304'/>
            <input type='file' name='file'>
            <input type='submit' value='Upload'>
        </form>
        <br>

        <h>Information about uploaded files:</h>
        <br>

        <?php if (!empty($filesUploaded)): ?>
            <table border="1" width="100%" cellpadding="5">
                <tr>
                    <th>File name</th>
                    <th>File size</th>
                    <th>Action</th>
                </tr>

                <?php foreach ($filesUploaded as $item) : ?>
                <tr>
                    <td><a href="<?php print '/uploaded_files/' . $item['name']; ?>" download><?php print $item['name'];?></a></td>
                    <td><?php print $item['size'];?></td>
                    <td><a href="<?php print '/delete/' . $item['name']; ?>">Delete file</a></td>
                </tr>
                <?php endforeach;?>

            </table>
        <?php else: ?>
            <h2>No files uploaded.</h2>
        <?php endif; ?>

    </body>
</html>
