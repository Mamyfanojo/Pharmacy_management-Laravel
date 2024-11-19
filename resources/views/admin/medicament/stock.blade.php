@extends('base')

@section('title', 'Medicaments')

@section('content')

     <!-- START  -->
        
     <div class="containers">
          <div class="container publications-container flex-column d-flex align-items-center justify-content-between gap-4 mb-5">
               <div class="mr-5 container d-flex align-items-center justify-content-between flex-row">
                    <h2 class="align-self-start" style="letter-spacing:2px">Gerer  <span>les </span>stocks</h2>
                    <a class="btn btn-success d-flex align-items-center justify-content-center" href=" {{route('admin.medicament.create')}} "><span class="fas fa-arrow-left"></span>  Retourner au dashboard</a>
               </div>
               <form action="" class="gap-2 align-self-start d-flex align-items-center justify-content-center flex-row" >
                @csrf
                    <input id="nom" type="text" class="form-control" placeholder="Nom..." name="nom" value="{{ $input['nom'] ?? '' }}">
                    <input id="nom" type="number" class="form-control" placeholder="stock min..." name="minStock" value="{{ $input['minStock'] ?? '' }}">
                    <input id="nom" type="number" class="form-control" placeholder="stock max..." name="maxStock" value="{{ $input['maxStock'] ?? '' }}">

                    <input value="Rechercher" type="submit" class="btn btn-sm btn-outline-primary">
               </form>
               <table class="table table-striped table-hover">
                    <thead style="font-family: 'Poppins', sans-serif;">
                         <tr>
                              <th>Image</th>
                              <th>Nom</th>
                              <th>Date d ' expiration</th>
                              <th>Total en stock</th>
                              <th>
                                <span>Ajouter</span>
                                <span>      </span>
                                <span>      </span>
                                <span>      </span>
                                <span>      </span>
                                <span>Reduire</span>
                              </th>
                         </tr>
                    </thead>
                    <tbody style="font-family: 'Poppins', sans-serif;">
                         
                        @foreach ($medicaments as $medicament)
                            <tr>
                                @if (isset($medicament->image))
                                    <td> <img src=" {{$medicament->imageUrl()}} " width="40px" height="40px" alt=""></td>
                                @else
                                    <td> <img src=" {{ asset('assets/images/medoc_default.jpg') }} " width="40px" height="40px" alt=""></td>
                                @endif
                                
                                <td class="fw-bolder"> {{ $medicament->nom }} </td>

                                <td> {{ Carbon\Carbon::parse($medicament->date_exp)->translatedFormat('d F Y') }} </td>

                                
                                @if ($medicament->stock > 0)
                                    @if ($medicament->stock >= 100)
                                        <td>
                                            <p style="color:green"> {{ $medicament->stock }} </p>
                                        </td>
                                    @endif
                                    @if ($medicament->stock < 10)
                                        <td>
                                            <p style="color:red"> {{ $medicament->stock }} </p>
                                        </td>
                                    @endif
                                    @if ($medicament->stock >= 10 && $medicament->stock < 100)
                                        <td>
                                            <p style="color:blue"> {{ $medicament->stock }} </p>
                                        </td>
                                    @endif
                                    
                                @else
                                    <td>
                                        <p style="color:red; font-size:15px"> Rupture de stock </p>
                                    </td>
                                @endif
                                <td class="d-flex gap-1">
                                    
                                    <form action="{{route('admin.updateStock', ['medicament' => $medicament])}}" method="POST">
                                        @csrf
                                            <span>+</span><input type="number" name="max" class="btn btn-sm btn-outline-secondary">
                                            <span>-</span><input type="number" name="min" class="btn btn-sm btn-outline-secondary">
                                            <button type="submit" class="btn btn-sm btn-secondary"><span class="fas fa-sync"></span> Mettre à jour</button>
                                    </form>
                                    <form action="{{route('admin.initStock', ['medicament' => $medicament])}}" method="POST">
                                        @csrf
                                            <button type="submit" class="btn btn-sm btn-danger"><span class="fas fa-box-open"></span> Vider le stock</button>
                                    </form>
                                    
                                </td>
                            </tr>
                        @endforeach
                        
                    </tbody>
               </table>
               {{ $medicaments->links('vendor.pagination.default') }}
          </div>
     </div>
     <!-- END  -->

@endsection