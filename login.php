<!doctype html>

<?php
session_start();
if (isset($_SESSION['username'])) {
    header('location:index.php');
    exit;
}

?>
<!doctype html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Hello, world!</title>
</head>

<body>
    <div class="container mt-3">
        <div class="row justify-content-center">
            <div class="col-4">

                <?php
                if (isset($_GET['pesan'])) {

                    ?>
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                    <strong>Login gagal</strong>
                    <?php echo $_GET['pesan']; ?>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                <?php } ?>
                <div class="card">
                    <div class="card-header text-center">
                        <b>Halaman Login</b>
                    </div>
                    <form action="cekLogin.php" method="post" style="background-image:url('bg.jpg');
                    background-repeat:no-repeat;background-size:contain;">
                        <div class="card-body text-white">
                            <label for="basic-url" class="form-label">Username</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-person-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M3 14s-1 0-1-1 1-4 6-4 6 3 6 4-1 1-1 1zm5-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6" />
                                    </svg></span>
                                <input type="text" class="form-control" id="username" name="username" required
                                    placeholder="Masukan Username" aria-describedby="basic-addon3">
                            </div>
                            <label for="basic-url" class="form-label">Password</label>
                            <div class="input-group mb-3">
                                <span class="input-group-text" id="basic-addon3"><svg xmlns="http://www.w3.org/2000/svg"
                                        width="16" height="16" fill="currentColor" class="bi bi-unlock-fill"
                                        viewBox="0 0 16 16">
                                        <path
                                            d="M11 1a2 2 0 0 0-2 2v4a2 2 0 0 1 2 2v5a2 2 0 0 1-2 2H3a2 2 0 0 1-2-2V9a2 2 0 0 1 2-2h5V3a3 3 0 0 1 6 0v4a.5.5 0 0 1-1 0V3a2 2 0 0 0-2-2" />
                                    </svg></span>
                                <input type="password" class="form-control" id="password" name="password" required
                                    placeholder="Masukan Password" aria-describedby="basic-addon3">
                            </div>
                            <div class="row mb-3 justify-content-center">
                                <div class="col-md-4">
                                    <button type="submit" class="btn btn-primary" name="btnLogin">Login</button>
                                </div>

                            </div>

                            <div class="text-center text-dark">
                                Belum punya akun, silahkan <a href="daftar.php">Daftar</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>

    </div>

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous">
    </script>
</body>

</html>