@extends('layouts.home')
@section('title')
    <title>Hike | HR-Soft</title>
@endsection

@section('content')
    <div class="header-divider"></div>
    <div class="body flex-grow-1 px-3">
        <div class="container-lg">
            <div class="row">
                <div class="col-12">
                    <div class="card p-3 mb-5">
                        <h1>Hike for {{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</h1>
                        
                    </div>
                    <div class="card mb-4">
                        <div class="card-body">
                            <a class="btn btn-primary mb-5" href="/add-hike/{{ $user->id }}">Add Hike for {{ $user->fname }} {{ $user->mname }} {{ $user->lname }}</a>
                            <table class="table table-striped table-bordered" id="example" style="width:100%">
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Employee Name</th>
                                        <th>Hike Amount</th>
                                        <th>Hike Year</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($hike as $hk)
                                        <tr>
                                            <td>{{ $hk->id }}</td>
                                            <td>{{ $hk->name }}</td>
                                            <td>{{ $hk->hike_amount }}</td>
                                            <td style="font-weight: bold;">{{ $hk->hike_year }}</td>
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
