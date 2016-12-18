<?php

	namespace App\Http\Controllers;


	use App\Category;
	use App\Event;
	use App\Project;
	use App\Publication;

	class PagesController extends Controller {

		public function home()
		{
			$page = 'home';

			return view('home', compact('page'));
		}

		public function home_fa()
		{
			$page = 'home';

			return view('home_fa', compact('page'));
		}

		public function projects()
		{
			$page       = 'projects';
			$projects   = Project::sorted()->get();
			$categories = Category::all();


			return view('projects', compact('page', 'projects', 'categories'));
		}

		public function projects_fa()
		{
			$page       = 'projects';
			$projects   = Project::sorted()->get();
			$categories = Category::all();


			return view('projects_fa', compact('page', 'projects', 'categories'));
		}

		public function project(Project $project)
		{
			$page = 'project';

			return view('project', compact('project', 'page'));
		}

		public function project_fa(Project $project)
		{
			$page = 'project';

			return view('project_fa', compact('project', 'page'));
		}

		public function about()
		{
			$page = 'about';

			return view('about', compact('page'));
		}

		public function about_fa()
		{
			$page = 'about';

			return view('about_fa', compact('page'));
		}

		public function events()
		{
			$page   = 'events';
			$events = Event::orderBy('date', 'DESC')->get();

			return view('events', compact('page', 'events'));
		}

		public function events_fa()
		{
			$page   = 'events';
			$events = Event::orderBy('date', 'DESC')->get();

			return view('events_fa', compact('page', 'events'));
		}

		public function event(Event $event)
		{
			$page = 'event';

			return view('event', compact('page', 'event'));
		}

		public function event_fa(Event $event)
		{
			$page = 'event';

			return view('event_fa', compact('page', 'event'));
		}

		public function contact()
		{
			$page = 'contact';

			return view('contact', compact('page'));
		}

		public function contact_fa()
		{
			$page = 'contact';

			return view('contact_fa', compact('page'));
		}

		public function publications()
		{
			$page         = 'publications';
			$publications = Publication::all();

			return view('publications', compact('page', 'publications'));
		}

		public function publications_fa()
		{
			$page         = 'publications';
			$publications = Publication::all();

			return view('publications_fa', compact('page', 'publications'));
		}

		public function publication(Publication $publication)
		{
			$page = 'publication';

			return view('publication', compact('page', 'publication'));
		}

		public function publication_fa(Publication $publication)
		{
			$page = 'publication';

			return view('publication_fa', compact('page', 'publication'));
		}
	}
