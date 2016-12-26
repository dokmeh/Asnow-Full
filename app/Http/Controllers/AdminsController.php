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

		public function projects()
		{
			$projects = Project::sorted()->get();

			return view('admin.projects', compact('projects'));
		}

		public function create()
		{

			$categories = Category::get();
			$statuses   = Status::get();


			return view('admin.create', compact('categories', 'statuses'));
		}

		public function createFa(Project $project)
		{
			return view('admin.create_fa', compact('project'));
		}

		public function store(Request $request)
		{
			//
		}

		public function show($id)
		{
			$project = Project::find($id);

			return view('admin.show', compact('project'));
		}

		public function edit($project)
		{
			//			dd($project->id);
			$project = Project::find($project);
			$project->load('awards.photo');
			$categories = Category::get();
			$statuses   = Status::get();

			return view('admin.edit', compact('project', 'categories', 'statuses'));
		}

		public function update(Request $request, $id)
		{
			//
		}

		public function destroy($id)
		{
			//
		}

		public function login()
		{
			return view('admin.login');
		}

		public function register()
		{
			return view('admin.register');
		}

		public function category()
		{
			$categories = Category::all();

			return view('admin.create-category', compact('categories'));
		}

		public function status()
		{
			$statuses = Status::all();

			return view('admin.create-status', compact('statuses'));
		}

		public function sort()
		{
			$projects = Project::sorted()->get();

			return view('admin.sorting', compact('projects'));
		}

		public function events()
		{
			$events = Event::all();

			return view('admin.events', compact('events'));
		}

		public function EventsCreate()
		{
			return view('admin.events-create');
		}

		public function EventsCreateFa(Event $event)
		{
			return view('admin.events-create-fa', compact('event'));
		}

		public function EventEdit(Event $event)
		{
			return view('admin.edit-events', compact('event'));
		}

		public function publications()
		{
			$projects = Project::all();

			return view('admin.publications', compact('projects'));
		}

		public function PublicationsCreate(Project $project)
		{

			return view('admin.publications-create', compact('project'));
		}

		public function PublicationsEdit(Publication $publication)
		{
			return view('admin.edit-publications', compact('publication'));
		}

		public function awards()
		{
			$projects = Project::all();

			return view('admin.awards', compact('projects'));
		}

		public function AwardsCreate(Project $project)
		{
			return view('admin.awards-create', compact('project'));
		}

		public function AwardsEdit(Award $award)
		{
			return view('admin.edit-awards', compact('award'));
		}

	}
