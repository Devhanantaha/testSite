<?php

namespace App\Http\Controllers\Site;
use Cart ;
use App\Models\Condition ;
use Illuminate\Http\Request;
use App\Http\Controllers\BaseController;

class ConditionController extends BaseController
{
     public function index()
    {

        if(request()->ajax())
        {
            $items = [];

            \Cart::getContent()->each(function($item) use (&$items)
            {
                $items[] = $item;
            });

            return response(array(
                'success' => true,
                'data' => $items,
                'message' => 'cart get items success'
            ),200,[]);
        }
        else
        {
            $coupons = Condition::all();
            return view('admin.coupons.index', compact('coupons'));
        }
    }

    public function edit($id)
    {

        $coupon = Condition::find($id);
        return view('admin.coupons.edit', compact('coupon'));
    }

	public function store(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'target'      =>  'required',
        ]);

        $coupon = New Condition;
		$coupon->name = $request->name ; 
		$coupon->type = 'sale' ; 
		$coupon->target = $request->target ; 
		$coupon->is_cond = $request->is_cond ; 
		$coupon->equality = $request->equality ; 
		$coupon->cond = $request->cond ; 
		$coupon->cond_value = $request->cond_value ; 
		$coupon->value = $request->value ; 
		$coupon->save();
		
        if (!$coupon) {
            return $this->responseRedirectBack('Error occurred while creating coupon.', 'error', true, true);
        }
        return $this->responseRedirect('admin.coupons.index', 'coupon added successfully' ,'success',false, false);
    }
    public function update(Request $request)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'target'      =>  'required',
        ]);

        $coupon = Condition::find($request->id);
		$coupon->name = $request->name ; 
		$coupon->type = 'sale' ; 
		$coupon->target = $request->target ; 
		$coupon->is_cond = $request->is_cond ; 
		$coupon->equality = $request->equality ; 
		$coupon->cond = $request->cond ; 
		$coupon->cond_value = $request->cond_value ; 
		$coupon->value = $request->value ; 
		$coupon->save();
		
        if (!$coupon) {
            return $this->responseRedirectBack('Error occurred while updating coupon.', 'error', true, true);
        }
        return $this->responseRedirect('admin.coupons.index', 'coupon updated successfully' ,'success',false, false);
    }
    public function addCondition()
    {
        $cartConditions = Cart::getConditions();
        //dd( $cartConditions);
        /** @var \Illuminate\Validation\Validator $v */
        $v = validator(request()->all(),[
            'name' => 'required|string',
        ]);

        if($v->fails())
        {
            return response(array(
                'success' => false,
                'data' => [],
                'message' => $v->errors()->first()
            ),400,[]);
        }
$con = Condition::where('name' , request('name') )->firstOrFail();
if(!$con){
    return back()->with('error' , 'Not found');
}
if($con->is_cond){
    if($con->cond == 'cart-total'){
        $cart_total = \Cart::getTotal();
        if($con->equality == '>='){
           if(!$cart_total > $con->cond_value){

           return back()->with('error' , 'not allowed');
           }
        }elseif($con->equality == '=='){
            if(!$cart_total == $con->cond_value){
 
            return back()->with('error' , 'not allowed');
            }

        }elseif($con->equality == '<='){
            if(!$cart_total < $con->cond_value){
 
            return back()->with('error' , 'not allowed');
            }

        }
    }elseif($con->cond == 'pr-sku'){
        $productf = \App\Models\Product::where('sku' , $con->cond_value)->firstOrFail() ;
        $name = $con->name ;
        $type = $con->type ;
        $target = $con->target ;
        $value = $con->value ;

        $coupon = new  \Darryldecode\Cart\CartCondition(array(
            'name' =>  $name,
            'type' => 'coupon',
            'value' => $value ,
        ));
        $cartcontent = \Cart::getContent() ; 
       foreach($cartcontent as $item){
           if($item->associatedModel->id == $productf->id){
           Cart::removeItemCondition($item->id , $name);
           Cart::addItemCondition($item->id , $coupon);            
            return back()->with('success'  , 'Coupon Applied') ;
           }
       }
       
       return back()->with('error'  , 'Not Allowed') ;
    }elseif($con->cond == 'cart-qty'){
        
        $cartTotalQuantity = Cart::getTotalQuantity();
        if($con->equality == '>='){
            if(!$cartTotalQuantity > $con->cond_value){ 
                
            return back()->with('error' , 'not allowed');
            }
         }elseif($con->equality == '=='){
             if(!$cartTotalQuantity == $con->cond_value){
  
             return back()->with('error' , 'not allowed');
             }
 
         }elseif($con->equality == '<='){
             if(!$cartTotalQuantity < $con->cond_value){
  
             return back()->with('error' , 'not allowed');
             }
 
         }

    }
    else{
        return back() ; 
    }
     
}
        $name = $con->name ;
        $type = $con->type ;
        $target = $con->target ;
        $value = $con->value ;

        $cartCondition = new \Darryldecode\Cart\CartCondition([
            'name' => $name,
            'type' => $type,
            'target' => $target, // this condition will be applied to cart's subtotal when getSubTotal() is called.
            'value' => $value,
            'attributes' => array()
        ]);

        \Cart::condition($cartCondition);
        return back()->with('success' , 'Coupon Applied');
    }

    public function clearCartConditions()
    {

        \Cart::clearCartConditions();

        return response(array(
            'success' => true,
            'data' => [],
            'message' => "cart conditions cleared."
        ),200,[]);
    }

    public function delete($id)
    {

      $coupon = \Cart::remove($id);

        if (!$coupon) {
            return $this->responseRedirectBack('Error occurred while Deleting coupon.', 'error', true, true);
        }
        return $this->responseRedirect('admin.coupons.index', 'coupon deleting successfully' ,'success',false, false);
    }
    public function removeCondition($name)
    {

      $remove = Cart::removeCartCondition($name) ;

       
        return back()->with('success','success');
    }
    
    public function removeItemCondition($id , $name)
    {

     
        Cart::removeItemCondition($id , $name);

       
        return back()->with('success','success');
    }

    public function details()
    {

        // get subtotal applied condition amount
        $conditions = \Cart::getConditions();


        // get conditions that are applied to cart sub totals
        $subTotalConditions = $conditions->filter(function (CartCondition $condition) {
            return $condition->getTarget() == 'subtotal';
        })->map(function(CartCondition $c)  {
            return [
                'name' => $c->getName(),
                'type' => $c->getType(),
                'target' => $c->getTarget(),
                'value' => $c->getValue(),
            ];
        });

        // get conditions that are applied to cart totals
        $totalConditions = $conditions->filter(function (CartCondition $condition) {
            return $condition->getTarget() == 'total';
        })->map(function(CartCondition $c) {
            return [
                'name' => $c->getName(),
                'type' => $c->getType(),
                'target' => $c->getTarget(),
                'value' => $c->getValue(),
            ];
        });

        return response(array(
            'success' => true,
            'data' => array(
                'total_quantity' => \Cart::getTotalQuantity(),
                'sub_total' => \Cart::getSubTotal(),
                'total' => \Cart::getTotal(),
                'cart_sub_total_conditions_count' => $subTotalConditions->count(),
                'cart_total_conditions_count' => $totalConditions->count(),
            ),
            'message' => "Get cart details success."
        ),200,[]);
    }
}
