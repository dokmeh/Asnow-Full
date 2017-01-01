<?php

	namespace App\Http\Controllers;

	use App\Status;
	use Illuminate\Http\Request;

	class StatusesController extends Controller {

		public function store(Request $request, Status $status)
		{
			$status->create($request->all());

			return back();
		}

		public function destroy(Status $status)
		{
			$status->delete();

			return back();
		}

		public function update(Request $request, Status $status)
		{
			$status->update($request->all());

			return back();
		}

		public function status()
		{
			$statuses = Status::all();

			return view('admin.create-status', compact('statuses'));
		}

	}
