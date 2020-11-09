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

Auth::routes();

 Route::get('/', [
     'as' => 'home',
     'uses' => 'HomeController@index'
 ]);

 /*
Route::get('/', function() {
    return View('auth.login');
})->name('loginn');
*/

Route::get('/reset_password', [
    'as' => 'auth.reset_password',
    'uses' => 'Auth\ResetPasswordController@showResetForm'
]);

Route::get('/announcements', [
    'as' => 'home.announcements',
    'uses' => 'HomeController@announcements'
]);

Route::get('/publishes', [
    'as' => 'home.publishes',
    'uses' => 'HomeController@publishes'
]);

Route::get('/publishes/{publish}/download', [
    'as' => 'home.download',
    'uses' => 'HomeController@publishDownload'
]);

Route::get('/announcements/{announcement}', [
    'as' => 'home.announcements.show',
    'uses' => 'HomeController@getAnnouncement'
]);

Route::get('announcements/{announcement}/show', 'AnnouncementController@show')->name('announcements.show');

//-----------POSTULANT CREATE--------------//
Route::get('announcements/{announcement}/postulans/create', [
    'as' => 'postulans.create',
    'uses' => 'PostulantController@create',
]);
Route::post('announcementss/{announcement}/postulans/store', [
    'as' => 'postulans.stores',
    'uses' => 'PostulantController@store',
]);
Route::get('{announcement}/postulans/{postulant}/show', [
    'as' => 'postulants.show',
    'uses' => 'PostulantController@show',
]);
Route::get('announcements/{announcement}/postulans/{postulant}/edit', [
    'as' => 'postulans.edit',
    'uses' => 'PostulantController@edit',
]);
Route::post('announcementss/{announcement}/postulans/{postulant}/edit', [
    'as' => 'postulans.updates',
    'uses' => 'PostulantController@update',
]);
Route::get('postulans/{postulant}/print', [
    'as' => 'postulans.print',
    'uses' => 'PostulantController@print',
]);

Route::get('avisos', [
    'as' => 'avisos',
    'uses' => 'AvisosController@index',
]);

Route::get('avisos/{aviso}', [
    'as' => 'avisos.download',
    'uses' => 'AvisosController@download',
]);

