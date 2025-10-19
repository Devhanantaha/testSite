<?php

namespace App\Http\Controllers\Site;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Blog;

class BlogController extends Controller
{
    public function blog($lang = null)
    {
        $blogs = Blog::where('type','blog')->paginate(9);
	  if ($lang == 'ar') {
			 return view('site.pages.ar.blog', compact('blogs'));
		}

        return view('site.pages.blog', compact('blogs'));
    }

    public function blogPost($slug, $lang = null)
    {
        $post = Blog::where('slug', $slug)->first();
	  if ($lang == 'ar') {
			 return view('site.pages.ar.blog-post', compact('post'));
		}

        return view('site.pages.blog-post', compact('post'));
    }

    public function media($lang = null)
    {
        $page = Blog::all();
	  if ($lang == 'ar') {
			 return view('site.pages.ar.media', compact('page'));
		}

        return view('site.pages.media', compact('page'));
    }
}
