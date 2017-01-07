<?php


	Route::get('/test', 'PagesController@home');
	Route::get('/projects', 'PagesController@projects');
	Route::get('/events', 'PagesController@events');
	Route::get('/projects/request', 'PagesController@request');
	Route::post('/projects/request/create', 'RequestsController@store');
	Route::get('/projects/{project}', 'PagesController@project');
	Route::get('/events/{event}', 'PagesController@event');
	Route::get('/about', 'PagesController@about');
	Route::get('/contact', 'PagesController@contact');
	Route::get('/publications', 'PagesController@publications');
	Route::get('/publications/{publication}', 'PagesController@publication');


	Route::group(['prefix' => '/fa'], function () {
		Route::get('/test', function () {
			return redirect('/fa/home');
		});
		Route::get('/publications/{publication}', 'PagesController@publication_fa');
		Route::get('/publications', 'PagesController@publications_fa');
		Route::get('/contact', 'PagesController@contact_fa');
		Route::get('/about', 'PagesController@about_fa');
		Route::get('/events/{event}', 'PagesController@event_fa');
		Route::get('/projects/{project}', 'PagesController@project_fa');
		Route::get('/events', 'PagesController@events_fa');
		Route::get('/projects', 'PagesController@projects_fa');

	});

	Route::group(['prefix' => 'admin'], function () {
		//		Main Routes
		Route::get('/', 'AdminsController@index');
		Route::get('/register', 'AdminsController@register');
		Route::get('/login', 'AdminsController@login');
		//		Project Routes
		Route::group(['prefix' => 'project'], function () {
			Route::get('/', 'ProjectsController@projects');
			Route::get('/create', 'ProjectsController@create');
			Route::get('/create/fa/{project}', 'ProjectsController@createFa');
			Route::get('/sort', 'ProjectsController@sort');
			Route::get('/{project}', 'ProjectsController@show');
			Route::get('/{project}/edit', 'ProjectsController@edit');
			Route::get('/{project}/publications/create', 'PublicationsController@PublicationsCreate');
			Route::get('/{project}/awards/create', 'AwardsController@AwardsCreate');
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
			Route::get('/', 'AwardsController@awards');
			Route::get('/{award}/edit', 'AwardsController@AwardsEdit');
			Route::get('/{award}/deletebtn', 'AwardsController@destroy');
			Route::post('/{award}/update', 'AwardsController@update');


		});
		// Publication Routes
		Route::group(['prefix' => 'publications'], function () {
			Route::get('/', 'PublicationsController@publications');
			Route::get('/{publication}/edit', 'PublicationsController@PublicationsEdit');
			Route::get('/{publication}/deletebtn', 'PublicationsController@destroy');
			Route::post('/{publication}/update', 'PublicationsController@update');


		});
		//		Event Routes
		Route::group(['prefix' => 'events'], function () {

			Route::get('/', 'EventsController@events');
			Route::get('/create', 'EventsController@EventsCreate');
			Route::get('/{event}/create/fa', 'EventsController@EventsCreateFa');
			Route::get('/{event}', 'EventsController@show');
			Route::get('/{event}/edit', 'EventsController@EventEdit');
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

			Route::get('/create', 'CategoriesController@category');
			Route::get('/{category}/deletebtn', 'CategoriesController@destroy');
			Route::post('/{category}/edit', 'CategoriesController@update');
			Route::post('/create', 'CategoriesController@store');
		});
		//		Status Routes
		Route::group(['prefix' => 'status'], function () {
			Route::get('/create', 'StatusesController@status');
			Route::get('/{status}/deletebtn', 'StatusesController@destroy');
			Route::post('/{status}/edit', 'StatusesController@update');
			Route::post('/create', 'StatusesController@store');
		});
		// Request Routes
		Route::group(['prefix' => 'requests'], function () {
			Route::get('/', 'RequestsController@requests');
			Route::get('/{request}/', 'RequestsController@request');
			Route::get('/{request}/deletebtn', 'RequestsController@destroy');
			Route::post('/{request}/edit', 'RequestsController@update');
		});

		Route::group(['prefix' => 'cooperators'], function () {
			Route::get('/', 'CooperatorsController@cooperators');
			Route::get('/create', 'CooperatorsController@create');
			Route::get('/sort', 'CooperatorsController@sort');
			Route::get('/{cooperator}', 'CooperatorsController@show');
			Route::get('/{cooperator}/edit', 'CooperatorsController@edit');
			Route::get('/create/fa/{cooperator}', 'CooperatorsController@createFa');
			Route::post('/create', 'CooperatorsController@store');
			Route::post('/{cooperator}/photos', 'CooperatorsController@addPhotos');
			Route::post('/{cooperator}/thumbnails', 'CooperatorsController@addThumbnails');
			Route::patch('/{cooperator}/edit', 'CooperatorsController@update');
			Route::get('/photo/{photo}/deletebtn', 'CooperatorsController@deletePhotos');
			Route::get('/{cooperator}/deletebtn', 'CooperatorsController@destroy');


		});

		Route::group(['prefix' => 'client'], function () {
			Route::get('/create', 'ClientsController@create');
			Route::get('/thumbnail/{thumbnail}/deletebtn', 'ClientsController@deleteThumbnail');
			Route::get('/{client}/deletebtn', 'ClientsController@destroy');
			Route::post('/{client}/edit', 'ClientsController@update');
			Route::post('/create', 'ClientsController@store');
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


	//	Route::get('/home', 'PagesController@home');
	Route::get('/fa/home', 'PagesController@home_fa');


