<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" lang="en">
    <head>
        <title>Tutorial Belajarphp.net</title
        <!-- Add Dropzone -->
        <script src="<?php echo base_url() ?>resources/dropzone-5.7.0/dist/dropzone.js"></script>
        <link rel="stylesheet" href="<?php echo base_url() ?>resources/dropzone-5.7.0/dist/dropzone.css">
    </head>
    <body>
        <h1>Upload Multiple Files Menggunakan DropzoneJS and Codeigniter</h1>
        <div class="image_upload_div">
            <?php echo form_open('upload/do_upload', "class='dropzone'"); ?>

            </form>
        </div>  
    </body>
</html>