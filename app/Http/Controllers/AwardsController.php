<?php

	namespace App\Http\Controllers;

	use App\Award;
	use App\Photo;
	use App\Project;
	use Illuminate\Http\Request;

	class AwardsController extends Controller {
		public function store(Request $request, $project)
		{
			$award = Award::create([
				                       'name'        => $request->input('name'),
				                       'description' => $request->input('description'),
				                       'date'        => $request->input('date'),
				                       'project_id'  => $project,
			                       ]);

			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/awards/photos', $name);

			$award->photo()->create(['image' => "/img/awards/photos/{$name}"]);

			flash()->success('Done', 'Award has been added to Project');

			return redirect('admin/project/' . $project);
		}

		public function destroy(Award $award)
		{
			$award->delete();
			flash()->error('Deleted', 'Award has been Deleted');


			return back();
		}

		public function update(Request $request, Award $award)
		{
			$award->update($request->all());

			if (count($request->file('file')) > 0) {
				$file = $request->file('file');
				$name = time() . $file->getClientOriginalName();
				$file->move('img/awards/photos', $name);

				$award->photo()->create(['image' => "/img/awards/photos/{$name}"]);
			}
			flash()->success('Done', 'Award has been Updated.');

			return back();
		}

		public function deletePhoto($id)
		{
			$photo = Photo::find($id);
			$path  = $photo->image;
			unlink(public_path($path));
			$photo->destroy($id);

			flash()->error('Deleted', 'The Photo Has been Deleted.');

			return back();
		}
	}
