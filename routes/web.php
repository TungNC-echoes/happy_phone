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

// Front end
//Route::get('/', 'User\HomeController@showHome')->name('home');

Route::get('/', [
   'as' => 'home',
   'uses' => 'User\HomeController@showHome'
]);

Route::any('dang-nhap', [
    'as' => 'login',
    'uses' => 'User\HomeController@login'
]);
Route::get('dang-ki', [
    'as' => 'signin',
    'uses' => 'User\HomeController@getSignin'
]);

Route::post('dang-ki', [
    'as' => 'signin',
    'uses' => 'User\HomeController@postSignin'
]);

Route::get('dang-xuat', [
    'as' => 'logout',
    'uses' => 'User\HomeController@getLogout'
]);

Route::get('search', [
    'as' => 'search',
    'uses' => 'User\HomeController@getSearch'
]);

Route::get('chi-tiet-san-pham/{id}', [
    'as' => 'chitietsanpham',
    'uses' => 'User\HomeController@getChitiet'
]);

Route::get('gioi-thieu', [
    'as' => 'gioithieu',
    'uses' => 'HomeController@getGioithieu'
]);

Route::get('lien-he', [
    'as' => 'lienhe',
    'uses' => 'HomeController@getLienHe'
]);

Route::get('content/{category}', 'User\ContentController@showContent')->name('content');

Route::get('page/content/excercise/{category}', 'User\ContentController@getExcerciseContent')->name('get_excercise_content');

Route::get('page/content/post', 'User\ContentController@getPosts')->name('get_post_content');

Route::get('page/content/music', 'User\ContentController@getMusics')->name('get_music_content');

Route::get('/category/{category_id}/{tab}', 'User\HomeController@getExcercises')->name('get_excercises');

Route::get('/post', 'User\HomeController@getPosts')->name('get_posts');

Route::get('/music', 'User\HomeController@getMusics')->name('get_musics');

Route::get('/detail/excercise/{excercise_id}', 'User\DetailController@showDetail')->name('show_excercise_detail');

Route::get('/detail/post/{post_id}', 'User\DetailController@showPostDetail')->name('show_post_detail');

Route::get('/detail/music/{music_id}', 'User\DetailController@showMusicDetail')->name('show_music_detail');

//Member
Route::group(['prefix' => '/account', 'middleware' => 'auth'], function () {
    Route::get('show', 'Backend\AccountController@showUpdateProfile')->name('profile_show');

    Route::post('update', 'Backend\AccountController@actionUpdateProfile')->name('action_update_user_info');
});

Route::group(['prefix' => '/member', 'middleware' => 'member'], function() {
    Route::get('', 'Backend\MemberController@showDasboard')->name('member_home');

    Route::get('report', 'Backend\MemberController@showReport')->name('member_report');

    Route::get('report/search', 'Backend\MemberController@showSearchReport')->name('member_report_search');

    Route::get('report/show_create', 'Backend\MemberController@showCreateReport')->name('member_show_create_report');

    Route::get('report/detail/{report_id}', 'Backend\MemberController@showReportDetail')->name('member_show_report_detail');

    Route::get('review/detail/{review_id}', 'Backend\MemberController@showReviewDetail')->name('member_review_show_detail');

    Route::post('report/create', 'Backend\MemberController@createReport')->name('member_create_report');

    Route::get('review', 'Backend\MemberController@showReview')->name('member_review');

    Route::get('review/search', 'Backend\MemberController@showSearchReview')->name('member_review_search');
});

//Coach
Route::group(['prefix' => '/coach', 'middleware' => 'coach'], function() {
    Route::get('/', 'Backend\CoachController@showDasboard')->name('coach_home');

    Route::get('/report/list', 'Backend\CoachController@showReportList')->name('coach_report_list');

    Route::get('/report/search', 'Backend\CoachController@showReportSearch')->name('coach_report_seach');

    Route::get('/report/detail/{report_id}', 'Backend\CoachController@showReportDetail')->name('coach_show_report_detail');

    Route::get('/member/list', 'Backend\CoachController@showMemberList')->name('coach_member_list');

    Route::get('/member/search', 'Backend\CoachController@showMemberSearch')->name('coach_member_search');

    Route::get('/member/detail/{member_id}', 'Backend\CoachController@showMemberDetail')->name('coach_show_member_detail');

    Route::get('/member_schedule/{member_id}/create', 'Backend\CoachController@showCreateMemberSchedule')->name('admin_show_create_member_schedule');

    Route::post('/member_schedule/{member_id}/create', 'Backend\CoachController@actionCreateMemberSchedule')->name('action_create_member_schedule');

    Route::get('/review/list', 'Backend\CoachController@showReviewList')->name('coach_review_list');

    Route::get('/review/search', 'Backend\CoachController@showReviewSearch')->name('coach_review_search');

    Route::get('/review/detail/{review_id}', 'Backend\CoachController@showReviewDetail')->name('coach_review_show_detail');

    Route::get('/review/create/{report_id}', 'Backend\CoachController@showCreateReview')->name('coach_show_create_review');

    Route::post('/review/create/{report_id}', 'Backend\CoachController@actionCreateReview')->name('coach_action_create_review');

    Route::get('/excercise/list', 'Backend\CoachController@showExcerciseList')->name('coach_excercise_list');

    Route::get('/excercise/search', 'Backend\CoachController@showExcerciseSearch')->name('coach_excercise_search');

    Route::get('/excercise/create', 'Backend\CoachController@showCreateExcercise')->name('coach_show_create_excercise');

    Route::post('/excercise/create', 'Backend\CoachController@actionCreateExcercise')->name('coach_action_create_excercise');
});

