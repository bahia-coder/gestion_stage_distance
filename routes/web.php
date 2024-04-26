<?php

use App\Http\Livewire\Chat\Createchat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\ForgotPasswordController;
use App\Http\Controllers\Auth\ResetPasswordController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DemmandeController;
use App\Http\Controllers\MeetingController;
Route::group(['namespace' => 'Auth'], function () {
    // Routes de connexion  dash
    Route::get('/login/{type}', [LoginController::class, 'loginForm'])->middleware('guest')->name('login.show');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
    Route::get('/logout/{type}', [LoginController::class, 'logout'])->name('logout');

    // Routes de réinitialisation du mot de passe
    Route::get('/password/reset', [ForgotPasswordController::class, 'showLinkRequestForm'])->name('password.request');
    Route::post('/password/email', [ForgotPasswordController::class, 'sendResetLinkEmail'])->name('password.email');
    Route::get('/password/reset/{token}', [ResetPasswordController::class, 'showResetForm'])->name('password.reset');
    Route::post('/password/reset', [ResetPasswordController::class, 'reset'])->name('password.update');
});
Route::get('/',[App\Http\Controllers\SettingController::class,'indexpage']);

Route::get('/selection', function () {
    return view('auth.selection');
})->name('selection');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('Departement', 'DepartementController');
    Route::post('Departement/test', 'DepartementController@update');
    Route::post('departements/testt', 'DepartementController@destroy');


});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('annonce', 'annonceController');
    Route::post('annonce/test', 'annonceController@update');
    Route::post('annonce/testt', 'annonceController@destroy');
    Route::get('/annonce/{id}/pdf', 'AnnonceController@pdf')->name('annonce.pdf');


});

    Route::resource('Demmande', 'DemmandeController');



Route::get('show',[DepartementController::class,'showForm']);

Route::post('store',[DepartementController::class,'storep'])->name('photo.save');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/homee', [App\Http\Controllers\Auth\LoginController::class, 'index'])->name('home');

Route::group(['middleware' => ['auth']], function () {
    Route::resource('Employe', 'EmployeController');
    Route::post('Employe/test', 'EmployeController@update');
    Route::post('Employes/testt', 'EmployeController@destroy');
});

Route::group(['middleware' => ['auth']], function () {
    Route::resource('Stagaire', 'StagaireController');
    Route::post('Stagaire/test', 'StagaireController@update');
    Route::post('Stagaires/testt', 'StagaireController@destroy');
});

Route::group(['middleware' => ['auth:stagaire']], function () {
    Route::resource('Testimonial', 'TestimonialController');
    Route::post('Testimonial/test', 'TestimonialController@update');
    
    Route::post('/assignment', 'TacheController@assignment')->name('assignment');
});

            //############################# zoom route ##########################################
           // Route::post('/assignment', 'TacheController@assignment')->name('assignment');
            //############################# end Chat route ######################################

Route::group(['middleware' => ['auth:employe']], function () {
    Route::get('/Employee/projects', [App\Http\Controllers\EmployeController::class, 'projects'])->name('Employee.projects');
    Route::get('/Employee/{id}', 'EmployeController@TaskProject')->name('Employee.Project');
    Route::get('/Note/Totale/{id}/{project_id}', 'TacheController@Totale');
    Route::get('/Note/Half/{id}/{project_id}', 'TacheController@Half');
    Route::get('/Note/Nothing/{id}/{project_id}', 'TacheController@Nothing');
   // Route::get('/meetings', 'MeetingController@index')->name('online_meetings');
    Route::resource('online_classes', 'MeetingController');
});



Route::group(['middleware' => ['auth']], function () {
    Route::resource('Project', 'ProjectController');
    Route::post('Project/test', 'ProjectController@update');
    Route::post('Projects/testt', 'ProjectController@destroy');
    Route::post('delete_all', 'ProjectController@delete_all')->name('delete_all');
    Route::post('Filter_Departements', 'ProjectController@Filter_Departements')->name('Filter_Departements');
}); 
      
Route::resource('profile', 'ProfileController');
Route::resource('settings', 'SettingController');
Route::post('delete_all_demmandes', 'DemmandeController@delete_all')->name('delete_all_demmandes');
Route::get('confirm_demmande/{id}', 'DemmandeController@confirm')->name('confirm_demmande');
Route::get('annuler_demmande/{id}', 'DemmandeController@annuler')->name('annuler_demmande');
Route::get('liste_confirmer', 'DemmandeController@liste_confirmer')->name('liste_confirmer');
Route::get('liste_annuler', 'DemmandeController@liste_annuler')->name('liste_annuler');
Route::post('Filter_Departements_demmandes', 'DemmandeController@Filter_Departements')->name('Filter_Departements_demmandes');

Route::group(['middleware' => ['auth:employe']], function () {
    Route::resource('Tache', 'TacheController');
    Route::post('Tache/test', 'TacheController@update');
    Route::post('Taches/testt', 'TacheController@destroy');
    Route::post('delete_all_Tache', 'TacheController@delete_all')->name('delete_all_Tache');
});

Route::get('/stagaire/dashboard', 'TacheController@index')->name('dashboard.stagaires');
Route::get('/Tasks', 'TacheController@Tasks')->name('Tasks');
Route::get('/employe/dashboard', 'EmployeController@dashboard')->name('employe.dashboard');


Route::group(['middleware' => ['auth:stagaire']], function () {
    Route::get('list/encadrant', [\App\Http\Livewire\Chat\Createchat::class, '__invoke'])->name('list.encadrant');
    Route::get('chat/encadrant', [\App\Http\Livewire\Chat\Main::class, '__invoke'])->name('chat.encadrant');
});

Route::group(['middleware' => ['auth:employe']], function () {
    Route::get('list/stagaire', [\App\Http\Livewire\Chat\Createchat::class, '__invoke'])->name('list.stagaire');
    Route::get('chat/stagaire', [\App\Http\Livewire\Chat\Main::class, '__invoke'])->name('chat.stagaire');
});