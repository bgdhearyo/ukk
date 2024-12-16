<?php
$id = $_GET['id'];
if(isset($_POST["judul_foto"])){
    $judul = $_POST["judul_foto"];
    $deskripsi = $_POST["deskripsi_foto"];
    $album = $_POST["id_album"];
    $tanggal = $_POST["tanggal_unggah"];
    $id_user = $_SESSION['user']["id_user"];


    $query = mysqli_query($koneksi, "UPDATE foto SET judul_foto='$judul', deskripsi_foto='$deskripsi', id_album='$album', tanggal_unggah='$tanggal', id_user='$id_user' WHERE id_foto='$id'");


    $gambar = $_FILES['gambar'];
    if($gambar['name'] != ""){
        $nama_gambar = $gambar['name'];
        move_uploaded_file($gambar['tmp_name'],'gambar/'.$gambar['name']);
        $query = mysqli_query($koneksi, "UPDATE foto SET gambar='$nama_gambar' WHERE id_foto='$id'");
    }

    if($query > 0){
        echo '<script>alert("Ubah data berhasil"); location.href = "?page=galeri"</script>';
    }else{
        echo '<script>alert("Ubah data gagal")</script>';
    }
}

$query = mysqli_query($koneksi, "SELECT * FROM foto WHERE id_foto = '$id'");
$data = mysqli_fetch_array($query);

?>


<div class="container-fluid px-4">
    <h1 class="mt-4">GALERI FOTO</h1>
    <ol class="breadcrumb mb-4">
    </ol>
    <a href="?page=galeri" class="btn btn-danger">Kembali</a>
    <!-- <hr> -->
    <form method="POST" enctype="multipart/form-data">
        <table class="table table-responsive">
            <tr>
                <td>Judul</td>
                <td>:</td>
                <td><input type="text" name="judul_foto" value="<?php echo $data['judul_foto'] ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Deskripsi</td>
                <td>:</td>
                <td><input type="text" name="deskripsi_foto" value="<?php echo $data['deskripsi_foto'] ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Album</td>
                <td>:</td>
                <td>
                    <select name="id_album" class="form-select form-control">
                        <?php
                        $al = mysqli_query($koneksi,"SELECT*FROM album");
                        while ($album = mysqli_fetch_array($al)) {
                            ?>
                            <option
                            <?php
                            if($data["id_album"] == $album["id_album"]) echo 'selected'
                            ?>
                            value="<?php echo $album['id_album'] ?>"><?php echo $album['nama_album']; ?>
                            <?php
                        }
                        ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>Tanggal</td>
                <td>:</td>
                <td><input type="date" name="tanggal_unggah" value="<?php echo $data['tanggal_unggah'] ?>" class="form-control"></td>
            </tr>
            <tr>
                <td>Gambar</td>
                <td>:</td>
                <td>
                    <input type="file" name="gambar" value="<?php echo $data['gambar'] ?>" class="form-control">
                    <a href="gambar/<?php echo $data['gambar'] ?>" target="_blank">
                        <img src="gambar/<?php echo $data['gambar'] ?>" alt="gambar" width="250" height="auto">
                    </a>
                    <br>
                    <i class="text-danger">*Jika tidak diganti kosongkan saja</i>
                </td>
            </tr>
            <tr>
                <td></td>
                <td></td>
                <td>
                    <button type="submit" class="btn btn-primary">UBAH</button>
                    <button type="reset" class="btn btn-danger">RESET</button>
                </td>
            </tr>
        </table>
    </form>
</div>

<style>
    /* Judul 'Tambah Foto' */
h1.mt-4 {
    font-family: 'Lora', serif; /* Menggunakan font serif untuk tampilan lebih elegan */
    font-size: 2.8rem; /* Ukuran font */
    font-weight: 600; /* Berat font */
    color:rgb(27, 89, 131);
    text-align: center; /* Posisikan teks di tengah */
    letter-spacing: 1px; /* Jarak antar huruf */
    margin-top: 30px; /* Jarak atas */
    text-transform: capitalize; /* Hanya kapital pertama kata */
    transition: color 0.3s ease; /* Transisi warna halus */
}

/* Menambahkan garis bawah halus pada judul */


/* Efek hover pada judul */
h1.mt-4:hover {
    color: #3498db; /* Ubah warna teks saat hover */
}

/* Breadcrumb */
.breadcrumb {
    background-color: transparent;
    padding: 0;
    margin-bottom: 20px;
}

.breadcrumb-item {
    font-size: 1.1rem;
    color: #555;
}

.breadcrumb-item.active {
    color: #333;
}

/* Button Styles */
.btn {
    border-radius: 5px;
    padding: 8px 20px;
    font-size: 1rem;
    transition: all 0.3s ease;
}

.btn-danger {
    background-color: #e74c3c;
    border: none;
    color: white;
}

.btn-danger:hover {
    background-color: #c0392b;
}

.btn-primary {
    background-color: #3498db;
    border: none;
    color: white;
}

.btn-primary:hover {
    background-color: #2980b9;
}

/* Form Styles */
form {
    background-color: white;
    border-radius: 8px;
    box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
    padding: 20px;
    margin-top: 20px;
}

table {
    width: 100%;
    margin-bottom: 20px;
    border-collapse: collapse;
}

table th, table td {
    padding: 12px 15px;
    text-align: left;
}

table th {
    background-color: #f9f9f9;
    color: #333;
}

table td {
    background-color: #fff;
    color: #555;
    border-top: 1px solid #ddd;
}

table input, table select {
    width: 100%;
    padding: 8px;
    border: 1px solid #ddd;
    border-radius: 5px;
    background-color: #f9f9f9;
    font-size: 1rem;
    color: #555;
}

table input:focus, table select:focus {
    border-color: #3498db;
    outline: none;
}

/* Responsive Table */
@media (max-width: 768px) {
    table th, table td {
        padding: 10px;
    }

    table input, table select {
        font-size: 0.9rem;
    }

    .btn {
        font-size: 0.9rem;
    }
}

</style>