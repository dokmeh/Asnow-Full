<?php

	namespace App\Http\Controllers;

	use App\Category;
	use App\Cooperator;
	use App\Photo;
	use Illuminate\Http\Request;

	class CooperatorsController extends Controller {
		public function cooperators()
		{
			$cooperators = Cooperator::all();

			return view('admin.cooperators', compact('cooperators'));
		}

		public function create()
		{
			$categories = Category::all();

			return view('admin.create-cooperator', compact('categories'));
		}

		public function store(Request $request)
		{
			$cooperator = Cooperator::create($request->all());

			return redirect("/admin/cooperators/create/fa/{$cooperator->id}");
		}

		public function createFa(Cooperator $cooperator)
		{
			return view('admin.create-cooperator_fa', compact('cooperator'));
		}

		public function addPhotos(Request $request, Cooperator $cooperator)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/cooperator/photos', $name);

			//			$project = Project::find($id);

			$cooperator->photos()->create([
				                              'image' => "/img/cooperator/photos/{$name}",
				                              'name'  => $name,
			                              ]);

			return 'Done';
		}

		public function addThumbnails(Request $request, Cooperator $cooperator)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/cooperator/photos/thumbnails/', $name);

			//			$project = Project::find($id);

			$cooperator->thumbnails()->create(['thumbnail_path' => "/img/cooperator/photos/thumbnails/{$name}"]);

			return 'Done';

		}

		public function show(Cooperator $cooperator)
		{
			return view('admin.show-cooperator', compact('cooperator'));
		}

		public function edit(Cooperator $cooperator)
		{
			$categories = Category::get();

			return view('admin.edit-cooperator', compact('cooperator', 'categories'));
		}

		public function update(Request $request, Cooperator $cooperator)
		{
			$cooperator->update($request->all());

			return back();
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

		public function destroy(Cooperator $cooperator)
		{

			foreach ($cooperator->photos as $photo) {
				$path = $photo->image;
				unlink(public_path($path));
				$photo->delete();
			}

			foreach ($cooperator->thumbnails as $thumbnail) {
				$path = $thumbnail->thumbnail_path;
				unlink(public_path($path));
				$thumbnail->delete();
			}

			$cooperator->delete();
			flash()->warning('Deleted', 'The Project has been deleted.');


			return redirect('/admin/');
		}

		public function sort()
		{
			$cooperators = Cooperator::sorted()->get();

			return view('admin.sort-cooperators', compact('cooperators'));
		}

	}
