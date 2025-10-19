<?php

namespace App\Http\Controllers\Site;

use Cart;
use App\Models\Review;
use App\Models\Attribute;
use App\Models\Currency;
use Illuminate\Http\Request;
use App\Contracts\ProductContract;
use App\Http\Controllers\Controller;
use App\Contracts\AttributeContract;

class ProductController extends Controller
{
    protected $productRepository;

    protected $attributeRepository;

    public function __construct(ProductContract $productRepository, AttributeContract $attributeRepository)
    {
        $this->productRepository = $productRepository;
        $this->attributeRepository = $attributeRepository;
    }

    public function show($slug , $lang= null)
    {
        $product = $this->productRepository->findProductBySlug($slug);
        $attributes = $this->attributeRepository->listAttributes();
		$reviews = Review::where('status' , 1)->get();
		$related = \App\Models\Product::whereHas('categories', function($query) use($product) 
			{ 
				$query->where('name', $product->categories[0]['name']); 
			})->whereNotIn('id', [$product->id])->get();
			if($lang == 'ar'){
				session()->put('local', 'ar');
				$headingp = [
					'desc' => 'الوصف',
					'support' => 'الدعم',
					'downloadcatalog' => 'تحميل الكاتالوج',
					'related' => 'منتجات ذات صلة',
				];
			}else{
				session()->put('local', 'en');  
				$headingp = [
					'desc' => 'Description',
					'support' => 'Support',
					'downloadcatalog' => 'Download Catalouge',
					'related' => 'Related Products',
				]  ;    
			}
        return view('site.pages.product', compact('product', 'attributes','related','reviews','headingp'));
	}
	
