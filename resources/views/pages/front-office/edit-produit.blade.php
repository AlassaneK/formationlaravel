<x-master-layout>
    <br>
 <div class="container">
     <div class="row">
         <div class="col-md-8 offset-md-2">
         <h1 class="text-center">Modification d'un produit</h1>

<form action="{{route('produits.update',$produit->id)}}" method="post">
    @method("PUT")
    {{--@include("partials._produit-form",["btnText"=>"Modify"])--}}
    @include("partials._produit-form")

    </form>
</div>
    
</div>
 </div>
    </x-master-layout>