//Admin
Route::group(['prefix' => '/admin', 'middleware' => 'admin'], function() {
    Route::get('/', 'Backend\AdminController@showDasboard')->name('admin_dashboard');

    Route::get('/member/search', 'Backend\AdminController@showMemberSearch')->name('admin_member_search');

    Route::get('/member/create', 'Backend\AdminController@showCreateMember')->name('admin_show_create_member');

    Route::post('/member/create', 'Backend\AdminController@actionCreateMember')->name('action_create_member');

    Route::get('/member/{member_id}/show', 'Backend\AdminController@showUpdateMember')->name('admin_show_update_member');

    Route::post('/member/{member_id}/update', 'Backend\AdminController@actionUpdateMemberInfo')->name('action_update_member_info');

    Route::get('/member/{member_id}/delete', 'Backend\AdminController@actionDeleteMember')->name('admin_action_delete_member');

    Route::get('/member/detail/{member_id}', 'Backend\AdminController@showMemberDetail')->name('admin_show_member_detail');

    Route::get('/coach/list', 'Backend\AdminController@showCoachList')->name('admin_coach_list');

    Route::get('/coach/search', 'Backend\AdminController@showCoachSearch')->name('admin_coach_search');

    Route::get('/coach/create', 'Backend\AdminController@showCreateCoach')->name('admin_show_create_coach');

    Route::post('/coach/create', 'Backend\AdminController@actionCreateCoach')->name('action_create_coach');

    Route::get('/coach/{coach_id}/show', 'Backend\AdminController@showUpdateCoach')->name('admin_show_update_coach');

    Route::post('/coach/{coach_id}/update', 'Backend\AdminController@actionUpdateCoachInfo')->name('action_update_coach_info');

    Route::get('/coach/{coach_id}/delete', 'Backend\AdminController@actionDeleteCoach')->name('admin_action_delete_coach');

    Route::get('/coach/detail/{coach_id}', 'Backend\AdminController@showCoachDetail')->name('admin_show_coach_detail');

    Route::get('/coach_schedule/{coach_id}/create', 'Backend\AdminController@showCreateCoachSchedule')->name('admin_show_create_coach_schedule');

    Route::post('/coach_schedule/{coach_id}/create', 'Backend\AdminController@actionCreateCoachSchedule')->name('action_create_coach_schedule');

    Route::get('/excercise/list', 'Backend\AdminController@showExcerciseList')->name('admin_excercise_list');

    Route::get('/excercise/search', 'Backend\AdminController@showExcerciseSearch')->name('admin_excercise_search');

    Route::get('/excercise/create', 'Backend\AdminController@showCreateExcercise')->name('admin_show_create_excercise');

    Route::post('/excercise/create', 'Backend\AdminController@actionCreateExcercise')->name('admin_action_create_excercise');

    Route::get('/excercise/{excercise_id}/update', 'Backend\AdminController@showUpdateExcercise')->name('admin_show_update_excercise');

    Route::post('/excercise/{excercise_id}/update', 'Backend\AdminController@actionUpdateExcercise')->name('admin_action_update_excercise');

    Route::get('/excercise/{excercise_id}/delete', 'Backend\AdminController@actionDeleteExcercise')->name('admin_delete_excercise');

    Route::get('/post/list', 'Backend\AdminController@showPostList')->name('admin_post_list');

    Route::get('/post/search', 'Backend\AdminController@showPostSearch')->name('admin_post_search');

    Route::get('/post/create', 'Backend\AdminController@showCreatePost')->name('admin_show_create_post');

    Route::post('/post/create', 'Backend\AdminController@actionCreatePost')->name('admin_action_create_post');

    Route::get('/post/{post_id}/update', 'Backend\AdminController@showUpdatePost')->name('admin_show_update_post');

    Route::post('/post/{post_id}/update', 'Backend\AdminController@actionUpdatePost')->name('admin_action_update_post');

    Route::get('/post/{post_id}/delete', 'Backend\AdminController@actionDeletePost')->name('admin_action_delete_post');

    Route::get('/music/list', 'Backend\AdminController@showMusicList')->name('admin_music_list');

    Route::get('/music/search', 'Backend\AdminController@showMusicSearch')->name('admin_music_search');

    Route::get('/music/create', 'Backend\AdminController@showCreateMusic')->name('admin_show_create_music');

    Route::post('/music/create', 'Backend\AdminController@actionCreateMusic')->name('admin_action_create_music');

    Route::get('/music/{music_id}/update', 'Backend\AdminController@showUpdateMusic')->name('admin_show_update_music');

    Route::post('/music/{music_id}/update', 'Backend\AdminController@actionUpdateMusic')->name('admin_action_update_music');

    Route::get('/music/{music_id}/delete', 'Backend\AdminController@actionDeleteMusic')->name('admin_action_delete_music');

    Route::get('/image/list', 'Backend\AdminController@showImageList')->name('admin_image_system_list');

    Route::get('/image/{image_id}/update', 'Backend\AdminController@showUpdateImage')->name('admin_show_update_image');

    Route::post('/image/{image_id}/update', 'Backend\AdminController@actionUpdateImage')->name('admin_action_update_image');

    Route::get('/system_info/list', 'Backend\AdminController@showSystemInfoList')->name('admin_system_infos');

    Route::get('/system_info/{info_id}/update', 'Backend\AdminController@showSystemInfo')->name('admin_show_update_info');

    Route::post('/system_info/{info_id}/update', 'Backend\AdminController@actionUpdateSystemInfo')->name('admin_action_update_info');
});
Auth::routes();

Route::get('/home', 'MemberController@index')->name('home');
