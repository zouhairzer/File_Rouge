@extends('layouts.app')
@section('title', 'Update Category')
@section('content')
    <!-- main -->
    <main class="main-content-wrapper">
        <!-- container -->
        <div class="container">
            <!-- row -->
            <div class="row mb-8">
                <div class="col-md-12">
                    <div class="d-md-flex justify-content-between align-items-center">
                        <!-- page header -->
                        <div>
                            <h2>Update Category</h2>
                            <!-- breadcrumb -->
                            <nav aria-label="breadcrumb">
                            </nav>
                        </div>
                        <div>
                            <a href="/Categories" class="btn btn-light">Back to Categories</a>
                        </div>
                    </div>
                </div>
            </div>
            @if(session('error'))
                <div class="alert alert-danger">
                    {{ session('error') }}
                </div>
            @endif
            <div class="row">
                <div class="col-lg-12 col-12">
                    <!-- card -->
                    <div class="card mb-6 shadow border-0">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <div class="mb-4 d-flex">
                                <div class="position-relative">
                                    <div class="file-upload position-absolute end-0 top-0 mt-n2 me-n1">
                                    </div>
                                </div>
                            </div>
                            <h4 class="mb-4 h5 mt-5">Category Information</h4>
                            <div class="row">
                                <!-- input -->
                                <div class="mb-3 col-lg-6">
                                    <form action="/update/category" method="post">
                                        @csrf
                                        <input type="hidden" name="id" value="{{ $getCategories->id }}">
                                        <label class="form-label">Name</label>
                                        <input type="text" name="name" id="name" class="form-control" placeholder="Category Name" value="{{ $getCategories->name }}" required />
                                </div>
                                <div class="col-lg-12">
                                    <button type="submit" class="btn btn-primary">Update Category</button>
                                </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</div>
@endsection
