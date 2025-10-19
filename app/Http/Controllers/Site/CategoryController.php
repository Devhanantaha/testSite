<?php

namespace App\Http\Controllers\Site;

use App\Models\Category;
use App\Models\Currency;
use App\Models\Product;
use App\Models\Attribute;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Contracts\CategoryContract;
use App\Contracts\AttributeContract;

class CategoryController extends Controller
{
    protected $categoryRepository;
	protected $attributeRepository;

    public function __construct(CategoryContract $categoryRepository, AttributeContract $attributeRepository)
    {
        $this->categoryRepository = $categoryRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($slug , $lang= null)
    {
        $category = $this->categoryRepository->findBySlug($slug);
		if($lang == 'ar'){
			session()->put('local', 'ar');
			
           
		}else{
			
			session()->put('local', 'en');
            
           
		}
        return view('site.pages.category', compact('category'));
    }
	
	 public function show2(Request $request ,$slug , $lang= null)
    {
		$category = Category::where('slug' , $slug)->with('products')->first();
		
					if(\Session::has('currency')){	
					$sessionCurrency  = \Session::get('currency');					
					$currency = Currency::where('code', $sessionCurrency )->first();
					$currencyRate = $currency['rate'] ;
					$currencysymbol = $currency['symbol'] ;
					}else{
						
					$currencyRate = 1 ;
					$currencysymbol = 'L.E' ;
					}
		$featuredpro = Product::where('featured', 1)
						->orWhere('sale_price' , '>', 0)
						->orWhere('rating' , '>' ,4)
						->inRandomOrder()->limit(3)
						->get();	
		$brandsArr = array();
		foreach(\App\Models\Brand::all() as $brand){
			foreach($category->products as $product){
				if($product->brnd->name == $brand->name){
					array_push($brandsArr, $brand->id);

				}
			}
		}	
		$catbrands = \App\Models\Brand::whereIn('id' ,$brandsArr )->get();
		$attributes = $this->attributeRepository->listAttributes();
		$catsArr = array();
		foreach($category->attributes as $attribute){
			foreach($attribute->values as $attributeValue){
				foreach($category->products as $product){
					if(in_array($attributeValue->value, $product->attributes->pluck('value')->toArray())){
						array_push($catsArr, $attributeValue->id);
					}
				}
			}
		}	
		$attribvalues =  \App\Models\AttributeValue::whereIn('id' ,$catsArr )->get();
		$products = $category->products()->get();
		$minprice= round($products->min('price') / $currencyRate) ;
		$maxprice= round($products->max('price') / $currencyRate) ;
		if($lang == 'ar'){
			session()->put('local', 'ar');
		}else{
			session()->put('local', 'en');        
		}
        return view('site.pages.category2', compact('attribvalues','catbrands','category','attributes','featured','pagproducts','minprice', 'maxprice','featuredpro','currencyRate','currencysymbol'));
    }
	
		 public function set_currency()
    {
			$curr = $_GET["currency"]  ;				
			\Session(['currency' => $curr]);
			\Session(['currency' => $curr]);
			
    }
	
			 public function get_rate()
    {
					
					$sessionCurrency  = $_GET['active'];					
					$currency = Currency::where('code', $sessionCurrency )->first();
					$currencyRate = $currency['rate'] ;
					
			return $currencyRate ;
    }
	//change view type
	 public function getsess($cat , $lang= null)
    {
		
		if(\Session::has('currency')){
		$sessionCurrency  = \Session::get('currency');
		$currency = Currency::where('code', $sessionCurrency )->first();
		$currencyRate = $currency->rate ;
		$currencysymbol = $currency['symbol'] ;
//dd($currencyRate)	;	
		}else{
			$currencyRate = 1 ;			
			$currencysymbol = 'L.E' ;
		}
		$category = Category::where('slug' , $cat)->first();
		
		$cat = $cat ;
		//dd($_GET["items"]);
		$products = $category->products()->whereIn('sku',$_GET["items"])->get();
        
		$currsess = $_GET["type"];
		if(isset($currsess))
		{
			if ($currsess == "grid")
			{
				
				 \Session(['type' => 'list']);
				 $currsess = \Session::get('type');
				 if($lang == 'ar'){
					return view('site.pages.ar.fetch_data_list',compact('category','attributes','products', 'cat','currencyRate', 'currencysymbol'));
				 }
				return view('site.pages.fetch_data_list',compact('category','attributes','products', 'cat','currencyRate', 'currencysymbol'));
				
			}
			elseif($currsess == "list")
			{
				
				//echo ('grid');
				 \Session(['type' => 'grid']);
				 $currsess = \Session::get('type');
				 if($lang == 'ar'){
					return view('site.pages.ar.fetch_data',compact('category','attributes','products', 'cat','currencyRate', 'currencysymbol'));
				 }
		return view('site.pages.fetch_data',compact('category','attributes','products', 'cat','currencyRate', 'currencysymbol'));
				
			}
			
		}
    }
	 public function quickview($lang = null)
    {
		$product = Product::where('id', $_GET['product_id'])->first();
		if($lang == 'ar'){
			return view('site.pages.ar.quickview',compact('product'));

		}
		return view('site.pages.quickview',compact('product'));
		
	}
}
