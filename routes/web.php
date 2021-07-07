<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

//le tout

use App\Http\Controllers\EventController;
use App\Http\Controllers\ParticipantController;
use App\Http\Controllers\ReunionController;

Auth::routes();

Route::get('/','HomeController@index')->name('accueil');
Route::get('/home','HomeController@index')->name('home');
Route::get('/produit/','HomeController@produitHome')->name('produitHome');




Route::get('/profile','UserController@profile')->name('profile');
Route::get('/password/update','UserController@update_password')->name('updatePassword');
Route::post('/password/update','UserController@UpdatePassword');
Route::get('/profile/update_photo','UserController@update_photo')->name('update_photo');
Route::post('/profile/update_photo','UserController@UpdatePhoto')->name('UpdatePhoto');
Route::post('/profile/uploadImage','UserController@uploadImage')->name('uploadImage');
Route::post('/profile/upload_image','UserController@upload_image')->name('upload_image');


Route::get('/showpiecejointe/{id}','MediaController@ShowPieceJointe')->name('ShowPieceJointe');


Route::get('courses','ParametresController@courses')->name('courses');
Route::get('course/{course_id}','ParametresController@DetailsCourse')->name('DetailsCourse');
Route::post('/setcourselivree','ParametresController@setcourselivree')->name('setcourselivree');


Route::get('commandes','ParametresController@commandes')->name('commandes');
Route::get('commande/{commande_id}','ParametresController@DetailsCommande')->name('DetailsCommande');
Route::post('/setcommandelivree','ParametresController@setcommandelivree')->name('setcommandelivree');


// PRODUITS
Route::get('produits','ParametresController@produits')->name('produits');
Route::post('produits','ParametresController@SaveProduit')->name('SaveProduit');
Route::get('produit/{produit_id}','ParametresController@DetailsProduit')->name('DetailsProduit');
Route::get('modifier_produit/{produit_id}','ParametresController@ModifierProduit')->name('ModifierProduit');
Route::post('modifier_produit','ParametresController@SaveModifierProduit')->name('SaveModifierProduit');
Route::post('supprimer_produit','ParametresController@SupprimerProduit')->name('SupprimerProduit');

Route::post('upload_fichiers/{produit_id}','ParametresController@UpdateFichiers')->name('UpdateFichiers');
Route::post('update_produit_photo/{produit_id}','ParametresController@UpdateProduitPhoto')->name('UpdateProduitPhoto');

// CATEGORIES
Route::get('categories','ParametresController@categories')->name('categories');
Route::post('categories','ParametresController@SaveCategorie')->name('SaveCategorie');
Route::post('supprimer_categorie','ParametresController@SupprimerCategorie')->name('SupprimerCategorie');


// REUNION
Route::get('reunion', 'ReunionController@reunion')->name('reunion');
Route::post('reunion', 'ReunionController@SaveReunion')->name('SaveReunion');
Route::get('reunion/{reunion_id}', 'ReunionController@DetailsReunion')->name('DetailsReunion');
Route::get('modifier_reunion/{reunion_id}', 'ReunionController@ModifierReunion')->name('ModifierReunion');
Route::post('modifier_reunion', 'ReunionController@SaveModifierReunion')->name('SaveModifierReunion');
Route::post('supprimer_reunion', 'ReunionController@SupprimerReunion')->name('SupprimerReunion');
Route::post('reunion_participant, ReunionController@SaveReunionParticipant')->name('ReunionParticipant');


// LISTE DE PRESENCE DES PARTICIPANTS
Route::get('participants', 'ParticipantController@participants')->name('participants');
Route::post('participants', 'ParticipantController@SaveParticipant')->name('SaveParticipant');
Route::get('participant/{participant_id}', 'ParticipantController@DetailsParticipant')->name('DetailsParticipant');
Route::get('modifier_participant/{participant_id}', 'ParticipantController@ModifierParticipant')->name('ModifierParticipant');
Route::post('modifier_participant', 'ParticipantController@SaveModifierParticipant')->name('SaveModifierParticipant');
Route::post('supprimer_participant', 'ParticipantController@SupprimerParticipant')->name('SupprimerParticipant');
// FIN LISTE DE PRESENCE

// EVENT(AGENDA)
Route::get('agenda', 'EventController@events')->name('events');
Route::post('agenda', 'EventController@SaveEvent')->name('SaveEvent');
Route::get('ajouterevenement', 'EventController@Affiche');








//sécurité
Route::any('{catchall}', 'SecurityController@SaveRoutes')->where('catchall', '.*');


