<?php

	namespace App\Http\Controllers;

	use App\Request as Requests;
	use Illuminate\Http\Request;

	class RequestsController extends Controller {
		public function store(Request $request)
		{
			$this->validate($request, [
				'request_type' => 'required',
				'name'         => 'required',
				'phone'        => 'required',
			]);
			$requests = Requests::create($request->all());

			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('files/requests/files', $name);

			$requests->files()->create(['path' => "/files/requests/files/{$name}"]);


			$photo     = $request->file('photo');
			$photoname = time() . $photo->getClientOriginalName();
			$photo->move('img/requests/photos', $photoname);

			$requests->photos()->create(['image' => "/img/requests/photos/{$photoname}",
			                             'name'  => $photoname]);

			return back();
		}

		public function addPhotos(Request $request, $id)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/requests/photos', $name);

			$requests = Requests::find($id);

			$requests->photos()->create([
				                            'image' => "/img/requests/photos/{$name}",
				                            'name'  => $name,
			                            ]);

			return 'Done';
		}

		public function destroy(Requests $request)
		{
			foreach ($request->photos as $photo) {
				$path = $photo->image;
				unlink(public_path($path));
				$photo->delete();
			}

			foreach ($request->files as $file) {
				$path = $file->path;
				unlink(public_path($path));
				$file->delete();
			}

			$request->delete();
			flash()->warning('Deleted', 'The Request has been deleted.');

			return redirect('/admin/requests');
		}

		public function requests()
		{
			$requests = Requests::all();

			return view('admin.requests.requests', compact('requests'));
		}

		public function request(\App\Request $request)
		{
			return view('admin.requests.show-request', compact('request'));
		}
	}
