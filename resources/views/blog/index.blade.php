@extends('base')
@section('title', 'Task management')
@section('content')
    <div class="content-wrapper">
        <div class="content-header">
            <section class="content">
                <div class="container-fluid">
                    <div class="row mb-2">
                        <div class="col-sm-6">
                            <h1 class="m-0">Gestion des Taches</h1>
                        </div><!-- /.col -->
                    </div><!-- /.row -->
                </div>
                <!-- Add this section for instant search -->
                <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
                <div class="card ">
                    <div class="card-header">
                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif
                        <div class="col-sm-12 d-flex justify-content-between p-3">
                            <div class="d-flex justify-content-between">
                                <a href="/create" class="btn btn-primary"><i class="fa fa-plus"></i> </a>
                            </div>
                            <!-- SEARCH FORM -->
                            <form class="form-inline ml-3" method="GET" action="{{ route('tasks.index') }}">
                                <div class="input-group input-group-sm">
                                    <input type="search" class="form-control form-control-lg" name="search" id="search"
                                        placeholder="Recherche" value="{{ $search }}">
                                    <div class="input-group-append">
                                        <button type="submit" class="btn btn-lg btn-default">
                                            <i class="fa fa-search"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body p-0">
                        <div class="table-responsive" id="resultContainer">
                            @include('blog.table') {{-- Include the table partial --}}
                        </div>
                        <div class="card-header row">
                            <div class="float-right col-md-6">
                                <div class="d-flex justify-content-center">
                                    {{ $tasks->links('pagination::bootstrap-4') }}
                                </div>
                            </div>
                            <div class="float-left col-md-6 d-flex justify-content-end" style="align-items: center; ">
                                <button type="button" class="btn btn-default mr-2 swalDefaultQuestion">
                                    <i class="fas fa-download"></i> export
                                </button>
                                <button type="button" class="btn btn-default swalDefaultQuestion">
                                    <i class="fas fa-file-import"></i> import
                                </button>
                            </div>
                        </div>
                        <!-- /.card -->
                    </div>
                </div>
            </section>
        </div><!-- /.container-fluid -->
    </div>
    <script>
        // Add this script for instant search
        $(document).ready(function () {
    $('#search').on('keyup', function () {
        fetchTasks();
    });

    // Handle pagination links
    $(document).on('click', '.pagination a', function (e) {
        e.preventDefault();
        var url = $(this).attr('href');
        fetchTasks(url);
    });

    function fetchTasks(url = null) {
        var search = $('#search').val();

        $.ajax({
            url: url || '{{ route('tasks.index') }}',
            type: 'GET',
            data: {
                search: search
            },
            success: function (data) {
                $('#resultContainer').html(data);
            },
            error: function () {
                console.log('Error fetching tasks.');
            }
        });
    }
});
    </script>
@endsection
