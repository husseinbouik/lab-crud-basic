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
                                    <input type="search" class="form-control form-control-lg" name="search" id="searchTasks"
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

                        <!-- /.card -->
                    </div>
                </div>
            </section>
        </div><!-- /.container-fluid -->
    </div>
    <script>
        // Add this script for instant search
        $(document).ready(function() {
    function fetch_data(page, search) {
        $.ajax({
            url: "tasks/?page=" + page + "&searchTasks=" + search,
            success: function(data) {
                $('tbody').html('');
                $('tbody').html(data);
            }
        });
    }

    $('body').on('click', '.pagination a', function(param) {
        param.preventDefault();
        var page = $(this).attr('href').split('page=')[1];
        var search = $('#searchTasks').val();
        fetch_data(page, search);
    });

    $('body').on('keyup', '#searchTasks', function() {
        var search = $('#searchTasks').val();
        var page = $('#page_hidden').val();
        fetch_data(page, search);
    });
    fetch_data(1, '');
});
    </script>
@endsection
