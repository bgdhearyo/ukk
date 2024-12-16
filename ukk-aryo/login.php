<?php
include("koneksi.php");
if(isset($_POST["username"])){
    $username = $_POST["username"];
    $password = md5($_POST["password"]);

    $cek = mysqli_query($koneksi,"SELECT*FROM user WHERE username='$username' AND password='$password'");
    if(mysqli_num_rows($cek) > 0){
        $data = mysqli_fetch_array($cek);
        $_SESSION['user'] = $data;
        echo '<script>alert("Selamat datang '.$data['nama_lengkap'].'"); location.href = "index.php";</script>';
    }else{
        echo '<script>alert("Username/password salah");</script>';
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Login - Galeri Foto</title>
    <link href="css/styles.css" rel="stylesheet" />
    <script src="https://use.fontawesome.com/releases/v6.3.0/js/all.js" crossorigin="anonymous"></script>
    <style>

    /* Reset and base styles */
* {
    margin: 0;
    padding: 0;
    box-sizing: border-box;
}

body {
    font-family: 'Poppins', sans-serif; /* Menggunakan font modern yang lebih ringan */
    background: linear-gradient(135deg, #6c5ce7, #00b894);
    height: 100vh;
    display: flex;
    justify-content: center;
    align-items: center;
    color: #fff;
}

/* Layout Authentication */
#layoutAuthentication {
    width: 100%;
    display: flex;
    justify-content: center;
}

#layoutAuthentication_content {
    width: 100%;
}

/* Card styles */
.card {
    border-radius: 15px;
    border: none;
    box-shadow: 0 8px 16px rgba(0, 0, 0, 0.1);
    background-color: #fff;
}

.card-header {
    background-color: #4e73df;
    color: #fff;
    border-top-left-radius: 15px;
    border-top-right-radius: 15px;
    padding: 30px 20px;
    text-align: center;
}

.card-header h3 {
    margin: 0;
    font-size: 2rem; /* Menggunakan ukuran font lebih besar untuk kesan modern */
    font-weight: 600;
    font-family: 'Poppins', sans-serif;
    letter-spacing: 1px; /* Menambahkan jarak antar huruf untuk efek lebih 'long' */
    text-transform: uppercase; /* Menjadikan tulisan lebih bold dan berkesan elegan */
    color: #fff;
}

.card-body {
    padding: 30px 40px;
}

/* Form elements */
.form-floating {
    margin-bottom: 20px;
}

.form-floating label {
    font-weight: 500;
    color: #555;
}

.form-floating input {
    font-size: 1rem;
    padding: 12px 15px;
    border-radius: 8px;
    border: 1px solid #ddd;
    width: 100%;
    transition: border-color 0.3s ease, box-shadow 0.3s ease;
}

.form-floating input:focus {
    border-color: #4e73df;
    outline: none;
    box-shadow: 0 0 8px rgba(78, 115, 223, 0.3);
}

/* Button styles */
.btn-primary {
    background-color: #4e73df;
    border: none;
    padding: 14px;
    color: white;
    font-size: 1.2rem;
    border-radius: 8px;
    transition: background-color 0.3s ease;
    width: 100%;
    font-family: 'Poppins', sans-serif; /* Font lebih ringan untuk tombol */
}

.btn-primary:hover {
    background-color: #2e59d9;
}

/* Footer text */
.card-footer {
    background-color: #f8f9fc;
    padding: 15px;
    border-bottom-left-radius: 15px;
    border-bottom-right-radius: 15px;
}

.card-footer .small {
    font-size: 0.9rem;
    font-family: 'Poppins', sans-serif;
    color: #2980b9;
}

.card-footer a {
    color: #4e73df;
    text-decoration: none;
    font-weight: 600;
}

.card-footer a:hover {
    text-decoration: underline;
}

/* Media Queries for responsiveness */
@media (max-width: 768px) {
    .card {
        width: 100%;
        margin: 0;
    }

    .card-header h3 {
        font-size: 1.6rem;
    }

    .form-floating input {
        font-size: 1rem;
    }

    .btn-primary {
        padding: 14px;
        font-size: 1.1rem;
    }
}


    </style>
</head>
<body>
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-6 col-md-8 col-sm-10">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header text-center">
                                    <h3 class="font-weight-light my-4">LOGIN</h3>
                                </div>
                                <div class="card-body">
                                    <form method="POST">
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="username" type="text" placeholder="Enter your username" required />
                                            <label>Username</label>
                                        </div>
                                        <div class="form-floating mb-3">
                                            <input class="form-control" name="password" type="password" placeholder="Enter your password" required />
                                            <label>Password</label>
                                        </div>
                                        <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                            <button class="btn btn-primary w-100" type="submit">LOGIN</button>
                                        </div>
                                    </form>
                                </div>
                                <div class="card-footer text-center py-3">
                                    <div class="small">Belum punya akun ?<a href="register.php"> Register</a></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>
</html>
