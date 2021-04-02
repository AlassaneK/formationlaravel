<x-master-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h3>liste produits</h3>
                <div class="row">
                    @if(Auth::user()!=null && Auth::user()->isAdmin())

                    <a href="{{route('produit.ajouter')}}" class="btn btn-primary mr-1">
                        Add new              
                    </a>  
                    <a href="{{route('excel.export')}}" class="btn btn-success mr-1">
                        Export              
                    </a>  
                    @endif
                </div>                
                @if (session('statut'))
                <div class="alert alert-primary" role="alert">
                    <strong>  {{session('statut')}}
                    </strong>
                </div>
                @else
                @endif 
                @if ($lesproduits->count()>0)
                <table class="table table-hover">
                    <thead>
                        <tr>
                            <td>Images</td>
                            <td>designation</td>
                            <td>Prix</td>
                            <td>pays source</td>
                            <td>Actions</td>                           
                            <!--td>Supprimer</td-->
                            <tbody>
                                @foreach ($lesproduits as $produit)
                                <tr>
                                    <td>
                                        <img src="{{asset('storage/produits-images/'.$produit->image)}}" alt="" style='width:60px'>
                                    </td>                                   
                                    <td>
                                        {{$produit->designation}}
                                    </td>
                                    <td>{{ bf_currency($produit->prix) }}</td>
                                    <td>{{$produit->pays_source}}</td>
                                    <td class="d-flex">
                                        <a href="{{route('ajouterCommande',$produit->id)}}" class="btn btn-success mr-1" >
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style='width:25px'>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 3h2l.4 2M7 13h10l4-8H5.4M7 13L5.4 5M7 13l-2.293 2.293c-.63.63-.184 1.707.707 1.707H17m0 0a2 2 0 100 4 2 2 0 000-4zm-8 2a2 2 0 11-4 0 2 2 0 014 0z" />
                                              </svg>       
                                        </a>                             
                                        @if(Auth::user()!=null && Auth::user()->isAdmin())
                  
                                        {{--<a href="{{route('produits.modifier',$produit->id)}}" class="btn btn-primary mr-1">--}}
                                            <a href="{{route('produit.edit',$produit->id)}}" class="btn btn-primary mr-1">

                                         {{--<a href="{{route('produits.modifier',$produit)}}" class="btn btn-primary mr-1">--}}
                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style='width:25px'>
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5H6a2 2 0 00-2 2v11a2 2 0 002 2h11a2 2 0 002-2v-5m-1.414-9.414a2 2 0 112.828 2.828L11.828 15H9v-2.828l8.586-8.586z" />
                                          </svg>
                                        </a>
                                        {{--<a href="{{route('delete',$produit->id)}}" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style='width:25px'>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                              </svg>                       
                                            </a> --}}        
                                            
                                            
                                            {{--<a href="#" onClick="deleteConfirm('produitItem')" class="btn btn-danger">--}}

                                                <form id="{{'produitItem'.$produit->id}}" action="{{route('delete',$produit->id)}}" method="GET">
                                                </form>
                                                <a href="#" onClick="deleteConfirm('{{'produitItem'.$produit->id}}')" class="btn btn-danger">
                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style='width:25px'>
                                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                                      </svg>                       
                                                    </a> 
                                        @endif


                                    </td>
                                   
                                </tr>
                                @endforeach
                            </tbody>
                        </tr>
                    </thead>
                </table> 
                {{ $lesproduits->links() }}
                    
                @else
                    <p>aucun produit trouve</p>
                @endif
            </div>
            <div class="col-md-6">
                <h3>liste des commandes</h3>
                @if (session('statut'))
                <div class="alert alert-primary" role="alert">
                    <strong>  {{session('statut')}}
                    </strong>
                </div>
                @else
                @endif 
                @if ($lescommandes->count()>0)
                <table class="table table-hover">

                    <thead>
                        <tr>
                            <td>designation</td>
                            <td>Prix</td>
                            <!--td>pays source</td-->
                            <td>Supprimer</td>
                            <tbody>
                                @foreach ($lescommandes as $commande)
                                <tr>
                                    <td>{{$commande->produit->designation  ?? 'Introuvable'}}</td>
                                    <td>{{$commande->produit->prix ?? 'Introuvable'}} XOF</td>
                                    <!--td>{{--$commande->pays_source--}}</td-->
                                    <td>
                                        <a href="{{route('deleteCommande',$commande->id)}}" class="btn btn-danger">
                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" style='width:25px'>
                                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 7l-.867 12.142A2 2 0 0116.138 21H7.862a2 2 0 01-1.995-1.858L5 7m5 4v6m4-6v6m1-10V4a1 1 0 00-1-1h-4a1 1 0 00-1 1v3M4 7h16" />
                                              </svg>                       
                                            </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </tr>
                    </thead>
                </table> 
                {{ $lescommandes->links() }}
                    
                @else
                    <p>aucun commande trouve</p>
                @endif
            </div>
            <!--div class="col-md-6">
            </div-->
        </div>
    </div>
    </x-master-layout>