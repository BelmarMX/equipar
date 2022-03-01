<?php

namespace App\Http\Controllers;

use Gate
,   Image
,   Carbon\Carbon
,   Illuminate\Http\Request
,   Illuminate\Support\Facades\Input
,   Illuminate\Support\Facades\Storage;

use App\Promociones
,   App\Product
,   App\ProductSubcategories;
use App\PromocionesProductos;

class PromocionesController extends BaseDashboard
{
	private $send;

	public function __construct()
	{
		parent::__construct();
		$this -> folder     = env('PROMOS_FOLDER');
		$this -> width      = env('PROMOS_WIDTH');
		$this -> height     = env('PROMOS_HEIGHT');
		$this -> max_size   = env('FILE_MAX_SIZE');
	}

	public function show($slug)
	{
		$promos     = $this -> viewPromos();

		$promocion  = Promociones::where('slug', '=', $slug)
			-> first();

		$entries    = PromocionesProductos::join(
					'promociones'
				,   'promocion_id', '=', 'promociones.id'
			)
			-> join(
					'products'
				,   'products.id', '=', 'promociones_productos.producto_id'
			)
			-> join(
					'products_categories'
				,   'products_categories.id', '=', 'products.category_id'
			)
			-> join(
					'products_subcategories'
				,   'products_subcategories.id', '=', 'products.subcategory_id'
			)
			-> select(
					'products.id                    AS idP'
				,   'products.title                 AS titleP'
				,   'products.slug                  AS slugP'
				,   'products.image                 AS imageP'
				,   'modelo'
				,   'marca'
				,   'resumen'
				,   'precio'
				,   'products.image_rx              AS image_rxP'
				,   'products_categories.slug       AS slugC'
				,   'products_subcategories.id      AS idS'
				,   'products_subcategories.slug    AS slugS'
				,   'final_price'
				,   'discount'
			)
			-> where('promociones.slug', '=', $slug)
			-> orderBy('products.id', 'DESC')
			-> paginate(18);

		$subc = array();
		foreach($entries AS $e => $entry)
		{
			if( !in_array($entry -> idS, $subc) )
				array_push( $subc, $entry -> idS );
		}
		
		$subcategories  = ProductSubcategories::select(
				'*'
			,   'products_categories.slug       AS slugC'
			,   'products_subcategories.id      AS idS'
			,   'products_subcategories.title   AS titleS'
			,   'products_subcategories.slug    AS slugS'
		)
		-> join(
				'products_categories'
			,   'products_subcategories.category_id', '=', 'products_categories.id'
		)
		-> whereIn('products_subcategories.id', $subc)
		-> get();

		$meta['titulo']         = $promocion -> title;
		$meta['descripcion']    = 'Promociones del mes';
		$meta['imagen']         = url('storage/' . $this -> folder . $promocion -> image);

		return view('frontend_v2.promociones-listado')
			->with([
					'meta'          => $meta
				,   'banners'       => 0
				,   'promos'        => $promos
				,   'promocion'     => $promocion
				,   'entries'       => $entries
				,   'subcategories' => $subcategories
				,   'entries'       => $entries
                ,   'menu_cat'  => $this -> viewProducCategories()
			]);
	}

	public function subc($slugP, $slugS)
	{
		$promos     = $this -> viewPromos();

		$promocion  = Promociones::where('slug', '=', $slugP)
			-> first();

		$entries    = PromocionesProductos::join(
					'promociones'
				,   'promocion_id', '=', 'promociones.id'
			)
			-> join(
					'products'
				,   'products.id', '=', 'promociones_productos.producto_id'
			)
			-> join(
					'products_categories'
				,   'products_categories.id', '=', 'products.category_id'
			)
			-> join(
					'products_subcategories'
				,   'products_subcategories.id', '=', 'products.subcategory_id'
			)
			-> select(
					'products.id                    AS idP'
				,   'products.title                 AS titleP'
				,   'products.slug                  AS slugP'
				,   'products.image                 AS imageP'
				,   'modelo'
				,   'marca'
				,   'resumen'
				,   'precio'
				,   'products.image_rx              AS image_rxP'
				,   'products_categories.slug       AS slugC'
				,   'products_subcategories.id      AS idS'
				,   'products_subcategories.slug    AS slugS'
				,   'final_price'
				,   'discount'
			)
			-> where('promociones.slug', '=', $slugP)
			-> where('products_subcategories.slug', '=', $slugS)
			-> orderBy('products.id', 'DESC')
			-> paginate(18);

		$subc = array();
		foreach($entries AS $e => $entry)
		{
			if( !in_array($entry -> idS, $subc) )
				array_push( $subc, $entry -> idS );
		}
		
		$subcategories  = ProductSubcategories::select(
				'*'
			,   'products_categories.slug       AS slugC'
			,   'products_subcategories.id      AS idS'
			,   'products_subcategories.title   AS titleS'
			,   'products_subcategories.slug    AS slugS'
		)
		-> join(
				'products_categories'
			,   'products_subcategories.category_id', '=', 'products_categories.id'
		)
		-> whereIn('products_subcategories.id', $subc)
		-> get();

		$meta['titulo']         = $promocion -> title;
		$meta['descripcion']    = 'Promociones del mes';
		$meta['imagen']         = url('storage/' . $this -> folder . $promocion -> image);

		return view('frontend_v2.promociones-listado')
			->with([
					'meta'          => $meta
				,   'banners'       => 0
				,   'promos'        => $promos
				,   'promocion'     => $promocion
				,   'entries'       => $entries
				,   'subcategories' => $subcategories
				,   'entries'       => $entries
			]);
	}

