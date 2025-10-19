<?php

namespace App\Http\Controllers\Site;

use App\Models\Product;

use Mail;
use App\Mail\SendRFQRequestEmailAdmin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class RfqController extends Controller
{
    public function index($lang=null)
    {
				
            $rfq = app('rfq');
			$rfq_content = $rfq->getContent() ;
            $shippings = \App\Models\Shipping::get();        
            $cartconditions = \Cart::getConditions();
            $cats = \App\Models\Category::all();
			
			if($lang=='ar'){
                return view('site.pages.ar.rfq',compact('rfq_content','shippings','cartconditions','cats'));

            }
            return view('site.pages.rfq', compact('rfq_content','shippings','cartconditions','cats'));
        
    }

    public function rfqdetails($lang=null)
    {
				
			
			if($lang=='ar'){
                return view('site.pages.ar.rfqdetails',compact('rfq_content','shippings','cartconditions','cats'));

            }
            return view('site.pages.rfqdetails', compact('rfq_content','shippings','cartconditions','cats'));
        
    }
    public function rfqrequest(Request $request , $lang=null)
    {
        $this->validate($request, [
            'name'      =>  'required|max:191',
            'address'      =>  'required|max:191',
            'phone'      =>  'required|max:191',
	]);
        $rfq = app('rfq');
        $name = $request['name'];
        $email = $request['email'];
        $address = $request['address'];
        $phone = $request['phone'];
        $notes = $request['notes'];
        $cart = $rfq->getContent();
		$adminMail =  config('settings.default_email_address') ;	
        Mail::to($adminMail)->send( new SendRFQRequestEmailAdmin($cart, $name , $email , $address , $phone , $notes));
        $rfq->clear();
        return response()->json([
			'status' => true,
			'content' => "<h3 class='text-center' style='padding:100px'>Thanks . Your Request was delivered , We Will contact you soon</h3>"
		]);
        return back()->with('success', 'Your Request was delivered , We Will contact you soon');
    }
    public function add()
    {
		//dd(request('id'));
		
        $wish_list = app('rfq');
        $id = request('productId');
		$product = Product::find($id);
        $name = $product->name;
        $price = $product->price;
        $qty = request('quantity');
        $wish_list->add($id, $name, $price, $qty, array())->associate($product);
		
		$cl_content = $wish_list->getContent()->count();
		 return response(array(
                'success' => true,
                'rfqcount' => $cl_content ,
                'message' => '<div class="funio-product-added" id="added"><div class="added-message">RFQ addded item success!</div></div>'
            ),200,[]);
	 

	 

       
    }
	public function updateRFQ(Request $request)
    {
        $rfq = app('rfq');
			 foreach($request['qty'] as $q => $qty){
				foreach($request['id'] as $i =>$id){
						if($q == $i){							
							$pr = $rfq->get($id);
							if($pr->associatedModel->quantity >= $qty){
						   $rfq->update($id, array(
							  'quantity' => array(
								  'relative' => false,
								  'value' => $qty
							  ),
							));
								
							}
						
						}
				}
			}
				 
		
	
        return redirect()->back()->with('success', 'RFQ Updated successfully.');
    }
    public function delete($id)
    {
		
        $wish_list = app('rfq');
        $wish_list->remove($id);
				 
			


        return back()->with('success' , "Removed from RFQ");
    }
	 public function deletewithaddtocart($id)
    {
        $wish_list = app('rfq');
		
        $wish_list->remove($id);
				 
			


        return ('deleted');
    }

    public function details()
    {
        $wish_list = app('rfq');

        return response(array(
            'success' => true,
            'data' => array(
                'total_quantity' => $wish_list->getTotalQuantity(),
                'sub_total' => $wish_list->getSubTotal(),
                'total' => $wish_list->getTotal(),
            ),
            'message' => "Get RFQ details success."
        ),200,[]);
    }
}
