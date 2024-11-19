<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link rel="stylesheet" href=" {{ asset('assets/styles/client/index.css') }} ">
     <link rel="stylesheet" href=" {{ asset('assets/styles/admin/forma.css') }} ">
     <link rel="stylesheet" href="{{ asset('assets/styles/admin/dashboard.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
     <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
     <script src=" {{ asset('assets/script/header.js') }} " defer></script>
    <link rel="stylesheet" href=" {{ asset('assets/styles/bootstrap.min.css') }} ">
    <title>Document</title>
</head>
<body>
    <div class="container">
        <h1>Se connecter</h1>
        <div class="card">
            <div class="card-body">
                <form action="{{ route('auth.login') }}" method="post" class="vstack gap-3">
                    @csrf
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input class="form-control" type="email" name="email" id="email" value="{{old('email')}}">
                    </div>
                    @error('email')
                    {{ $message }}
                    @enderror
                    <div class="form-group">
                        <label for="email">Mot de passe</label>
                        <input class="form-control" type="password" name="password" id="password">
                    </div>
                    @error('password')
                    {{ $message }}
                    @enderror
                    <button class="btn btn-primary" type="submit">Se connecter</button>
                </form>
            </div>
        </div>
    </div>
</body>
</html>

   
