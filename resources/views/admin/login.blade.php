<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Panel | Giriş Yap</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.13.1/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css') }}">
</head>

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-primary shadow">
            <div class="card-header text-center">
                <h1 class="mb-0"><b>Admin</b>Panel</h1>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg text-muted">Yönetim paneline erişmek için giriş yapın</p>

                @if ($errors->any())
                    <div class="alert alert-danger py-2">
                        <ul class="mb-0 fs-7">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf

                    <div class="input-group mb-3">
                        <input type="text" name="username" class="form-control" placeholder="Kullanıcı Adı"
                            value="{{ old('username') }}" required autofocus>
                        <div class="input-group-text"><span class="bi bi-person-fill"></span></div>
                    </div>

                    <div class="input-group mb-3">
                        <input type="password" name="password" class="form-control" placeholder="Şifre" required>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>

                    <div class="row align-items-center">
                        <div class="col-7">
                            <div class="form-check">
                                <input class="form-check-input" type="checkbox" name="remember" id="remember">
                                <label class="form-check-label text-secondary" for="remember">Beni Hatırla</label>
                            </div>
                        </div>
                        <div class="col-5">
                            <button type="submit" class="btn btn-primary w-100">Giriş Yap</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.min.js"></script>
</body>

</html>
