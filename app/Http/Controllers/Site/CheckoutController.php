<?php

namespace App\Http\Controllers\Site;

use Cart;
use Mail;
use App\Mail\SendCheckOutEmailCustomer;
use App\Mail\SendCheckOutEmailAdmin;
use App\Models\Order;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Models\Shipping;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Services\PayPalService;
use App\Contracts\OrderContract;
use App\Http\Controllers\Controller;

class CheckoutController extends Controller
{
    protected $payPal;

    protected $orderRepository;

    public function __construct(OrderContract $orderRepository, PayPalService $payPal)
    {
        $this->payPal = $payPal;
        $this->orderRepository = $orderRepository;
    }

    public function getCheckout($lang=null)
    {
		$shippings = Shipping::get();
		
		$cartcondition = \Cart::getCondition('Shipping');
		if(!is_null ($cartcondition)){

			$condvalue = $cartcondition->getValue() ;
		}
		$cartconditions = \Cart::getConditions();
		$user_address_billing = Address::where('user_id' , \Auth::user()->id)
		->where('type', 'billing')
		->first();
		$user_address_shipping = Address::where('user_id' , \Auth::user()->id)
		->where('type', 'shipping')
		->first();
		if(!$user_address_billing){
			$address = New Address ;
			$address->user_id = \Auth::user()->id ;
			$address->first_name = \Auth::user()->	first_name ;
			$address->last_name = \Auth::user()->last_name ;
			$address->address = \Auth::user()->address ;
			$address->city = \Auth::user()->city ;
			$address->country = \Auth::user()->country ;
			$address->phone = \Auth::user()->phone ;
			$address->email =  \Auth::user()->email ;
			$address->type = 'billing' ;
			$address->save();
		}
		if(!$user_address_shipping){
			$address = New Address ;
			$address->user_id = \Auth::user()->id ;
			$address->first_name = \Auth::user()->	first_name ;
			$address->last_name = \Auth::user()->last_name ;
			$address->address = \Auth::user()->address ;
			$address->phone = \Auth::user()->phone ;
			$address->city = \Auth::user()->city ;
			$address->country = \Auth::user()->country ;
			$address->email =  \Auth::user()->email ;
			$address->type = 'shipping' ;
			$address->save();
		}
		
		$address = Address::where('user_id' , \Auth::user()->id)->first();
		//dd($address);
		$states = DB::table('states')->where('country_id', $address->country)->where('ship' , 1)
		->get();
		$countries = DB::table('countries')->where('ship' , 1)->get();
		if($lang == 'ar'){
			return view('site.pages.ar.checkout', compact('shippings','countries','states', 'address','states', 'cartconditions', 'condvalue'));

		}
        return view('site.pages.checkout', compact('shippings','countries','states', 'address','states','cartconditions','condvalue'));
    }
	 public function myAccount()
    {
		$shippings = Shipping::get();
		
		$address = Address::where('user_id' , \Auth::user()->id)
		->where('type', 'billing')
		->first();
		if(!$address){
			$address = New Address ;
			$address->user_id = \Auth::user()->id ;
			$address->first_name = \Auth::user()->	first_name ;
			$address->last_name = \Auth::user()->last_name ;
			$address->address = \Auth::user()->address ;
			$address->city = \Auth::user()->city ;
			$address->country = \Auth::user()->country ;
			$address->phone = \Auth::user()->phone ;
			$address->email =  \Auth::user()->email ;
			$address->type = 'billing' ;
			$address->save();
		}
		$city = DB::table('states')->where('id', $address->city)
		->first();
		$country = DB::table('countries')->where('id', $address->country)
		->first();
		$states = DB::table('states')->where('country_id', $address->country)
		->get();
		$countries = DB::table('countries')->get();
		
        return view('site.pages.checkout.myaccount', compact('shippings', 'address','city', 'country', 'countries', 'states'));
    }
	 public function orders()
    {
		$shippings = Shipping::get();
        return view('site.pages.checkout.orders', compact('shippings'));
    }
	 public function showAddress()
    {
		$user_address_billing = Address::where('user_id' , \Auth::user()->id)
		->where('type', 'billing')
		->first();
		$user_address_shipping = Address::where('user_id' , \Auth::user()->id)
		->where('type', 'shipping')
		->first();
		
        return view('site.pages.checkout.showaddress', compact('user_address_billing','user_address_shipping'));
    }
	 public function showAccount()
    {
		$shippings = Shipping::get();
        return view('site.pages.checkout.showaccount', compact('shippings'));
    }
	 public function editAddress()
    {
		$shippings = Shipping::get();
        return view('site.pages.checkout.editaddress', compact('shippings'));
    }
	 public function updateAddressBilling(Request $request)
    {
		$address = Address::where('user_id' , \Auth::user()->id)
		->where('type', 'billing')
		->first();
			$address->user_id = \Auth::user()->id;
			$address->first_name = $request->	first_name ;
			$address->last_name =$request->last_name ;
			$address->address = $request->address ;
			$address->city = $request->city ;
			$address->country = $request->country ;
			$address->company = $request->company ;
			$address->email = $request->email ;
			$address->phone = $request->phone ;
			$address->type = 'billing' ;
			$address->save();
			if($request->filled("new_password")  ){
				   $this->validate($request, [
					'old_password'     => 'required',
					'new_password'     => 'required|min:6',
					'confirm_password' => 'required|same:new_password',
				]);
				 if(!Hash::check($request['old_password'], $address->user->password)){
				 return back()
						->with('error','The specified password does not match the database password');
				}else{
				   $user = \App\Models\User::find(\Auth::user()->id);
				   $user->password = Hash::make($request['new_password']);
				   $user->save();				   
				}
			}
        return back()->with('success','Updated successfuly');
    }
	 public function updateAddressShipping(Request $request)
    {
		$address = Address::where('user_id' , \Auth::user()->id)
		->where('type', 'shipping')
		->first();
			$address->user_id = \Auth::user()->id ;
			$address->first_name = $request->	first_name ;
			$address->last_name =$request->last_name ;
			$address->address = $request->address ;
			$address->city = $request->city ;
			$address->country = $request->country ;
			$address->company = $request->company ;
			$address->email = $request->email ;
			$address->phone = $request->phone ;
			$address->type = 'shipping' ;
			$address->save();
        return redirect('/my-account/address/show');
    }
	 public function updateAddressBillingShow()
    {
		$address = Address::where('user_id' , \Auth::user()->id)
		->where('type', 'billing')
		->first();
		$states = DB::table('states')->where('country_id', $address->country)
		->get();
		$countries = DB::table('countries')->get();
        return view('site.pages.checkout.editbilling', compact('address','countries' ,'states'));
	}
	 public function updateAddressShippingShow()
    {
		
        return view('site.pages.checkout.editshipping', compact('shippings'));
	}
	 public function editAccount()
    {
		$shippings = Shipping::get();
        return view('site.pages.checkout.myaccount', compact('shippings'));
    }

