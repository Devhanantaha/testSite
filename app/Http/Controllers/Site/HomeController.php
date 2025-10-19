<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Product;
use App\Models\Collection;
use App\Models\Category;
use App\Models\Cms;
use Newsletter;
use Mail;
use App\Mail\SendEmail;
use App\Mail\SendEmailHR;
use App\Models\Blog;
use App\Models\Faq;


use Illuminate\Support\Arr;

class HomeController extends Controller
{


    public function show()
    {

        // Common queries
        $history = Cms::where('mission', 1)->where('published', 1)->first();
        $objs    = Cms::where('vision', 1)->where('published', 1)->first();
        $shs     = Cms::where('company', 1)->where('published', 1)->first();
        $vedios  = Cms::where('adv', 1)->where('published', 1)->orderBy('order_no')->get();
        $news    = Cms::where('news', 1)->where('published', 1)->orderBy('created_at', 'desc')->get();


        return view('site.pages.homepage2', compact(
            'history',
            'objs',
            'shs',
            'vedios',
            'news'
        ));
    }


    public function gallery()
    {

        $gallaries = Cms::where('gallery', 1)->where('published', 1)->orderBy('order_no')->get();
        return view('site.pages.gallery', compact('gallaries'));
    }
    public function projects()
    {

        $projects = Product::where('status', 1)->get();
        return view('site.pages.projects', compact('projects'));
    }
    public function project($slug,)
    {

        $project = Product::where('slug', $slug)->first();
        return view('site.pages.project', compact('project'));
    }
    public function work($slug,)
    {

        $gallaries = Cms::where('gallery', 1)->where('published', 1)->orderBy('order_no')->get();
        $area = \App\Models\Category::where('slug', $slug)->first();
        return view('site.pages.work', compact('area'));
    }
    public function apply()
    {

        $grants = Faq::active()->latest()->get();
        return view('site.pages.apply', compact('grants'));
    }
    public function videos()
    {

        return view('site.pages.videos');
    }
    public function downloads()
    {

        return view('site.pages.downloads');
    }
    public function events()
    {

        $events = Blog::active()->latest()->get();
        return view('site.pages.events', compact('events'));
    }

     public function event($id)
 {
     $row = Blog::find($id);
     return view('site.pages.page', compact('row'));
 }

    public function whereWork()
    {

        $states = \App\models\State::where('ship', 1)->get();

        return view('site.pages.wherework', compact('states'));
    }
    public function whereWorkPhase($slug,)
    {

        $phase = \App\models\Collection::where('slug', $slug)->firstOrFail();
        $states = \App\models\State::where('ship', 1)->get();
        return view('site.pages.wherework-phase', compact('phase', 'states'));
    }
    public function state($id,)
    {

        $state = \App\models\State::find($id);
        return view('site.pages.state', compact('state'));
    }
    public function statePhase($id, $phase,)
    {

        $state = \App\models\State::find($id);
        $phase = \App\models\Collection::where('slug', $phase)->firstOrFail();
        return view('site.pages.statephase', compact('state', 'phase'));
    }
    public function contact()
    {
        if (app()->getLocale() == 'ar') {
            $address = config('settings.address_ar');
        } else {
            session()->put('local', 'en');

            $address = config('settings.address');
        }

        return view('site.pages.contact', compact('address'));
    }
    public function shop()
    {

        $categories = Category::all();
        $featuredcat = Category::where('featured', 1)->orderBy('ordr', 'ASC')->get();
        return view('site.pages.shop', compact('categories', 'featuredcat'));
    }

    public function page($slug,)
    {
        $page = Cms::where('slug', $slug)->first();
        $teams = Cms::where('team', 1)->where('published', 1)->orderBy('order_no', 'asc')->get();

        return view('site.pages.page', compact('page', 'teams'));
    }
    public function solutions($slug,)
    {
        $solutions = Cms::where('news', $slug)->first();

        return view('site.pages.page', compact('page'));
    }


    public function support()
    {
        $news = Cms::where('news', 1)->where('published', 1)->orderBy('order_no', 'asc')->get();
        return view('site.pages.support', compact('news', 'headings'));
    }

    public function catalogs()
    {
        $catalogs = Cms::where('catalogs', 1)->where('published', 1)->orderBy('order_no', 'asc')->get();
        // return view('site.pages.ar.catalogs', compact('catalogs'));

        return view('site.pages.catalogs', compact('catalogs'));
    }

    public function newsletter(Request $request)
    {
        $this->validate($request, [
            'email'      =>  'required|email',
        ]);
        if (! Newsletter::isSubscribed($request->email)) {
            Newsletter::subscribePending($request->email);
            return 'Thanks , A Confirmation Email sent to your Inbox';
        }
        return 'problem';
    }

    public function search()
    {
        //  dd($_GET);
        $q = $_GET['keyword'];

        $products = Product::where('name', 'LIKE', "%{$q}%")
            ->orWhere('description', 'LIKE', "%{$q}%")
            ->get()
            ->map(function ($row) use ($q) {
                $row->name = preg_replace('/(' . $q . ')/i', "<span class='search'>$1</span>", $row->name);
                $row->description = preg_replace('/(' . $q . ')/i', "<span class='search'>$1</span>", $row->description);
                return $row;
            });
        $cats = Category::where('name', 'LIKE', "%{$q}%")
            ->orWhere('description', 'LIKE', "%{$q}%")
            ->get()
            ->map(function ($row) use ($q) {
                $row->name = preg_replace('/(' . $q . ')/i', "<span class='search'>$1</span>", $row->name);
                $row->description = preg_replace('/(' . $q . ')/i', "<span class='search'>$1</span>", $row->description);
                return $row;
            });

        // dd($cats);
        $results = "";
        if (request()->ajax()) {
            if ($q != "") {

                foreach ($products as $product) {
                    $results .= '
<div class="item-product-widget " data-wow-duration="0.5s" data-wow-delay="0ms">
    <div class="images pull-left">
        <img width="400" height="508"
        src="/storage/' . $product->images->first()->thumbnail . '" class="attachment-woocommerce_thumbnail size-woocommerce_thumbnail" alt="" loading="lazy" />
    </div>
        <div class="product-meta">
        <div class="product-title separator">
        <a href="/product/' . $product->slug . '" title="' . $product->name . '">
        ' . $product->name . '           </a>
        </div>
        <div class="price separator">
        <ins><span class="woocommerce-Price-amount amount"><bdi><span class="woocommerce-Price-currencySymbol">L.E</span>' . $product->price . '</bdi></span></ins>
        </div>
    </div>
</div>
        ';
                }
            }
            // dd($results);
            return ($results);
        } else {
            if ($q == "") {
                $products = collect();
            }
            return view('site.partials.search-results', compact('products', 'cats'));
        }
    }

    public function contactm(Request $request)
    {
        $this->validate($request, [
            'email'      =>  'email',
            'name'     => 'required|min:3',
            'phone'     => 'required',
            'message'     => 'required|min:6',
        ]);
        $serial = null;
        $company = null;
        $name = $request->name;
        $email = $request->email;
        $phone = $request->phone;
        $message = $request->message;
        $subject = 'Message From Contact Form';

        $sitmail =  config('settings.contact_email');
        Mail::to($sitmail)->send(new SendEmail($name, $email, $phone, $message, $company, $serial, $subject));
        return ("Message Sent Succsessfuly");
    }
}
