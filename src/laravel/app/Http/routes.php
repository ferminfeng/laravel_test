<?php

/*
|--------------------------------------------------------------------------
| Routes File
|--------------------------------------------------------------------------
|
| Here is where you will register all of the routes in an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

//GET请求路由定义
Route::get('/hello', function () {
    return "Hello Laravel[GET]!aa";
});


//POST请求路由示例
Route::get('/testPost',function(){
    $csrf_token = csrf_token();
    $form = <<<FORM
        <form action="/hello" method="POST">
            <input type="hidden" name="_token" value="{$csrf_token}">
            <input type="submit" value="Test"/>
        </form>
FORM;
    return $form;
});

Route::post('/hello',function(){
    return "Hello Laravel[POST]!";
});

Route::get('/helloTWO/{name?}',function($name="Laravel"){
    return "Hello {$name}!";
});

//正则约束
//有时候我们希望对路由有更加灵活的条件约束，可以通过正则表达式来实现：

Route::get('/helloThree/{name?}',function($name="Laravel"){
    return "Hello {$name}!";
})->where('name','[A-Za-z]+');


//路由
Route::get('/hello/laravelacademy',['as'=>'academy',function(){
    return 'Hello LaravelAcademy！';
}]);

Route::get('/testNamedRoute',function(){
    //输出
        //return route('academy');
    
    //跳转
       return redirect()->route('academy');
});

//我们甚至还可以在使用带参数的路由命名：

Route::get('/hello/laravelacademyTwo/{id}',['as'=>'academyTwo',function($id){
    return 'Hello laravelacademyTwo '.$id.'！';
}]);

//对应的测试路由定义如下：

Route::get('/testNamedRouteTwo',function(){
    //输出
    //return route('academyTwo',['id'=>4561]);
    
    //跳转
    return redirect()->route('academyTwo',['id'=>456]);
});

// 路由分组时路由命名方式
Route::group(['as' => 'admin::'], function () {
    Route::get('dashboard', ['as' => 'dashboard', function () {
        //
    }]);
    Route::get('dashboardTwo', ['as' => 'dashboardTwo', function () {
        echo "跳转到dashboardTwo";
    }]);
});

Route::get('/testNamedRoute',function(){
    //return route('admin::dashboard');
    //return route('admin::dashboardTwo');
    
    return redirect()->route('admin::dashboardTwo');
});



/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| This route group applies the "web" middleware group to every route
| it contains. The "web" middleware group is defined in your HTTP
| kernel and includes session state, CSRF protection, and more.
|
*/

Route::group(['middleware' => ['web']], function () {
    //
});
