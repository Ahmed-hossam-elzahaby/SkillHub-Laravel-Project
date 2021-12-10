<?php

use App\Http\Controllers\adminCatController;
use App\Http\Controllers\admincontroller;
use App\Http\Controllers\adminExamController;
use App\Http\Controllers\adminMassageController;
use App\Http\Controllers\adminSkillsController;
use App\Http\Controllers\adminstudentcontroller;
use App\Http\Controllers\Catcontroller;
use App\Http\Controllers\contactcontroller;
use App\Http\Controllers\Examcontroller;
use App\Http\Controllers\Homecontroller;
use App\Http\Controllers\Langcontroller;
use App\Http\Controllers\profilecontroller;
use App\Http\Controllers\Skillcontroller;
use Illuminate\Support\Facades\Route;

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

Route::middleware('lang')->group(function(){

    Route::get('/',[Homecontroller::class,'index'] );
    Route::get('/categories/show/{id}',[Catcontroller::class,'show'] );
    Route::get('/skills/show/{id}',[Skillcontroller::class,'show'] );
    Route::get('/exams/show/{id}',[Examcontroller::class,'show'] );
    Route::get('/exams/questions/{id}/',[Examcontroller::class,'Question'] )->middleware(['auth','isstudent']);
    Route::get('contact',[contactcontroller::class,'index']);
    Route::post('massage/send',[contactcontroller::class,'send']);
    Route::get('profile',[profilecontroller::class,'index'])->middleware(['auth','isstudent']);

});
Route::post('/exams/start/{id}/',[Examcontroller::class,'start'] )->middleware(['auth','isstudent','canEnterExam']);
Route::post('/exams/submit/{id}/',[Examcontroller::class,'submit'] )->middleware(['auth']);
Route::get('lang/set/{lang}',[Langcontroller::class,'set']);

//            admin                      categories
Route::get('/dashbord',[admincontroller::class,'index'])->middleware(['auth','canEnterDashbord']);
Route::get('dashbord/categories',[adminCatController::class,'index'])->middleware(['auth','canEnterDashbord']);
Route::post('cats/store',[adminCatController::class,'store'])->middleware(['auth','canEnterDashbord']);                
Route::get('cats/store/delete/{id}',[adminCatController::class,'delete'])->middleware(['auth','canEnterDashbord']);                
Route::post('cats/update',[adminCatController::class,'update'])->middleware(['auth','canEnterDashbord']);                
Route::get('cats/toggle/{cat}',[adminCatController::class,'toggle'])->middleware(['auth','canEnterDashbord']);
//                                  /categories

//         admin                         skills
Route::get('dashbord/skills',[adminSkillsController::class,'index'])->middleware(['auth','canEnterDashbord']);
Route::post('dashbord/skills/store',[adminSkillsController::class,'store'])->middleware(['auth','canEnterDashbord']);
Route::post('dashbord/skills/update',[adminSkillsController::class,'update'])->middleware(['auth','canEnterDashbord']);
Route::get('dashbord/skills/delete/{skill}',[adminSkillsController::class,'delete'])->middleware(['auth','canEnterDashbord']);
Route::get('dashbord/skills/toggle/{skill}',[adminSkillsController::class,'toggle'])->middleware(['auth','canEnterDashbord']);

//                                  /skills


//         admin                         Exams
Route::get('dashbord/exams',[adminExamController::class,'index'])->middleware(['auth','canEnterDashbord']);
Route::get('dashbord/exams/show/{exam}',[adminExamController::class,'show'])->middleware(['auth','canEnterDashbord']);
Route::get('dashbord/exams/show/{exam}/questions',[adminExamController::class,'question'])->middleware(['auth','canEnterDashbord']);
Route::get('dashbord/exams/create',[adminExamController::class,'create'])->middleware(['auth','canEnterDashbord']);
Route::post('dashbord/exams/store',[adminExamController::class,'store'])->middleware(['auth','canEnterDashbord']);
Route::get('dashbord/exams/create-questions/{exam}',[adminExamController::class,'createquestions'])->middleware(['auth','canEnterDashbord']);
Route::post('dashbord/exams/store-questions/{exam}',[adminExamController::class,'storequestions'])->middleware(['auth','canEnterDashbord']);

Route::get('dashbord/exams/edit/{id}',[adminExamController::class,'edite'])->middleware(['auth','canEnterDashbord']);
Route::post('dashbord/exams/update',[adminExamController::class,'update'])->middleware(['auth','canEnterDashbord']);
Route::get('dashbord/exams/toggle/{exam}',[adminExamController::class,'toggle'])->middleware(['auth','canEnterDashbord']);
Route::get('dashbord/exams/delete/{exam}',[adminExamController::class,'delete'])->middleware(['auth','canEnterDashbord']);

//                                  /Exams


//                                  student


Route::get('dashbord/student',[adminstudentcontroller::class,'student'])->middleware(['auth','canEnterDashbord']);
Route::get('dashbord/student/show-exams/{id}',[adminstudentcontroller::class,'showstudent'])->middleware(['auth','canEnterDashbord']);


//                                  /student

//                                  admin


Route::get("dashbord/admins",[admincontroller::class,'admin'])->middleware(['auth','issuperadmin']);
Route::get("dashbord/admin/create",[admincontroller::class,'createadmin'])->middleware(['auth','issuperadmin']);
Route::post("dashbord/admin/store",[admincontroller::class,'createadminstore'])->middleware(['auth','issuperadmin']);
Route::get("dashbord/admin/promot/{id}",[admincontroller::class,'promot'])->middleware(['auth','issuperadmin']);
Route::get("dashbord/admin/demot/{id}",[admincontroller::class,'demot'])->middleware(['auth','issuperadmin']);


//                                  /admin



//                                  Massage

Route::get('dashbord/massages',[adminMassageController::class,'index'])->middleware(['auth','issuperadmin']);
Route::get('dashbord/massages/{id}',[adminMassageController::class,'show'])->middleware(['auth','issuperadmin']);




//                                  /Massage




