<?php
use App\Http\Controllers\api\specialistController;
use App\Http\Controllers\api\web\clinicAdminController;
use App\Http\Controllers\api\usercontroller;
use App\Http\Controllers\api\PatientController;
use App\Http\Controllers\api\clinicsController;
use App\Http\Controllers\api\doctorsController ;
use App\Http\Controllers\api\interviewsController ;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
//patient apis

Route::post('/Patient/register',[PatientController::class,'Register']);
Route::post('/Patient/login',[PatientController::class,'login']);
Route::post('/Patient/{id}/profile',[PatientController::class,'profile']);
//جميع المقابلات السابقة للمريض
Route::get('/Patient/{id}/interviews',[PatientController::class,'interviews']);
//جميع الفحوصات  السابقة للمريض
Route::get('/Patient/{id}/examinations',[PatientController::class,'examinations']);
//clinics api
//*************************************************** *
//عرض جميع العيادات
Route::get('/clinics',[clinicsController::class,'index']);
//عرض العيادة وجميع الاطباء بها
Route::get('/clinic/{id}',[clinicsController::class,'show']);
      //عرض الاطبا حسب قم العيادة
Route::get('/clinic/{id}/doctors',[clinicsController::class,'clinicDoctors']);


//بحث المستشفى عن طريق الاسم
Route::post('/search/clinic',[clinicsController::class,'search']);
//******************************************************** */
//تسجيل المقابلة الجديدة وارجع الترتيب للمريض 
Route::post('/interviews',[interviewsController::class,'store']);
//الفخوصات الجديدة للمريض حسي المقابلة
Route::get('/interviews/{id}/examinations',[interviewsController::class,'interviewExaminations']);


//التخصصات

//******************************************************** */
//جميع التخصصات
Route::get('/specialists',[specialistController::class,'index']);

//******************************************************** */
//الاطباء عن طريق رقم العيادة والتخصص
Route::get('/clinic/{clinic}/specialist/{specialist}/doctors',[doctorsController ::class,'byClinicAndSspecialist']);
//الطبيب مع اسم التخصص والعيادة
Route::get('/doctor/{id}',[doctorsController ::class,'show']);
//بحث  الدكتور  عن طريق الاسم
Route::post('/search/doctor',[doctorsController::class,'search']);
//************************************************************************************************** */
//****************dashbord**********************************
Route::group(['middleware' => 'web'], function () {
    Route::get('/ahmed',[clinicAdminController::class,'interviewsReport']);
});
