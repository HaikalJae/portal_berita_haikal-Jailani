<?php 
include 'config.php';

$result = mysqli_query($conn, "SELECT b.*, k.nama_kategori FROM tb_berita AS b JOIN tb_kategori AS k ON b.id_kategori = k.id_kategori" );
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    
</head>

<p><a href="create.php">Tambah berita</a></p>
<body>
    <div class="container">

        <table class="table">
            <thead>
                <tr>
                    <!-- <th scope="col">Nomor</th> -->
                    <th scope="col">judul</th>
                    <th scope="col">Tanggal</th>
                    <th scope="col">Isi</th>
                    <th scope="col">Gambar</th>
                    <th scope="col">kategori</th>
                    <th scope="col">Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php while( $row = mysqli_fetch_assoc($result ) ) : ?>
                <tr>
                    <td><?= $row["judul"]; ?></td>
                    <td><?= $row["tanggal"]; ?></td>
                    <td><?= $row["isi"]; ?></td>
                    <td><img src="uploads/<?php echo $row["gambar"]; ?>" alt="<?php echo $row["gambar"]; ?>"></td>
                    <td><?= $row["nama_kategori"]; ?></td>
                    <td>
                        <a href="update.php?id=<?= $row["id_berita"];?>">Ubah</a>
                        <a href="delete.php?id=<?= $row["id_berita"];?>">Hapus</a>

                    </td>
                </tr>
                    <?php endwhile; ?>
            </tbody>
        </table>
    </div>
</body>

</html>