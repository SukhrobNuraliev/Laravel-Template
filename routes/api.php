<?php

// register
Route::post('v1/auth/register', 'API\V1\Authentication\RegisterController@registerAction')->name('api.v1.auth.register');

// login
Route::post('v1/auth/login', 'API\V1\Authentication\LoginController@loginAction')->name('api.v1.auth.login');
Route::get('v1/auth/logout/{id}', 'API\V1\Authentication\LoginController@logoutAction')->name('api.v1.auth.logout');

// social login facebook
Route::post('v1/auth/social/facebook', 'API\V1\Authentication\Social\FacebookController@loginAction')->name('api.v1.auth.facebook');

// password reset
Route::post('v1/auth/password/forgot', 'API\V1\Authentication\RecoverController@passwordAction')->name('api.v1.auth.recover.password');

// verify
Route::post('v1/auth/verify/phone', 'API\V1\Authentication\VerifyController@verifyPhoneAction')->name('api.v1.auth.verify.phone.store');
Route::post('v1/auth/verify/resend/{type}', 'API\V1\Authentication\VerifyController@resendVerificationAction')->name('api.v1.auth.verify.resend.store');

// profile
Route::get('v1/u/{username}', 'API\V1\User\UserController@profileAction')->name('api.v1.user.details');

// page
Route::get('v1/p/{slug}', 'API\V1\Page\PageController@showAction')->name('api.v1.page.details');
Route::get('v1/p/category/{name}', 'API\V1\Page\PageController@categoryAction')->name('api.v1.page.category.browse');
Route::get('v1/p/archive/{year}/{month}', 'API\V1\Page\PageController@archiveAction')->name('api.v1.page.archive.browse');

// application settings
Route::get('v1/application/settings', 'API\V1\Application\ApplicationController@settingsAction')->name('api.v1.application.settings');
Route::get('v1/application/countries', 'API\V1\Application\ApplicationController@countryAction')->name('api.v1.application.setting.country');
Route::get('v1/application/cities/{country_id}', 'API\V1\Application\ApplicationController@cityAction')->name('api.v1.application.setting.city');

Route::group(['middleware' => ['api.auth', 'auth.checker']], function () {
    // user
    Route::get('v1/user/sync', 'API\V1\User\SettingController@syncAction')->name('api.v1.user.sync');
    Route::post('v1/user/setting/update', 'API\V1\User\SettingController@settingsUpdateAction')->name('api.v1.user.setting.general.update');
    Route::post('v1/user/security/update', 'API\V1\User\SettingController@securityUpdateAction')->name('api.v1.user.setting.security.update');

    // FCM tokens
    Route::post('v1/user/fcm/store', 'API\V1\User\FCMController@storeAction')->name('api.v1.user.fcm.store');
});
