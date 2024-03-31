@extends('layouts.app')
@section('title','Add Products')
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
                            <h2>Update Product</h2>
                            <!-- breadcrumb -->
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb mb-0">
                                </ol>
                            </nav>
                        </div>
                        <!-- button -->
                        <div>
                            <a href="/Products" class="btn btn-light">Back to Product</a>
                        </div>
                    </div>
                </div>
            </div>
            <!-- row -->
            <div class="row">
                <div class="col-lg-8 col-12">
                    <!-- card -->
                    <div class="card mb-6 card-lg">
                        <!-- card body -->
                        <div class="card-body p-6">
                            <h4 class="mb-4 h5">Product Information</h4>
                            <form action="/update/product" method="post" enctype="multipart/form-data">
                                @csrf
                                <input type="hidden" name="id" value="{{ $getProduct->id }}">
                                <div class="row">
                                    <!-- input -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label" id="name">Name</label>
                                        <input type="text" class="form-control" name="name" id="name" placeholder="Product Name" required value="{{ $getProduct->name }}" />
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Product Category</label>
                                        <select class="form-select" name="category">
                                            @foreach($getCategories as $category)
                                                <option value="{{ $category->id }}" >{{ $category->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label">Status</label>
                                        <select class="form-select" name="status">
                                            <option value="Active">Active</option>
                                            <option value="Désactive">Désactive</option>
                                            <option value="Draft">Draft</option>
                                        </select>
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label" id="price">Price</label>
                                        <input type="text" class="form-control" name="price" id="price" placeholder="Price" required value="{{ $getProduct->price }}" />
                                    </div>
                                    <!-- input -->
                                    <div class="mb-3 col-lg-6">
                                        <label class="form-label" id="quantite">quantite</label>
                                        <input type="text" class="form-control" name="quantite" id="quantite" placeholder="quantite" required value="{{ $getProduct->quantite }}" />
                                    </div>
                                    <div class="col-lg-12 mt-5">
                                        <!-- heading -->
                                        <h4 class="mb-3 h5">Product Images</h4>
                                        <!-- input -->
                                        <div id="my-dropze" class="">
                                            <input type="file" name="image" id="my-dropze">
                                        </div>
                                    </div>
                                    <!-- input -->
                                    <div class="mb-5 col-lg-12 mt-5">
                                        <h4 class="mb-3 h5">Product Descriptions</h4>
                                        <textarea class="form-control" name="description" rows="3" placeholder="Product Description">{{ $getProduct->description }}</textarea>
                                    </div>
                                </div>
                                <!-- button -->
                                <div class="d-grid">
                                    <button type="submit" class="btn btn-primary">Update Product</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