////////////////////// ADMIN ROUTES ///////////////////
Route::group(['prefix' => 'admin', 'middleware' => ['auth'], 'as' => 'admin.', 'namespace' => 'Admin'], function() {
    Route::get('dashboard', [
        'as' => 'dashboard',
        'uses' => 'HomeController@index'
    ]);

    //------------ USERS --------------//
    Route::get('users', [
        'as' => 'users.index',
        'uses' => 'UserController@index',
    ])->middleware('permission:list users');
    Route::get('users/create', [
        'as' => 'users.create',
        'uses' => 'UserController@create',
    ])->middleware('permission:create users');
    Route::post('users/store', [
        'as' => 'users.store',
        'uses' => 'UserController@store',
    ])->middleware('permission:create users');
    Route::get('users/{user}/edit', [
        'as' => 'users.edit',
        'uses' => 'UserController@edit',
    ])->middleware('permission:edit users');
    Route::put('users/{user}', [
        'as' => 'users.update',
        'uses' => 'UserController@update',
    ])->middleware('permission:edit users');
    Route::patch('users/{user}', [
        'as' => 'users.update',
        'uses' => 'UserController@update',
    ])->middleware('permission:edit users');
    Route::delete('users/{user}', [
        'as' => 'users.destroy',
        'uses' => 'UserController@destroy',
    ])->middleware('permission:delete users');

    //------------ ROLES --------------//
    Route::get('roles', [
        'as' => 'roles.index',
        'uses' => 'RoleController@index',
    ])->middleware('permission:list roles');
    Route::get('roles/create', [
        'as' => 'roles.create',
        'uses' => 'RoleController@create',
    ])->middleware('permission:list roles');
    Route::post('roles/store', [
        'as' => 'roles.store',
        'uses' => 'RoleController@store',
    ])->middleware('permission:list roles');
    Route::get('roles/{role}/edit', [
        'as' => 'roles.edit',
        'uses' => 'RoleController@edit',
    ])->middleware('permission:list roles');
    Route::put('roles/{role}', [
        'as' => 'roles.update',
        'uses' => 'RoleController@update',
    ])->middleware('permission:list roles');
    Route::patch('roles/{role}', [
        'as' => 'roles.update',
        'uses' => 'RoleController@update',
    ])->middleware('permission:list roles');
    Route::delete('roles/{role}', [
        'as' => 'roles.destroy',
        'uses' => 'RoleController@destroy',
    ])->middleware('permission:list roles');

    //------------ announcements --------------//
    Route::get('announcements', [
        'as' => 'announcements.index',
        'uses' => 'AnnouncementController@index',
    ])->middleware('permission:list announcements');
    Route::get('announcements/{announcement}/show', [
        'as' => 'announcements.show',
        'uses' => 'AnnouncementController@show',
    ])->middleware('permission:show announcements');
    Route::get('announcements/create', [
        'as' => 'announcements.create',
        'uses' => 'AnnouncementController@create',
    ])->middleware('permission:create announcements');
    Route::post('announcements/store', [
        'as' => 'announcements.store',
        'uses' => 'AnnouncementController@store',
    ])->middleware('permission:create announcements');
    Route::get('announcements/{announcement}/show', [
        'as' => 'announcements.show',
        'uses' => 'AnnouncementController@show',
    ])->middleware('permission:show announcements');
    Route::get('announcements/{announcement}/edit', [
        'as' => 'announcements.edit',
        'uses' => 'AnnouncementController@edit',
    ])->middleware('permission:edit announcements');
    Route::put('announcements/{announcement}', [
        'as' => 'announcements.update',
        'uses' => 'AnnouncementController@update',
    ])->middleware('permission:edit announcements');
    Route::patch('announcements/{announcement}', [
        'as' => 'announcements.update',
        'uses' => 'AnnouncementController@update',
    ])->middleware('permission:edit announcements');
    Route::delete('announcements/{announcement}', [
        'as' => 'announcements.destroy',
        'uses' => 'AnnouncementController@destroy',
    ])->middleware('permission:delete announcements');

    Route::get('announcements/{announcement}/files', [
        'as' => 'requirements.files',
        'uses' => 'AnnouncementController@requirement',
    ]);

    Route::get('announcements/{announcement}/publish', [
        'as' => 'announcements.publish',
        'uses' => 'AnnouncementController@publish',
    ])->middleware('permission:list publishes');

    Route::post('announcements/{announcement}/store', [
        'as' => 'resannoun.store',
        'uses' => 'AnnouncementController@publishStore',
    ])->middleware('permission:create publishes');
        

    //------------ Postulants --------------//
    Route::get('{announcement}/postulants', [
        'as' => 'postulants.index',
        'uses' => 'PostulantController@index',
    ])->middleware('permission:list postulants');
    Route::get('announcements/{announcement}/postulants/{postulant}/files', [
        'as' => 'postulants.show',
        'uses' => 'PostulantController@show',
    ]);
    Route::get('{announcement}/postulants/create', [
        'as' => 'postulants.create',
        'uses' => 'PostulantController@create',
    ])->middleware('permission:create postulants');
    Route::get('{announcement}/postulants/{postulant}/requirement/{requirement}/checked', [
        'as' => 'postulants.checkedFile',
        'uses' => 'PostulantController@checked',
    ]);
    Route::post('{announcement}/postulants/store', [
        'as' => 'postulants.store',
        'uses' => 'PostulantController@store',
    ])->middleware('permission:create postulants');
    Route::get('{announcement}/postulants/{postulant}/edit', [
        'as' => 'postulants.edit',
        'uses' => 'PostulantController@edit',
    ])->middleware('permission:edit postulants');
    Route::put('{announcement}/postulants/{postulant}', [
        'as' => 'postulants.update',
        'uses' => 'PostulantController@update',
    ])->middleware('permission:edit postulants');
    Route::patch('{announcement}/postulants/{postulant}', [
        'as' => 'postulants.update',
        'uses' => 'PostulantController@update',
    ])->middleware('permission:edit postulants');
    Route::delete('{announcement}/postulants/{postulant}', [
        'as' => 'postulants.destroy',
        'uses' => 'PostulantController@destroy',
    ])->middleware('permission:delete postulants');
    
    Route::get('{announcement}/postulants/{postulant}/calificate', [
        'as' => 'postulants.calificate',
        'uses' => 'PostulantController@calificate'
    ]);

    //-------------- AREAS ------------------//
    Route::get('academics/{academic}/areas', [
        'as' => 'areas.index',
        'uses' => 'AreaController@index',
    ]);
    Route::get('academics/{academic}/areas/create', [
        'as' => 'areas.create',
        'uses' => 'AreaController@create',
    ]);
    Route::post('academics/{academic}/areas/store', [
        'as' => 'areas.store',
        'uses' => 'AreaController@store',
    ]);
    Route::get('academics/{academic}/areas/{area}/edit', [
        'as' => 'areas.edit',
        'uses' => 'AreaController@edit',
    ]);
    Route::put('academics/{academic}/areas/{area}', [
        'as' => 'areas.update',
        'uses' => 'AreaController@update',
    ]);
    Route::patch('academics/{academic}/areas/{area}', [
        'as' => 'areas.update',
        'uses' => 'AreaController@update',
    ]);
    Route::delete('academics/{academic}/areas/{area}', [
        'as' => 'areas.destroy',
        'uses' => 'AreaController@destroy',
    ]);

    //-------------- SUBAREAS ------------------//
    Route::get('areas/{area}/subareas', [
        'as' => 'subareas.index',
        'uses' => 'SubareaController@index',
    ]);
    Route::get('areas/{area}/subareas/create', [
        'as' => 'subareas.create',
        'uses' => 'SubareaController@create',
    ]);
    Route::post('areas/{area}/subareas/store', [
        'as' => 'subareas.store',
        'uses' => 'SubareaController@store',
    ]);
    Route::get('areas/{area}/subareas/{subarea}/edit', [
        'as' => 'subareas.edit',
        'uses' => 'SubareaController@edit',
    ]);
    Route::put('areas/{area}/subareas/{subarea}', [
        'as' => 'subareas.update',
        'uses' => 'SubareaController@update',
    ]);
    Route::patch('areas/{area}/subareas/{subarea}', [
        'as' => 'subareas.update',
        'uses' => 'SubareaController@update',
    ]);
    Route::delete('areas/{area}/subareas/{subarea}', [
        'as' => 'subareas.destroy',
        'uses' => 'SubareaController@destroy',
    ]);

    /*
    //-------------- CONVOCATORIAS ------------------//
    Route::get('announcements', [
        'as' => 'announcements.index',
        'uses' => 'AnnouncementController@index',
    ])->middleware('permission:list announcements');
    Route::get('announcements/create', [
        'as' => 'announcements.create',
        'uses' => 'AnnouncementController@create',
    ])->middleware('permission:create announcements');
    Route::post('announcements/store', [
        'as' => 'announcements.store',
        'uses' => 'AnnouncementController@store',
    ])->middleware('permission:create announcements');
    Route::get('announcements/{id}/edit', [
        'as' => 'announcements.edit',
        'uses' => 'AnnouncementController@edit',
    ])->middleware('permission:edit announcements');
    Route::put('announcements/{announcement}', [
        'as' => 'announcements.update',
        'uses' => 'AnnouncementController@update',
    ])->middleware('permission:edit announcements');
    Route::patch('announcements/{announcement}', [
        'as' => 'announcements.update',
        'uses' => 'AnnouncementController@update',
    ])->middleware('permission:edit announcements');
    Route::delete('announcements/{announcement}', [
        'as' => 'announcements.destroy',
        'uses' => 'AnnouncementController@destroy',
    ])->middleware('permission:delete announcements');
*/
    //-------------- REQUIREMENTS ------------------//
    Route::get('{announcement}/requirements', [
        'as' => 'requirements.index',
        'uses' => 'RequirementController@index',
    ])->middleware('permission:list requirements');
    Route::get('{announcement}/requirements/create', [
        'as' => 'requirements.create',
        'uses' => 'RequirementController@create',
    ])->middleware('permission:create requirements');
    Route::post('{announcement}requirements/store', [
        'as' => 'requirements.store',
        'uses' => 'RequirementController@store',
    ])->middleware('permission:create requirements');
    Route::get('{announcement}requirements/{requirement}/edit', [
        'as' => 'requirements.edit',
        'uses' => 'RequirementController@edit',
    ])->middleware('permission:edit requirements');
    Route::put('{announcement}requirements/{requirement}', [
        'as' => 'requirements.update',
        'uses' => 'RequirementController@update',
    ])->middleware('permission:edit requirements');
    Route::patch('{announcement}requirements/{requirement}', [
        'as' => 'requirements.update',
        'uses' => 'RequirementController@update',
    ])->middleware('permission:edit requirements');
    Route::delete('{announcement}requirements/{requirement}', [
        'as' => 'requirements.destroy',
        'uses' => 'RequirementController@destroy',
    ])->middleware('permission:delete requirements');

    //-------------- CONDITIONS ------------------//
    Route::get('{announcement}/conditions', [
        'as' => 'conditions.index',
        'uses' => 'ConditionController@index',
    ])->middleware('permission:list conditions');
    Route::get('{announcement}/conditions/create', [
        'as' => 'conditions.create',
        'uses' => 'ConditionController@create',
    ])->middleware('permission:create conditions');
    Route::post('{announcement}/conditions/store', [
        'as' => 'conditions.store',
        'uses' => 'ConditionController@store',
    ])->middleware('permission:create conditions');
    Route::get('{announcement}/conditions/{condition}/edit', [
        'as' => 'conditions.edit',
        'uses' => 'ConditionController@edit',
    ])->middleware('permission:edit conditions');
    Route::put('{announcement}/conditions/{condition}', [
        'as' => 'conditions.update',
        'uses' => 'ConditionController@update',
    ])->middleware('permission:edit conditions');
    Route::patch('{announcement}/conditions/{condition}', [
        'as' => 'conditions.update',
        'uses' => 'ConditionController@update',
    ])->middleware('permission:edit conditions');
    Route::delete('{announcement}/conditions/{condition}', [
        'as' => 'conditions.destroy',
        'uses' => 'ConditionController@destroy',
    ])->middleware('permission:delete conditions');

    //-------------- DOCUMENTS ------------------//
    Route::get('{announcement}/documents', [
        'as' => 'documents.index',
        'uses' => 'DocumentController@index',
    ])->middleware('permission:list documents');
    Route::get('{announcement}/documents/create', [
        'as' => 'documents.create',
        'uses' => 'DocumentController@create',
    ])->middleware('permission:create documents');
    Route::post('{announcement}documents/store', [
        'as' => 'documents.store',
        'uses' => 'DocumentController@store',
    ])->middleware('permission:create documents');
    Route::get('{announcement}documents/{document}/edit', [
        'as' => 'documents.edit',
        'uses' => 'DocumentController@edit',
    ])->middleware('permission:edit documents');
    Route::put('{announcement}documents/{document}', [
        'as' => 'documents.update',
        'uses' => 'DocumentController@update',
    ])->middleware('permission:edit documents');
    Route::patch('{announcement}documents/{document}', [
        'as' => 'documents.update',
        'uses' => 'DocumentController@update',
    ])->middleware('permission:edit documents');
    Route::delete('{announcement}documents/{document}', [
        'as' => 'documents.destroy',
        'uses' => 'DocumentController@destroy',
    ])->middleware('permission:edit documents');

    //-------------- EVENTS ------------------//
    Route::get('{announcement}/events', [
        'as' => 'events.index',
        'uses' => 'EventController@index',
    ])->middleware('permission:list events');
    Route::get('{announcement}/events/create', [
        'as' => 'events.create',
        'uses' => 'EventController@create',
    ])->middleware('permission:create events');
    Route::post('{announcement}events/store', [
        'as' => 'events.store',
        'uses' => 'EventController@store',
    ])->middleware('permission:create events');
    Route::get('{announcement}events/{event}/edit', [
        'as' => 'events.edit',
        'uses' => 'EventController@edit',
    ])->middleware('permission:edit events');
    Route::put('{announcement}events/{event}', [
        'as' => 'events.update',
        'uses' => 'EventController@update',
    ])->middleware('permission:edit events');
    Route::patch('{announcement}events/{event}', [
        'as' => 'events.update',
        'uses' => 'EventController@update',
    ])->middleware('permission:edit events');
    Route::delete('{announcement}events/{event}', [
        'as' => 'events.destroy',
        'uses' => 'EventController@destroy',
    ])->middleware('permission:delete events');

    //-------------- CALIFICATIONS ------------------//
    Route::get('{announcement}/califications', [
        'as' => 'califications.index',
        'uses' => 'CalificationController@index',
    ]);
    Route::get('{announcement}/califications/create', [
        'as' => 'califications.create',
        'uses' => 'CalificationController@create',
    ]);
    Route::post('{announcement}/califications/store', [
        'as' => 'califications.store',
        'uses' => 'CalificationController@store',
    ]);
    Route::get('{announcement}/califications/{calification}/edit', [
        'as' => 'califications.edit',
        'uses' => 'CalificationController@edit',
    ]);
    Route::put('{announcement}/califications/{calification}', [
        'as' => 'califications.update',
        'uses' => 'CalificationController@update',
    ]);
    Route::patch('{announcement}/califications/{calification}', [
        'as' => 'califications.update',
        'uses' => 'CalificationController@update',
    ]);
    Route::delete('{announcement}/califications/{calification}', [
        'as' => 'califications.destroy',
        'uses' => 'CalificationController@destroy',
    ]);

    /*
    // FILES //
    Route::post('{announcement}/requirements/{requirement}/upload', [
        'as' => 'requirements.upload',
        'uses' => 'FileController@upload',
    ]);
    Route::get('{announcement}/requirements/{requirement}/file', [
        'as' => 'requirements.file',
        'uses' => 'FileController@getRequirementFile',
    ]);
    Route::delete('{announcement}/requirements/{requirement}/delete_file', [
        'as' => 'requirements.file_delete',
        'uses' => 'FileController@deleteRequirementFile',
    ]);
    */



    //-------------- REQUIREMENTS ------------------//
    Route::get('academics', [
        'as' => 'academics.index',
        'uses' => 'AcademicController@index',
    ])->middleware('permission:list academics');
    Route::get('academics/create', [
        'as' => 'academics.create',
        'uses' => 'AcademicController@create',
    ])->middleware('permission:create academics');
    Route::post('academics/store', [
        'as' => 'academics.store',
        'uses' => 'AcademicController@store',
    ])->middleware('permission:create academics');
    Route::get('academics/{academic}/edit', [
        'as' => 'academics.edit',
        'uses' => 'AcademicController@edit',
    ])->middleware('permission:edit academics');
    Route::put('academics/{academic}', [
        'as' => 'academics.update',
        'uses' => 'AcademicController@update',
    ])->middleware('permission:edit academics');
    Route::patch('academics/{academic}', [
        'as' => 'academics.update',
        'uses' => 'AcademicController@update',
    ])->middleware('permission:edit academics');
    Route::delete('academics/{academic}', [
        'as' => 'academics.destroy',
        'uses' => 'AcademicController@destroy',
    ])->middleware('permission:delete academics');

    //----------------Inf Req -----------------//
    Route::get('announcements/{announcement}/data', [
        'as' => 'data.index',
        'uses' => 'AnnouncementController@data',
    ]);

    //----------------- Items -------------------//
    Route::get('items', [
        'as' => 'items.index',
        'uses' => 'ItemController@index',
    ])->middleware('permission:list items');
    Route::get('items/create', [
        'as' => 'items.create',
        'uses' => 'ItemController@create',
    ])->middleware('permission:create items');
    Route::post('items/store', [
        'as' => 'items.store',
        'uses' => 'ItemController@store',
    ])->middleware('permission:create items');
    Route::get('items/{item}/edit', [
        'as' => 'items.edit',
        'uses' => 'ItemController@edit',
    ])->middleware('permission:edit items');
    Route::put('items/{item}', [
        'as' => 'items.update',
        'uses' => 'ItemController@update',
    ])->middleware('permission:edit items');
    Route::patch('items/{item}', [
        'as' => 'items.update',
        'uses' => 'ItemController@update',
    ])->middleware('permission:edit items');
    Route::delete('items/{item}', [
        'as' => 'items.destroy',
        'uses' => 'ItemController@destroy',
    ])->middleware('permission:delete items');

    //----------------- Avisos -------------------//
    Route::get('avisos', [
        'as' => 'avisos.index',
        'uses' => 'AvisosController@index',
    ])->middleware('permission:list avisos');
    Route::get('avisos/create', [
        'as' => 'avisos.create',
        'uses' => 'AvisosController@create',
    ])->middleware('permission:create avisos');
    Route::post('avisos/store', [
        'as' => 'avisos.store',
        'uses' => 'AvisosController@store',
    ])->middleware('permission:create avisos');
    Route::get('avisos/{aviso}/edit', [
        'as' => 'avisos.edit',
        'uses' => 'AvisosController@edit',
    ])->middleware('permission:edit avisos');
    Route::put('avisos/{aviso}', [
        'as' => 'avisos.update',
        'uses' => 'AvisosController@update',
    ])->middleware('permission:edit avisos');
    Route::patch('avisos/{aviso}', [
        'as' => 'avisos.update',
        'uses' => 'AvisosController@update',
    ])->middleware('permission:edit avisos');
    Route::delete('avisos/{aviso}', [
        'as' => 'avisos.destroy',
        'uses' => 'AvisosController@destroy',
    ])->middleware('permission:delete avisos');

    //-------------- RATINGS ------------------//
    Route::get('{announcement}/ratings', [
        'as' => 'ratings.index',
        'uses' => 'RatingController@index',
    ]);
    Route::get('{announcement}/ratings/create', [
        'as' => 'ratings.create',
        'uses' => 'RatingController@create',
    ]);
    Route::post('{announcement}/ratings/store', [
        'as' => 'ratings.store',
        'uses' => 'RatingController@store',
    ]);
    Route::get('{announcement}/ratings/{rating}/edit', [
        'as' => 'ratings.edit',
        'uses' => 'RatingController@edit',
    ]);
    Route::put('{announcement}/ratings/{rating}', [
        'as' => 'ratings.update',
        'uses' => 'RatingController@update',
    ]);
    Route::patch('{announcement}/ratings/{rating}', [
        'as' => 'ratings.update',
        'uses' => 'RatingController@update',
    ]);
    Route::delete('{announcement}/ratings/{rating}', [
        'as' => 'ratings.destroy',
        'uses' => 'RatingController@destroy',
    ]);

    //-------------- SUBCALIFICATIONS ------------------//
    Route::get('{calification}/subcalifications', [
        'as' => 'subcalifications.index',
        'uses' => 'SubCalificationController@index',
    ]);
    Route::get('{calification}/subcalifications/create', [
        'as' => 'subcalifications.create',
        'uses' => 'SubCalificationController@create',
    ]);
    Route::post('{calification}/subcalifications/store', [
        'as' => 'subcalifications.store',
        'uses' => 'SubCalificationController@store',
    ]);
    Route::get('{calification}/subcalifications/{subcalification}/edit', [
        'as' => 'subcalifications.edit',
        'uses' => 'SubCalificationController@edit',
    ]);
    Route::put('{calification}/subcalifications/{subcalification}', [
        'as' => 'subcalifications.update',
        'uses' => 'SubCalificationController@update',
    ]);
    Route::patch('{calification}/subcalifications/{subcalification}', [
        'as' => 'subcalifications.update',
        'uses' => 'SubCalificationController@update',
    ]);
    Route::delete('{calification}/subcalifications/{subcalification}', [
        'as' => 'subcalifications.destroy',
        'uses' => 'SubCalificationController@destroy',
    ]);

    //-------------- SUBRATINGS ------------------//
    Route::get('{rating}/subratings', [
        'as' => 'subratings.index',
        'uses' => 'SubRatingController@index',
    ]);
    Route::get('{rating}/subratings/create', [
        'as' => 'subratings.create',
        'uses' => 'SubRatingController@create',
    ]);
    Route::post('{rating}/subratings/store', [
        'as' => 'subratings.store',
        'uses' => 'SubRatingController@store',
    ]);
    Route::get('{rating}/subratings/{subrating}/edit', [
        'as' => 'subratings.edit',
        'uses' => 'SubRatingController@edit',
    ]);
    Route::put('{rating}/subratings/{subrating}', [
        'as' => 'subratings.update',
        'uses' => 'SubRatingController@update',
    ]);
    Route::patch('{rating}/subratings/{subrating}', [
        'as' => 'subratings.update',
        'uses' => 'SubRatingController@update',
    ]);
    Route::delete('{rating}/subratings/{subrating}', [
        'as' => 'subratings.destroy',
        'uses' => 'SubRatingController@destroy',
    ]);

    //-------------- RESULTS ------------------//
    Route::get('{postulant}/results', [
        'as' => 'results.index',
        'uses' => 'ResultController@index',
    ])->middleware('permission:calificate postulants');
    Route::post('results/store', [
        'as' => 'results.store',
        'uses' => 'ResultController@store',
    ])->middleware('permission:calificate postulants');
    Route::put('{postulant}/results/{result}', [
        'as' => 'results.update',
        'uses' => 'ResultController@update',
    ])->middleware('permission:calificate postulants');
    Route::patch('{postulant}/results/{result}', [
        'as' => 'results.update',
        'uses' => 'ResultController@update',
    ])->middleware('permission:calificate postulants');
    Route::delete('{postulant}/results/{result}', [
        'as' => 'results.destroy',
        'uses' => 'ResultController@destroy',
    ])->middleware('permission:calificate postulants');


    //------------ SCHEDULES --------------//
    Route::get('schedules', [
        'as' => 'schedules.index',
        'uses' => 'ScheduleController@index',
    ]);
    Route::get('schedules/create', [
        'as' => 'schedules.create',
        'uses' => 'ScheduleController@create',
    ]);
    Route::post('schedules/store', [
        'as' => 'schedules.store',
        'uses' => 'ScheduleController@store',
    ]);
    Route::get('schedules/{schedule}/edit', [
        'as' => 'schedules.edit',
        'uses' => 'ScheduleController@edit',
    ]);
    Route::put('schedules/{schedule}', [
        'as' => 'schedules.update',
        'uses' => 'ScheduleController@update',
    ]);
    Route::patch('schedules/{schedule}', [
        'as' => 'schedules.update',
        'uses' => 'ScheduleController@update',
    ]);
    Route::delete('schedules/{schedule}', [
        'as' => 'schedules.destroy',
        'uses' => 'ScheduleController@destroy',
    ]);

    //------------ ASIGNATURES --------------//
    Route::get('asignatures', [
        'as' => 'asignatures.index',
        'uses' => 'AsignatureController@index',
    ]);
    Route::get('asignatures/create', [
        'as' => 'asignatures.create',
        'uses' => 'AsignatureController@create',
    ]);
    Route::post('asignatures/store', [
        'as' => 'asignatures.store',
        'uses' => 'AsignatureController@store',
    ]);
    Route::get('asignatures/{asignature}/edit', [
        'as' => 'asignatures.edit',
        'uses' => 'AsignatureController@edit',
    ]);
    Route::put('asignatures/{asignature}', [
        'as' => 'asignatures.update',
        'uses' => 'AsignatureController@update',
    ]);
    Route::patch('asignatures/{asignature}', [
        'as' => 'asignatures.update',
        'uses' => 'AsignatureController@update',
    ]);
    Route::delete('asignatures/{asignature}', [
        'as' => 'asignatures.destroy',
        'uses' => 'AsignatureController@destroy',
    ]);

    //------------ ASIGNATURE' GROUP --------------//
    Route::get('asignature-group', [
        'as' => 'asignature-group.index',
        'uses' => 'AsignatureGroupController@index',
    ]);
    Route::get('asignature-group/create', [
        'as' => 'asignature-group.create',
        'uses' => 'AsignatureGroupController@create',
    ]);
    Route::post('asignature-group/store', [
        'as' => 'asignature-group.store',
        'uses' => 'AsignatureGroupController@store',
    ]);
    Route::get('asignature-group/{id}/edit', [
        'as' => 'asignature-group.edit',
        'uses' => 'AsignatureGroupController@edit',
    ]);
    Route::put('asignature-group/{id}', [
        'as' => 'asignature-group.update',
        'uses' => 'AsignatureGroupController@update',
    ]);
    Route::patch('asignature-group/{id}', [
        'as' => 'asignature-group.update',
        'uses' => 'AsignatureGroupController@update',
    ]);
    Route::delete('asignature-group/{id}', [
        'as' => 'asignature-group.destroy',
        'uses' => 'AsignatureGroupController@destroy',
    ]);
});