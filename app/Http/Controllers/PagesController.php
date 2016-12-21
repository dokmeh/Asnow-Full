<?php

	namespace App\Http\Controllers;


	use App\Category;
	use App\Event;
	use App\Project;
	use App\Publication;
	use Illuminate\Http\Request;

	class PagesController extends Controller {

		public function home()
		{
			$page    = 'home';
			$content = NULL;

			return view('home', compact('page', 'content'));
		}

		public function home_fa()
		{
			$page    = 'home';
			$content = NULL;

			return view('home_fa', compact('page', 'content'));
		}

		public function projects(Request $request)
		{
			$page       = 'projects';
			$projects   = Project::sorted()->get();
			$categories = Category::all();
			$content    = view('projects', compact('projects', 'categories'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('page', 'content'));
			}
		}

		public function projects_fa(Request $request)
		{
			$page       = 'projects';
			$projects   = Project::sorted()->get();
			$categories = Category::all();
			$content    = view('projects_fa', compact('projects', 'categories'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('page', 'content'));
			}

		}

		public function project(Request $request, $id)
		{
			$page    = 'project';
			$project = Project::find($id)->load('photos');
			$content = view('project', compact('project'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('page', 'content'));
			}

		}

		public function project_fa(Request $request, $id)
		{
			$page    = 'project';
			$project = Project::find($id)->load('photos');
			$content = view('project_fa', compact('project'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('page', 'content'));
			}
		}

		public function about(Request $request)
		{
			$page    = 'about';
			$content = view('about');


			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('content', 'page'));
			}
		}

		public function about_fa(Request $request)
		{
			$page    = 'about';
			$content = view('about_fa');


			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('content', 'page'));
			}
		}

		public function events(Request $request)
		{
			$page    = 'events';
			$events  = Event::orderBy('date', 'DESC')->get();
			$content = view('events', compact('events'));
			//dd($request->ajax());
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('content', 'page'));
			}


		}

		public function events_fa(Request $request)
		{
			$page    = 'events';
			$events  = Event::orderBy('date', 'DESC')->get();
			$content = view('events_fa', compact('events'));
			//dd($request->ajax());
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('content', 'page'));
			}
		}

		public function event(Request $request, Event $event)
		{
			$page    = 'event';
			$content = view('event', compact('event'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('page', 'content'));
			}

		}

		public function event_fa(Request $request, Event $event)
		{
			$page    = 'event';
			$content = view('event_fa', compact('event'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('page', 'content'));
			}
		}

		public function contact(Request $request)
		{
			$page    = 'contact';
			$content = view('contact');
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('content', 'page'));
			}

		}

		public function contact_fa(Request $request)
		{
			$page    = 'contact';
			$content = view('contact');
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('content', 'page'));
			}
		}

		public function publications(Request $request)
		{
			$page         = 'publications';
			$publications = Publication::all();
			$content      = view('publications', compact('publications'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('content', 'page'));
			}
		}

		public function publications_fa(Request $request)
		{
			$page         = 'publications';
			$publications = Publication::all();
			$content      = view('publications_fa', compact('publications'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('content', 'page'));
			}
		}

		public function publication(Request $request, Publication $publication)
		{
			$page    = 'publication';
			$content = view('publication', compact('publication'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout', compact('content', 'page'));
			}
		}

		public function publication_fa(Request $request, Publication $publication)
		{
			$page    = 'publication';
			$content = view('publication_fa', compact('publication'));
			if ($request->ajax()) {
				return $content;
			} else {
				return view('layout_fa', compact('content', 'page'));
			}
		}
	}
