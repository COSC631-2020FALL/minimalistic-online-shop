<?php

namespace App\Http\Controllers\

use Illuminate\Http\Request;

use Illuminate\Support\Facades\DB;
use App\Category;
use App\Product;



class CategoryController extends Controller
{
//$singleCategory->products
	public function getCategory($category) {
		$singleCategory = Category::find($category);
		return view('welcome', ['category' => $singleCategory]);
	}
	//public function categoriesCheck() {
		//$products = Product::paginate(15);
		//$categories = Categories::all();
		//return View::make('product.search', [
			//'categories' => $categories,
			//'product' => $products
		//]);
	//}	
	public function categoriesCheck( $categoryId ) 
	{
		$category = Categories::with('products')->findOrFail( $categoryId );
		return View::make('product.search', [ 'categories' => $category ]);
	}
    public function index()
    {
        $categories = Category::all();
		if (request()->category) {
			//$category_id = Category::with(id)->whereHas('categories', function ($query)
			$category_id = get_cat_ID(category);
			
            //$sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE slug like '%$name%' and category_id = $category" ) );
            $products = Product::with('categories')->->where('id', $category_id);
			$categories = Category::all();
        } else {
			$categories = Category::all();
			$products = Product::all();
		}
        return view('product.search', ['products' => $products, 'categories' => $categories]);
    }
		
    public function create()
    {
        return view('category.create');
    }
	
    public function store(Request $request)
    {
        $rules = [
            'name'=>'required|string|max:255',
        ];

        $this->validate($request, $rules);
        Category::create($request->all());
        
        return redirect()->route('categories.index');
    }  
	
    //public function show($category_id)
    //{
      //  $product = Product::where('category_id', $category_id)->firstOrFail();
        
       // return view('product')->with([
       //     'product' => $product,
       // ]);
    //}
    
    public function edit(Category $category)
    {
        return view('category.edit', ['category' => $category]);
    }

    public function update(Request $request, Category $category)
    {
      
        $rules = [
            'name'=>'required|string|max:255',
        ];
        $this->validate($request, $rules);
        $category->update($request->all());
		
        $category->save();
        
        return redirect()->route('categories.index');
    }

    public function destroy(Category $category)
    {   
		$category->delete();
		return redirect()->route('categories.index');
    }
	
    public function search(Request $r){
        $category ;
        $name ;
        if($r->query("c")){
            $category = $r->query("c");
        }
        if($r->query("n")){
            $name = $r->query("n");
        }
        $res = Product::all();
        $cat = Category::all();

        if(isset($category) && isset($name)){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" ) );
            //dd("SELECT * FROM `products` WHERE lower(name) like '%$name%' and category_id = $category" );
            //$a = 0;
        }
        else if(isset($name)){
            $name = strtolower($name);
            $sRes = DB::select( DB::raw("SELECT * FROM `products` WHERE lower(name) like '%$name%'" ) );
          //dd("SELECT * FROM `products` WHERE lower(name) like '%$name%'" );
           // $a = 1;
        }
        else if(isset($category)){
            $sRes = DB::table('products')
            ->where("category_id" , $category)
            ->get();
            //$a = 2;
        }
        else{
            $sRes = DB::table('products')
            ->get();
           // $a= 3;
        }

        if(!isset($category)) {
            $category = -1;
        }
        //dd($sRes);
    	return view('product.search')
            ->with('products', $sRes)
            ->with("cat", $cat)
            ->with("a", $category);
    }
}
