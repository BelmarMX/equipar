<?php

namespace App\Http\Controllers;

use App\Product;
use App\ProductCategories;
use App\ProductosDestacados;
use Illuminate\Http\Request;
use App\ProductSubcategories;

class ProductosDestacadosController extends Controller
{
	public function index()
	{
		$entries = ProductosDestacados::paginate(100);

		return view('02_system.08_destacados.index')
			-> with('entries', $entries)
		;
	}

	public function show(){}

	public function create()
	{
		$categories = ProductCategories::orderBy('title', 'ASC')
			-> get()
		;
		
		return view('02_system.08_destacados.create')
			-> with('categories', $categories)
		;
	}
	public function store(Request $request)
	{
		if (ProductosDestacados::create([
			'product_id'	=> $request -> product
		])) {
		$this -> send['type']		= 'alert-success';
		$this -> send['message']	= 'Registro guardado con éxito.';

		return  redirect()
			-> route('producto-destacado.create')
			-> with('alert', $this -> send);
		} 
	}

	public function destroy($id)
	{
		$entry = ProductosDestacados::find($id);

			if ($entry -> delete()) {
				$this -> send['type']		= 'alert-success';
				$this -> send['message']	= 'Registro eliminado con éxito.';
			} else {
				$this -> send['type']		= 'alert-danger';
				$this -> send['message']	= 'Ocurrió un error al eliminar el registro.';
			}

			return  redirect()
				->route('producto-destacado.index')
				->with('alert', $this -> send);
	}

	public function subcategories(Request $request)
	{
		return ProductSubcategories::where('category_id', $request -> category_id)
			-> orderBy('title', 'ASC')
			-> get()
		;
	}
	public function brands(Request $request)
	{
		return Product::select('marca')
			-> groupBy('marca')
			-> where('category_id', $request -> category_id)
			-> where('subcategory_id', $request -> subcategory_id)
			-> orderBy('marca', 'ASC')
			-> get()
		;
	}
	public function products(Request $request)
	{
		return Product::query()
			-> where('category_id', $request -> category_id)
			-> where(function($query) use($request){
				if( isset($request -> subcategory_id) AND $request -> subcategory_id > 0 )
				{
					$query -> where('subcategory_id', $request -> subcategory_id);
				}
				if( isset($request -> marca) AND $request -> marca != '' )
				{
					$query -> where('marca', 'LIKE', '%'.$request -> marca.'%');
				}
			})
			-> orderBy('title', 'ASC')
			-> get()
		;
	}
}
