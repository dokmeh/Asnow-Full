<?php


	Route::get('/', function () {
		return redirect('/home');
	});
	Route::get('/projects', 'PagesController@projects');
	Route::get('/events', 'PagesController@events');
	Route::get('/projects/{project}', 'PagesController@project');
	Route::get('/events/{event}', 'PagesController@event');
	Route::get('/about', 'PagesController@about');
	Route::get('/contact', 'PagesController@contact');
	Route::get('/publications', 'PagesController@publications');
	Route::get('/publications/{publication}', 'PagesController@publication');


	Route::group(['prefix' => 'admin'], function () {
		//		Main Routes
		Route::get('/', 'AdminsController@index');
		Route::get('/register', 'AdminsController@register');
		Route::get('/login', 'AdminsController@login');
		//		Project Routes
		Route::group(['prefix' => 'project'], function () {
			Route::get('/create', 'AdminsController@create');
			Route::get('/sort', 'AdminsController@sort');
			Route::get('/{project}', 'AdminsController@show');
			Route::get('/{project}/edit', 'AdminsController@edit');
			Route::get('/{project}/deletebtn', 'ProjectsController@destroy');
			Route::get('/photo/{photo}/deletebtn', 'ProjectsController@deletePhotos');
			Route::get('/award/{award}/deletebtn', 'AwardsController@destroy');
			Route::get('/award/photo/{photo}/deletebtn', 'AwardsController@deletePhoto');
			Route::get('/publications/file/{file}/deletebtn', 'PublicationsController@deleteFiles');
			Route::get('/publications/{publication}/deletebtn', 'PublicationsController@destroy');

			Route::post('/create', 'ProjectsController@store');
			Route::patch('/{project}/edit', 'ProjectsController@update');
			Route::post('/{project}/awards', 'AwardsController@store');
			Route::post('/{project}/publications', 'PublicationsController@store');
			Route::post('/{project}/photos', 'ProjectsController@addPhotos');
			Route::post('/{project}/thumbnails', 'ProjectsController@addThumbnails');
			Route::delete('/{project}/delete', 'ProjectsController@destroy');
			Route::post('/awards/{award}/edit', 'AwardsController@update');
			Route::post('/publications/{publication}/edit', 'PublicationsController@update');
		});
		//		Event Routes
		Route::group(['prefix' => 'events'], function () {

			Route::get('/', 'AdminsController@events');
			Route::get('/create', 'AdminsController@EventsCreate');
			Route::get('/{event}', 'EventsController@show');
			Route::get('/{event}/edit', 'AdminsController@EventEdit');
			Route::get('/{event}/deletebtn', 'EventsController@destroy');
			Route::get('/photo/{photo}/deletebtn', 'EventsController@deletePhotos');

			Route::post('/create', 'EventsController@store');
			Route::patch('/{event}/edit', 'EventsController@update');
			Route::post('/{event}/photos', 'EventsController@addPhotos');
			Route::post('/{event}/thumbnails', 'EventsController@addThumbnails');
			Route::delete('/{event}/delete', 'EventsController@destroy');

		});
		//      Category Routes
		Route::group(['prefix' => 'category'], function () {

			Route::get('/create', 'AdminsController@category');
			Route::get('/{category}/deletebtn', 'CategoriesController@destroy');
			Route::post('/{category}/edit', 'CategoriesController@update');
			Route::post('/create', 'CategoriesController@store');
		});
		//		Status Routes
		Route::group(['prefix' => 'status'], function () {
			Route::get('/create', 'AdminsController@status');
			Route::get('/{status}/deletebtn', 'StatusesController@destroy');
			Route::post('/{status}/edit', 'StatusesController@update');
			Route::post('/create', 'StatusesController@store');
		});
	});


	Route::post('sort', '\Rutorika\Sortable\SortableController@sort');

	Auth::routes();
	Route::get('/login', function () {
		return redirect('admin/login');
	});
	Route::get('/register', function () {
		return redirect('admin/register');
	});


	Route::get('/home', 'PagesController@home');


	Route::get('/pjax', function () {
		return view('PjaxTest');
	});

	Route::get('test1', function () {
		return view('test1');
	});

	Route::get('test2', function () {
		return view('test2');
	});
