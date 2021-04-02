<?php

use App\Models\User;
use App\Models\Produit;
use App\Mail\NouveauProduitAjoute;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;
use App\Http\Controllers\MainController;
use App\Http\Controllers\ProduitController;
use App\Notifications\NoveauProduitNotification;


Route::get('/',         [MainController::class, 'afficheAcceuil'] )->name('accueil');

Route::get('procedure/{param}', [MainController::class, 'afficheProcedure'])->name('procedure')  ;
Route::get('ajouter-produit',   [MainController::class, 'ajoutProduit'])->name('a.produit')  ;

Route::get('ajout2',            [MainController::class, 'ajoutProduitEncore'])->name('a.p')  ;

Route::get("list-produits", [MainController::class, "getList"])->name("list");

Route::get('modification/{id}', [MainController::class, "modifierProduit"]);

Route::get('supprimer/{id}', [MainController::class, "supprimer"])->name('delete');

Route::get('produits/liste', [MainController::class, "getList"])->name('produits.liste');

//Route::middleware(['auth','isAdmin'])->group(function(){
Route::get('ajouterCommande/{id}', [MainController::class, "ajouterCommande"])->name('ajouterCommande');
//});
Route::get('supprimerCommande/{id}', [MainController::class, "supprimerCommande"])->name('deleteCommande');

Route::get('produits/ajouter',[MainController::class, 'ajouterProduit'])->middleware(['auth','isAdmin'])->name('produit.ajouter')  ;
Route::post("produits/enregister",[MainController::class,"enregisterProduit"])->name('produits.enregistrer');


//Route::get("produits/modifier/{produit}",[ProduitController::class,"edit"])->name('produits.modifier');

//Route::get("produits/modifier/{id}",[MainController::class,"editProduit"])->name('produits.modifier');

//Route::get("produits/modifier/{produit}",[MainController::class,"editProduit"])->name('produits.modifier');
Route::put("produits/update/{id}",[MainController::class,"updateProduit"])->name('produits.update');
// route resources
route::resource('produit',ProduitController::class); 
Route::get("export-excel",[MainController::class,"excelExport"])->name('excel.export');


Route::get ("test-mail",function(){
    $produit=Produit::first();
    return new NouveauProduitAjoute($produit);
});

Route::get ("send-mail",[MainController::class,"senMail"]);

Route::get ("test-notification",function(){
$user= User::first();
$produit= Produit::firstt();
$user->notify(new NoveauProduitNotification($produit));

dd("Notification Sent");
});

/////////Book

// Route::resource('/add-post',[BookController::class,'addBook']);
//////
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');
 require __DIR__.'/auth.php';

