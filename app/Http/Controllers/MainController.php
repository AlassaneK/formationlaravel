<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Produit;
use App\Models\Commande;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Exports\ProduitsExport;
use App\Mail\NouveauProduitAjoute;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\ProduitFormRequest;
use Illuminate\Support\Facades\Notification;
use App\Notifications\NoveauProduitNotification;
//use Illuminate\Notifications\Notification;

class MainController extends Controller
{
    public function afficheAcceuil()
    {
        // dd(Auth::user()->role->role);
        // Fonction retournant une page avec des params
        return view('pages.front-office.welcome', 
        [
           'nomSite'      => 'Service en ligne de mon Ministère',   
           'nomMinistere' => 'Ministere de Laravel au Burkina Faso',   
        ]
        );
    }
    
    public function afficheProcedure($param)
    {
        // Fonction retournant une page avec des params recemment entrées
       return view('pages.front-office.procedure', 
        [
            'parametre' => $param,       
            'question' => 'baba'       
        ]);
    }

    // fonction pour creer un nouveau produit - PREMIERE APPROCHE
    public function ajoutProduit()
    {
        $produit = New Produit();

        $produit->uuid = Str::uuid();
        $produit->designation = 'Tomate';
        $produit->description = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Eaque deleniti quisquam beatae deserunt dicta ipsam tenetur at necessitatibus in, eligendi voluptatibus doloribus earum sed error maiores nam possimus sunt assumenda?';
        $produit->prix = '1000';
        $produit->like = '21';
        $produit->pays_source = 'Burkina Faso';
        $produit->poids = '45.10';

        $produit->save();
    }

    // fonction pour creer un nouveau produit - DEUXIEME APPROCHE  
    public function ajoutProduitEncore()
    {
        Produit::create(
            [
                'uuid'          => Str::uuid(),
                'designation'   => 'Mangue',
                'description'   => 'Mangue bien grosse et sucrée! Yaa Proprè !',
                'prix'          => 1500,
                'like'          => 63,
                'pays_source'   => 'Togo',
                'poids'         => 89.5
            ]
        );
    }


    public function getList()
    {
        //$produits = Produit::all();
//get a product
//:: pour faire une recherche
$produit=Produit::first();
$user=User::first();
$produit->users()->attach($user->id);
$users=$produit->users;
/*$produit=Produit::first();
$user=User::first();
//$produit->users()->attach($user);
$users=$produit->users;
$produit=$user->produits;*/


//dd($produit,$users);
        return view("pages.front-office.list-produits",[
            'lesproduits'=>Produit::paginate(6),
            'lescommandes'=>Commande::paginate(6),

            //'lesproduits'=>Produit::all()

        ]);

    }

    public function modifierProduit($id)
    {
        $produitModifie = Produit::where("id", $id)->update([
            "designation" => "Orange",
            "description" => "La description de Orange",
        ]);

        dd($produitModifie);
    }


    public function supprimer($id)
    {
        Produit::destroy($id);
        //return redirect()->back();
       // return redirect()->back('accueil');
       return redirect()->back()->with('statut','Supprime avec succes');
    }

public function ajouterCommande($id){
   // dd($id);
$commande=new Commande();
$commande->produit_id=$id;
$commande->uuid=str::uuid();
$commande->save();
//dd($commande);
return redirect()->back()->with("statut","Commande ajoute avec succes");
}

public function supprimerCommande($id)
{
    Commande::destroy($id);
    //return redirect()->back();
   // return redirect()->back('accueil');
   return redirect()->back()->with('statut','Commande Supprime avec succes');
}

public function ajouterProduit(){
    //dd('0');
    $produit = new Produit;
 return view("pages.front-office.ajouter-produit",[
    'produit'=>$produit] //["produit"]
);
 }

 public function enregisterProduit(ProduitFormRequest $request){
    //dd($request->designation,$request->prix);
 //return view("pages.front-office.ajouter-produit");
 //dd($request->all());
 //validation des champs
 /*$request->validate(/*[
     'designation' => 'required|min:5|max:255',
     'prix'=> 'required|digits_between:1000,50000',
     'description' => 'required|min:10|max:255',
     'pays_source' => 'required|min:5|max:255',
     'prix'=> 'required|digits_between:1,5',
 ]);*/



 $imageName="default-image.png";
 if($request->file("image")){
    $imageName=time()."_".$request->file("image")->getClientOriginalName();
    $request->file("image")->storeAs("public/produits-images",$imageName);
 }

 $produit = Produit::create([
    "uuid"=>Str::uuid(),
     "designation"=>$request->designation,
     "prix"=>$request->prix,
     "description"=>$request->description,
     "pays_source"=>$request->pays_source,
     "like"=>$request->like,
     "poids"=>$request->poids,
     "image"=>$imageName,


 ]);
 //return view("pages.front-office.ajouter-produit");
 //dd($request);

 /*$user=User::first();
 $produit= Produit::first();*/
 //Mail::to($user)->send(new NouveauProduitAjoute($produit));//pour ne plus envoyer de mail
//envoi de message
//$user->notify(new NoveauProduitNotification($produit));

 //$user= User::first();
//$produit= Produit::first();
//$user->notify(new NoveauProduitNotification($produit));
//notifier + utilisateur
/*$users= User::all();
Notification::send($users,new NoveauProduitNotification($produit));*/
//

 return view("pages.front-office.list-produits",[
    'lesproduits'=>Produit::paginate(6),
    'lescommandes'=>Commande::paginate(6),
])->with('statut','Product added successfully');
 }


//pas efficasse car msg d'erreur pas gerer
public function editProduit($id){
     $produit = Produit::find($id);

    //dd($produit);

    return view('pages.front-office.edit-produit',[
        'produit'=>$produit
    ]);


 }
//message d erreur gere lorsque le produit n'exixt pas
 /*public function editProduit(Produit $produit){
    //$produit = Produit::find($id);

   dd($produit);

   return view('pages.front-office.edit-produit',[
       'produit'=>$produit
   ]);


}*/

 public function updateProduit(ProduitFormRequest $request,$id){
 //$produit = 
 Produit::where("id",$id)->update([
    'designation'=> $request->designation,
    'designation'=> $request->prix,
    'designation'=> $request->description,
    'designation'=> $request->like,
    'designation'=> $request->pays_source,
    'designation'=> $request->poids,
]);
return redirect()->route("produits.liste")->with("statut","Produit modifié");

 }

 public function excelExport(){

   //dd('ok');
   return Excel::download(new ProduitsExport,"Produits.xls");
    }
    
/*public function senMail(){
    $user=User::first();
    Mail::to($user)->send(new NouveauProduitAjoute);
    //return new NouveauProduitAjoute();
    dd("Mail sent");
}*/
    
}
