<?php

	namespace App\Http\Controllers;

	use App\Photo;
	use App\Project;
	use Illuminate\Http\Request;

	class ProjectsController extends Controller {

		public function store(Request $request)
		{
			$project = Project::create($request->all());

			return redirect("/admin/project/{$project->id}");
		}

		public function addPhotos(Request $request, Project $project)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/project/photos', $name);

			//			$project = Project::find($id);

			$project->photos()->create(['image' => "/img/project/photos/{$name}"]);

			return redirect('admin/project/' . $project->id);
		}

		public function addThumbnails(Request $request, Project $project)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/project/photos/thumbnails/', $name);

			//			$project = Project::find($id);

			$project->thumbnail()->create(['thumbnail_path' => "/img/project/photos/thumbnails/{$name}"]);

			return redirect('admin/project/' . $project->id);

		}

		public function destroy(Project $project)
		{
			$project->delete();

			return back();
		}

		public function deletePhotos($id)
		{
			$photo = Photo::find($id);
			$photo->destroy($id);

			//			flash()->error('Deleted', 'The Photo Has been Deleted.');

			return back();
		}
	}
