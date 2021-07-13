<?php

use App\Models\Cms;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use \App\Http\Controllers\AdminController;
use \App\Http\Controllers\MenuController;
use \App\Http\Controllers\TagsCategoryController;
use \App\Http\Controllers\ReservationController;
use \App\Http\Controllers\CMSController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    $data["image"] = Cms::find(1);
    return view('user.landing', $data);
});
Route::get('about', function () {
    $data["image"] = Cms::find(1);
    $data["about"] = Cms::find(2);
    $data["footer"] = Cms::find(5);
    return view('user.about', $data);
});

Route::get('dining-and-buffet', function () {
    $data["image"] = Cms::find(1);
    $data["dining"] = Cms::find(3);
    $data["footer"] = Cms::find(5);
    return view('user.dining', $data);
});

Route::get('contact', function () {
    $data["image"] = Cms::find(1);
    $data["contact"] = Cms::find(4);
    $data["footer"] = Cms::find(5);
    return view('user.contact', $data);
});


Route::view('user_email', "mails.user_verification");
Route::get('user_verify/{code}/{email}', [UserController::class, "verification"]);
Route::post('user/add', [UserController::class, "store"]);
Route::post('forgot_password', [UserController::class, "forgot"]);


Route::middleware("guest")->group(function () {
    Route::get('join', function () {
        $data["image"] = Cms::find(1);
        return view('user.join', $data);
    })->name("login");

    Route::post('login', [UserController::class, "login"]);
});

Route::get('logout', function () {
    Auth::guard("user")->logout();
    Auth::guard("admin")->logout();
    return redirect("/");
});


Route::middleware("auth:user")->group(function () {
    Route::get('reservation', function () {
        $data["image"] = Cms::find(1);
        $data["footer"] = Cms::find(5);
        return view("user.reservation", $data);
    });
    Route::post('reservation', [ReservationController::class, "store"]);
    Route::get('history', function () {
        $data["image"] = Cms::find(1);
        $data["footer"] = Cms::find(5);
        return view('user.history', $data);
    });
    Route::get('update', function () {
        $data["image"] = Cms::find(1);
        $data["footer"] = Cms::find(5);
        return view('user.update', $data);
    });
    Route::post('update/{id}', [UserController::class, "update"]);

    Route::post('reset', [UserController::class, "reset"]);
});


Route::middleware("guest")->prefix('admin')->group(function () {
    Route::get('login', function () {
        $data["image"] = Cms::find(1);
        return view('admin.login', $data);
    });
    Route::post('login', [AdminController::class, "login"]);
});


Route::middleware("auth:admin")->prefix("admin")->group(function () {
    Route::resource('menu', MenuController::class);
    Route::get('category', [TagsCategoryController::class, "index1"])->name("category.index");
    Route::post('category', [TagsCategoryController::class, "store1"])->name("category.store");
    Route::put('category/{category}', [TagsCategoryController::class, "update1"])->name("category.update");
    Route::delete('category/{category}', [TagsCategoryController::class, "destroy1"])->name("category.delete");


    Route::delete('tag/{tag}', [TagsCategoryController::class, "destroy2"])->name("tag.delete");
    Route::post('tag', [TagsCategoryController::class, "store2"])->name("tag.store");
//    Route::get('tag', [TagsCategoryController::class, "index2"])->name("tag.index");

    Route::resource('reservation', ReservationController::class);
    Route::get('reservation/status/{id}/{status}', [ReservationController::class, "changeStatus"]);

    Route::middleware("isSuperAdmin")->group(function () {
        Route::resource('admin', AdminController::class);
        Route::post('admin/reset', [AdminController::class, "reset"]);

        Route::resource('user', UserController::class);
        Route::post('user/reset', [UserController::class, "reset"]);
        Route::post('upload-img', [CMSController::class, "contentImage"]);

        Route::get('delete-img/{file}', [CMSController::class, 'deleteContentImage']);

        Route::post('content/update/{id}', [CMSController::class, "update"]);

        Route::get('cms', [CMSController::class, "index"]);
        Route::post('content/update/image/{id}', [CMSController::class, "imageUpload"]);

        Route::get('audits', function (Illuminate\Http\Request $request) {
            if ($request->ajax()) {
                $data = \App\Models\Audit::all();
                return DataTables::of($data)
                    ->smart()
                    ->toJson();
            }
            return view("admin.audits");
        });
    });
});


Route::get('/mail', function () {
    $user = new ArrayObject();
    $user->email = "jofeean@gmail.com";
    $user->name = "Jofeean";
    $user->code = 468462548;
    \Illuminate\Support\Facades\Mail::to($user->email)
        ->queue(new \App\Mail\UserVerification($user));
});

Route::get('/sample', function () {
    $admin = new \App\Models\Admin();
    $admin->name = "Jofeean Ogario";
    $admin->username = "jogario";
    $admin->password = bcrypt("qweqwe");
    $admin->save();
});

Route::get('/ngi', function () {
    $dates = \App\Models\Reservation::select("date")
        ->groupBy("date")
        ->get();

    $dates_status_collation = array();

    foreach ($dates as $date) {
        $reservations = \App\Models\Reservation::where("date", $date->date)->get();
        $nan = \App\Models\Reservation::where("date", $date->date)->where("status", 0)->count();
        $confirmed = \App\Models\Reservation::where("date", $date->date)->where("status", 1)->count();
        $denied = \App\Models\Reservation::where("date", $date->date)->where("status", 2)->count();

        array_push($dates_status_collation, array(
            [
                "date" => $date->date,
                "nan" => $nan,
                "confirmed" => $confirmed,
                "denied" => $denied,
            ]));
    }

    return $dates_status_collation;
});


Route::get('/crap', function () {
    $cms = new \App\Models\Cms;
    $cms->content = \Illuminate\Support\Str::random(40);
    $cms->save();
});
