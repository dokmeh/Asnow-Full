<?php

	namespace App\Http\Controllers;

	use App\Event;
	use App\Photo;
	use Illuminate\Http\Request;

	class EventsController extends Controller {
		public function store(Request $request)
		{
			$event = Event::create($request->all());
			flash()->overlay('Success', 'Your Event Has Been Created Successfully, Now Upload the Photos');

			return redirect("/admin/events/{$event->id}");
		}

		public function show(Event $event)
		{
			return view('admin.show-events', compact('event'));
		}

		public function addPhotos(Request $request, Event $event)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/events/photos', $name);


			$event->photos()->create(['image' => "/img/events/photos/{$name}"]);

			return redirect('admin/events/' . $event->id);
		}

		public function addThumbnails(Request $request, Event $event)
		{
			$file = $request->file('file');
			$name = time() . $file->getClientOriginalName();
			$file->move('img/events/photos/thumbnails/', $name);


			$event->thumbnail()->create(['thumbnail_path' => "/img/events/photos/thumbnails/{$name}"]);

			return redirect('admin/events/' . $event->id);

		}

		public function destroy(Event $event)
		{
			$event->delete();
			flash()->error('Deleted', 'The Event has been Deleted.');

			return back();
		}

		public function update(Request $request, Event $event)
		{
			$event->update($request->all());
			flash()->success('Success', 'The Event has been Updated.');

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
	}
