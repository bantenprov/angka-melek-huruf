<?php

Route::group(['prefix' => 'api/angka-melek-huruf', 'middleware' => ['web']], function() {
    $controllers = (object) [
        'index'     => 'Bantenprov\AngkaMelekHuruf\Http\Controllers\AngkaMelekHurufController@index',
        'create'    => 'Bantenprov\AngkaMelekHuruf\Http\Controllers\AngkaMelekHurufController@create',
        'show'      => 'Bantenprov\AngkaMelekHuruf\Http\Controllers\AngkaMelekHurufController@show',
        'store'     => 'Bantenprov\AngkaMelekHuruf\Http\Controllers\AngkaMelekHurufController@store',
        'edit'      => 'Bantenprov\AngkaMelekHuruf\Http\Controllers\AngkaMelekHurufController@edit',
        'update'    => 'Bantenprov\AngkaMelekHuruf\Http\Controllers\AngkaMelekHurufController@update',
        'destroy'   => 'Bantenprov\AngkaMelekHuruf\Http\Controllers\AngkaMelekHurufController@destroy',
    ];

    Route::get('/',             $controllers->index)->name('angka-melek-huruf.index');
    Route::get('/create',       $controllers->create)->name('angka-melek-huruf.create');
    Route::get('/{id}',         $controllers->show)->name('angka-melek-huruf.show');
    Route::post('/',            $controllers->store)->name('angka-melek-huruf.store');
    Route::get('/{id}/edit',    $controllers->edit)->name('angka-melek-huruf.edit');
    Route::put('/{id}',         $controllers->update)->name('angka-melek-huruf.update');
    Route::delete('/{id}',      $controllers->destroy)->name('angka-melek-huruf.destroy');
});
