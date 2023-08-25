<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class CategoryController extends Controller
{

	public function home()
	{
		$categories = Category::with([
			'products' => function ($query) {
				$query->where('stock', '>', 0)
					->whereNull('deleted_at');
			},
			'products.file' // Cargar la relación 'file' de 'products'
		])
		->whereHas('products', function ($query) {
			$query->where('stock', '>', 0)
				->whereNull('deleted_at');
		})
		->get();

		return view('categories.home', compact('categories'));
	}

	public function index(Request $request)
	{
		$categories = Category::get();
		if (!$request->ajax()) return view('categories.index');
		return response()->json(['categories' => $categories], 200);
	}

	public function store(Request $request)
	{
		$category = new Category($request->all());
		$category->save();
		return response()->json([], 200);
	}

	public function getAll()
	{
		$categories = Category::query();
		return DataTables::of($categories)->toJson();
	}

	public function show(Category $category)
	{
		return response()->json(['category' => $category], 200);
	}

	public function showFull(Category $category)
	{
		$categoryWithProducts = Category::with([
			'products' => function ($query) {
				$query->where('stock', '>', 0)
					->whereNull('deleted_at');
			},
			'products.file' // Cargar la relación 'file' de 'products'
		])
		->where('id', $category->id)
		->first(); // Obtener solo una categoría (la específica)

		return view('categories.show', compact('categoryWithProducts'));
		// return response()->json(['category' => $categoryWithProducts], 200);
	}


	public function update(Request $request, Category $category)
	
	{
		$category->update($request->all());
		return response()->json([], 204);
	}

	public function destroy(Category $category)
	{
		$category->delete();
		return response()->json([], 204);
	}
}