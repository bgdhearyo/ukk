<div class="container-fluid px-4">
    <h1 class="mt-4">Dashboard</h1>
    <div class="row">
        <div class="col-xl-3 col-md-6">
            <div class="card bg-primary text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-book"></i>
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM album"))?> Total Album
                </div>
                <div class="card-footer">
                </div>
            </div>
        </div>

        <!-- Card: Total Foto -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-warning text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-image"></i>
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM foto"))?> Total Foto
                </div>
                <div class="card-footer">
                    <!-- Footer (kosong atau bisa digunakan untuk info lainnya) -->
                </div>
            </div>
        </div>

        <!-- Card: Total Like -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-success text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-thumbs-up"></i>
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM like_foto"))?> Total Like
                </div>
                <div class="card-footer">
                    <!-- Footer (kosong atau bisa digunakan untuk info lainnya) -->
                </div>
            </div>
        </div>

        <!-- Card: Total Komentar -->
        <div class="col-xl-3 col-md-6">
            <div class="card bg-danger text-white mb-4">
                <div class="card-body">
                    <i class="fas fa-comments"></i>
                    <?php echo mysqli_num_rows(mysqli_query($koneksi, "SELECT*FROM komentar_foto"))?> Total Komentar
                </div>
                <div class="card-footer">
                    <!-- Footer (kosong atau bisa digunakan untuk info lainnya) -->
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    /* Judul Dashboard */
/* Judul Dashboard */
/* Judul Dashboard */
h1.mt-4 {
    font-family: 'Lora', serif; /* Menggunakan font serif untuk tampilan lebih elegan */
    font-size: 3rem; /* Ukuran font lebih besar */
    font-weight: 600; /* Berat font sedikit lebih bold */
    color: #333; /* Warna teks yang lebih gelap tapi tetap elegan */
    text-align: center;
    margin-top: 50px;
    margin-bottom: 30px; /* Memberikan ruang yang cukup di bawah judul */
    letter-spacing: 1.2px; /* Memberikan jarak antar huruf yang lebih luas */
    text-transform: capitalize; /* Menggunakan huruf kapital di awal kata */
    position: relative;
    z-index: 1;
    transition: color 0.3s ease;

}

/* Garis bawah dengan efek gradasi */
h1.mt-4::after {
    content: '';
    position: absolute;
    width: 60%;
    height: 3px;
    background: linear-gradient(to right, #00aaff, #66ffcc); /* Gradasi biru hijau pastel */
    left: 50%;
    transform: translateX(-50%);
    bottom: -10px; /* Posisi sedikit di bawah teks */
}

/* Efek bayangan pada teks */
h1.mt-4 {
    text-shadow: 2px 2px 8px rgba(0, 0, 0, 0.1); /* Bayangan halus yang memberi efek depth */
}

/* Efek hover */
h1.mt-4:hover {
    color: #00aaff; /* Mengubah warna teks menjadi biru cerah saat hover */
    text-shadow: 4px 4px 15px rgba(0, 0, 0, 0.2); /* Bayangan lebih tajam saat hover */
    transition-delay: 0.2s;
}


/* Card Layout */
.card {
    border-radius: 12px;
    box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1); /* Bayangan halus */
    border: none;
    overflow: hidden;
    background-color: #fdfdfd;
    padding: 20px; /* Memberikan ruang di dalam card */
    margin-bottom: 30px; /* Jarak bawah antar card */
    transition: transform 0.3s ease, box-shadow 0.3s ease;
}

/* Card Hover Effect */
.card:hover {
    transform: translateY(-8px); /* Efek hover halus */
    box-shadow: 0 10px 30px rgba(0, 0, 0, 0.15); /* Bayangan lebih besar saat hover */
}

/* Card Body */
.card-body {
    font-size: 1.25rem; /* Ukuran teks card yang lebih kecil */
    font-weight: 500;
    display: flex;
    justify-content: center;
    align-items: center;
    height: 130px;
    text-align: center;
    color: #555;
    background-color: #f2f2f2;
    position: relative;
    padding: 20px;
}

/* Ikon */
.card-body i {
    font-size: 2rem;
    color: #333;
    margin-right: 15px;
    transition: color 0.3s ease;
}

/* Hover pada Ikon */
.card-body i:hover {
    color: #007bff;
}

/* Card Footer */
.card-footer {
    background-color: #f9f9f9;
    text-align: right;
    padding: 12px 20px;
    font-size: 0.9rem;
    color: #888;
}

/* Warna Card */
.bg-primary {
    background-color: #3498db !important; /* Biru pastel */
}

.bg-warning {
    background-color: #f39c12 !important; /* Kuning pastel */
}

.bg-success {
    background-color: #2ecc71 !important; /* Hijau pastel */
}

.bg-danger {
    background-color: #e74c3c !important; /* Merah pastel */
}

/* Responsif untuk perangkat kecil */
@media (max-width: 768px) {
    .col-xl-3, .col-md-6 {
        width: 100%;
        margin-bottom: 20px;
    }

    h1.mt-4 {
        font-size: 2rem;
    }

    .card-body {
        font-size: 1.1rem; /* Ukuran font sedikit lebih kecil di perangkat kecil */
    }
}

</style>