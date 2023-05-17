<?php
include 'config.php';

if (isset($_POST["submit"])) {
    $judul = $_POST["judul"];
    $isi = $_POST["isi"];
    $tanggal = $_POST["tanggal"];
    $penulis = $_POST["penulis"];
    $kategori = $_POST["kategori"];

    $gambar = $_FILES["gambar"]["name"];
    $lokasi_gambar = $_FILES["gambar"]["tmp_name"];

    if (file_exists($lokasi_gambar)) {
        move_uploaded_file($lokasi_gambar, 'uploads/' . $gambar);
    }

    $query = "INSERT INTO tb_berita 
            VALUES
            ('','$judul','$isi','$tanggal','$gambar','$penulis','$kategori')
        ";

    mysqli_query($conn, $query);
};

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CREATE | Tambah berita</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
</head>

<body>
    <div class="container">
        <div class="header">

        </div>
        <div class="isi-berita">

            <form method="post" enctype="multipart/form-data">
                <div class="mb-3">
                    <label for="judul" class="form-label">Judul Berita</label>
                    <input type="text" class="form-control" id="judul" aria-describedby="emailHelp" name="judul">
                    <div id="emailHelp" class="form-text">Masukkan berita dengan akurat.</div>
                </div>

                <div class="mb-3">
                    <label for="isi" class="form-label">Isi</label>
                    <input type="text" class="form-control" id="isi" aria-describedby="emailHelp" name="isi">
                    <div id="emailHelp" class="form-text">Masukkan isi dengan akurat.</div>
                </div>

                <div class="mb-3">
                    <label for="tanggal" class="form-label">Tanggal</label>
                    <input type="date" class="form-control" id="tanggal" aria-describedby="emailHelp" name="tanggal">
                    <div id="emailHelp" class="form-text">Masukkan tanggal.</div>
                </div>

                <div class="mb-3">
                    <label for="gambar" class="form-label">Gambar</label>
                    <input type="file" class="form-control" id="gambar" aria-describedby="emailHelp" name="gambar">
                    <div id="emailHelp" class="form-text">Masukkan bukti dengan akurat. </div>
                </div>

                <div class="mb-3">
                    <label for="penulis" class="form-label">Penulis</label>
                    <input type="text" class="form-control" id="penulis" aria-describedby="emailHelp"  name="penulis">
                    <div id="emailHelp" class="form-text">Masukkan nama penulis atau nama reporter. </div>
                </div>

                <div class="mb-3">
                    <label for="kategori" class="form-label">Kategori</label>
                    <select class="form-select" aria-label="Default select example" name="kategori">
                        <option selected>Open this select menu</option>
                        <?php
                    // $nama = "SELECT * FROM tb_siswa";
                    $data = mysqli_query($conn, "SELECT * FROM tb_kategori ORDER BY nama_kategori ASC");
                    while ($d = mysqli_fetch_array($data)) {
                        echo "<option name= 'kategori' . value='" . $d["id_kategori"] . '<br>' . "'>" . $d["nama_kategori"] . "</option>";
                    }
                    ?>
                    </select>
                </div>

                <button type="submit" class="btn btn-primary" name="submit">Submit</button>
            </form>
        </div>
</body>

</html>