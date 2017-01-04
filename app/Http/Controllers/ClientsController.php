<?php

	namespace App\Http\Controllers;

	use App\Client;
	use Illuminate\Http\Request;

	class ClientsController extends Controller {

		public function create()
		{
			return view('admin.create-client');
		}

		public function store(Request $request)
		{
			$client = Client::create($request->all());

			return redirect("/admin/clients/{$client->id}");
		}
	}
