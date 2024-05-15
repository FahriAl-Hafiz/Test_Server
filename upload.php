<?php
$target_dir = "uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Periksa apakah file sudah ada
if (file_exists($target_file)) {
    echo "Sorry, file already exists.";
    $uploadOk = 0;
}

// Periksa ukuran file
if ($_FILES["fileToUpload"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadOk = 0;
}

// Izinkan format file tertentu (opsional, bisa dihapus jika ingin menerima semua format)
$allowed_types = array("jpg", "png", "jpeg", "gif", "pdf", "docx");
if (!in_array($imageFileType, $allowed_types)) {
    echo "Sorry, only JPG, JPEG, PNG, GIF, PDF & DOCX files are allowed.";
    $uploadOk = 0;
}

// Periksa apakah $uploadOk adalah 0 karena ada kesalahan
if ($uploadOk == 0) {
    echo "Sorry, your file was not uploaded.";
// Jika semuanya ok, coba unggah file
} else {
    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "The file ". basename($_FILES["fileToUpload"]["name"]). " has been uploaded.";
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
}
?>
