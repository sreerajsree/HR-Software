<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\companyController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\GalleryController;
use App\Http\Controllers\AttendanceController;
use App\Http\Controllers\HolidaysController;
use App\Http\Controllers\AnnouncementController;
use App\Http\Controllers\CompanypolicyController;
use App\Http\Controllers\UserattendanceController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PayrollController;
use App\Http\Controllers\LoanController;
use App\Http\Controllers\HikeController;
use App\Http\Controllers\HomeController;

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
Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::post('/add-employee', [HomeController::class, 'add'])->name('add.employee');
    Route::get('/{companyname}/employees', [companyController::class, 'employees'])->name('employees');
    Route::get('/personaldetails', [companyController::class, 'add'])->name('add');
    Route::post('/add-personaldetails', [companyController::class, 'addDetails'])->name('add.details');
    Route::get('/office', [companyController::class, 'office'])->name('office');
    Route::get('/edit-employee/{id}', [companyController::class, 'edit'])->name('edit.employee');
    Route::post('/update-employee/{id}', [companyController::class, 'update'])->name('update.employee');
    Route::get('/documents', [DocumentController::class, 'documents'])->name('documents');
    Route::post('/image-upload', [DocumentController::class, 'fileUpload'])->name('imageUpload');
    Route::get('/view-documents', [DocumentController::class, 'viewDocuments'])->name('view.documents');
    Route::get('/unsubmitted-documents', [DocumentController::class, 'unsubmittedDocuments'])->name('unsubmitted.documents');
    Route::get('/leave', [LeaveController::class, 'leave'])->name('leave');
    Route::post('/leave-request', [LeaveController::class, 'leaveRequest'])->name('leave.request');
    Route::get('/leaveapplications', [LeaveController::class, 'leaveApplications'])->name('leave.applications');
    Route::get('/leave-approve/{id}', [LeaveController::class, 'leaveApprove'])->name('leave.approve');
    Route::get('/leave-reject-reason/{id}', [LeaveController::class, 'leaveRejectReason'])->name('leave.rejectreason');
    Route::post('/leave-reject/{id}', [LeaveController::class, 'leaveReject'])->name('leave.reject');
    Route::get('/our-gallery', [GalleryController::class, 'gallery'])->name('gallery');
    Route::post('/gallery-upload', [GalleryController::class, 'fileUpload'])->name('galleryUpload');
    Route::post('/gallery-delete', [GalleryController::class, 'del'])->name('gallerydelete');
    Route::post('/gallery-event-delete', [GalleryController::class, 'delEvent'])->name('galleryeventdelete');
    Route::get('/attendance', [AttendanceController::class, 'index'])->name('attendance');
    Route::get('/holidays', [HolidaysController::class, 'holidays'])->name('holidays');
    Route::post('/add-holiday', [HolidaysController::class, 'add'])->name('add-holiday');
    // Route::post('/eventupdate',[HolidaysController::class, 'add'])->name('eventupdate');
    Route::get('/delete/{id}', [HolidaysController::class, 'del'])->name('delete');
    Route::get('/announcements', [AnnouncementController::class, 'announcements'])->name('announcements');
    Route::post('/add-announcement', [AnnouncementController::class, 'add'])->name('add-announcement');
    Route::get('/view-announcements/{id}', [AnnouncementController::class, 'viewAnnouncements'])->name('view-announcements');
    Route::post('/update-announcement/{id}', [AnnouncementController::class, 'update'])->name('update-announcement');
    Route::get('/delete-announcement/{id}', [AnnouncementController::class, 'delete'])->name('delete-announcement');
    Route::post('time-out', [AttendanceController::class, 'timeOut'])->name('time-out');
    Route::get('/viewpolicy', [CompanypolicyController::class, 'viewpolicy'])->name('viewpolicy');
    Route::post('/addpolicyname', [CompanypolicyController::class, 'addpolicyname'])->name('addpolicyname');
    Route::get('/deletepolicyheading/{id}', [CompanypolicyController::class, 'delete'])->name('deletepolicyheading');
    Route::post('/addpolicycontent/{id}', [CompanypolicyController::class, 'addpolicycontent'])->name('policycontent');
    Route::get('/userattendance', [UserattendanceController::class, 'index'])->name('userattendance');
    Route::get('/userattendanceview/{id}', [UserattendanceController::class, 'userattendview'])->name('userattendview');
    Route::get('/view-profile', [ProfileController::class, 'viewprofile'])->name('view-profile');
    Route::post('image-crop', [ProfileController::class, "imageCropPost"])->name("imageCrop");
    Route::post('/change-password', [ProfileController::class, 'updatePassword'])->name('update-password');
    Route::get('/trainees-leave', [LeaveController::class, 'traineesleave'])->name('trainees.leave');
    Route::post('/trainee-request', [LeaveController::class, 'traineeRequest'])->name('trainee.request');
    Route::get('/tleave-approve/{id}', [LeaveController::class, 'tleaveApprove'])->name('tleave.approve');
    Route::get('/tleave-reject/{id}', [LeaveController::class, 'tleaveReject'])->name('tleave.reject');
    Route::get('/payroll', [PayrollController::class, 'index'])->name('payroll.index');
    Route::get('/edit-payroll/{id}', [PayrollController::class, 'edit'])->name('payroll.edit');
    Route::post('/update-payroll/{id}', [PayrollController::class, 'update'])->name('payroll.update');
    Route::get('/view-payroll', [PayrollController::class, 'view'])->name('payroll.view');
    Route::post('/request-payslip', [PayrollController::class, 'request'])->name('payroll.request');
    Route::get('/payroll-requests', [PayrollController::class, 'requests'])->name('payroll.requests');
    Route::get('/payslip-approve/{id}', [PayrollController::class, 'payrollApprove'])->name('preq.approve');
    Route::get('/payslip-reject/{id}', [PayrollController::class, 'payrollReject'])->name('preq.reject');
    Route::get('generate-pdf', [PayrollController::class, 'generatePDF'])->name('generate.pdf');
    Route::get('/loans', [LoanController::class, 'index'])->name('loan.index');
    Route::post('/request-loan', [LoanController::class, 'request'])->name('loan.request');
    Route::get('/loan-requests', [LoanController::class, 'requests'])->name('loan.requests');
    Route::get('/loan-approve/{id}', [LoanController::class, 'loanApprove'])->name('loan.approve');
    Route::get('/loan-reject/{id}', [LoanController::class, 'loanReject'])->name('loan.reject');
    Route::get('/all-loans', [LoanController::class, 'allLoans'])->name('all.loans');
    Route::get('/hike/{id}', [HikeController::class, 'edit'])->name('hike.edit');
    Route::get('/add-hike/{id}', [HikeController::class, 'addHike'])->name('add.hike');
    Route::post('/request-hike/', [HikeController::class, 'requestHike'])->name('hike.request');
    Route::get('/hiring', [HikeController::class, 'hiring'])->name('hiring.index');
    Route::post('/add-candidate', [HikeController::class, 'addCandidate'])->name('add.candidate');
    Route::get('/move-scheduled/{id}', [HikeController::class, 'moveScheduled'])->name('move.scheduled');
    Route::post('/update-candidate/{id}', [HikeController::class, 'updateCandidate'])->name('update.candidate');
    Route::get('/move-selected/{id}', [HikeController::class, 'moveSelected'])->name('move.selected');
    Route::get('/move-rejected/{id}', [HikeController::class, 'moveRejected'])->name('move.rejected');
    Route::get('/move-joined/{id}', [HikeController::class, 'moveJoined'])->name('move.joined');
    
});
