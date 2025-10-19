<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use App\Models\Product;
class WishListController extends Controller
{
    public function index($lang=null)
    {
				
            $wish_list = app('wishlist');
				 $wl_content = $wish_list->getContent() ;
			
			if($lang=='ar'){
                return view('site.pages.ar.wishlist', compact('wl_content'));

            }
            return view('site.pages.wishlist', compact('wl_content'));
        
    }
	 public function mobile()
    {
				
            $wish_list = app('wishlist');
            $wl_content = $wish_list->getContent() ;			
			
            return view('site.pages.wishlist-mobile', compact('wl_content'));
        
    }


    public function add()
    {
		//dd(request('id'));
		
        $wish_list = app('wishlist');
        $id = request('productId');
		$product = Product::find($id);
        $name = request('name');
        $price = request('price');
        $qty = request('quantity');
        $wish_list->add($id, $name, $price, $qty, array())->associate($product);
		
	
		$wishcount = $wish_list->getContent()->count();
		 return response(array(
                'success' => true,
                'wishcount' => $wishcount ,
                'message' => '<div class="funio-product-added" id="added"><div class="added-message">wishlist addded item success!</div></div>'
            ),200,[]);
	 

	 

       
    }

    public function delete($id)
    {
		
        $wish_list = app('wishlist');
        $wish_list->remove($id);
				 
			


        return back()->with('success' , "Removed from Wish List");
    }
	 public function deletewithaddtocart($id)
    {
		
        $wish_list = app('wishlist');
        $wish_list->remove($id);
				 
			


        return ('deleted');
    }

    public function details()
    {
        $wish_list = app('wishlist');

        return response(array(
            'success' => true,
            'data' => array(
                'total_quantity' => $wish_list->getTotalQuantity(),
                'sub_total' => $wish_list->getSubTotal(),
                'total' => $wish_list->getTotal(),
            ),
            'message' => "Get wishlist details success."
        ),200,[]);
    }
}
