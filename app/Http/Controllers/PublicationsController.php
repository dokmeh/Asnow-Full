<?php

	namespace App\Http\Controllers;

	use App\File;
	use App\Project;
	use App\Publication;
	use Illuminate\Http\Request;

	class PublicationsController extends Controller {
		public function store(Request $request, $project)
		{
			$publication = Publication::create([
				                                   'name'           => $request->input('name'),
				                                   'name_fa'        => $request->input('name_fa'),
				                                   'description'    => $request->input('description'),
				                                   'description_fa' => $request->input('description_fa'),
				                                   'visible'        => $request->input('visible'),
				                                   'project_id'     => $project,
			                                   ]);

			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('files/publications/files', $name);

			$publication->files()->create(['path' => "/files/publications/files/{$name}"]);

			flash()->success('Done', 'Publication has been added to Project');

			return redirect('admin/project/' . $project);
		}

		public function addPhotos(Request $request, Publication $publication)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/publications/photos', $name);

			//			$project = Project::find($id);

			$publication->photos()->create([
				                               'image' => "/img/publications/photos/{$name}",
				                               'name'  => $name,
			                               ]);

			return redirect('admin/project/' . $project->id);
		}

		public function update(Request $request, Publication $publication)
		{
			//			dd($request->file('file'));
			if (count($request->file('file')) > 0) {
				$file = $request->file('file');
				$name = time() . $file->getClientOriginalName();
				$file->move('files/publications/files', $name);

				$publication->files()->create(['path' => "/files/publications/files/{$name}"]);
			}
			$publication->update($request->all());

			flash()->success('Done', 'Publication has been Updated.');


			return back();
		}

		public function destroy(Publication $publication)
		{
			foreach ($publication->files as $file) {
				$path = $file->path;
				unlink(public_path($path));
				$file->delete();
			}

			$publication->delete();
			flash()->error('Deleted', 'Publication has been deleted.');


			return redirect('/admin/publications');
		}

		public function deleteFiles($id)
		{
			$file = File::find($id);
			$path = $file->path;
			unlink(public_path($path));
			$file->destroy($id);

			//			flash()->error('Deleted', 'The Photo Has been Deleted.');

			return back();
		}

		public function publications()
		{
			$projects = Project::all();

			return view('admin.publications.publications', compact('projects'));
		}

		public function PublicationsCreate(Project $project)
		{

			return view('admin.publications.publications-create', compact('project'));
		}

		public function PublicationsEdit(Publication $publication)
		{
			return view('admin.publications.edit-publications', compact('publication'));
		}
	}
