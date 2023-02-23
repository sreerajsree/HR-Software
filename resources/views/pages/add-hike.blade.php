@extends('layouts.home')
@section('title')
    <title>Add Hike | HR-Soft</title>
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mb-5">
                        <h1>Add Hike for {{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</h1>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="{{ route('hike.request') }}" method="post">
                                @csrf
                                <input type="hidden" name="user_id" value="{{ $user->user_id }}">
                                <div class="row mt-4">
                                    <div class="col">
                                        <label class="fw-bold mb-2" for="">Hike Amount (₹)</label>
                                        <input type="number" class="form-control" name="hike_amount" id="hike_amount"
                                            required>
                                    </div>
                                    <div class="col">
                                        <label class="fw-bold mb-2" for="">Hike Year</label>
                                        <input type="number" class="form-control" name="hike_year" id="hike_year"
                                            required>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary">Add Hike</button>
                                    </div>
                                </div>
                            </form>
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
