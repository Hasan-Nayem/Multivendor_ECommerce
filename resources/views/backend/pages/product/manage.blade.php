@extends('backend.layout.template')

@section('body-content')

  <!--start content-->
  <main class="page-content">
    <!--breadcrumb-->
    <div class="page-breadcrumb d-none d-sm-flex align-items-center mb-3">
      <div class="breadcrumb-title pe-3">eCommerce</div>
      <div class="ps-3">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb mb-0 p-0">
            <li class="breadcrumb-item"><a href="javascript:;"><i class="bx bx-home-alt"></i></a>
            </li>
            <li class="breadcrumb-item active" aria-current="page">Products List</li>
          </ol>
        </nav>
      </div>

      <div class="ms-auto">
        <div class="btn-group">
          <button type="button" class="btn btn-primary">Settings</button>
          <button type="button" class="btn btn-primary split-bg-primary dropdown-toggle dropdown-toggle-split" data-bs-toggle="dropdown">	<span class="visually-hidden">Toggle Dropdown</span>
          </button>
          <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg-end">	<a class="dropdown-item" href="javascript:;">Action</a>
            <a class="dropdown-item" href="javascript:;">Another action</a>
            <a class="dropdown-item" href="javascript:;">Something else here</a>
            <div class="dropdown-divider"></div>	<a class="dropdown-item" href="javascript:;">Separated link</a>
          </div>
        </div>
      </div>
    </div>
    <!--end breadcrumb-->

      <div class="card">
        <div class="card-header py-3">
          <div class="row align-items-center m-0">
            <div class="col-md-3 col-12 me-auto mb-md-0 mb-3">
                <select class="form-select">
                    <option>All category</option>
                    <option>Fashion</option>
                    <option>Electronics</option>
                    <option>Furniture</option>
                    <option>Sports</option>
                </select>
            </div>
            <div class="col-md-2 col-6">
                <input type="date" class="form-control">
            </div>
            <div class="col-md-2 col-6">
                <select class="form-select">
                    <option>Status</option>
                    <option>Active</option>
                    <option>Disabled</option>
                    <option>Show all</option>
                </select>
            </div>
         </div>
        </div>
        <div class="card-body">


          <div class="table-responsive">
            
            @if ( $products->count() == 0 )
              <div class="alert alert-info">No Products Found in our Database.</div>
            @else 
              <table class="table align-middle table-striped">
                <thead>
                  <tr>
                    <th>Sl.</th>
                    <th>Image</th>
                    <th>Title</th>
                    <th>Brand</th>
                    <th>Category</th>
                    <th>Regular Price</th>
                    <th>Offer Price</th>                    
                    <th>Quantity</th>
                    <th>Featured</th>
                    <th>Vendor</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
              <tbody>

                @php $i = 1; @endphp

                @foreach( $products as $product )
                  <tr>

                    <td>
                      {{ $i }}
                    </td>

                    <td class="productlist">
                      <a class="d-flex align-items-center gap-2" href="#">
                        <div class="product-box">

                          @php $im = 1; @endphp
                          @foreach( $product->images as $image )  
                            @if ( $im > 0 )

                              <img src="{{ asset('backend/assets/images/products/' . $image->image) }}" alt="" />

                            @endif

                            @php $im--; @endphp
                          @endforeach
                        </div>
                      </a>
                    </td>

                    <td>
                      <h6 class="mb-0 product-title">{{ $product->title }}</h6>
                    </td>

                    <td>{{ $product->brand->name }}</td>

                    <td>{{ $product->category->name }}</td>

                    <td>
                      <span>৳ {{ $product->regular_price }} BDT</span>
                    </td>
                    <td>
                      <span>
                        @if ( !is_null( $product->offer_price ) )
                          ৳ {{ $product->offer_price }} BDT
                        @else   
                          - N/A -
                        @endif
                      </span>
                    </td>

                    <td>
                      <span>{{ $product->total_quantity }} Pcs</span>
                    </td>

                    <td>
                        @if ( $product->featured_product == 0 )
                          <span class="badge rounded-pill alert-warning">Disabled</span>
                        @elseif ( $product->featured_product == 1 )
                          <span class="badge rounded-pill alert-success">Enabled</span>
                        @endif
                    </td>

                    <td>
                      <span class="badge rounded-pill alert-success">{{ $product->vendor->name }}</span>
                    </td>

                    <td>
                        @if ( $product->status == 0 )
                          <span class="badge rounded-pill alert-warning">Inactive</span>
                        @elseif ( $product->status == 1 )
                          <span class="badge rounded-pill alert-success">Active</span>
                        @endif
                    </td>

                    
                    <td>
                      <div class="d-flex align-items-center gap-3 fs-6">
                        
                        <a href="javascript:;" class="text-primary" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="View detail" aria-label="Views">
                          <i class="bi bi-eye-fill" data-bs-toggle="modal" data-bs-target="#detailsView"></i>
                        </a>


                        <a href="{{ route('product.edit', $product->id) }}" class="text-warning" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Edit info" aria-label="Edit">
                          <i class="bi bi-pencil-fill"></i>
                        </a>


                        <a href="javascript:;" class="text-danger" data-bs-toggle="tooltip" data-bs-placement="bottom" title="" data-bs-original-title="Delete" aria-label="Delete"><i class="bi bi-trash-fill"></i></a>
                      </div>
                    </td>

                    <!-- Product Details View Modal -->
                    <div class="modal fade" id="detailsView" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog modal-dialog-scrollable">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>

                          <div class="modal-body">
                            <h4>Short Description</h4>
                            <p>{{ strip_tags($product->short_description) }}</p>              
                          </div>
                        </div>
                      </div>
                    </div>



                  </tr>


                  @php $i++; @endphp
                @endforeach


                
              </tbody>
            </table>
            @endif

            
          </div>

      </div>
    </div>
  </main>
  
@endsection     