    public function placeOrders(Request $request)
    {
		
		  $url = "https://test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
        "&amount=". $request -> price .
        "&currency=EUR" .
        "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $res = json_decode($responseData, true);
        $view = view('ajax.form')->with(['responseData' => $res , 'id' => $request -> offer_id])
            ->renderSections();

        return response()->json([
            'status' => true,
            'content' => $view['main']
        ]);


    
    }
    public function completes(Request $request)
    {
		if (request('id') && request('resourcePath')) {
             $payment_status = $this->getPaymentStatus(request('id'), request('resourcePath'));
			 
              if (isset($payment_status['id'])) { //success payment id -> transaction bank id
                  $showSuccessPaymentMessage = true;
					
                  //save order in orders table with transaction id  = $payment_status['id']
                
						$order = $this->orderRepository->storeOrderDetails($request->all());
						$order->payment_status = 1;
						$order->payment_method = 'visa';
						$order->save();
        $order = Order::latest()->first();
		//dd($order);
				return view('site.pages.success', compact('order'));
            } else {
                $showFailPaymentMessage = true;
				$order = $this->orderRepository->storeOrderDetails($request->all());
						$order->payment_status = 0;
						//$order->payment_method = $payment_status['paymentBrand'];
						$order->save();
        $order = Order::latest()->first();
		//dd($order);
                 return view('site.pages.success', compact('order'));
            }

        }
        $paymentId = $request->input('paymentId');
        $payerId = $request->input('PayerID');

        $status = $this->payPal->completePayment($paymentId, $payerId);

        $order = Order::where('order_number', $status['invoiceId'])->first();
        $order->status = 'processing';
        $order->payment_status = 1;
        $order->payment_method = $payment_status['paymentBrand'];
        $order->save();

		Cart::clear();
		\Cart::clearCartConditions();
        return view('site.pages.success', compact('order'));
    }
	 public function complete(Request $request)
    {
		
        $order = Order::latest()->first();
		//dd($order);
                 return view('site.pages.success', compact('order'));
	}
	private function getPaymentStatus($id, $resourcepath)
    {
		  $url = "https://test.oppwa.com";
        $url .= $resourcepath;
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
       curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
		//dd($responseData);
        return json_decode($responseData, true);

    }
	 public function placeOrderNocc(Request $request)
    {
		$this->validate($request, [
            'first_name'      =>  'required|max:191',
            'last_name'      =>  'required|max:191',
            'country'      =>  'required|max:191',
            'city'      =>  'required|max:191',
            'address'      =>  'required|max:191',
            'phone'      =>  'required|max:191',
	]);
	
		$order = $this->orderRepository->storeOrderDetails($request->all());
		$cart = Cart::getContent() ; 
		$userMail = \Auth::user()->email ; 
		$adminMail =  config('settings.default_email_address') ;
		Mail::to($userMail)->send( new SendCheckOutEmailCustomer($cart,$order));	
		Mail::to($adminMail)->send( new SendCheckOutEmailAdmin($cart , $order));	
		Cart::clear();
		\Cart::clearCartConditions();
		$view = view('site.pages.successnocc')->with(['order' => $order ])
		->renderSections();
		return response()->json([
			'status' => true,
			'content' => $view['main']
		]);
	}

	public function getCity(Request $request)
    {
        $data['states'] = DB::table('states')->where("country_id",$request->country_id)->where('ship' , 1)
                    ->get(["name","id"]);
					dd($data);
        return response()->json($data);
	}
	public function getCityR(Request $request)
    {
        $data['states'] = DB::table('states')->where("country_id",$request->country_id)
                    ->get(["name","id",'name2']);
					//dd($data);
        return response()->json($data);
    }
}
