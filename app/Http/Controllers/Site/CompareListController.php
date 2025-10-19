<?php

namespace App\Http\Controllers\Site;

use App\Http\Controllers\Controller;

use App\Models\Product;
class CompareListController extends Controller
{
    public function index($lang=null)
    {
				
            $wish_list = app('comparelist');
			$cl_content = $wish_list->getContent() ;
			$rst = reset($cl_content);
			$cat = null ; 
			$catid = null ; 
			if($cl_content->count() > 0){
		$catid = reset($rst)->associatedModel->categories[0]->id;
		$cat = \App\Models\Category::find($catid);
				
			}
			
			if($lang=='ar'){
                return view('site.pages.ar.comparelist', compact('wl_content', 'cat'));

            }
            return view('site.pages.comparelist', compact('cl_content', 'cat'));
        
    }
	 public function mobile()
    {
				
            $wish_list = app('comparelist');
            $wl_content = $wish_list->getContent() ;			
			
            return view('site.pages.wishlist-mobile', compact('wl_content'));
        
    }


    public function add()
    {
		//dd(request('id'));
		
        $wish_list = app('comparelist');
        $id = request('productId');
		$product = Product::find($id);
        $name = request('name');
        $price = request('price');
        $qty = request('quantity');
        $wish_list->add($id, $name, $price, $qty, array())->associate($product);
		$cl_content = $wish_list->getContent();
		$rst = reset($cl_content);
		$catid = reset($rst)->associatedModel->categories[0]->id;
		if($cl_content->count() > 0){
			foreach($cl_content as $cl){
				if($cl->associatedModel->categories[0]->id != $catid){
				 $wish_list->remove($id);
					return response(array(
					'success' => false,
					'message' => '<div class="funio-product-added" id="added"><div class="added-message">must be same category!</div></div>'
					),500,[]);
				}
			}
			
		}
		 return response(array(
                'success' => true,
                'comparecount' => $cl_content->count() ,
                'message' => '<div class="funio-product-added" id="added"><div class="added-message">Compare List addded item success!</div></div>'
            ),200,[]);
	 

	 

       
    }

    public function delete($id)
    {
		
        $wish_list = app('comparelist');
        $wish_list->remove($id);
				 
			


        return back()->with('success' , "Removed from Compare List");
    }
	 public function deletewithaddtocart($id)
    {
        $wish_list = app('comparelist');
		
        $wish_list->remove($id);
				 
			


        return ('deleted');
    }

    public function details()
    {
        $wish_list = app('comparelist');

        return response(array(
            'success' => true,
            'data' => array(
                'total_quantity' => $wish_list->getTotalQuantity(),
                'sub_total' => $wish_list->getSubTotal(),
                'total' => $wish_list->getTotal(),
            ),
            'message' => "Get comparelist details success."
        ),200,[]);
    }
}
