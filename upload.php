<?php
        include 'config.php'; 
    
        $query = mysqli_query($conn, "SELECT * FROM tb_berita WHERE id_berita");
        $data = mysqli_fetch_array($query);

        if (isset($_POST['submit'])) {

            $judul = $_POST['judul'];
            $isi = $_POST['isi'];
            $tanggal = $_POST['tanggal'];
            $gambarOld = $_POST['gambar'];
            $penulis = $_POST['penulis'];
            $kategori = $_POST['kategori'];
            $idUpdate = $_POST['id'];
    
            $gambar = $_FILES['gambar']['name'];
            $lokasi_gambar = $_FILES['gambar']['tmp_name'];
            
            if($gambar!="") {
                if (file_exists($lokasi_gambar)) {
                    move_uploaded_file($lokasi_gambar, 'uploads/' . $gambar);
                }
            } else {
                $gambar = $gambarOld;
            }
    
            $sql = mysqli_query($connect, "UPDATE tb_berita SET judul='$judul', isi='$isi', tanggal='$tanggal', gambar='$gambar', penulis='$penulis', id_kategori='$kategori' WHERE id_berita = $idUpdate");
    
            if ($sql) {
                echo 'Data berhasil diubah';
            } else {
                echo 'gagal';
            }}
    
        ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>UPDATE</title>
    <style>
    </style>
</head>
<body>
    <header>
        <h2>Update Berita</h2>
    </header>
        
    <main>
        <form action="" method="post" enctype="multipart/form-data">
            <label for="judul">Judul :</label><br>
            <input type="text" id="judul" name="judul" value="<?= $data['judul'] ?>"><br>
            <label for="isi">Isi :</label><br>
            <input type="text" id="isi" name="isi" value="<?= $data['isi'] ?>"><br>
            <label for="tanggal">Tanggal :</label><br>
            <input type="date" id="tanggal" name="tanggal" value="<?= $data['tanggal'] ?>"><br>
            <label for="gambar">Gambar :</label><br>
            <input type="file" id="gambar" name="gambar"><br>
            <input type="hidden" name="gambar" value="<?php echo $data['gambar'] ?>">
            <img src="uploads/<?php echo $data['gambar'] ?>" width="200" alt=""><br>
            <label for="penulis">Penulis :</label><br>
            <input type="text" id="penulis" name="penulis" value="<?= $data['penulis'] ?>"><br>
            <label for="kategori">Kategori :</label><br>
            <select name="kategori" id="kategori"> 
                <?php
                include 'koneksi.php';
                $query = mysqli_query($connect, "SELECT * FROM tb_kategori");
                while ($row = mysqli_fetch_array($query)) {
                $selected = null;
                if ($data['id_kategori'] == $row['id_kategori']) {
                    $selected = 'selected';
                }
                $id = $row['id_kategori'];
                $nama_kategori = $row['nama_kategori'];
                echo "<option value='$id' $selected>$nama_kategori</option>";
                }
                ?>
            </select>
            <input type="hidden" name="id" value="<?php echo $data['id_berita'] ?>">
            <input type="submit" value="Update" class="submit" name="submit">Submit<br>
            <button><a href="index.php">Kembali</a></button>
        </form>
        
</body>
</html>
