<?php


	Route::get('/', function () {
		return redirect('/home');
	});
	Route::get('/fa', function () {
		return redirect('/fa/home');
	});
	Route::get('/projects', 'PagesController@projects');
	Route::get('/fa/projects', 'PagesController@projects_fa');
	Route::get('/events', 'PagesController@events');
	Route::get('/fa/events', 'PagesController@events_fa');
	Route::get('/projects/{project}', 'PagesController@project');
	Route::get('/fa/projects/{project}', 'PagesController@project_fa');
	Route::get('/events/{event}', 'PagesController@event');
	Route::get('/fa/events/{event}', 'PagesController@event_fa');
	Route::get('/about', 'PagesController@about');
	Route::get('/fa/about', 'PagesController@about_fa');
	Route::get('/contact', 'PagesController@contact');
	Route::get('/fa/contact', 'PagesController@contact_fa');
	Route::get('/publications', 'PagesController@publications');
	Route::get('/fa/publications', 'PagesController@publications_fa');
	Route::get('/publications/{publication}', 'PagesController@publication');
	Route::get('/fa/publications/{publication}', 'PagesController@publication_fa');


	Route::group(['prefix' => 'admin'], function () {
		//		Main Routes
		Route::get('/', 'AdminsController@index');
		Route::get('/register', 'AdminsController@register');
		Route::get('/login', 'AdminsController@login');
		//		Project Routes
		Route::group(['prefix' => 'project'], function () {
			Route::get('/', 'AdminsController@projects');
			Route::get('/create', 'AdminsController@create');
			Route::get('/create/fa/{project}', 'AdminsController@createFa');
			Route::get('/sort', 'AdminsController@sort');
			Route::get('/{project}', 'AdminsController@show');
			Route::get('/{project}/edit', 'AdminsController@edit');
			Route::get('/{project}/publications/create', 'AdminsController@PublicationsCreate');
			Route::get('/{project}/awards/create', 'AdminsController@AwardsCreate');
			Route::get('/{project}/deletebtn', 'ProjectsController@destroy');
			Route::get('/photo/{photo}/deletebtn', 'ProjectsController@deletePhotos');
			Route::get('/award/photo/{photo}/deletebtn', 'AwardsController@deletePhoto');
			Route::get('/publications/file/{file}/deletebtn', 'PublicationsController@deleteFiles');
			Route::post('/create', 'ProjectsController@store');
			Route::patch('/{project}/edit', 'ProjectsController@update');
			Route::post('/{project}/awards', 'AwardsController@store');
			Route::post('/{project}/publications', 'PublicationsController@store');
			Route::post('/{project}/photos', 'ProjectsController@addPhotos');
			Route::post('/{project}/thumbnails', 'ProjectsController@addThumbnails');
			Route::delete('/{project}/delete', 'ProjectsController@destroy');
		});
		// Award Routes
		Route::group(['prefix' => 'awards'], function () {
			Route::get('/', 'AdminsController@awards');
			Route::get('/{award}/edit', 'AdminsController@AwardsEdit');
			Route::get('/{award}/deletebtn', 'AwardsController@destroy');
			Route::post('/{award}/update', 'AwardsController@update');


		});

		// Publication Routes

		Route::group(['prefix' => 'publications'], function () {
			Route::get('/', 'AdminsController@publications');
			Route::get('/{publication}/edit', 'AdminsController@PublicationsEdit');
			Route::get('/{publication}/deletebtn', 'PublicationsController@destroy');
			Route::post('/{publication}/update', 'PublicationsController@update');


		});
		//		Event Routes
		Route::group(['prefix' => 'events'], function () {

			Route::get('/', 'AdminsController@events');
			Route::get('/create', 'AdminsController@EventsCreate');
			Route::get('/{event}/create/fa', 'AdminsController@EventsCreateFa');
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
	Route::get('/fa/home', 'PagesController@home_fa');


