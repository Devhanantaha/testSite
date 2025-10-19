<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;
use App\Models\Cms;
use App\Models\Currency;

// Controllers
use App\Http\Controllers\Site\HomeController;
use App\Http\Controllers\Site\CategoryController;
use App\Http\Controllers\Site\ProductController;
use App\Http\Controllers\Site\ContactController;

// BotMan
use BotMan\BotMan\BotMan;
use BotMan\BotMan\Drivers\DriverManager;
use BotMan\BotMan\BotManFactory;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// ==========================
// 🤖 BotMan Chatbot Routes
// ==========================
Route::match(['get', 'post'], '/botman', function () {
    DriverManager::loadDriver(\BotMan\Drivers\Web\WebDriver::class);

    $config = [];
    $botman = BotManFactory::create($config);

    $botman->hears('{message}', function (BotMan $bot, $message) {
        $faq = Cms::where('name', 'like', "%{$message}%")
            ->orWhere('name2', 'like', "%{$message}%")
            ->orWhere('content', 'like', "%{$message}%")
            ->orWhere('content2', 'like', "%{$message}%")
            ->first();

        if ($faq) {
            $bot->reply($faq->content);
        } else {
            $bot->reply("😅 Sorry, I couldn’t find an answer. Try rephrasing your question!");
        }
    });

    $botman->listen();
});

Route::get('/botman/chat/{param?}', function (Request $request, $param = null) {
    $conf = json_decode($request->query('conf', '{}'), true);

    return response([
        'status' => 200,
        'param' => $param,
        'config' => $conf,
    ]);
});


// ===========================================
// 🌍 Multilingual Site Routes (LaravelLocalization)
// ===========================================
Route::group(
    [
        'prefix' => LaravelLocalization::setLocale(),
        'middleware' => [
            'localeSessionRedirect',
            'localizationRedirect',
            'localeViewPath',
        ],
    ],
    function () {



        Route::get('/about-us', function () {
            return view('site.pages.about');
        })->name('about');


        // 🏠 Main Pages
        Route::post('/contact', [ContactController::class, 'store'])->name('contact.store');

        Route::get('/', [HomeController::class, 'show'])->name('home');
        Route::get('/projects', [HomeController::class, 'projects'])->name('projects.show');
        Route::get('/support', [HomeController::class, 'support'])->name('support');
        Route::get('/contact', [HomeController::class, 'contact'])->name('contact');
        Route::post('/contactm', [HomeController::class, 'contactm'])->name('contact.submit');
        Route::get('/page/{slug}', [HomeController::class, 'page'])->name('page.show');
        Route::get('/gallery', [HomeController::class, 'gallery'])->name('gallery.show');
        Route::get('/project/{slug}', [HomeController::class, 'project'])->name('project.show');
        Route::get('/work/area/{slug}', [HomeController::class, 'work'])->name('workarea.show');
        Route::get('/where-we-work', [HomeController::class, 'whereWork'])->name('wherework.show');
        Route::get('/where-we-work/{slug}', [HomeController::class, 'whereWorkPhase'])->name('wherework.phase.show');
        Route::get('/work/state/{id}', [HomeController::class, 'state'])->name('state.show');
        Route::get('/work/state/{id}/{phase}', [HomeController::class, 'statePhase'])->name('state.phase.show');
        Route::get('/apply', [HomeController::class, 'apply'])->name('apply.show');
        Route::get('/videos', [HomeController::class, 'videos'])->name('videos.show');
        Route::get('/downloads', [HomeController::class, 'downloads'])->name('downloads.show');
        Route::get('/events', [HomeController::class, 'events']);
        Route::get('/event/{id}', [HomeController::class, 'event']);
        Route::get('/search', [HomeController::class, 'search']);
        Route::post('/newsletter/subscribe', [HomeController::class, 'newsletter']);

        // 📦 Catalog
        Route::get('/category/{slug}', [CategoryController::class, 'show'])->name('category.show');
        Route::get('/product/{slug}', [ProductController::class, 'show'])->name('product.show');
    }
);


// ====================
// 🔐 Authentication
// ====================
Auth::routes();


// ===============================
// 🌐 Global View Composer
// ===============================
view()->composer(['*'], function ($view) {
    $local = session('local');
    $top_menu = Cms::where('menu', 1)->where('published', 1)->orderBy('order_no', 'asc')->get();
    $footer = Cms::where('footer', 1)->where('published', 1)->orderBy('order_no', 'asc')->get();

    $address = config('settings.address');
    $workdayes = config('settings.work_dayes');

    $view->with([
        'top_menu' => $top_menu,
        'footer' => $footer,
        'local' => $local,
        'address' => $address,
        'workdayes' => $workdayes,
        'phases' => [],
    ]);
});
