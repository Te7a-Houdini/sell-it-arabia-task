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

Route::group(['namespace' => 'Slack','as' => 'slack.'], function () {

    Route::get('/', 'ChannelsController@index')->name('channels.index');
    Route::view('channels/create','slack.channels.create')->name('channels.create');
    Route::post('channels','ChannelsController@store')->name('channels.store');

    Route::get('channels/{id}/invite-member/create','ChannelsInviteMemberController@create')->name('channels.invite-member.create');
    Route::post('channels/{id}/invite-member','ChannelsInviteMemberController@store')->name('channels.invite-member.store');

});
