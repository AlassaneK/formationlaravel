<x-master-layout>
    <br>
 <div class="container">
     <div class="row">
         <div class="col-md-8 offset-md-2">
         <h1 class="text-center">Ajout d'un nouveau produit</h1>

<form action="{{route('produits.enregistrer')}}" method="post" enctype="multipart/form-data">
    @method("post")

@include("partials._produit-form")
    {{--@include("partials._produit-form",["btnText"=>"Modify"])--}}

    </form>
</div>
    
</div>
 </div>
    </x-master-layout>