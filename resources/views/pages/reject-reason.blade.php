@extends('layouts.home')
@section('title')
    <title>Reject Leave | HR-Soft</title>
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mb-5">
                        <h1>Leave Reject Reason</h1>
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <form action="/leave-reject/{{ $reason->id }}" method="post">
                                @csrf
                                <div class="row mt-4">
                                    <div class="col">
                                        <label class="fw-bold mb-2" for="">Reason</label>
                                        <textarea name="reject_reason" id="reject_reason" cols="30" rows="10" class="form-control" required></textarea>
                                    </div>
                                </div>
                                <div class="row mt-4">
                                    <div class="col">
                                        <button type="submit" class="btn btn-danger text-white">Reject</button>
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
