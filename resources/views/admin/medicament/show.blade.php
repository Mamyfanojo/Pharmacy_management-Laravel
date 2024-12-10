@extends('base')

@section('title', 'Medicament détail')

@section('content')

<style>
    .detail{
        padding-top: 3%;
        padding-left: 15%;
    }
    .bord{
        border-left: #7AB730 solid;
    }
    .titre{
        background-color: #7AB730;
        border-radius: 7px;
    }
    .categ {
        color: #7AB730;
    }
    .detour{
        border: #7AB730 solid;
        border-top-width: 20%;
    }
    .xc{
        padding: 30px;
    }
    .text_detail {
        position: relative;
        left: 10%;
        padding-top: 0;
    }
    
</style>

     <!-- START  -->
        
        <div class="detail">
        
            <!-- <h2 class="align-self-start best" style="letter-spacing:2px"> <span>Ajout </span>de medicament</h2><br><br><br> -->
            <div class="container-fluid py-5 ">
            <!-- <h2 class="text_detail" style="letter-spacing:2px">Detail</h2><br> -->
                <div class="mr-5 container d-flex align-items-center justify-content-between flex-row">
                    <h2 class="align-self-start" style="letter-spacing:2px">Detail</h2>
                    <a class="btn btn-success d-flex align-items-center justify-content-center" href=" {{route('admin.medicament.index')}} "><i class="fas fa-plus"></i>  Retour à la liste des medicaments</a>
                </div><br>
                <div class="container detour">
                    <div class="row gx-5 xc">
                        <div class="col-lg-5 mb-5 mb-lg-0" style="min-height: 500px;">
                            <div class="position-relative h-100">
                                <img class="position-absolute w-100 h-100 rounded" src=" {{ $medicament->imageUrl() }} " style="object-fit: cover;">
                            </div>
                        </div>
                        <div class="col-lg-7">
                            <div class=" border-5 ps-5 mb-5 bord">
                                <h6 class="text-primary text-uppercase"> {{ $medicament->nom }} </h6>
                                <h1 class="display-5 text-uppercase mb-0"> {{ $medicament->description }} </h1>
                            </div>
                            <h4 class="text-body mb-4"><span style="color: red;">Avertissement  :</span> {{ $medicament->avertissement }} </h4>
                            <div class="bg-light p-4">
                                <ul class="nav nav-pills justify-content-between mb-3" id="pills-tab" role="tablist">
                                    <li class="nav-item w-50 titre" role="presentation">
                                        <button class="nav-link text-uppercase w-100 text-white " id="pills-1-tab" data-bs-toggle="pill"
                                            data-bs-target="#pills-1" type="button" role="tab" aria-controls="pills-1"
                                            aria-selected="true">Fournisseur : </button>
                                    </li>
                                    <li class="nav-item w-50 " role="presentation">
                                        <button class="nav-link text-uppercase w-100 categ" id="pills-2-tab"> {{ $medicament->supplier->nom }} </button>
                                    </li>
                                </ul>
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-1" role="tabpanel" aria-labelledby="pills-1-tab">
                                        <p class="mb-0"><span style=" font-weight: bold; ">Categorie : </span> {{$medicament->category->nom}} </p>
                                        <p class="mb-0"><span style=" font-weight: bold; ">Code : </span> {{$medicament->code}} </p>
                                        <p class="mb-0"><span style=" font-weight: bold; ">Prix unitaire : </span> {{ number_format($medicament->prix_unit, '0','',' ') }} Ar</p>
                                        <p class="mb-0"><span style=" font-weight: bold; ">Nombre en stock : </span> {{$medicament->stock}} </p>
                                        <p class="mb-0"><span style=" font-weight: bold; ">Date de peremption : </span> {{ Carbon\Carbon::parse($medicament->date_exp)->translatedFormat('d F Y') }} </p>
                                        <p class="mb-0"><span style=" font-weight: bold; ">Forme : </span> {{$medicament->forme}} </p>
                                        <p class="mb-0"><span style=" font-weight: bold; ">Effet secondaire : </span> {{$medicament->effet}} </p>
                                    </div>
                                    <br>
                                    

                                    <div class="d-flex gap-1">
                                        <a href=" {{ route('admin.medicament.edit', [$medicament]) }} " class="btn btn-sm btn-primary"><span class="fas fa-pencil-alt"></span> Modifier</a>
                                        <form action=" {{ route('admin.medicament.destroy', [$medicament]) }} " method="POST">
                                            @csrf
                                            @method('delete')
                                                <button type="submit" class="btn btn-sm btn-danger"><span class="fas fa-trash"></span> Supprimer</button>
                                        </form>
                                        <form action="  " method="POST">
                                            @csrf
                                                
                                                <button type="submit"class="btn btn-sm btn-secondary"><span class="fas fa-shopping-cart"></span> Ajouter au panier</button>
                                        </form>
                                        
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
     <!-- END -->

@endsection