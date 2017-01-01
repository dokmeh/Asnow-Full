<?php

	namespace App\Http\Controllers;

	use App\Category;
	use Illuminate\Http\Request;

	class CategoriesController extends Controller {

		public function store(Request $request, Category $category)
		{
			$category->create($request->all());

			return back();
		}

		public function destroy(Category $category)
		{
			$category->projects()->update(['visible' => 0]);
			$category->delete();

			return back();
		}

		public function update(Request $request, Category $category)
		{
			$category->update($request->all());

			return back();
		}

		public function category()
		{
			$categories = Category::all();

			return view('admin.create-category', compact('categories'));
		}

	}
