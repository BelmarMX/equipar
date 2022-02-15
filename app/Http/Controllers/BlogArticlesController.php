<?php

namespace App\Http\Controllers;

use Gate;
use Image;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Storage;

use App\BlogArticles;
use App\BlogCategories;

class BlogArticlesController extends BaseDashboard
{
    private $send;
    private $folder;
    private $width;
    private $height;
    private $width_rx;
    private $height_rx;
    private $max_size;

    public function __construct()
    {
        parent::__construct();
        $this -> send       = array();
        $this -> folder     = env('ARTICLE_FOLDER');
        $this -> width      = env('ARTICLE_WIDTH');
        $this -> height     = env('ARTICLE_HEIGHT');
        $this -> width_rx   = env('ARTICLE_RX_WIDTH');
        $this -> height_rx  = env('ARTICLE_RX_HEIGHT');
        $this -> max_size   = env('FILE_MAX_SIZE');
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | View
    --- --- --- --- --- --- --- --- --- --- */
    public function view()
    {
        $banners    = $this->viewBanners();
        $categories = BlogCategories::orderBy('title', 'ASC')
                    -> get();
        $articles   = BlogArticles::select(
                    '*'
                ,   'blog_articles.id       AS idA'
                ,   'blog_articles.title    AS titleA'
                ,   'blog_articles.slug     AS slugA'
                ,   'blog_categories.id     AS idC'
                ,   'blog_categories.title  AS titleC'
                ,   'blog_categories.slug   AS slugC'
            )
            -> join(
                    'blog_categories'
                ,   'blog_articles.category_id', '=', 'blog_categories.id'
            )
            -> orderBy('publish', 'DESC')
            -> orderBy('idA', 'DESC')
            -> where('publish', '<=', Carbon::now() )
            -> paginate(10);

        $meta['titulo']         = 'Blog de noticias';
        $meta['descripcion']    = 'Descubra aquí nuevas noticias y tips para llevar una excelente alimentación en su espacio de trabajo.';
        $meta['imagen']         = asset('images/template/bn-blog.jpg');

        return  view('frontend_v2.blog')
                -> with([
                        'meta'          => $meta
                    ,   'banners'       => 0
                    ,   'categories'    => $categories
                    ,   'articles'      => $articles
                ]);
    }
    public function filter($slug)
    {
        $banners    = $this->viewBanners();
        $categories = BlogCategories::orderBy('title', 'ASC')
                    -> get();
        $articles   = BlogArticles::select(
                    '*'
                ,   'blog_articles.id       AS idA'
                ,   'blog_articles.title    AS titleA'
                ,   'blog_articles.slug     AS slugA'
                ,   'blog_categories.id     AS idC'
                ,   'blog_categories.title  AS titleC'
                ,   'blog_categories.slug   AS slugC'
            )
            -> join(
                    'blog_categories'
                ,   'blog_articles.category_id', '=', 'blog_categories.id'
            )
            -> orderBy('publish', 'DESC')
            -> orderBy('idA', 'DESC')
            -> where('publish', '<=', Carbon::now() )
            -> where('blog_categories.slug', '=', $slug)
            -> paginate(10);

        $meta['titulo']         = 'Articulos del blog en la categoría X';
        $meta['descripcion']    = 'Descubra aquí nuevas noticias y tips para llevar una excelente alimentación en su espacio de trabajo.';
        $meta['imagen']         = asset('images/template/blog.jpg');

        return  view('frontend_v2.blog')
                -> with([
                        'meta'          => $meta
                    ,   'banners'       => 0
                    ,   'categories'    => $categories
                    ,   'articles'      => $articles
                ]);
    }
    public function show($slug_category, $slug_article)
    {
        $banners    = $this->viewBanners();
        $categories = BlogCategories::orderBy('title', 'ASC')
                    -> get();
        $article    = BlogArticles::select(
                    '*'
                ,   'blog_articles.id       AS idA'
                ,   'blog_articles.title    AS titleA'
                ,   'blog_articles.slug     AS slugA'
                ,   'blog_categories.id     AS idC'
                ,   'blog_categories.title  AS titleC'
                ,   'blog_categories.slug   AS slugC'
            )
            -> join(
                    'blog_categories'
                ,   'blog_articles.category_id', '=', 'blog_categories.id'
            )
            -> orderBy('publish', 'DESC')
            -> orderBy('idA', 'DESC')
            -> where('publish', '<=', Carbon::now() )
            -> where('blog_categories.slug', '=', $slug_category)
            -> where('blog_articles.slug', '=', $slug_article)
            -> first();

        $meta['titulo']         = $article -> titleA;
        $meta['descripcion']    = $article -> shortdesc;
        $meta['imagen']         = url('storage/' . $this -> folder . $article -> image);

        return  view('frontend_v2.blog-open')
                -> with([
                        'meta'          => $meta
                    ,   'banners'       => 0
                    ,   'categories'    => $categories
                    ,   'article'       => $article
                ]);
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Index
    --- --- --- --- --- --- --- --- --- --- */
    public function index()
    {
        if(Gate::allows('users.index'))
        {
            $entries    = BlogArticles::withTrashed()
                        -> orderBy('id', 'DESC')
                        -> paginate(100);
            $categories = BlogCategories::orderBy('id', 'ASC')
                        -> get();
            $category   = array();
            foreach ($categories as $value) {
                $category[$value -> id] = $value -> title;
            }

            return  view('02_system.04_blog-articles.index')
                    -> with([
                                'entries'   => $entries
                            ,   'category'  => $category
                            ,   'month'     => $this -> months
                        ]);
        }
            return view('02_system.unauthorized');
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Create
    --- --- --- --- --- --- --- --- --- --- */
    public function create()
    {
        if(Gate::allows('users.create'))
        {
            $categories     = BlogCategories::orderBy('title', 'ASC')
                            -> get();
            if (count($categories) == 0) {
                return view('02_system.isVoid')
                    ->with([
                        'actions' => [
                            'Tienes que dar de alta una categoría'
                        ]
                    ]);
            }

            return  view('02_system.04_blog-articles.create')
                    -> with([
                            'categories'    => $categories
                    ]);
        }
            return view('02_system.unauthorized');
    }
    public function store( Request $request )
    {
        if(Gate::allows('users.create'))
        {
            // Validate
            $request['slug']    = str_slug( $request -> title );
            $this -> validate( $request, [
                    'category_id'   => 'required|int|exists:blog_categories,id'
                ,   'title'         => 'required|string'
                ,   'slug'          => 'required|string|unique:blog_articles'
                ,   'publish'       => 'required|date'
                ,   'image'         => 'required|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:width='.$this -> width.',height='.$this -> height
                ,   'image_rx'      => 'nullable'
                ,   'shortdesc'     => 'required|string'
                ,   'content'       => 'required'
            ]);

            $time       = time();
            $original   = request() -> file('image') -> getClientOriginalName();
            $ext        = pathinfo($original, PATHINFO_EXTENSION);
            $file_name  = $request -> slug . '-' . time() . '-' . $time . '.' . $ext;
            $thumb_name = $request -> slug . '-' . time() . '-' . $time . '-thumbnail.' . $ext;

            // Create
            if( $id = BlogArticles::create([
                    'category_id'   => $request -> category_id
                ,   'title'         => $request -> title
                ,   'slug'          => $request -> slug
                ,   'publish'       => $request -> publish
                ,   'image'         => $file_name
                ,   'image_rx'      => $thumb_name
                ,   'shortdesc'     => $request -> shortdesc
                ,   'content'       => $request -> content
            ]) )
            {
                $file   = Image::make( $request -> file('image') );
                Storage::put( 'public/' . $this -> folder . $file_name, $file -> stream() );

                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro guardado con éxito.';
                return  redirect()
                        -> route('blog-articles.trim', $id)
                        -> with('alert', $this -> send);
            }
            else
            {
                $this -> send['type']       = 'alert-danger';
                $this -> send['message']    = 'Ocurrió un error al guardar el registro.';

                return  back()
                        -> withInput()
                        -> with('alert', $this -> send);
            }

            return  back()
                    -> with('alert', $this -> send);
        }
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Update
    --- --- --- --- --- --- --- --- --- --- */
    public function edit($id)
    {
        if(Gate::allows('users.edit'))
        {
            $entry          = BlogArticles::find($id);
            $categories     = BlogCategories::orderBy('title', 'ASC')
                            -> get();

            return  view('02_system.04_blog-articles.edit')
                    -> with([
                            'entry'         => $entry
                        ,   'categories'    => $categories
                        ,   'id'            => $id
                    ]);
        }
            return view('02_system.unauthorized');
    }
    public function update( Request $request, $id )
    {
        if(Gate::allows('users.edit'))
        {
            // Validate
            $request['slug']    = str_slug( $request -> title );
            $this -> validate( $request, [
                    'category_id'   => 'required|int|exists:blog_categories,id'
                ,   'title'         => 'required|string'
                ,   'slug'          => 'required|string|unique:blog_articles,slug,'.$id
                ,   'publish'       => 'required|date'
                ,   'image'         => 'nullable|file|image|mimes:jpeg,jpg,png|max:'.$this -> max_size.'|dimensions:width='.$this -> width.',height='.$this -> height
                ,   'image_rx'      => 'nullable'
                ,   'shortdesc'     => 'required|string'
                ,   'content'       => 'required'
            ]);

            // Update
            $entry = BlogArticles::find($id);
            $entry -> category_id   = $request -> category_id;
            $entry -> title         = $request -> title;
            $entry -> slug          = $request -> slug;
            $entry -> publish       = $request -> publish;
            if( Input::hasFile('image') ){
                $original           = request() -> file('image') -> getClientOriginalName();
                $ext                = pathinfo($original, PATHINFO_EXTENSION);
                $tmp_image          = $entry -> image;
                $tmp_image_rx       = $entry -> image_rx;
                $entry -> image     = $request -> slug . '-' . time() . '.' . $ext;
                $entry -> image_rx  = $request -> slug . '-' . time() . '-thumbnail.' . $ext;
            }
            $entry -> shortdesc     = $request -> shortdesc;
            $entry -> content       = $request -> content;

            if( $entry -> save() )
            {
                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro editado con éxito.';

                if( Input::hasFile('image') ){
                    $file   = Image::make( $request -> file('image') );
                    Storage::delete([
                            'public/' . $this -> folder . $tmp_image
                        ,   'public/' . $this -> folder . $tmp_image_rx
                    ]);
                    Storage::put( 'public/' . $this -> folder . $entry -> image, $file -> stream() );

                    return  redirect()
                            -> route('blog-articles.trim', $id)
                            -> with('alert', $this -> send);
                }
                return  redirect()
                        -> route('blog-articles.index')
                        -> with('alert', $this -> send);
            }
            else
            {
                $this -> send['type']       = 'alert-danger';
                $this -> send['message']    = 'Ocurrió un error al editar el registro.';

                return  back()
                        -> withInput()
                        -> with('alert', $this -> send);
            }

            return  redirect()
                    -> route('blog-articles.index')
                    -> with('alert', $this -> send);
        }
    }

    /* --- --- --- --- --- --- --- --- --- ---
    | Destroy
    --- --- --- --- --- --- --- --- --- --- */
    public function destroy( $id )
    {
        if(Gate::allows('users.destroy'))
        {
            $entry = BlogArticles::find($id);

            if( $entry -> delete() )
            {
                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro eliminado con éxito.';
            }
            else
            {
                $this -> send['type']       = 'alert-danger';
                $this -> send['message']    = 'Ocurrió un error al eliminar el registro.';
            }

            return  redirect()
                    -> route('blog-articles.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
    public function restore( $id )
    {
        if(Gate::allows('users.destroy'))
        {
            if( BlogArticles::withTrashed() -> where('id', $id) -> restore() )
            {
                $this -> send['type']       = 'alert-success';
                $this -> send['message']    = 'Registro restaurado con éxito.';
            }
            else
            {
                $this -> send['type']       = 'alert-danger';
                $this -> send['message']    = 'Ocurrió un error al restaurar el registro.';
            }

            return  redirect()
                    -> route('blog-articles.index')
                    -> with('alert', $this -> send);
        }
            return view('02_system.unauthorized');
    }
    /* --- --- --- --- --- --- --- --- --- ---
    | Trim
    --- --- --- --- --- --- --- --- --- --- */
    public function trim( $id )
    {
        if(Gate::allows('users.trim'))
        {
            $entry      = BlogArticles::find($id);
            $image      = url( 'storage/' . $this -> folder . $entry -> image );
            list($width, $height) = getimagesize($image);

            $opciones = array(
                    'tipo'          => 'blog-articles'
                ,   'id'            => $entry -> id
                ,   'ruta'          => $image
                ,   'width'         => $width
                ,   'height'        => $height
                ,   'cut_width'     => $this -> width_rx
                ,   'cut_height'    => $this -> height_rx
            );
            return view('02_system.trimmer') -> with('opciones', $opciones);
        }
            return view('02_system.unauthorized');
    }
}
