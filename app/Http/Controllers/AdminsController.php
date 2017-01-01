<?php

	namespace App\Http\Controllers;

	use App\Award;
	use App\Category;
	use App\Event;
	use App\Project;
	use App\Publication;
	use App\Status;
	use Illuminate\Http\Request;

	class AdminsController extends Controller {

		public function __construct()
		{
			$this->middleware('auth', ['except' => [
				'login',
				'register',
			]]);


		}

		public function index()
		{
			$projects = Project::sorted()->get();

			return view('admin.home', compact('projects'));
		}

		public function login()
		{
			return view('admin.login');
		}

		public function register()
		{
			return view('admin.register');
		}

	}
