<?php

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


Auth::routes();
Route::group(['prefix' => LaravelLocalization::setLocale(), 'middleware' => ['localeSessionRedirect', 'localizationRedirect', 'localeViewPath']], function () {
    Route::get('/volunteer', 'VolunteerController@index')->name('volunteer');
    Route::get('/volunteer/{id}', 'VolunteerController@index')->name('volunteer');

    Route::get('/StudentRequest', 'StudentRequestController@index')->name('StudentRequest');
    Route::get('/VolunteerRequest', 'VolunteerRequestController@index')->name('VolunteerRequest');
    Route::get('/home', 'HomeController@index')->name('home');
    Route::get('/home/{id}', 'HomeController@index')->name('home');

    Route::get('/admin', 'AdminController@index')->name('admin');
    Route::get('/techar', 'TecharController@index')->name('techar');
    Route::get('/', function () {

        return view('welcome');
    });
    Route::get('Teachers', 'AdminController@Teachers')->name('Teacher');
    Route::get('courses', 'AdminController@courses')->name('courses');
    Route::get('deleteTeacher/{id}', 'AdminController@deleteTeacher')->name('deleedteacher');
    Route::get('deleteCourse/{id}', 'AdminController@deleteCourse')->name('deletecourse');
    Route::post('addteacher', 'AdminController@addteacher')->name('addteacher');
    Route::post('addcourse', 'AdminController@addcourse')->name('addcourse');
    Route::get('deleteClassroom/{id}','AdminController@deleteClassroom');

    //Request Student

    Route::post('store', 'StudentRequestController@store')->name('StudentRequest.store');
    Route::get('confirmStudent/{identification}', 'AdminController@confirmStudent');
    Route::get('denyStudent/{identification}', 'AdminController@denyStudent');


    Route::group(['prefix' => 'VolunteerRequest'], function () {
        Route::get('create', 'VolunteerRequestController@create')->name('volunteerRequest.create');;
        Route::post('store', 'VolunteerRequestController@store')->name('volunteerRequest.store');
        Route::post('update', 'VolunteerRequestController@update')->name('volunteerRequest.update');

    });
    Route::post('/updateStudyLevel', 'AdminController@updateStudyLevel')->name('updateajax');
    Route::get('confirmVolunteer/{id}', 'AdminController@confirmVolunteer');
    Route::get('denyVolunteer/{id}', 'AdminController@denyVolunteer');

    Route::group(['prefix' => 'teacher'], function () {
        Route::get('attendanceAbsence/{id}', 'TecharController@attendanceAbsence');
    });

    Auth::routes();
    Route::get('allRequestVolunteers', 'AdminController@allRequestVolunteer')->name('All Volunteer');
    Route::get('AllStudent', 'AdminController@allRequestStudent')->name('All Student');

//    Route::get('viewVolunteer','AdminController@viewVolunteer');
    Route::get('viewVolunteer', 'AdminController@viewVolunteer');

    Route::get('delete/{id}', 'AdminController@deleteVolunteer')->name('volunteerRequest.delete');
    //Student
    Route::get('firstS', 'AdminController@firstS');
    Route::get('firstS2', 'AdminController@firstS2');
    Route::get('secondS', 'AdminController@secondS');
    Route::get('section/{id}', 'AdminController@section')->name('section');
    Route::get('section2/{id}', 'AdminController@section2')->name('section2');


    //model volun
    Route::post('/storeAjax', 'AdminController@storeAjax')->name('storeAjax');

    Route::get('deleteStudent/{id}', 'AdminController@deleteStudent');
    Route::get('attendanceAbsence/{id}/{idt}', 'TecharController@attendanceAbsence');
    Route::post('/attendance', 'TecharController@attendance')->name('attendance');
    Route::get('deleteAttendance{id}', 'TecharController@deleteAttendance');
    Route::get('/techar/{id}', 'TecharController@index')->name('teacher');
    Route::post('/evaluation', 'TecharController@evaluation')->name('evaluation');
    Route::get('evaluation/{id}/{idt}', 'TecharController@evaluationShow');
    Route::post('/permissionEvaluation', 'TecharController@permissionEvaluation')->name('permissionEvaluation');
    Route::post('/updateEvaluationAudit', 'TecharController@updateEvaluationAudit')->name('updateEvaluationAudit');
    Route::post('/editEvaluSt', 'TecharController@editEvaluSt')->name('editEvaluSt');


//Admin
    Route::get('attendanceStudent', 'AdminController@showAttendanceStudent');
    Route::get('showAttendanceStudents/{id}', 'AdminController@showAttendanceStudent32')->name('Atte');
    Route::get('attendanceVolunteer', 'AdminController@showAttendanceVolunteer');
    Route::get('evaluationStudent/{cr}', 'AdminController@showEvaluationStudent')->name('evaluationStudent');
    Route::get('evalStudent/{id}/{cr}','AdminController@evalStudent');
    Route::get('evaluationVolunteer', 'AdminController@showEvaluationVolunteer');
    Route::get('absenceTeacher', 'AdminController@absenceTeacher');
    //ResetPassword
    Route::post('/resetPassword', 'AdminController@resetPassword')->name('resetPassword');
    Route::get('/Classrooms', 'AdminController@Classrooms');
    Route::post('/addNewBranch', 'AdminController@addNewBranch')->name('addNewBranch');
    Route::post('/absenceTeacher', 'AdminController@absenceTeacherPost')->name('absenceTeacher');
    Route::get('/ShowAbsenceTeacher', 'AdminController@ShowAbsenceTeacher');
    Route::get('/salariesTeacher', 'AdminController@salariesTeacher');
    Route::post('/addSalaryTeacher', 'AdminController@addSalaryTeacher')->name('addSalaryTeacher');
    Route::get('addsalary/{id}', 'AdminController@addsalary')->name('addsalary');
    Route::post('/addinstallment', 'AdminController@addinstallment')->name('addinstallment');
    Route::get('viewin/{id}/{ids}', 'AdminController@viewin')->name('inv');
    Route::post('/updateReceipt','AdminController@updateReceipt')->name('updateReceipt');

    //Messages
    Route::post('sendMessageStudent', 'HomeController@sendMessageStudent')->name('sendMessageS');
    Route::post('sendMessageV', 'VolunteerController@sendMessageV')->name('sendMessageV');
    Route::post('sendMessage', 'TecharController@sendMessage')->name('sendMessageT');
    Route::post('updateSeenMessageStudent', 'HomeController@updateSeenMessageStudent')->name('updateSeenMessageStudent');
    Route::post('updateSeenMessageTeacherV', 'TecharController@updateSeenMessageTeacher')->name('updateSeenMessageTeacherV');
    Route::post('updateSeenMessageTeacherS', 'TecharController@updateSeenMessageTeacher')->name('updateSeenMessageTeacherS');
    Route::post('updateSeenMessageVolunteer', 'VolunteerController@updateSeenMessageVolunteer')->name('updateSeenMessageVolunteer');

    //ChangePassword
    Route::post('changePassword', 'AdminController@changePassword')->name('changePassword');
    Route::post('changePasswordT', 'TecharController@changePasswordT')->name('changePasswordT');
    Route::post('changePasswordV', 'VolunteerController@changePasswordV')->name('changePasswordV');
    Route::post('changePasswordS', 'HomeController@changePasswordS')->name('changePasswordS');


    //show Hied Request
    Route::get('/showHiedRequest', 'AdminController@showHiedRequest');

    Route::get('/archivesData', 'AdminController@archivesData');

    Route::get('/toArchives/{role}', 'AdminController@toArchives');

    Route::get('showArchive/{id}/{role}', 'AdminController@showArchive');
    Route::get('viewStudents', 'AdminController@viewStudents')->name('viewStudents');

    Route::get('Bin/{role}', 'AdminController@Bin');
    Route::get('binStudent/{id}','AdminController@binStudent');
    Route::post('search', 'AdminController@search')->name('search');
    Route::get('adminpage', 'AdminController@adminpage');
    Route::get('back', 'AdminController@back')->name('back');
    Route::get('/recovery/{role}/{id}', 'AdminController@recovery');
    Route::get('deleteEval/{id}', 'TecharController@deleteEval');
    Route::get('evlauationforstudent/{id}','HomeController@evlauationforstudent');
    Route::get('report/{role}','AdminController@report')->name('report');
    Route::get('reportSt/{id}','AdminController@reportSt')->name('reportSt');
    Route::post('updateBranch','AdminController@updateBranch')->name('updateBranch');
    Route::post('updatestudentb','AdminController@updatestudentb')->name('updatestudentb');
    Route::get('ArchiveStudent/{id}','AdminController@ArchiveStudent');
}
);

Route::get('/test', function () {
    return view('test');
});

