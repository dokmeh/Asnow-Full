<?php

	namespace App\Http\Controllers;

	use App\File;
	use App\Publication;
	use Illuminate\Http\Request;

	class PublicationsController extends Controller {
		public function store(Request $request, $project)
		{
			$publication = Publication::create([
				                                   'name'        => $request->input('name'),
				                                   'description' => $request->input('description'),
				                                   'project_id'  => $project,
			                                   ]);

			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('files/publications/files', $name);

			$publication->files()->create(['path' => "/files/publications/files/{$name}"]);

			flash()->success('Done', 'Publication has been added to Project');

			return redirect('admin/project/' . $project);
		}

		public function update(Request $request, Publication $publication)
		{
			$publication->update($request->all());

			if (count($request->file('file') > 0)) {
				$file = $request->file('file');
				$name = time() . $file->getClientOriginalName();
				$file->move('files/publications/files', $name);

				$publication->files()->create(['path' => "/files/publications/files/{$name}"]);
			}
			flash()->success('Done', 'Publication has been Updated.');


			return back();
		}

		public function destroy(Publication $publication)
		{
			$publication->delete();
			flash()->error('Deleted', 'Publication has been deleted.');


			return back();
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
	}
