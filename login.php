<!DOCTYPE html>
<html>

<head>
    <title>Login Panitia</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="bg-success bg-gradient">

    <div class="container">
        <div class="row vh-100 d-flex justify-content-center align-items-center">

            <div class="col-md-4">
                <div class="card shadow-lg border-0">
                    <div class="card-body p-4">

                        <h3 class="text-center mb-4">🕌 Login Panitia</h3>

                        <form action="proses_login.php" method="POST">
                            <div class="mb-3">
                                <label class="form-label">Username</label>
                                <input type="text" name="username" class="form-control" required>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password" class="form-control" required>
                            </div>

                            <button class="btn btn-success w-100">Masuk</button>
                        </form>

                    </div>
                </div>
            </div>

        </div>
    </div>

</body>

</html>