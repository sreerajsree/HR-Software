@extends('layouts.home')
@section('title')
    <title>Loans | HR-Soft</title>
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mb-5">
                        <h1>Loans</h1>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <h4>Request for Loan</h4>
                            <form action="{{ route('loan.request') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ Auth::user()->id }}">
                                <div class="row mt-4">
                                    <div class="col">
                                        <label class="fw-bold mb-2" for="">Total Amount (₹)</label>
                                        <input type="number" class="form-control" name="loan_amount" id="loan_amount" required>
                                    </div>
                                    <div class="col">
                                        <label class="fw-bold mb-2" for="">Loan Tenure</label>
                                        <select name="loan_tenure" id="loan_tenure" class="form-control" required>
                                            <option value="1">1 Month</option>
                                            <option value="2">2 Month</option>
                                            <option value="3">3 Month</option>
                                            <option value="4">4 Month</option>
                                            <option value="5">5 Month</option>
                                            <option value="6">6 Month</option>
                                            <option value="7">7 Month</option>
                                            <option value="8">8 Month</option>
                                            <option value="9">9 Month</option>
                                            <option value="10">10 Month</option>
                                            <option value="11">11 Month</option>
                                            <option value="12">12 Month</option>
                                            <option value="13">13 Month</option>
                                            <option value="14">14 Month</option>
                                            <option value="15">15 Month</option>
                                            <option value="16">16 Month</option>
                                            <option value="17">17 Month</option>
                                            <option value="18">18 Month</option>
                                            <option value="19">19 Month</option>
                                            <option value="20">20 Month</option>
                                            <option value="21">22 Month</option>
                                            <option value="22">22 Month</option>
                                            <option value="23">23 Month</option>
                                            <option value="24">24 Month</option>
                                            <option value="25">25 Month</option>
                                            <option value="26">26 Month</option>
                                            <option value="27">27 Month</option>
                                            <option value="28">28 Month</option>
                                            <option value="29">29 Month</option>
                                            <option value="30">30 Month</option>
                                            <option value="31">31 Month</option>
                                            <option value="32">32 Month</option>
                                            <option value="33">33 Month</option>
                                            <option value="34">34 Month</option>
                                            <option value="35">35 Month</option>
                                            <option value="36">36 Month</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <label class="fw-bold mb-2" for="">Loan Purpose</label>
                                        <textarea name="loan_purpose" class="form-control" id="loan_purpose" cols="20" rows="5" required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Request for Loan</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>

                    <div class="card mb-4">
                        <div class="card-body">
                            <h4 class="mb-4">My Requests</h4>
                            <table class="table table-striped table-bordered" id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Requested Date</th>
                                        <th>Loan Amount</th>
                                        <th>Loan Tenure</th>
                                        <th>Loan Purpose</th>
                                        <th>Loan EMI</th>
                                        <th>Loan Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($myreq as $req)
                                        <tr>
                                            <td>{{ $req->id }}</td>
                                            <td>{{ $req->created_at->todatestring() }}</td>
                                            <td>{{ $req->loan_amount }}</td>
                                            <td>{{ $req->loan_tenure }}</td>
                                            <td>{{ $req->loan_purpose }}</td>
                                            <td>{{ $req->loan_emi }}</td>
                                            <td>
                                                @if ($req->request_status == 0)
                                                    <button class="btn btn-sm btn-warning text-white">Pending</button>
                                                @elseif ($req->request_status == 1)
                                                    <button class="btn btn-sm btn-success text-white">Approved</button>
                                                @elseif($req->request_status == 2)
                                                    <button class="btn btn-sm btn-danger text-white">Rejecetd</button>
                                                @endif
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
    </div>
@endsection
@section('scripts')
    <script>
        $(document).ready(function() {
            $('#example').DataTable({
                responsive: true
            });
        });
    </script>
@endsection
