@extends('layouts.app')
@section('title','Products')
@section('content')         <!-- main -->
         <main class="main-content-wrapper">
            <div class="container">
               <div class="row mb-8">
                  <div class="col-md-12">
                     <!-- page header -->
                     <div class="d-md-flex justify-content-between align-items-center">
                        <div>
                           <h2>Products</h2>
                           <!-- breacrumb -->
                           <nav aria-label="breadcrumb">
                              <ol class="breadcrumb mb-0">
                              </ol>
                           </nav>
                        </div>
                        <!-- button -->
                        <div>
                           <a href="/add-product" class="btn btn-primary">Add Product</a>
                        </div>
                     </div>
                  </div>
               </div>
               <!-- row -->
               <div class="row">
                  <div class="col-xl-12 col-12 mb-5">
                     <!-- card -->
                     <div class="card h-100 card-lg">
                        <div class="px-6 py-6">
                           <div class="row justify-content-between">
                              <!-- form -->
                              <div class="col-lg-4 col-md-6 col-12 mb-2 mb-lg-0">
                                <form class="d-flex" action="/search" method="GET">
                                    <input class="form-control" type="search" name="search-product" placeholder="Search Products" aria-label="Search" />
                                </form>
                              </div>
                              <!-- select option -->
                           </div>
                        </div>
                        <!-- card body -->
                        <div class="card-body p-0">
                           <!-- table -->
                           <div class="table-responsive">
                              <table class="table table-centered table-hover text-nowrap table-borderless mb-0 table-with-checkbox">
                                 <thead class="bg-light">
                                    <tr>
                                       <th>Image</th>
                                       <th>Proudct Name</th>
                                       <th>Category</th>
                                       <th>Status</th>
                                       <th>Price</th>
                                       <th>quantite</th>
                                       <th></th>
                                    </tr>
                                 </thead>
                                 @foreach($getProducts as $product)
                                 <tbody>
                                    <tr>
                                       <td>
                                            <img src="images/{{ $product->image }}" alt="" class="icon-shape icon-md" />
                                       </td>
                                       <td><a href="" class="text-reset">{{$product->name}}</a></td>
                                       <td>{{$product->category}}</td>

                                       <td>
                                        @if($product-> status === 'active')
                                          <span class="badge bg-light-primary text-dark-primary">{{$product->status}}</span>
                                        @endif
                                        @if($product-> status === 'draft')
                                          <span class="badge bg-light-warning text-dark-primary">{{$product->status}}</span>
                                        @endif
                                        @if($product-> status === 'desactive')
                                          <span class="badge bg-light-danger text-dark-primary">{{$product->status}}</span>
                                        @endif
                                       </td>
                                       <td>{{$product->price}} DH</td>
                                        <td>{{$product->quantite}}</td>
                                       <td>
                                          <div class="dropdown">
                                             <a href="#" class="text-reset" data-bs-toggle="dropdown" aria-expanded="false">
                                                <i class="feather-icon icon-more-vertical fs-5"></i>
                                             </a>
                                             <ul class="dropdown-menu">
                                                <li>
                                                   <a class="dropdown-item" href="/delete-product/{{ $product->id }}">
                                                      <i class="bi bi-trash me-3"></i>
                                                      Delete
                                                   </a>
                                                </li>
                                                <li>
                                                   <a class="dropdown-item" href="/update-product/{{ $product->id }}">
                                                      <i class="bi bi-pencil-square me-3"></i>
                                                      Edit
                                                   </a>
                                                </li>
                                             </ul>
                                          </div>
                                       </td>
                                    </tr>
                                 </tbody>
                                @endforeach
                              </table>
                           </div>
                        </div>
                        <div class="border-top d-md-flex justify-content-between align-items-center px-6 py-6">
                        </div>
                     </div>
                  </div>
               </div>
               {{ $getProducts->links() }}
            </div>
         </main>
      </div>
@endsection
