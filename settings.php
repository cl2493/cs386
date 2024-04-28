<!-- Nurse profile header -->
<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Meta tags -->
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- Title -->
    <title>Nurse Profile</title>
    <!-- CSS links -->
    <link rel="stylesheet" href="style/generalStyle.css">
    <!-- JavaScript links -->
    <!-- Font Awesome links for the Footer Icons -->
    <script src="https://kit.fontawesome.com/c011338aa2.js" crossorigin="anonymous"></script>
    <!-- JavaScript for the navigation bar -->
    <script src="script.js" defer></script>
</head>
<!-- Body of the page -->
<body>
    <!-- Top of the page -->
    <?php include('header.php'); ?>
    <form id="certForm" action="upload_certification.php" method="post" enctype="multipart/form-data">
        <div class="cert-upload">
            <h2>Upload Certification</h2>
        </div>
        <label for="certFile" class="select-btn">Select PDF File</label>
        <input type="file" id="certFile" name="certFile" accept=".pdf" class="file-input">
        <button type="submit" class="upload-btn">Upload</button>
        <span id='fileNameDisplay' class='file-name-display'></span>
    </form>
</body>
</html>

