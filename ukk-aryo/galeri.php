<div class="container-fluid px-4">
    <h1 class="mt-4">GALERI FOTO</h1>
    <ol class="breadcrumb mb-4">
    </ol>
    <a href="?page=galeri_tambah" class="btn btn-success">+ Tambah foto</a>
    <hr>
    <table class="table table-bordered">
        <tr>
            <th>Gambar</th>
            <th>Judul</th>
            <th>Album</th>
            <th>Deskripsi</th>
            <th>Tanggal</th>
            <th>Aksi</th>
        </tr>

        <?php
        $query = mysqli_query($koneksi,"SELECT foto.*, album.nama_album FROM foto LEFT JOIN album ON album.id_album=foto.id_album");
        while ($data = mysqli_fetch_array($query)) {
            ?>
            <tr>
                <td>
                    <a href="gambar/<?php echo $data['gambar'] ?>" target="_blank">
                        <img src="gambar/<?php echo $data['gambar'] ?>" alt="gambar" width="250" height="auto">
                    </a>
                </td>
                <td><?php echo $data['judul_foto'] ?></td>
                <td><?php echo $data['nama_album'] ?></td>
                <td><?php echo $data['deskripsi_foto'] ?></td>
                <td><?php echo $data['tanggal_unggah'] ?></td>
                <td>
                    <a href="?page=galeri_ubah&&id=<?php echo $data['id_foto'] ?>" class="btn btn-primary">Ubah</a>
                    <a href="?page=galeri_hapus&&id=<?php echo $data['id_foto'] ?>" class="btn btn-danger">Hapus</a>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<style>
    /* Global Styles */
body {
    /* font-family: 'Roboto', sans-serif; */
    background-color: #fafafa; /* Latar belakang yang lebih terang dan bersih */
    color: #333;
    margin: 0;
    padding: 0;
}

.container-fluid {
    padding: 30px 20px;
}

/* Heading */
h1.mt-4 {
    font-size: 3.1rem;
    font-weight: 500;
    color:rgb(83, 172, 105); /* Soft dark blue */
    text-align: center;
    margin-bottom: 20px;
    font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; /* Modern font */
    letter-spacing: 1px;
    transition: color 0.3s ease;
}

h1.mt-4:hover {
    color: #1abc9c; /* Light teal on hover */
}

/* Breadcrumb */
.breadcrumb {
    background-color: transparent;
    padding: 0;
    margin-bottom: 20px;
}

.breadcrumb-item {
    font-size: 1rem;
    color: #888;
}

.breadcrumb-item.active {
    color: #333;
}

/* Button Styles */
.btn {
    border-radius: 4px;
    padding: 8px 16px;
    font-size: 0.9rem;
    text-transform: uppercase;
    font-weight: 500;
    transition: background-color 0.3s ease, transform 0.2s ease;
}

.btn-success {
    background-color: #27ae60;
    color: white;
    border: none;
}

.btn-success:hover {
    background-color: #2ecc71;
    transform: scale(1.05);
}

.btn-info {
    background-color: #1abc9c;
    color: white;
    border: none;
}

.btn-info:hover {
    background-color: #16a085;
    transform: scale(1.05);
}

.btn-primary {
    background-color: #2980b9;
    color: white;
    border: none;
}

.btn-primary:hover {
    background-color: #3498db;
    transform: scale(1.05);
}

.btn-danger {
    background-color: #e74c3c;
    color: white;
    border: none;
}

.btn-danger:hover {
    background-color: #c0392b;
    transform: scale(1.05);
}

/* Table Styles */
table {
    width: 100%;
    margin-top: 20px;
    border-collapse: collapse;
}

table th, table td {
    padding: 15px;
    text-align: left;
    vertical-align: middle;
}

table th {
    background-color: #ecf0f1;
    color: #333;
    font-weight: 500;
    font-size: 1rem;
}

table td {
    background-color: #ffffff;
    color: #666;
    border-bottom: 1px solid #ddd;
    font-size: 0.95rem;
}

table img {
    width: 100%;
    max-width: 180px;
    height: auto;
    border-radius: 5px;
    transition: transform 0.3s ease;
}

table img:hover {
    transform: scale(1.1); /* Zoom effect on hover */
}

/* Form Styles */
form {
    background-color: white;
    padding: 20px;
    border-radius: 8px;
    box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
    margin-top: 30px;
}

form input, form select, form textarea {
    width: 100%;
    padding: 10px;
    margin-bottom: 15px;
    border: 1px solid #ddd;
    border-radius: 4px;
    background-color: #f9f9f9;
    font-size: 1rem;
    color: #333;
    transition: border-color 0.3s ease;
}

form input:focus, form select:focus, form textarea:focus {
    border-color: #2980b9;
    outline: none;
}

/* Responsive Table */
@media (max-width: 768px) {
    table th, table td {
        font-size: 0.9rem;
        padding: 10px;
    }

    h1.mt-4 {
        font-size: 1.8rem;
    }

    .breadcrumb-item {
        font-size: 0.9rem;
    }

    .btn {
        font-size: 0.8rem;
        padding: 6px 12px;
    }
}


</style>