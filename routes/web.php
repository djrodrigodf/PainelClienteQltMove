<?php

Route::redirect('/', '/login');
Route::get('/home', function () {
    if (session('status')) {
        return redirect()->route('admin.home')->with('status', session('status'));
    }

    return redirect()->route('admin.home');
});

Auth::routes(['register' => false]);

Route::group(['prefix' => 'admin', 'as' => 'admin.', 'namespace' => 'Admin', 'middleware' => ['auth']], function () {
    Route::get('/', 'HomeController@index')->name('home');
    // Permissions
    Route::delete('permissions/destroy', 'PermissionsController@massDestroy')->name('permissions.massDestroy');
    Route::resource('permissions', 'PermissionsController');

    // Roles
    Route::delete('roles/destroy', 'RolesController@massDestroy')->name('roles.massDestroy');
    Route::resource('roles', 'RolesController');

    // Users
    Route::delete('users/destroy', 'UsersController@massDestroy')->name('users.massDestroy');
    Route::resource('users', 'UsersController');

    // Clientes
    Route::delete('clientes/destroy', 'ClienteController@massDestroy')->name('clientes.massDestroy');

    Route::resource('clientes', 'ClienteController');
    Route::post('clientes-filter', 'ClienteController@index')->name('clientes.filter');
    Route::get('clientes/aprovar/{id}', 'ClienteController@aprovar')->name('clientes.aprovar');
    Route::get('clientes/reprovar/{id}', 'ClienteController@reprovar')->name('clientes.reprovar');

    // Referencia Pessoals
    Route::delete('referencia-pessoals/destroy', 'ReferenciaPessoalController@massDestroy')->name('referencia-pessoals.massDestroy');
    Route::resource('referencia-pessoals', 'ReferenciaPessoalController');

    // Referencia Bancaria
    Route::delete('referencia-bancaria/destroy', 'ReferenciaBancariaController@massDestroy')->name('referencia-bancaria.massDestroy');
    Route::resource('referencia-bancaria', 'ReferenciaBancariaController');

    // Audit Logs
    Route::resource('audit-logs', 'AuditLogsController', ['except' => ['create', 'store', 'edit', 'update', 'destroy']]);

    // Planos
    Route::delete('planos/destroy', 'PlanosController@massDestroy')->name('planos.massDestroy');
    Route::post('planos/parse-csv-import', 'PlanosController@parseCsvImport')->name('planos.parseCsvImport');
    Route::post('planos/process-csv-import', 'PlanosController@processCsvImport')->name('planos.processCsvImport');
    Route::resource('planos', 'PlanosController');

    Route::resource('propostas', 'PropostaController');
    Route::post('proposta/aprovar', 'PropostaController@aprovar')->name('aprovar_proposta');
    Route::post('proposta/reprovar', 'PropostaController@reprovar')->name('reprovar_proposta');
    Route::get('proposta/ajustar/{id}', 'PropostaController@ajustarplano')->name('ajustarplano_proposta');
    Route::post('proposta/atualizarplano', 'PropostaController@atualizarplano')->name('atualizarplano_proposta');
    Route::get('proposta/contrato/{id}', 'PropostaController@criarcontratosadeno')->name('contrato_proposta');
    Route::get('proposta/assinarcontrato/{id}', 'PropostaController@assinarContratoSadeno')->name('assinar_contrato');
    Route::get('proposta/imprimirProposta/{id}', 'PropostaController@imprimirProposta')->name('imprimir_proposta');
    Route::get('proposta/imprimirContrato/{id}', 'PropostaController@imprimirContrato')->name('imprimir_contrato');
    Route::post('proposta/addVeiculo', 'PropostaController@AddVeiculo')->name('add_veiculo');
    Route::post('proposta/addImplantacao', 'PropostaController@AddImplantacao')->name('add_implantacao');
    Route::post('proposta/GerarCobranca', 'PropostaController@GerarCobranca')->name('gerar_cobranca');

    Route::get('anexos/deletar/{id}', 'AnexoController@destroy')->name('deletarAnexo');
    Route::resource('anexos', 'AnexoController');

    // Status Clientes
    Route::delete('status-clientes/destroy', 'StatusClienteController@massDestroy')->name('status-clientes.massDestroy');
    Route::resource('status-clientes', 'StatusClienteController');

    Route::get('messenger', 'MessengerController@index')->name('messenger.index');
    Route::get('messenger/create', 'MessengerController@createTopic')->name('messenger.createTopic');
    Route::post('messenger', 'MessengerController@storeTopic')->name('messenger.storeTopic');
    Route::get('messenger/inbox', 'MessengerController@showInbox')->name('messenger.showInbox');
    Route::get('messenger/outbox', 'MessengerController@showOutbox')->name('messenger.showOutbox');
    Route::get('messenger/{topic}', 'MessengerController@showMessages')->name('messenger.showMessages');
    Route::delete('messenger/{topic}', 'MessengerController@destroyTopic')->name('messenger.destroyTopic');
    Route::post('messenger/{topic}/reply', 'MessengerController@replyToTopic')->name('messenger.reply');
    Route::get('messenger/{topic}/reply', 'MessengerController@showReply')->name('messenger.showReply');
});
Route::group(['prefix' => 'profile', 'as' => 'profile.', 'namespace' => 'Auth', 'middleware' => ['auth']], function () {
// Change password
    if (file_exists(app_path('Http/Controllers/Auth/ChangePasswordController.php'))) {
        Route::get('password', 'ChangePasswordController@edit')->name('password.edit');
        Route::post('password', 'ChangePasswordController@update')->name('password.update');
        Route::post('profile', 'ChangePasswordController@updateProfile')->name('password.updateProfile');
        Route::post('profile/destroy', 'ChangePasswordController@destroy')->name('password.destroyProfile');
    }
});
