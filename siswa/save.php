<?php
if (isset($_POST['save'])) {
    include_once('config.php');
    $nis = $_POST['nis'];
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $dob = $_POST['dob'];
    $random = rand();
    $filename = $_FILES['photo']['name'];
    $filename2 = pathinfo($_FILES['photo']['name'], PATHINFO_FILENAME);
    $size = $_FILES['photo']['size'];
    $ext = pathinfo($filename, PATHINFO_EXTENSION);
    $extallowed = ['png', 'jpg', 'jpeg', 'gif', 'webp', 'bmp', 'ico', 'svg', 'tiff'];

    if (!file_exists(($_FILES['photo']['tmp_name'])) || !is_uploaded_file($_FILES['photo']['tmp_name'])) {
        $sql = "INSERT INTO students SET nis='$nis', name='$name', gender='$gender', dob='$dob'";
    } else {
        if (in_array($ext, $extallowed)) {
            if ($size > 10000000) {
                echo "<script>alert('Ukuran file tidak boleh lebih dari 10 MB'); window.location='?m=siswa&s=add';</script>";
            } else {
                $photo = $filename2 . "_" . $random . '.' . $ext;
                move_uploaded_file($_FILES['photo']['tmp_name'], 'images/students/'.$photo);
                $sql = "INSERT INTO students SET nis='$nis', name='$name', gender='$gender', pob='$pob', dob='$dob', phone='$phone', email='$email', address='$address', photo='$photo', grade_id='$grade_id'";
            }
        } else {
            echo "<script>alert('Akhiran file tidak sesuai'); window.location='?m=siswa&s=add';</script>";
        }
    }
    // var_dump($sql);
    // exit();
    $result = mysqli_query($conn, $sql);
    if ($result) {
        header("Location: ?m=siswa&s=view");
    } else {
        echo "<script>alert('Data gagal disimpan'); window.location='?m=siswa&s=add';</script>";
    }
} else {
    echo "Jangan langsung buka file ini. Tambah Data <a href='?m=siswa&s=add'>Klik disini</a>";
}