	public function index()
	{
		if (Gate::allows('users.index'))
		{
			$entries = Promociones::withTrashed()
				-> orderBy('start', 'DESC')
				-> orderBy('end', 'DESC')
				-> paginate(100);

			return view('02_system.07_promociones.index')
				-> with('entries', $entries);
		}
	}

	public function create()
	{
		if (Gate::allows('users.create'))
		{
			return view('02_system.07_promociones.create');
		}
	}
	public function store(Request $request)
	{
		if (Gate::allows('users.create'))
		{
			//validate
			$request['slug']            = str_slug($request -> title);
			$this -> validate($request, [
					'title'             => 'required|string'
				,   'slug'              => 'required|string|unique:promociones'
				,   'imageF'            => 'required|image|mimes:jpeg,jpg,png|max:' . $this->max_size . '|dimensions:width=' . $this->width . ',height=' . $this->height
				,   'start'             => 'required|date|after_or_equal:' . Carbon::now() -> format ('Y-m-d')
				,   'end'               => 'required|date|after:' . Carbon::parse($request -> start) -> format('Y-m-d')
				,   'general_disc'      => 'required|boolean'
				,   'amount'            => 'nullable|numeric|required_if:general_disc,1'
				,   'type'              => 'required|string|in:$,%'
			]);
			//set image names
			$request['image']           = $this -> imageName($request -> file('imageF'), $request -> slug)['filename'];
			$thumbname                  = $this -> imageName($request -> file('imageF'), $request -> slug)['thumbname'];
			//store
			if( Promociones::create($request -> all()) )
			{
				$file   = Image::make( $request -> file('imageF') );
				Storage::put('public/' . $this -> folder . $request -> image, $file -> stream());

				$this->send['type']       = 'alert-success';
				$this->send['message']    = 'Registro guardado con éxito.';
			}
			else
			{
				$this->send['type']       = 'alert-danger';
				$this->send['message']    = 'Ocurrió un error al guardar el registro.';
				return  back()
					->withInput()
					->with('alert', $this->send);
			}
			return back()
				-> with('alert', $this -> send);
		}
	}

	public function edit($id)
	{
		if (Gate::allows('users.edit'))
		{
			$entry = Promociones::find( $id );

			return view('02_system.07_promociones.edit')
				-> with( 'entry', $entry );
		}
	}
	public function update(Request $request, $id)
	{
		if (Gate::allows('users.edit'))
		{
			$entry = Promociones::find($id);
			//validate
			$request['slug']            = str_slug($request -> title);
			$this -> validate($request, [
					'title'             => 'required|string'
				,   'slug'              => 'required|string|unique:promociones,slug,' . $id
				,   'image'             => 'nullable|image|mimes:jpeg,jpg,png|max:' . $this->max_size . '|dimensions:width=' . $this->width . ',height=' . $this->height
				,   'start'             => 'required|date|after_or_equal:' . $entry -> start
				,   'end'               => 'required|date|after:' . Carbon::parse($request -> start) -> format('Y-m-d')
				,   'general_disc'      => 'required|boolean'
				,   'amount'            => 'numeric|required_if:general_disc,==,1'
				,   'type'              => 'required|string|in:$,%'
			]);
			$entry -> title             = $request -> title;
			$entry -> slug              = $request -> slug;
			//set image names if has file
			if (Input::hasFile('image')) {
				$entry -> image         = $this -> imageName($request -> file('image'), $request -> slug)['filename'];
				$thumbname              = $this -> imageName($request -> file('image'), $request -> slug)['thumbname'];
			}
			$entry -> start             = $request -> start;
			$entry -> end               = $request -> end;
			$entry -> general_disc      = $request -> general_disc;
			$entry -> amount            = $request -> amount;
			$entry -> type              = $request -> type;
			//store
			if( $entry -> save() )
			{
				if (Input::hasFile('image')) {
					$file   = Image::make( $request -> file('image') );
					Storage::put('public/' . $this -> folder . $entry -> image, $file -> stream());
				}
			}
			else{
				$this->send['type']       = 'alert-danger';
				$this->send['message']    = 'Ocurrió un error al editar el registro.';

				return  back()
					->withInput()
					->with('alert', $this->send);
			}

			return  redirect()
				-> route('promociones.index')
				-> with('alert', $this -> send);
		}
	}

