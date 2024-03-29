<?php

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

//frontend
Route::get('/',[\App\Http\Controllers\FrontendController::class,'index'])->name('frontend.index');
Route::get('/staff',[\App\Http\Controllers\FrontendController::class,'staff'])->name('frontend.staff');
Route::get('/news',[\App\Http\Controllers\FrontendController::class,'news'])->name('frontend.news');
Route::get('/gallery',[\App\Http\Controllers\FrontendController::class,'gallery'])->name('frontend.gallery');
Route::get('/about',[\App\Http\Controllers\FrontendController::class,'about'])->name('frontend.about');
Route::get('/contact',[\App\Http\Controllers\FrontendController::class,'contact'])->name('frontend.contact');
Route::get('/corporate',[\App\Http\Controllers\FrontendController::class,'corporate'])->name('frontend.corporate');
Route::get('/ruang-ngaji',[\App\Http\Controllers\FrontendController::class,'ruangNgaji'])->name('frontend.ruangNgaji');
Route::get('/english-tutorial-centre',[\App\Http\Controllers\FrontendController::class,'english'])->name('frontend.english');
Route::get('/calistungbar',[\App\Http\Controllers\FrontendController::class,'calistungbar'])->name('frontend.calistungbar');
Route::get('/daichi-suku',[\App\Http\Controllers\FrontendController::class,'daichiSuku'])->name('frontend.daichiSuku');
Route::get('/fabkids',[\App\Http\Controllers\FrontendController::class,'fabkids'])->name('frontend.fabkids');
Route::get('/miao-zhong-wen',[\App\Http\Controllers\FrontendController::class,'miaoZhongWen'])->name('frontend.miaoZhongWen');
Route::get('/from',[\App\Http\Controllers\IndoregionController::class,'from'])->name('from');
Route::get('/getkabupaten',[\App\Http\Controllers\IndoregionController::class,'getkabupaten'])->name('getkabupaten');


//Route::get('/', function () {
//    return view('frontend.index');
//});
Route::middleware(['auth'])->group(function (){
    Route::prefix('admin')->group(function () {
        Route::resource('employee','EmployeeController');
//        Route::get('/employee/search', [\App\Http\Controllers\EmployeeController::class, 'search'])->name('employee.search');
        Route::resource('certificate','CertificateController');
        Route::resource('corporate','CorporateController');
        Route::resource('program','ProgramController');
        Route::resource('customer','CustomerController');
        Route::resource('expenses','ExpensesController');
        Route::resource('overtime','OvertimeController');
        Route::resource('book','BookController');
        Route::resource('mistake','MistakeController');
        Route::resource('newclass','NewclassController');
        Route::resource('testimonial','TestimonialController');
        Route::resource('study','StudyController');
        Route::resource('carrier','CarrierController');
        Route::resource('gallery','GalleryController');
        Route::resource('activity','ActivityController');
        Route::resource('comment','CommentController');
        Route::resource('folup','FolupController');
        Route::resource('service','ServiceController');
        Route::resource('room','RoomController');
        Route::resource('corporatecustomer','CorporatecustomerController');
        Route::put('/corporate/report/{corporate}', 'CorporateController@report')->name('corporate.report');
        //table
        Route::get('/customer/table/siswa', [\App\Http\Controllers\CustomerController::class,'siswa'])->name('customer.siswa');
        Route::get('/customer/table/nonsiswa', [\App\Http\Controllers\CustomerController::class,'nonSiswa'])->name('customer.nonsiswa');
        Route::get('/customer/table/berhenti', [\App\Http\Controllers\CustomerController::class,'berhenti'])->name('customer.berhenti');
        Route::get('/customer/table/pospone', [\App\Http\Controllers\CustomerController::class,'pospone'])->name('customer.pospone');
        Route::get('/incomingDaily', 'CustomerController@incomingDaily')->name('customer.incomingDaily');
        Route::get('/incomingMonthly', 'CustomerController@incomingMonthly')->name('customer.incomingMonthly');
        Route::get('/incomingAnnual', 'CustomerController@incomingAnnual')->name('customer.incomingAnnual');
        //order
        Route::prefix('order')->group(function () {

        });
        //service
        Route::prefix('service')->group(function () {

        });
    });

});


//backend


Auth::routes(['register' => false]);

Route::get('/home', 'HomeController@index')->name('home');
