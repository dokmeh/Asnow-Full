<?php

	namespace App\Http\Controllers;

	use App\Client;
	use App\Thumbnail;
	use Illuminate\Http\Request;

	class ClientsController extends Controller {

		public function create()
		{
			$clients = Client::all();

			return view('admin.clients.create-client', compact('clients'));
		}

		public function store(Request $request)
		{

			$client = Client::create([
				                         'name'    => $request->input('name'),
				                         'name_fa' => $request->input('name_fa'),
				                         'url'     => $request->input('url'),

			                         ]);

			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/clients/thumbnail', $name);

			$client->thumbnail()->create(['thumbnail_path' => "/img/clients/thumbnail/{$name}"]);

			flash()->success('Done', 'Publication has been added to Project');

			return back();
		}

		public function destroy(Client $client)
		{
			$thumbnail = $client->thumbnail;
			$path      = $thumbnail->thumbnail_path;
			unlink(public_path($path));
			$thumbnail->delete();
			$client->delete();

			return 'Done';

		}

		public function deleteThumbnail(Thumbnail $thumbnail)
		{
			unlink(public_path($thumbnail->thumbnail_path));
			$thumbnail->delete();

			return back();

		}

		public function update(Client $client, Request $request)
		{
			$client->update($request->all());

			if ($request->file('file')) {
				$file = $request->file('file');
				$name = time() . $file->getClientOriginalName();
				$file->move('img/clients/thumbnail', $name);

				$client->thumbnail()->create(['thumbnail_path' => "/img/clients/thumbnail/{$name}"]);
			}

			return back();
		}
	}
