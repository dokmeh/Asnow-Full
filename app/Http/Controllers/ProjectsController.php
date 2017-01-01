<?php

	namespace App\Http\Controllers;

	use App\Photo;
	use App\Project;
	use Illuminate\Http\Request;
	use Illuminate\Support\Facades\Storage;

	class ProjectsController extends Controller {

		public function store(Request $request)
		{
			$project = Project::create($request->all());
			flash()->overlay('Success', 'Now Add Persian Information');

			return redirect("/admin/project/create/fa/{$project->id}");
		}

		public function addPhotos(Request $request, Project $project)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/project/photos', $name);

			//			$project = Project::find($id);

			$project->photos()->create([
				                           'image' => "/img/project/photos/{$name}",
				                           'name'  => $name,
			                           ]);

			return redirect('admin/project/' . $project->id);
		}

		public function addThumbnails(Request $request, Project $project)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/project/photos/thumbnails/', $name);

			//			$project = Project::find($id);

			$project->thumbnails()->create(['thumbnail_path' => "/img/project/photos/thumbnails/{$name}"]);

			return redirect('admin/project/' . $project->id);

		}

		public function destroy(Project $project)
		{


			flash()->delete('Deleted', 'The Project has been deleted.');

			$project->delete();


			return redirect('/admin/');
		}

		public function deletePhotos($id)
		{
			$photo = Photo::find($id);
			$path  = $photo->image;
			unlink(public_path($path));
			$photo->destroy($id);


			flash()->error('Deleted', 'The Photo Has been Deleted.');

			return back();
		}

		public function update(Request $request, Project $project)
		{
			$project->update($request->all());
			flash()->success('Done', 'The Project has been Updated.');

			return redirect("/admin/project/{$project->id}");
		}

		public function sort()
		{
			$projects = Project::sorted()->get();

			return view('admin.sorting', compact('projects'));
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

	}
