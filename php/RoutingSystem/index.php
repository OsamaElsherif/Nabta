<?php 
include "Router.php";

Route::add('/', function(){
    include('/projects/nabta');
});
Route::add('/signup', function(){
    include('../SIGN_UP.html');
});
Route::add('/login', function(){
    include('../LOG_IN.html');
});
Route::add('/profile', function(){
    include('../HOME_PAGE1.html');
});
Route::add('/logout', function(){
    include('../logout.php');
});

Route::submit();