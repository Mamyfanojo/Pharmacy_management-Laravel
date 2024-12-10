@extends('base')

@section('title', 'Dashboard')

@section('content')

     <!-- START  -->
        
     <div class="containers">

        <div class="dashboards">
            <div class="cards">
                    <a style="text-decoration:none;" href="" class="card green">
                        <h3>Medicaments</h3>
                        <h1>{{ $nb_medoc }}</h1>
                        <span>Gérer les prêts</span>
                </a>
                <a style="text-decoration: none;" href="" class="card blue">
                        <h3>Categories</h3>
                        <h1>{{ $nb_categ }}</h1>
                        <span>Voir les utilisateurs</span>
                </a>
                <a style="text-decoration: none;" href="" class="card light-blue">
                        <h3>Fournisseurs</h3>
                        <h1>{{ $nb_supp }}</h1>
                        <span>Gérer les clients</span>
                </a>
                        <a style="text-decoration: none;" href="" class="card purple">
                        <h3>Opérations</h3>
                        <h1>50</h1>
                        <span>Gérer les opérations</span>
                </a>
                
                <!-- <a style="text-decoration:none;" href="" class="card green">
                        <h3>Prêts</h3>
                        <h1>50</h1>
                        <span>Gérer les prêts</span>
                </a>
                <a style="text-decoration:none;" href="" class="card green">
                        <h3>Prêts</h3>
                        <h1>50</h1>
                        <span>Gérer les prêts</span>
                </a> -->
            </div><br><br>

            <table class="table table-striped table-hover">
               <thead style="font-family: 'Poppins', sans-serif;">
                    <tr>
                         <th></th>
                         <th>Client</th>
                         <th>Date d'emprunt</th>
                         <th>Date d'échéanche</th>
                         <th>Status</th>
                         <th>Actions</th>
                    </tr>
               </thead>
               <tbody style="font-family: 'Poppins', sans-serif;">
                    
                         <tr>
                              <td>01</td>
                              <td class="fw-bolder">Mamy Fanojo</td>
                              <td>02 janvier 2024</td>
                              <td>02 janvier 2024</td>
                              <td>
                                        <p style="color:red">Dépassé</p>
                                   
                              </td>
                              <td class="d-flex gap-1">
                                   <a href="" class="btn btn-sm btn-primary">Voir les détails</a>
                                   <form action="" method="POST">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="submit" name="" value="Supprimer" class="btn btn-sm btn-danger">
                                   </form>
                              </td>
                         </tr>
                         
                         
                    
               </tbody>
          </table>
        </div>

        


     </div>
     <!-- END  -->

@endsection