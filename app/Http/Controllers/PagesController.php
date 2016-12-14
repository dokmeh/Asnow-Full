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

			return view('layout', compact('page'));
		}

		public function projects()
		{
			$page       = 'projects';
			$projects   = Project::sorted()->get();
			$categories = Category::all();


			return view('projects', compact('page', 'projects', 'categories'));
		}

		public function project(Project $project)
		{
			$page = 'project';

			return view('project', compact('project', 'page'));
		}

		public function about()
		{
			$page = 'about';

			return view('about', compact('page'));
		}

		public function events()
		{
			$page   = 'events';
			$events = Event::orderBy('date', 'DESC')->get();

			return view('events', compact('page', 'events'));
		}

		public function event(Event $event)
		{
			$page = 'event';

			return view('event', compact('page', 'event'));
		}

		public function contact()
		{
			$page = 'contact';

			return view('contact', compact('page'));
		}

		public function publications()
		{
			$page         = 'publications';
			$publications = Publication::all();

			return view('publications', compact('page', 'publications'));
		}

		public function publication(Publication $publication)
		{
			$page = 'publication';

			return view('publication', compact('page', 'publication'));
		}
	}
