<?php

namespace App\Http\Controllers\Site;

use Cart;

use App\Models\Shipping;
use App\Models\Order;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CartController extends Controller
{
    public function getCart($lang=null)
    {
        $shippings = Shipping::get();        
        $cartconditions = \Cart::getConditions();
      // dd($cartconditions);
			if($lang== 'ar'){
                
        return view('site.pages.ar.cart', compact('shippings','cartconditions'));
            }
        return view('site.pages.cart', compact('shippings','cartconditions'));
    }

    public function removeItem($id)
    {
				 Cart::remove($id);
			

        if (Cart::isEmpty()) {
            return redirect('/');
        }
        return redirect()->back()->with('removed', 'Item removed from cart successfully.');
    }
	private $qty ;
  public function update(Request $request)
    {
		foreach($request['qty'] as $q => $qty){
			foreach($request['id'] as $i =>$id){
					if($q == $i){							
						$pr = Cart::get($id);
					   Cart::update($id, array(
						  'quantity' => array(
							  'relative' => false,
							  'value' => $qty
						  ),
						));								
						if($pr->attributes->count() > 0){ 
						//dd('attribute count');
								if($pr->associatedModel->variations->count() > 0){
									//dd('variation count');
									$attr = $pr->attributes->toArray() ;
									foreach($pr->associatedModel->variations as $prvar){
									$arr= array();
									foreach($prvar->variationoptions as $prvaroption ){
										array_push($arr,$prvaroption->attribute->value);
										
										
									}
										if (count(array_diff($arr,$attr))== 0) 
										{
											$this->qty = $prvar->qty ;
											//dd($prvar);
										}
									}
									if($pr->quantity > $this->qty){
										Cart::update($id, array(
										'quantity' => array(
											'relative' => false,
											'value' => $this->qty
										),
									  ));
										
									}
								}else{									
									foreach($pr->attributes as $key => $t){
										if(!is_null($t)){
										$prattrib = \App\Models\ProductAttribute::where('value' , $t)->where('product_id' ,$pr->associatedModel->id )->first();
										
										if($pr->quantity > $prattrib->quantity){
											
											Cart::update($id, array(
											'quantity' => array(
												'relative' => false,
												'value' => $prattrib->quantity
											),
										  ));
										  return redirect()->back()->with('error', 'Max QTY of ' . $pr->name .' ' .$t. ' is : ' .$prattrib->quantity );	
										}

										}
									
										
									}
								}
											
						}
					}
			}
		}
			 
	

	return redirect()->back()->with('success', 'Cart Updated successfully.');
	}
	

    public function clearCart()
    {
			Cart::clear();
				 
		

        return redirect('/');
    }
	
	
	 public function orderTracking($lang=null)
    {
        if($lang=="ar"){
            return view('site.pages.ar.order-tracking', compact('cart_content'));
        }
        return view('site.pages.order-tracking', compact('cart_content'));
    }
		 public function userOrderDetails($no)
    {
		$order = Order::where('order_number', $no)->first();
        return view('site.pages.order-tracking-show', compact('order'));
    }
	 public function orderTrackcheck(Request $request)
    {
        $order = Order::where('order_number', $request->orderid)->first();
        if($order){
            return view('site.pages.order-tracking-show', compact('order'));

        }
        else{
            return back()->with('error' , 'Invalid Order ID');
        }
    }
	public function retrn(Request $request){
		$order = \App\Models\Order::where('order_number' , $request->order)->first();
		if($order->user->email ==  $request->email){
		return view('site.pages.return-order', compact('order'));
			
		}else{
			return back()->with('error' , 'Order Not Found');
		}
	}
	
	public function retrnaction(Request $request){
			$input = $request->all();
			
			 dd(count($input['items']));
		
	}
}
