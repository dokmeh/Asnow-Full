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

			return redirect("/admin/events/{$event->id}/create/fa");
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


			$event->photos()->create([
				                         'image' => "/img/events/photos/{$name}",
				                         'name'  => $name,
				                         'sort'  => 1,
			                         ]);

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
			foreach ($event->photos as $photo) {
				$path = $photo->image;
				unlink(public_path($path));
				$photo->delete();
			}

			$thumbnail = $event->thumbnail;
			$path      = $thumbnail->thumbnail_path;
			unlink(public_path($path));
			$thumbnail->delete();


			$event->delete();
			flash()->delete('Deleted', 'The Event has been Deleted.');

			return redirect('/admin/events');
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

		public function events()
		{
			$events = Event::all();

			return view('admin.events', compact('events'));
		}

		public function EventsCreate()
		{
			return view('admin.events-create');
		}

		public function EventsCreateFa(Event $event)
		{
			return view('admin.events-create-fa', compact('event'));
		}

		public function EventEdit(Event $event)
		{
			return view('admin.edit-events', compact('event'));
		}
	}
