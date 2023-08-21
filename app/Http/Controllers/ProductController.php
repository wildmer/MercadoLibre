<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
	public function home()
	{
	}

	public function index()
	{
		$products = Product::get();
		return view('index', compact('products'));
	}

	public function store(ProductRequest $request)
	{
	}

	public function show(Product $Product)
	{
		return response()->json(['Product' => $Product], 200);
	}

	public function update(ProductUpdateRequest $request, Product $Product)
	{
	}

	public function destroy(Product $Product)
	{
		$Product->delete();
		$this->deleteFile($Product);
		return response()->json([], 204);
	}
}
