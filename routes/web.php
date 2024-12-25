<?php

use App\Http\Controllers\AppointmentController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\investigationsearchcontroller;
use App\Http\Controllers\logoutcontroller;
use App\Http\Controllers\PdfController;
use App\Http\Controllers\testcontroller;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Usertestscontroller;
use App\Models\Investigation;
use App\Models\UserInvestigation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
Route::get('/appointments', [AppointmentController::class, 'index']);

Route::get('/', function () {
    return view('home');
});
Route::get('/results', function () {
    return view('results');
    });
    Route::get('/makeappointment', [AppointmentController::class,'create'])->name('appointment.create');

Route::post('/store/appointment', [AppointmentController::class, 'store']);
        Route::get('/add/admin',[UserController::class,'create'])->name('admin.create');
        Route::post('/store/admin',[UserController::class,'store'])->name('admin.store');
        Route::get('/manage/admins',[UserController::class,'show'])->name('admin.show');
        Route::post('/update/{id}/admin', [UserController::class, 'update'])->name('admin.update'); 
        Route::get('/update', function () {
            return view('superadmin.editadmin');
            });
            Route::get('/upload-pdf', [PdfController::class, 'uploadForm']);
Route::post('/upload-pdf', [PdfController::class, 'upload']);
//Route::get('/pdfs', [PdfController::class, 'listPdfs'])->name('pdf.listpdfs');
Route::get('/pdfs/{id}/view', [PdfController::class, 'viewPdf']);
Route::get('/search-pdf', function () {
    return view('results'); // Render the search form
})->name('pdf.search-form');
Route::get('/search-pdf/result', [PdfController::class, 'search'])->name('pdf.search');
Route::get('/mytests',[Usertestscontroller::class,'show'])->name('mytests.show');

        Route::get('/testslist', function () {
            return view('tests list',[
                'tests'=>Investigation::all(),
              // 'tests' => Investigation::orderBy('created_at', 'asc')->simplepaginate(3)
        ]);
       
         });
Route::get('/test/{id}', function ($id) {
    $test = Investigation::find($id);
        return view('test',['test'=>$test]);
}); 
//Route::delete('/investigation/{investigation}/delete', [Usertestscontroller::class, 'delete']);
Route::post('/logout',[logoutcontroller::class,'destroy']);
Route::get('/search',[ testcontroller::class,'search']);
Route::group(['middleware' => ['auth']], function ()
 {
    Route::post('/add_test/{id}',[Usertestscontroller::class,'addMytest']);

});

        Route::get('/admindashboard', function () {
            return view('admindashboard.admindashboard');
            });
            Route::get('/investigations',[testcontroller::class,'index'])->name('investigations.index');
            
               Route::get('/investigation/{id}', function ($id) {
                 $test = Investigation::find($id);
                return view('admindashboard.investigation',['test'=>$test]);   
                }); 
                //Route::get('/investigations/search', [testcontroller::class, 'investigationsearch']);
                Route::post('/investigation/create', [testcontroller::class, 'create']);
                Route::post('/investigations/store',[testcontroller::class,'store']);
                Route::get('/investigations/{id}', [testcontroller::class, 'show'])->name('investigations.show');
                Route::get('/investigation/{id}/edit', [testcontroller::class, 'edit'])->name('investigations.edit');
                Route::get('/investigations/{id}/update', [testcontroller::class, 'update'])->name('investigations.update');

                Route::delete('/investigation/{id}', [Usertestscontroller::class, 'destroy'])->name('investigation.destroy');
               
                Auth::routes();
 
//->middleware(['Auth','verified']);

//route::get('/register',[RegisterController::class,'create']);
//route::post('/register',[RegisterController::class,'store']);//post=requst
//route::get('/login',[LoginController::class,'create']);
//route::post('/login',[RegisterController::class,'store']);


