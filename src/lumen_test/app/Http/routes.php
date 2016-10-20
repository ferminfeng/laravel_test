<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

//默认显示
$app->get('/', function (){
    return view("welcome");
    //return $app->version();
});

//get方式请求
$app->get('/foo', function () {
    return 'Hello World';
});

$app->get('/testControl/{id}', 'UserController@show');


//接受post方式提交
$app->get('/testPost', function () {
    return view("testPost");
});

$app->post('/testPost_submit', function () {
    print_r($_POST);DIE;
});

//接收单个参数
$app->get('user/{id}', function ($id) {
    return 'User '.$id;
});

//接收多个参数
$app->get('posts/{post}/comments/{comment}', function ($postId, $commentId) {
   
    return 'posts '.$postId.'----comments '.$commentId;
});

//命名路由 以及  对命名路由生成 URLs#
$app->get('profile', ['as' => 'testPost', function () {
    // 生成 URLs...
    $url = route('testPost');

    // 生成重定向...
    return redirect()->route('testPost');
}]);

//如果路由定义了参数，那么你可以把参数作为第二个参数传递给 route 方法。指定的参数将自动加入到 URL 中：

$app->get('user1/{id}/profile', ['as' => 'asd', function ($id) {
  
    $url = route('profile', ['id' => $id]);
    return $url;
}]);



