<?php

use App\Http\Controllers\CountriseController;
use App\Http\Controllers\CoursesController;
use App\Http\Controllers\FlightsController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\StundetController;
use App\Http\Controllers\Training_coursesController;
use App\Http\Controllers\ResFlightController;
use Illuminate\Support\Facades\Route;
use App\Models\Flight;
/*
Route::get('/', function () {
    return view('welcome');
});
*/

Route::get('/',[HomeController::class,'index'])->name('home');

// Route::get('/atef/{age}/{country}',function($age,$country){
//   return "age=".$age ."city=".$country;
// });

// Route::get('/atef/{age?}/{country?}',function($age=35,$country="egpet "){
//   return "age=".$age ."city=".$country;
// });

// Route::get('/atef/{name}/{age}',function($name,$age){
//   return "welcome ".$name . " your age is".$age;
// })->where(['age' => '[0-9]+', 'name' => '[a-z]+']);

//11---------------------------------------------------------

// Route::get('/country/name/{name}',function($name){
//  return "your country is ".$name;
// });

// Route::get('/country/age/{age}',function($age){
//  return " and your age is ".$age;
// });

//12 -----------------------------------------------------

// Route::get('/asd/{name}',function($name){
//  return "your name is ".$name;
// });



Route::get('/asd2/{name}',function($name){
 return "your name is ".$name;
})->name('asd2');

// Route::fallback(function(){
//     return "the page not found";
// });

//13 -----------------------------------

Route::get('asd',[UserController::class,'asd1']);
Route::get('age',[UserController::class,'age1']);

//14 -------------------------------
Route::get('/asd3/{name}',function($name){
 return "your name is ".$name;
})->name('asd3');

//15 ---------------------
Route::get('login',[UserController::class,'get_login']);
Route::get('login1',function () {
 return  view('loginpages.login' ,['record'=>'1']);
});

//16 ------------------------------
Route::get('main',function(){
    return view('master');
});

Route::get('article',function(){
    return view('article');
});

//18 ---------------------------
Route::get('yourname/{nmae}',function($name){
    return 'welcome '.$name;
});

Route::get('yourname/{nmae?}',function($name="atef"){
    return 'welcome '.$name;
});

Route::get('grade',function(){
    return view('grade',['name'=>'atef']);
});

Route::get('getLogin',[LoginController::class,'getlogin']);

Route::get('page1',function(){
    return view('page1');
});

Route::get('articlehome',function(){
    return view('articlehome');
});

// Route::fallback(function(){
//     return " not found ";
// });

//28-----------------------------------
// Route::get('flights',function(){
//     return Flight::all();
// });

//29-----------------------------------
//Route::get('flights',[FlightsController::class,'index']);

// //30--------------------------------------
// Route::get('flights',[FlightsController::class,'index'])->name('flights');
// Route::get('create_flights',[FlightsController::class,'create'])->name('create_flights');
// Route::post('store_flight',[FlightsController::class,'store'])->name('store_flight');
// //31 ----------------------------
// Route::get('edit_flights/{id}',[FlightsController::class,'edit'])->name('edit_flights');
// Route::post('update_flights/{id}',[FlightsController::class,'update_flights'])->name('update_flights');
// //32--------------------------------------
// Route::get('delete_flights/{id}',[FlightsController::class,'delete_flights'])->name('delete_flights');


Route::get('flights',[FlightsController::class,'index'])->name('flights');
Route::get('create_flights',[FlightsController::class,'create'])->name('create_flights');
Route::post('store_flight',[FlightsController::class,'store'])->name('store_flight');
Route::get('edit_flights/{id}',[FlightsController::class,'edit'])->name('edit_flights');
Route::post('update_flights/{id}',[FlightsController::class,'update_flights'])->name('update_flights');
Route::get('delete_flights/{id}',[FlightsController::class,'delete_flights'])->name('delete_flights');
Route::get('delete_soft/{id}',[FlightsController::class,'delete_soft'])->name('delete_soft');
Route::get('restore/{id}',[FlightsController::class,'restore'])->name('restore');


// start courses
Route::get('courses',[CoursesController::class,'index'])->name('courses.index');
Route::get('create_courses',[CoursesController::class,'create'])->name('courses.create');
Route::post('store_courses',[CoursesController::class,'store'])->name('courses.store');
Route::get('edit_courses/{id}',[CoursesController::class,'edit'])->name('courses.edit');
Route::post('update_courses/{id}',[CoursesController::class,'update'])->name('courses.update');
Route::get('destroy_courses/{id}',[CoursesController::class,'destroy'])->name('courses.destroy');


// start Students
Route::get('student',[StundetController::class,'index'])->name('student.index');
Route::get('create_student',[StundetController::class,'create'])->name('student.create');
Route::post('store_student',[StundetController::class,'store'])->name('student.store');
Route::get('edit_student/{id}',[StundetController::class,'edit'])->name('student.edit');
Route::post('update_student/{id}',[StundetController::class,'update'])->name('student.update');
Route::get('destroy_student/{id}',[StundetController::class,'destroy'])->name('student.destroy');
Route::post('ajax_search_student',[StundetController::class,'ajax_search_student'])->name('student.ajax_search_student');


// start training_courses
Route::get('training_courses',[Training_coursesController::class,'index'])->name('training_courses.index');
Route::get('create_training_courses',[Training_coursesController::class,'create'])->name('training_courses.create');
Route::post('store_training_courses',[Training_coursesController::class,'store'])->name('training_courses.store');
Route::get('edit_training_courses/{id}',[Training_coursesController::class,'edit'])->name('training_courses.edit');
Route::post('update_training_courses/{id}',[Training_coursesController::class,'update'])->name('training_courses.update');
Route::get('destroy_training_courses/{id}',[Training_coursesController::class,'destroy'])->name('training_courses.destroy');
Route::get('detalis/{id}',[Training_coursesController::class,'detalis'])->name('training_courses.detalis');
Route::get('AddStudentToTraningCourses/{id}',[Training_coursesController::class,'AddStudentToTraningCourses'])->name('training_courses.AddStudentToTraningCourses');
Route::post('DoAddStudentToTraningCourses/{id}',[Training_coursesController::class,'DoAddStudentToTraningCourses'])->name('training_courses.DoAddStudentToTraningCourses');
Route::get('DeleteStudentFromTraningCourses/{id}',[Training_coursesController::class,'DeleteStudentFromTraningCourses'])->name('training_courses.DeleteStudentFromTraningCourses');


Route::get('ar',function() {
     session()->put('locale','ar');
     return redirect()->back();
     })->name('ar');


Route::get('en',function() {
    session()->put('locale','en');
    return redirect()->back();
    })->name('en');







Route::resource('country',CountriseController::class);
//Route::resource('country',CountriseController::class)->only(['create','index']);

//Route::resource('flights',ResFlightController::class);

// Route::fallback(function(){
//     return " not found ";
// });


