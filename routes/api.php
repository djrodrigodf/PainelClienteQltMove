<?php

Route::group(['prefix' => 'v1', 'as' => 'api.', 'namespace' => 'Api\V1\Admin', 'middleware' => ['auth:api']], function () {
    // Permissions
    Route::apiResource('permissions', 'PermissionsApiController');

    // Roles
    Route::apiResource('roles', 'RolesApiController');

    // Users
    Route::apiResource('users', 'UsersApiController');

    // Clientes
    Route::apiResource('clientes', 'ClienteApiController');

    // Referencia Pessoals
    Route::apiResource('referencia-pessoals', 'ReferenciaPessoalApiController');

    // Referencia Bancaria
    Route::apiResource('referencia-bancaria', 'ReferenciaBancariaApiController');

    Route::get('meusuario', function() {
        return response()->json(request()->user());
    });
});