	public function media($lang= null)
    {
		$media  = \App\Models\Blog::where('type' , 'media')->paginate(9); 
		
		if($lang == 'ar'){ 
				
			return view('site.pages.ar.media', compact('media'));
		}
	return view('site.pages.media', compact('media'));

	}
	
private $qty ;
    public function addToCartSingleItem(Request $request ,$lang = null)
    {
	//dd($request->all());
        //dd($request->all());
        $product = $this->productRepository->findProductById($request['productId']);
		$options = collect($request)->except(['_token', 'productId', 'price', 'quantity','action'])->toArray();	
		$price = $product->price ;		

		$attributes = Attribute::all();
		//product has attributes and attribs sent here
		if(array_key_exists('attributes',$options) && $product->attributes()->count() > 0 ){
				foreach($attributes as $attrib){
					foreach($product->attributes as $prattrib){
						if($attrib->id == $prattrib->attribute_id){
							if($attrib->is_required == 1 && $attrib->display == 1 && $attrib->frontend_type != "color"){
							
								if (!isset($options['attributes'][$attrib->code])){
									return back()->with('error' , $attrib->code .' Is Required' );
								}
								
							}
						}
						
					
					}
				}
				//if no variations
				if($product->variations->count() < 1  ){
					//dd( $options['attributes']);
					foreach($product->attributes as $prattrib){
						if (in_array($prattrib->value , $options['attributes']) && $prattrib->attribute->display == 1){
							if($prattrib->quantity < $request['quantity'] && $prattrib->attribute->display == 1 && $prattrib->attribute->frontend_type != "color" ){
								return back()->with('error' , 'Requested quantity not avilable no variations');
							}else{
							$price += $prattrib->price ;
							$this->attribqty = $prattrib->quantity ;
								
							}		
						}
					}	
				}else{
				//if  variations
					$attr = $options['attributes'] ; 
					foreach($product->variations as $prvar){
						$arr= array();
						foreach($prvar->variationoptions as $prvaroption ){
							array_push($arr,$prvaroption->attribute->value);
							
							
						}
							if (count(array_diff($arr,$attr))== 0) 
							{
								$price += $prvar->price ;
								$this->qty = $prvar->qty ;
							}
					}
					
					if($this->qty < 1 || $this->qty < $request['quantity'] ){
						return back()->with('error' , 'Requested quantity not avilable   variations');
					}					
				}
				if($product->attribs == 0 ){
					//dd('attribs');
					Cart::add($product->id, $product->name, $price ,$request['quantity'] , $options['attributes'] )->associate($product);
				}else{
					
					$uniq = $product->id;
					foreach($options['attributes'] as $key => $value){
						$uniq .= $value ; 
					}
					Cart::add($uniq, $product->name, $price ,$request['quantity'] , $options['attributes'] )->associate($product);					
				}
			
				//product dont has attribs and no attribs sent 	
		} elseif(!array_key_exists('attributes',$options) && $product->attributes()->count() < 1 && $product->quantity >= $request['quantity'] ){
			
				 Cart::add($product->id, $product->name, $price ,$request['quantity'] , $options )->associate($product);
				 $pr = Cart::get($product->id);
				 if($pr->quantity > $product->quantity){
					Cart::update($product->id, array(
						'quantity' => array(
							'relative' => false,
							'value' => $product->quantity
						),
					  )); 
					  
					  $added = '<div class="funio-product-added" id="added"><div class="added-message">max Quantity is:'  . $product->quantity.' </div></div>' ;
					  return compact('added' );
				 }
			
		} elseif ($product->quantity < $request['quantity']){
			return back()->with('error' , 'max Quantity is: ' . $product->quantity  );
			// product has  attributes  but not attribs
		}elseif(!array_key_exists('attributes',$options) && $product->attributes()->count() > 0 && $product->attribs == 0 ){
				$attribs = array();
				foreach($product->attributes as $prattrib){

					$attribs[$prattrib->attribute->name]= $prattrib->value;
				}
				Cart::add($product->id, $product->name, $price ,$request['quantity'] , $attribs )->associate($product);
		}else{
			dd('else');
		}
		if(\Session::has('currency')){
			$sessionCurrency  = \Session::get('currency');
			$currency = Currency::where('code', $sessionCurrency )->first();
			$currencyRate = $currency->rate ;
			$currencysymbol = $currency['symbol'] ;	
			}else{
				$currencyRate = 1 ;			
				$currencysymbol = 'L.E' ;
			}
		$cartCollection = Cart::getContent();
		if($cartCollection->count() > 0 ){
		foreach($cartCollection as $cc){
			if($cc->associatedModel->attribs != 1 && $cc->associatedModel->variations->count() < 1 && $cc->quantity > $cc->associatedModel->quantity){
			Cart::update($cc->id, array(
						'quantity' => array(
							'relative' => false,
							'value' => $cc->associatedModel->quantity
						),
					  ));
				
			} 
			if($cc->attributes->count() > 0 && $cc->associatedModel->attribs != 0 && $cc->associatedModel->variations->count() < 1){
				foreach($cc->attributes as $key => $t){
					$prattrib = \App\Models\ProductAttribute::where('value' , $t)->where('product_id' ,$cc->associatedModel->id )->first();
					if($prattrib){
						if($cc->quantity > $prattrib->quantity && $prattrib->attribute->display == 1 && $prattrib->attribute->frontend_type != "color"){
							Cart::update($cc->id, array(
							'quantity' => array(
								'relative' => false,
								'value' => $prattrib->quantity
							),
						  ));
							
						}

					}
					
					
				}				
			}

			if($cc->associatedModel->variations->count() > 0){
			$attr = $cc->attributes->toArray() ;
								foreach($cc->associatedModel->variations as $prvar){
									$arr= array();
									foreach($prvar->variationoptions as $prvaroption ){
										array_push($arr,$prvaroption->attribute->value);
										
										
									}
										if (count(array_diff($arr,$attr))== 0) 
										{
											$price += $prvar->price ;
											$this->qty = $prvar->qty ;
										}
								}				
					if($cc->quantity > $this->qty){
						Cart::update($cc->id, array(
						'quantity' => array(
							'relative' => false,
							'value' => $this->qty
						),
					  ));
						
					}			
			}			
		}
	}
		$carttotal =  number_format((float)Cart::getSubTotal() / $currencyRate, 2, '.', '')  ;
		$cartcount = Cart::getTotalQuantity();
			
		if($lang == 'en'){
			$added = '
		<p>Product added to cart </p>
									
		
		';

		}else{
			$added = '
			<p>Product added to cart </p>
									
		
		';
		}
		
			if($request->ajax()){ 
				return compact('cartcount', 'added','carttotal','minicart');
					
				}else{
					
				return back()->with('cartadded' , 1);
				}
		
		

        if($request->ajax()){ 
        return compact('cartcount', 'added','carttotal');
			
		}else{
			
        return back()->with('cartadded' , 1);
		}
    }
}
