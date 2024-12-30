<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Library Management System</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <section class="container">
        <div class="row justify-content-center align-items-center vh-100">
            <div class="col-10 col-xl-4 card p-4">
                <form method="post" action="{{ route('authenticate')}}">
                    @csrf
                    <div class="row g-3">
                        <div class="col-12">
                            <h2>Admin Login</h2>
                            <p class="form-text text-muted lh-sm">Welcome to the Library Management System, please enter your credentials</p>
                        </div>
                        <div class="col-12">
                            <label for="inputEmail" class="form-label">Email address</label>
                            <input type="email" name="email" class="form-control" id="inputEmail" placeholder="example@gmail.com" required autofocus>
                            <small class="form-text text-danger">@error('email') {{ $message }} @enderror</small>
                        </div>
                        <div class="col-12">
                            <label for="inputPassword" class="form-label">Password</label>
                            <input type="password" name="password" class="form-control" id="inputPassword" placeholder="password" required>
                        </div>
                        <div class="col-12 pb-2 pt-4">
                            <button type="submit" class="btn btn-primary col-12">Login</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </section>
</body>
</html>