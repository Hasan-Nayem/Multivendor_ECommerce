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
            <li class="breadcrumb-item active" aria-current="page">Update Product Information</li>
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

      <div class="row">
         <div class="col-lg-12 mx-auto">
          <form class="row g-3" action="{{ route('product.update', $product->id) }}" method="POST" enctype="multipart/form-data">
          @csrf
            <div class="card">
              <div class="card-header py-3 bg-transparent"> 
                <div class="d-sm-flex align-items-center">
                  <h5 class="mb-2 mb-sm-0">Update Product Information</h5>
                  <div class="ms-auto">
                    <button type="button" class="btn btn-secondary">Save to Draft</button>
                    <button type="submit" class="btn btn-primary">Publish Now</button>
                  </div>
                </div>
               </div>
              <div class="card-body">
                 <div class="row g-3">
                   <div class="col-12 col-lg-8">
                      <div class="card shadow-none bg-light border">
                        <div class="card-body">
                          <form class="row g-3">
                            <div class="col-12">
                              <label class="form-label">Product title</label>
                              <input type="text" name="title" value="{{ $product->title }}" class="form-control" placeholder="Product title">
                            </div>
                            <div class="row">
                              <div class="col-12 col-lg-4">
                                <label class="form-label">SKU</label>
                                <input type="text" name="sku_code" value="{{ $product->sku_code }}" class="form-control" placeholder="SKU">
                              </div>
                              <div class="col-12 col-lg-4">
                                <label class="form-label">Manufecture Date</label>
                                <input type="text" name="manu_date" value="{{ $product->manufecture_date }}" class="form-control" placeholder="Color">
                              </div>
                              <div class="col-12 col-lg-4">
                                <label class="form-label">Expire Date</label>
                                <input type="text" name="exp_date" value="{{ $product->expire_date }}" class="form-control" placeholder="Size">
                              </div>
                              <div class="col-12 col-lg-4">
                                <label class="form-label">Total Stock Quantity</label>
                                <input type="text" name="quantity" value="{{ $product->total_quantity }}" class="form-control" placeholder="Size">
                              </div>

                              <div class="col-12 col-lg-4">
                                <label class="form-label">Select The Vendor</label>
                                <select class="form-select" name="vendor_id">
                                  <option>Please Select The Vendor</option>
                                  @foreach( $vendors as $vendor )
                                    <option value="{{ $vendor->id }}"

                                      @if ( $vendor->id == $product->vendor_id ) selected @endif

                                    >{{ $vendor->name }}</option>
                                  @endforeach
                                </select>
                              </div>
                            </div>
                            
                            <div class="col-12">
                              <label class="form-label">Images</label>
                              <input class="form-control" type="file" multiple>
                            </div>

                            <div class="col-12">
                              <label class="form-label">Short description</label>
                              <textarea id="editor" class="form-control" placeholder="Full description" name="shrt_desc">{{ $product->short_description }}</textarea>
                            </div>

                            <div class="col-12">
                              <label class="form-label">Long Description</label>
                              <textarea id="editor2" class="form-control" name="long_desc" placeholder="Full description">{{ $product->long_description }}</textarea>
                            </div>
                          </form>
                        </div>
                      </div>
                   </div>

                   <div class="col-12 col-lg-4">
                      <div class="card shadow-none bg-light border">
                        <div class="card-body">
                            <div class="row g-3">
                              <div class="col-12">
                                <label class="form-label">Featured Product</label>
                                <select class="form-select" name="featured_product">
                                  <option value="0">Please Select the Featured Status</option>
                                  <option value="0" @if ( $product->featured_product == 0 ) selected @endif >Disabled</option>
                                  <option value="1" @if ( $product->featured_product == 1 ) selected @endif >Enable</option>
                                </select>
                              </div>

                              <div class="col-12">
                                <label class="form-label">Regular Price</label>
                                <input type="text" name="regular_price" value="{{ $product->regular_price }}" class="form-control" placeholder="Price">
                              </div>

                              <div class="col-12">
                                <label class="form-label">Offer Price</label>
                                <input type="text" name="offer_price" value="{{ $product->offer_price }}" class="form-control" placeholder="Price">
                              </div>

                              <div class="col-12">
                                <label class="form-label">Status</label>
                                <select class="form-select" name="status">
                                  <option>Please Select The Status</option>
                                  <option value="1" @if( $product->status == 1 ) selected @endif >Active</option>
                                  <option value="0" @if( $product->status == 0 ) selected @endif >Inactive</option>
                                </select>
                              </div>
                              
                              <div class="col-12">
                                <label class="form-label">Tags</label>
                                <input type="text" name="meta_tags" value="{{ $product->meta_tags }}" class="form-control" placeholder="Tags">
                              </div>
                              <!-- <div class="col-12">
                                <div class="d-flex align-items-center gap-2">
                                  <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm bg-white">Woman <i class="bi bi-x"></i></a>
                                  <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm bg-white">Fashion <i class="bi bi-x"></i></a>
                                  <a href="javascript:;" class="btn btn-sm btn-light border shadow-sm bg-white">Furniture <i class="bi bi-x"></i></a>
                                </div>
                              </div> -->

                              <div class="col-12">
                                <label class="form-label">Brand</label>
                                <select class="form-select" name="brand_id">
                                  <option value="0">Please Select the Brand of this Product</option>
                                  @foreach( $brands as $brand )
                                    <option value="{{ $brand->id }}"  

                                      @if ( $brand->id == $product->brand_id ) selected @endif

                                    >{{ $brand->name }}</option>
                                  @endforeach
                                </select> 
                              </div>

                              <div class="col-12">
                                <h5>Categories & Sub Categories</h5>
                                <p style="color: #333;">[ Note: If the Product is Primary Category, than just Select That Category, or Else select the only Sub Category ]</p>
                                <div class="category-list">
                                  
                                  @foreach ( $pcategories as $pcat )
                                    <div class="form-check">
                                      <input class="form-check-input" name="category_id" type="checkbox" value="{{ $pcat->id }}" id="{{ $pcat->name }}"

                                      @if ( $pcat->id == $product->category_id ) checked @endif

                                      >
                                      <label class="form-check-label" for="Jeans">
                                        {{ $pcat->name }}
                                      </label>
                                    </div>

                                    @foreach( App\Models\Category::orderBy('name', 'asc')->where('is_parent', $pcat->id)->get() as $chCat )
                                      <div class="form-check" style="padding-left: 60px;">
                                        <input class="form-check-input" name="category_id" type="checkbox" value="{{ $chCat->id }}" id="Jeans"

                                        @if ( $chCat->id == $product->category_id ) checked @endif

                                        >
                                        <label class="form-check-label" for="{{ $chCat->name }}">
                                          {{ $chCat->name }}
                                        </label>
                                      </div>
                                    @endforeach
                                  @endforeach
                                  
                                </div>
                               
                              </div>

                            </div><!--end row-->
                        </div>
                      </div>  
                  </div>

                 </div><!--end row-->
               </div>
              </div>
            </div>
          </form>
      </div><!--end row-->

  </main>
  <!--end page main-->

@endsection