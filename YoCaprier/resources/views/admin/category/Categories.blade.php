@extends('layouts.app')
@section('title', 'Categories')
@section('content')
    <!-- main -->
    <main class="main-content-wrapper">
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-flex flex-column flex-md-row justify-content-between align-items-md-center gap-4">
                        <!-- page header -->
                        <div>
                            <h2>Categories</h2>
                            <!-- breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="/add-category" class="btn btn-primary">Add New Category</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-xl-12 col-12 mb-5">
                    <!-- card -->
                    <div class="card h-100 card-lg">
                        <div class="px-6 py-6">
                            <div class="row justify-content-between">
                                <div class="col-lg-4 col-md-6 col-12 mb-2 mb-md-0">
                                    <!-- form -->
                                </div>
                            </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                            <!-- table -->
                            <div class="table-responsive">
                                <table class="table table-centered table-hover mb-0 text-nowrap table-borderless table-with-checkbox">
                                    <thead class="bg-light">
                                        <tr>
                                            <th>
                                                <div class="form-check">
                                                </div>
                                            </th>
                                            <th>Name</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    @if(session('success'))
                                        <div class="alert alert-success">
                                            {{ session('success') }}
                                        </div>
                                    @endif
                                    @if(session('delete'))
                                        <div class="alert alert-warning">
                                            {{ session('delete') }}
                                        </div>
                                    @endif
                                    @if(session('Nodelete'))
                                        <div class="alert alert-danger">
                                            {{ session('Nodelete') }}
                                        </div>
                                    @endif
                                    @if(session('update'))
                                        <div class="alert alert-dark">
                                            {{ session('update') }}
                                        </div>
                                    @endif
                                    <tbody>
                                        @foreach($categories as $category)
                                        <tr>
                                            <td>
                                            </td>
                                            <td>{{ $category->name }}</td>
                                            <td>
                                                <div class="dropdown">
                                                    <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                        <i class="feather-icon icon-more-vertical fs-5"></i>
                                                    </a>
                                                    <ul class="dropdown-menu">
                                                        <li>
                                                            <a class="dropdown-item" href="/delete-category/{{ $category->id }}" type="button">
                                                                <i class="bi bi-trash me-3"></i>
                                                                Delete
                                                            </a>
                                                        </li>
                                                        <li>
                                                            <a class="dropdown-item" href="/update-category/{{ $category->id }}">
                                                                <i class="bi bi-pencil-square me-3"></i>
                                                                Edit
                                                            </a>
                                                        </li>
                                                    </ul>
                                                </div>
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
            {{ $categories->links() }}
        </div>
    </main>
</div>
@endsection
