<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Loans;
use Auth;
use Alert;

class LoanController extends Controller
{
    public function index() {
        $myreq = Loans::where('user_id', Auth::user()->id)->get();
        return view('pages.loans',['myreq' => $myreq]);
    }

    public function request(Request $request)
    {
        $loan = new Loans();
        $loan->request_status = 0;
        $loan->user_id = $request->user_id;
        $loan->loan_amount = $request->loan_amount;
        $loan->loan_tenure = $request->loan_tenure;
        $loan->loan_purpose = $request->loan_purpose;
        $loan->loan_emi = ((($request->loan_amount * 18) / 100) + $request->loan_amount) / $request->loan_tenure ;
        $loan->save();
        Alert::toast('Loan Requested Successfully', 'success');
        return redirect()->back();
    }

    public function requests()
    {
        $lreq = Loans::join('users', 'users.id', 'loans.user_id')
            ->select('loans.*', 'users.name')
            ->get();
        return view('pages.loan-request', ['lreq' => $lreq]);
    }

    public function loanApprove($id)
    {
        $loan = Loans::find($id);
        $loan->request_status = 1;
        $loan->save();

        Alert::toast('Loan Approved Successfully', 'success');
        return redirect()->back();
    }

    public function loanReject($id)
    {
        $loan = Loans::find($id);
        $loan->request_status = 2;
        $loan->save();

        Alert::toast('Loan Rejected Successfully', 'success');
        return redirect()->back();
    }

    public function allLoans()
    {
        $approvedloans = Loans::join('users','users.id','loans.user_id')->where('request_status', 1)->get();
        $rejectedloans = Loans::join('users','users.id','loans.user_id')->where('request_status', 2)->get();
        $pendingloans = Loans::join('users','users.id','loans.user_id')->where('request_status', 0)->get();
        return view('pages.all-loans', ['approvedloans' => $approvedloans, 'rejectedloans' => $rejectedloans, 'pendingloans' => $pendingloans]);
    }
}