	public function destroy($id)
	{
		if (Gate::allows('users.destroy'))
		{
			$entry = Promociones::find($id);

			if ($entry -> delete()) {
				$this -> send['type']       = 'alert-success';
				$this -> send['message']    = 'Registro eliminado con éxito.';
			} else {
				$this ->send['type']       = 'alert-danger';
				$this -> send['message']    = 'Ocurrió un error al eliminar el registro.';
			}

			return  redirect()
				->route('promociones.index')
				->with('alert', $this->send);
		}
	}
	public function restore($id)
	{
		if (Gate::allows('users.destroy')) {
			if (Promociones::withTrashed() -> where('id', $id) -> restore()) {
				$this->send['type']       = 'alert-success';
				$this->send['message']    = 'Registro restaurado con éxito.';
			} else {
				$this->send['type']       = 'alert-danger';
				$this->send['message']    = 'Ocurrió un error al restaurar el registro.';
			}

			return  redirect()
				->route('promociones.index')
				->with('alert', $this->send);
		}
		return view('02_system.unauthorized');
	}

	public function add( $id )
	{
		if (Gate::allows('users.index')) {
			
			$brandlist  = Product::select('marca') -> groupBy('marca') -> get();

			$promocion  = Promociones::find( $id );
			$productos_ids  = array();
			$final_prices   = array();
			foreach($promocion -> productsInPromos AS $s => $t)
			{
				$productos_ids[] = $t -> producto_id;
				$final_prices[$t -> producto_id] = $t -> final_price;
			}
			$entries    = Product::join(
							'products_categories'
						,   'products_categories.id', '=', 'products.category_id'
					)
					-> join(
							'products_subcategories'
						,   'products_subcategories.id', '=', 'products.subcategory_id')
					-> select(
						'*'
					,   'products.id                    AS idP'
					,   'products.title                 AS titleP'
					,   'products.image                 AS imageP'
					,   'products.image_rx              AS image_rxP'
					,   'products_categories.title      AS titleC'
					,   'products_subcategories.title   AS titleS'
				)
				-> where(function($query){
					if( isset($_GET['marca']) && $_GET['marca'] != '*ALL*' )
					{
						$query -> where('products.marca', $_GET['marca']);
					}
				})
				-> orderBy('idP', 'DESC')
				-> get();

			return  view('02_system.07_promociones.add')
				->with([
						'brands'        => $brandlist
					,   'promocion'     => $promocion
					,   'entries'       => $entries
					,   'productos_ids' => $productos_ids
					,   'final_prices'  => $final_prices
				]);
		}
	}
	public function addStore(Request $request, $id)
	{
		$insert = array();
		$updlst = array();
		$inplst = array();
		$dltlst = array();
		$log    = '';
		
		foreach($request -> inPromo AS $i => $in)
		{
			$inplst[] = $i;
			if($request -> precioPromo[$i] > 0)
			{
				if( PromocionesProductos::where('promocion_id', $id) -> where('producto_id', $i) -> count() > 0 )
				{
					$updlst[]   = $i;
					$log .= "El producto $i tiene que actualizar su precio.<br>";
				}
				else {
						$insert[] = [
							'promocion_id'  => $id
						,   'producto_id'   => $i
						,   'dtype'         => $request -> discount_type
						,   'final_price'   => (float)$request -> precioPromo[$i]
						,   'discount'      => $request -> precio[$i] - $request -> precioPromo[$i]
					];
					$log .= "El producto $i se agregó a la cadena de inserción.<br>";
				}
			}
		}

		foreach($request -> idProd AS $i => $in)
		{
			if( !in_array( $in, $inplst) )
			{
				$dltlst[] = $in;
			}
		}

		$inserted = PromocionesProductos::where('promocion_id', $id)
			-> get();
		foreach($inserted AS $i => $in)
		{
			if( in_array($in -> producto_id, $updlst) )
			{
				$insert[] = [
						'promocion_id'  => $id
					,   'producto_id'   => $in -> producto_id
					,   'dtype'         => $request -> discount_type
					,   'final_price'   => (float)$request -> precioPromo[$in -> producto_id]
					,   'discount'      => $request -> precio[$in -> producto_id] - $request -> precioPromo[$in -> producto_id]
				];
				$log .= "El producto ".$in -> producto_id." se agregó a la cadena de inserción (SE ACTUALIZÓ SU PRECIO DE PROMOCIÓN).<br>";
			}
			else
			{
				if( !in_array($in -> producto_id, $dltlst) )
				{
					$insert[] = [
							'promocion_id'  => $id
						,   'producto_id'   => $in -> producto_id
						,   'dtype'         => $in -> dtype
						,   'final_price'   => $in -> final_price
						,   'discount'      => $in -> discount
					];
					$log .= "El producto ".$in -> producto_id." se agregó a la cadena de inserción.<br>";
				}
				else {
					$log .= "El producto ".$in -> producto_id." se eliminó de la inserción.<br>";
				}
			}
		}
		//echo $log;
		
		PromocionesProductos::where('promocion_id', '=', $id)
			-> delete();

		if( PromocionesProductos::insert( $insert ) )
		{
			$this->send['type']       = 'alert-success';
			$this->send['message']    = 'Promoción actualizada con éxito.';
		}
		else
		{
			$this->send['type']       = 'alert-danger';
			$this->send['message']    = 'Ocurrió un error al actualizar la promoción.';
			
		}
		return  back()
			->with('alert', $this->send);
	}
}
