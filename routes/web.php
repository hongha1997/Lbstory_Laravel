<?php
Route::pattern('slug', '(.*)');

Route::pattern('id', '([0-9]*)');

Route::get('/',[
    'uses'=>'Bstory\StoryController@index',
    'as' =>'bstory.story.index'
]);

Route::get('/thumuc/{slug}-{id}.html',[
    'uses'=>'Bstory\StoryController@cat',
    'as' =>'bstory.story.cat'
]);

Route::get('/chitiet/{slug}-{id}.html',[
    'uses'=>'Bstory\StoryController@detail',
    'as' =>'bstory.story.detail'
]);

Route::get('/lien-he',[
    'uses'=>'Bstory\ContactController@getIndex',
    'as' =>'bstory.contact.index'
]);

Route::post('/lien-he',[
    'uses'=>'Bstory\ContactController@postIndex',
    'as' =>'bstory.contact.index'
]);

Route::get('/tim-kiem',[
    'uses'=>'Bstory\StoryController@postSearch',
    'as' =>'bstory.story.search'
]);

Route::post('/tim-kiem',[
    'uses'=>'Bstory\StoryController@postSearch',
    'as' =>'bstory.story.search'
]);



Route::namespace('Admin')->prefix('admin')->middleware('auth')->group(function () {
    //storycontroller
    Route::prefix('story')->group(function(){
        Route::get('/index',[
            'uses'=>'StoryController@index', // subfix la giong o phia sau
            'as' =>'admin.story.index'         // con prefix la giong phia truoc
        ]);
        Route::get('/add',[
            'uses'=>'StoryController@getAdd',
            'as' =>'admin.story.add'
        ]);
        Route::post('/add',[
            'uses'=>'StoryController@postAdd',
            'as' =>'admin.story.add'
        ]);
        Route::get('/edit/{id}',[
            'uses'=>'StoryController@getEdit',
            'as' =>'admin.story.edit'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'StoryController@postEdit',
            'as' =>'admin.story.edit'
        ]);
        Route::get('/del/{id}',[
            'uses'=>'StoryController@del',
            'as' =>'admin.story.del'
        ]);
    });
    Route::prefix('cat')->group(function(){
        Route::get('/index',[
            'uses'=>'CatController@index',
            'as' =>'admin.cat.index'
        ]);
        Route::get('/add',[
            'uses'=>'CatController@getAdd',
            'as' =>'admin.cat.add'
        ]);
        Route::post('/add',[
            'uses'=>'CatController@postAdd',
            'as' =>'admin.cat.add'
        ]);
        Route::get('/edit/{id}',[
            'uses'=>'CatController@getEdit',
            'as' =>'admin.cat.edit'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'CatController@postEdit',
            'as' =>'admin.cat.edit'
        ]);
        Route::get('/del/{id}',[
            'uses'=>'CatController@del',
            'as' =>'admin.cat.del'
        ]);
    });
    // usercontroller
    Route::prefix('user')->group(function(){
        Route::get('/index',[
            'uses'=>'UserController@index',
            'as' =>'admin.user.index'
        ]);
        Route::get('/add',[
            'uses'=>'UserController@getAdd',
            'as' =>'admin.user.add'
        ]);
        Route::post('/add',[
            'uses'=>'UserController@postAdd',
            'as' =>'admin.user.add'
        ]);
        Route::get('/edit/{id}',[
            'uses'=>'UserController@getEdit',
            'as' =>'admin.user.edit'
        ]);
        Route::post('/edit/{id}',[
            'uses'=>'UserController@postEdit',
            'as' =>'admin.user.edit'
        ]);
        Route::get('/del/{id}',[
            'uses'=>'UserController@del',
            'as' =>'admin.user.del'
        ]);
    });
    Route::prefix('contact')->group(function(){
        Route::get('/index',[
            'uses'=>'ContactController@index',
            'as' =>'admin.contact.index'
        ]);
        // Route::post('/index',[
        //     'uses'=>'ContactController@postTrangthai',
        //     'as' =>'admin.contact.index'
        // ]);
        Route::get('/del/{id}',[
            'uses'=>'ContactController@del',
            'as' =>'admin.contact.del'
        ]);
        // Route::post('/trangthai',[
        //     'uses'=>'ContactController@postTrangthai',
        //     'as' =>'admin.contact.trangthai'
        // ]);
        // Route::get('/trangthai',[
        //     'uses'=>'ContactController@getTrangthai',
        //     'as' =>'admin.contact.trangthai'
        // ]);
    });  
});

// demo
// Route::get('demo/demo',[
//     'uses'=>'Demo\DemoController@demo',
//     'as' =>'demo.demo'
// ]);

Route::namespace('Auth')->group(function () {
    Route::get('/login',[
        'uses'=>'AuthController@getLogin',
        'as' =>'auth.auth.login'
    ]);  
    Route::post('/login',[
        'uses'=>'AuthController@postLogin',
        'as' =>'auth.auth.login'
    ]);
    Route::get('/logout',[
        'uses'=>'AuthController@logout',
        'as' =>'auth.auth.logout'
    ]); 
});



Route::post('/trangthai',[
    'uses'=>'AjaxController@postTrangthai',
    'as' =>'trangthai'
]);