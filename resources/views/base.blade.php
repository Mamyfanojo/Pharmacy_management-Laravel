
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title> @yield('title') </title>
    <link rel="icon" href="">
    <link rel="stylesheet" href=" {{ asset('assets/styles/header.css') }} ">
    <link rel="stylesheet" href=" {{ asset('assets/styles/bootstrap.min.css') }} ">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
     <link rel="preconnect" href="https://fonts.googleapis.com">
     <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
     <link rel="stylesheet" href=" {{ asset('assets/styles/client/index.css') }} ">
     <link rel="stylesheet" href=" {{ asset('assets/styles/panier.css') }} ">
     <link rel="stylesheet" href=" {{ asset('assets/styles/admin/forma.css') }} ">
     <link rel="stylesheet" href="{{ asset('assets/styles/admin/dashboard.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.css') }}">
     <link rel="stylesheet" href="{{ asset('assets/fontawesome/css/all.min.css') }}">
     <link href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,100;0,300;0,400;0,700;0,900;1,100;1,300;1,400;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
     <script src=" {{ asset('assets/script/header.js') }} " defer></script>
 
</head>
<body>
	<header>
          <i class='bx bx-menu' id="menu-icon"></i>
          <h3>@yield('title')</h3>
          <div class="profil-details">
               @auth
               <div>
                    <img src=" {{ asset('assets/images/users/ae50d1ec8ae30fb0f9ffa68e9758281e.jpg') }} " alt="profil"/>
                    <span class="admin-name"> {{ Illuminate\Support\Facades\Auth::user()->name }} </span>
               </div>
               <div>
                    <form class="nav-item" action="{{ route('auth.logout') }}" method="post">
                         @method('delete')
                         @csrf
                         <button class="nav-link btn btn-danger">Se deconnecter</button>
                    </form>
               </div>
               @endauth
          </div>
          @guest
               <a href="{{ route('auth.login') }}">Se connecter</a>
          @endguest
         
     </header>
     <div class="sidebar">
          <div class="title">
               <h3><img class="h-1/2 absolute " src="{{ asset('assets/images/Plan de travail 3@4x.png') }}" width="60px" height="60px" alt=""> <span>Pha</span>rma</h3>
          </div>

          @php
               $route = request()->route()->getName();
          @endphp

          <div class="navbars">
               <div class="nav-items">
                    <a href="" style="text-decoration:none;" class="">
                         <span class="icons"><i class='fas fa-tachometer-alt icostyl'></i></span>
                         <span class="text">Dashboard</span>
                    </a>
                    <a @class(['active' => str_contains($route, 'medicament')]) style="text-decoration:none;" href=" {{ route('admin.medicament.index') }} ">
                         <span class="icons"><i class=' fas fa-pills icostyl'></i></span>
                         <span class="text">Medicaments</span>
                    </a>
                    <a @class(['active' => str_contains($route, 'category')]) style="text-decoration:none;" href=" {{ route('admin.category.index') }} ">
                         <span class="icons"><i class='fas fa-tags icostyl '></i></span>
                         <span class="text">Categories</span>
                    </a>
                    <a @class(['active' => str_contains($route, 'supplier')]) style="text-decoration:none;" href=" {{ route('admin.supplier.index') }} ">
                         <span class="icons"><i class='fas fa-truck icostyl'></i></span>
                         <span class="text">Fournisseur</span>
                    </a>
                    <a @class(['active' => str_contains($route, 'vente')]) style="text-decoration:none;" href=" {{ route('admin.vente') }} ">
                         <span class="icons"><i class='fas fa-cash-register icostyl'></i></span>
                         <span class="text">Faire une vente</span>
                    </a>
                    <a class="" style="text-decoration:none;" href="">
                         <span class="icons"><i class='fas fa-receipt icostyl'></i></span>
                         <span class="text">Liste des ventes</span>
                    </a>
                    <a  @class(['active' => str_contains($route, 'stock')]) class="" style="text-decoration:none;" href=" {{ route('admin.medoc.stock') }} ">
                         <span class="icons"><i class='fas fa-boxes icostyl'></i></span>
                         <span class="text">Gerer les stocks</span>
                    </a>
                    <a @class(['active' => str_contains($route, 'cart')]) style="text-decoration:none;" href=" {{ route('cart.index') }} ">
                         <span class="icons"><i class='fas fa-shopping-cart icostyl'></i></span>
                         <span class="text">Panier <span style="color:red;"> [{{ count(session('cart')) }}]</span></span>
                    </a>
                    
                         <form class="mt-4" action="" method="POST">
                              <button type="submit" class="btn btn-danger">Se déconnecter</button>
                         </form>  
               </div>
          </div>
     </div><br>
     
     <div class="container mt-5 forma" style="position:absolute; top: 34px; left:410px; ">
          @if(session('success'))
          <div class="alert alert-success" style="padding-top: 12px; padding-bottom: 12px">
               {{ session('success') }}
          </div>

          @endif

          <!-- @if($errors->any())
               <div class="alert alert-danger">
                    <ul class="ny-0">
                         @foreach($errors->all() as $error)
                         <li> {{$error}} </li>
                         @endforeach
                    </ul>
               </div>
          @endif -->

     </div>

     @yield('content')

</body>
</html>