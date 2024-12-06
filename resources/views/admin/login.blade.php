
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="{{ asset('assets/styles/style.css') }}">
    <script src="{{ asset('assets/js/tailwind.js') }}"></script>
    <title>Document</title>

</head>

<body>
    <div class="flex items-center justify-center bg-slate-950">
        <div class=" flex justify-center items-center ">
            <img class="h-1/2 absolute " src="{{ asset('assets/images/Plan de travail 3@4x.png') }}" alt="">
            <img class="h-screen" src="{{ asset('assets/images/fond_01.png') }}" alt="">
        </div>
        <div class="flex justify-center items-center flex-col">
            <div class="absolute flex justify-center items-center top-[0px] ">
                <h1 class=" text-white font-bold text-[3rem] leading-10 ">Se <br> connecter</h1>
                <img src="{{ asset('assets/images/seri_manjakely.png') }}"  class="h-[29vh] ">
            </div>
            <form action="{{ route('auth.login') }}" method="post" class="absolute flex flex-col gap-5">
                @csrf
                <input type="email" id="email" name="email" placeholder="Email" value="{{old('email')}}" class="h-12 w-[50vh] font-bold block  rounded-full text-[#0A132D] appearance-none bg-white py-4 pl-4 pr-12 text-base text-slate-900 placeholder:text-slate-600 focus:outline-none sm:text-sm sm:leading-6" >
                @error('email')
                    {{ $message }}
                @enderror
                <input type="password" name="password" id="password" placeholder="Mot de passe" class="h-12 w-[50vh] font-bold block  rounded-full text-[#0A132D] appearance-none bg-white py-4 pl-4 pr-12 text-base text-slate-900 placeholder:text-slate-600 focus:outline-none sm:text-sm sm:leading-6" >
                @error('password')
                    {{ $message }}
                 @enderror
                <button type="submit" id="bouton" class="mt-10 bg-[#1e958d] h-12 w-[50vh] font-bold block  rounded-full text-white iolet-500 hover:bg-green-600 active:bg-[#2d7873]">Se connecter</button>
            </form>
            <img class="h-[99vh] rounded" src="{{ asset('assets/images/fond_02.png') }}" alt="" >
        </div>
    </div>
    

</body>


</html>