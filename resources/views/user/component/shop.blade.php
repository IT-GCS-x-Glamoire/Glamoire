
@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 py-2">
  <div class="container-fluid">
    <div class="py-2 py-md-3">
      <div class="d-flex gap-2">
        <a href="/home" class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
        <p class="text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="#" class="text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Shop</a>
      </div>
    </div>  
  </div>

  <!-- Shop Start -->
  <div class="container-fluid">
    <div class="row">
      <!-- Shop Sidebar Start -->
      <div class="col-md-3 d-none d-md-block shadow-md rounded-md md:mb-0 lg:mb-0 xl:mb-0">
        <!-- Filter Start -->
         <form action="" id="form-filter">
           <!-- Brands Start -->
            <div class="border-bottom mb-4 pb-4">
              <h5 class="font-weight-semi-bold my-4">Brand</h5>
              <div class="max-h-[150px] overflow-y-auto">

              @for ($a=1; $a <= 8; $a++)
              <div class="form-check ml-2">
                  <input class="form-check-input" type="checkbox" name="brand" id="namebrand-{{$a}}" value="brand-{{$a}}">
                  <label class="form-check-label" for="namebrand-{{$a}}">
                      Brand {{ $a }}
                  </label>
              </div>
              @endfor
                
              </div>
            </div>
            <!-- Brands End -->
 
           <!-- Categories Start -->
           <div class="border-bottom mb-4 pb-4">
             <h5 class="font-weight-semi-bold mb-4">Categories</h5>
             <div class="max-h-[150px] overflow-y-auto">
              @for ($a=1; $a <= 8; $a++)
                <div class="form-check ml-2">
                    <input class="form-check-input" type="checkbox" name="category" id="namecategory-{{$a}}" value="category-{{$a}}">
                    <label class="form-check-label" for="namecategory-{{$a}}">
                        Kategori {{ $a }}
                    </label>
                </div>
                @endfor
             </div>
           </div>
           <!-- Categories End -->
 
           <!-- Price Start -->
           <div class="border-bottom mb-4 pb-4">
             <h5 class="font-weight-semi-bold my-4">Filter by price</h5>
             <div>
               <div class="price-range-container">
                 <div>
                   <label for="min-price" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Harga Terendah: </label><br>
                   <input class="w-full" type="range" id="min-price" name="min-price" min="0" max="500000" step="10000" value="0" oninput="updatePriceRange()"/>
                   <span id="min-price-value" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Rp0</span>
                 </div>
 
                 <div>
                   <label for="max-price" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Harga Tertinggi: </label><br>
                   <input class="w-full" type="range" id="max-price" name="max-price" min="500000" max="1000000" step="10000" value="1000000" oninput="updatePriceRange()"/>
                   <span id="max-price-value" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Rp1,000,000</span>
                 </div>
 
               </div>
             </div>
           </div>
           <!-- Price End -->
 
           <!-- Rating Start -->
           <div class="border-bottom mb-2 mb-md-3">
              <h5 class="font-weight-semi-bold my-4">Ratings</h5>
              <div class="mb-4">
                <div class="form-check ml-2">
                  <input class="form-check-input" type="checkbox" name="rating" id="allRating" value="all">
                  <label class="form-check-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="allRating">All Rating</label>
                </div>
                <div class="form-check ml-2">
                  <input class="form-check-input" type="checkbox" name="rating" id="rating5" value="5">
                  <label class="form-check-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="rating5">
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small>5</small>
                  </label>
                </div>
                <div class="form-check ml-2">
                  <input class="form-check-input" type="checkbox" name="rating" id="rating4" value="4">
                  <label class="form-check-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="rating4">
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small>4</small>
                  </label>
                </div>
                <div class="form-check ml-2">
                  <input class="form-check-input" type="checkbox" name="rating" id="rating3" value="3">
                  <label class="form-check-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="rating3">
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small>3</small>
                  </label>
                </div>
                <div class="form-check ml-2">
                  <input class="form-check-input" type="checkbox" name="rating" id="rating2" value="2">
                  <label class="form-check-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="rating2">
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small>2</small>
                  </label>
                </div>
                <div class="form-check ml-2">
                  <input class="form-check-input" type="checkbox" name="rating" id="rating1 " value="1">
                  <label class="form-check-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="rating1">
                    <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                    <small>1</small>
                  </label>
                </div>
               
               
             </div>
           </div>


           <!-- Rating End -->
 
           <div>
             <button class="btn text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] text-white border w-full rounded-sm mb-2" type="submit" id="useFilter"  style="background-color: #183018">
               Gunakan Filter
             </button>
           </div>
         </form>
        <!-- Filter End -->
      </div>

      <!-- Shop Product Start -->
      <div class="col-md-9">
        <div class="position-sticky" style="top: 2rem">
          <div class="container-fluid">
              <div class="row">
                <div class="d-flex align-items-center justify-content-between p-0 m-0 mb-2 mb-my-4">
                  <form action="">
                    <div class="input-group">
                        <input type="text" class="form-control rounded-start text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" placeholder="Search by name"/>
                        <div class="input-group-append">
                          <span class="btn btn-submit rounded-end input-group-text bg-transparent text-primary text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">
                            <i class="fa fa-search"></i>
                          </span>
                        </div>
                    </div>
                  </form>

                  <div class="dropdown">
                    <button class="btn rounded-sm border dropdown-toggle text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" type="button" id="triggerId" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Sort by
                    </button>
                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="triggerId">
                      <a class="dropdown-item text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]" href="#">Latest</a>
                      <a class="dropdown-item text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]" href="#">Popularity</a>
                      <a class="dropdown-item text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]" href="#">Best Rating</a>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row">
                <!-- Card Items -->
                @for ($i=1;$i <= 8;$i++)
                <div class="col-lg-3 col-md-4 col-6 p-1">
                  <div class="bg-white rounded-lg shadow-sm overflow-hidden product-item border border-xl">
                      <a href="/detail" class="text-decoration-none">
                          <div class="position-relative overflow-hidden bg-transparent p-0">
                              <img class="img-fluid w-100 rounded-md pb-1 md:pb-2 lg:pb-2 xl:pb-2" src="images/produk.png" alt="">
                          </div>
                          <div class="grid gap-1 text-left p-2">
                              <div class="flex justify-content-start gap-1">
                                  <i class="text-decoration-none fas fa-star text-[12px] md:text-[14px] lg:text-[16px] xl:text-[16px]" style="color:orange;"></i>
                                  <p class="text-decoration-none text-black text-[12px] md:text-[12px] lg:text-[14px] xl:text-[14px]">5</p>
                              </div>
                              <h1 class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] product-title" id="product{{$i}}">Everlaskin 2in1 Fill and Clean Gentle Scalp & Body Massager</h1>
                              <div class="flex justify-content-start gap-1">
                                  <p class="text-decoration-none text-black text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px] text-primary">Rp519.000</p>
                                  <!-- <p class="text-muted text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]"><del>Rp810.000</del></p> -->
                              </div>
                          </div>
                          <div class="flex justify-content-between px-2">
                              <a href="/detail" class="col-4 text-decoration-none text-[#183018] p-0 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red text-center">
                                  <i class="fas fa-eye"></i>
                                  Detail
                              </a>
                              <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#183018] p-0 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red text-center" onclick="addToWishlist()">
                                  <i class="fas fa-heart"></i> Wishlist
                              </a>
                              <a href="javascript:void(0);" class="col-4 text-decoration-none text-[#183018] p-0 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] grid hover-red text-center" onclick="addToCart()">
                                  <i class="fas fa-shopping-cart"></i>
                                  Cart
                              </a>
                          </div>
                      </a>
                  </div>
                </div>
                @endfor
                <!-- End Card Items -->
              </div>

              <!-- Repeat this block for each card -->
              <!-- Pagination and Navigation -->
              <div class="col-12 pt-12">
                  <nav aria-label="Page navigation">
                      <ul class="pagination justify-content-center mb-3">
                          <li class="page-item disabled">
                              <a class="page-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" href="#" aria-label="Previous">
                                  <span aria-hidden="true">&laquo;</span>
                                  <span class="sr-only text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Previous</span>
                              </a>
                          </li>
                          <li class="page-item active">
                              <a class="page-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" href="#">1</a>
                          </li>
                          <li class="page-item"><a class="page-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" href="#">2</a></li>
                          <li class="page-item"><a class="page-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" href="#">3</a></li>
                          <li class="page-item">
                              <a class="page-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" href="#" aria-label="Next">
                                  <span aria-hidden="true">&raquo;</span>
                                  <span class="sr-only text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Next</span>
                              </a>
                          </li>
                      </ul>
                  </nav>
              </div>
          </div>
        </div>
      </div>
      <!-- Shop Product End -->
    </div>
  </div>
  <!-- Shop End -->
</div>

<div class="d-flex d-block d-md-none mx-auto justify-content-center rounded-md w-fit py-2 fixed-bottom mb-12" style="background-color:#183018;">
  <div class="col d-flex justify-content-center gap-1">
    <i class="fas fa-regular fa-filter" style="color: #ffffff;"></i>
    <a class="text-white text-[12px] md:text-[10px] lg:text-[11px] xl:text-[12px]" data-bs-toggle="modal" data-bs-target="#filter">Filter</a>
  </div>
</div>

<!-- MODAL FILTER -->
<div class="modal fade" id="filter" tabindex="-1" aria-labelledby="filter" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content overflow-y-auto" style="max-height:90vh;">
      <div class="modal-header" style="background-color: #183018">
        <h1 class="modal-title text-white text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="exampleModalLabel">Form Filter Produk</h1>
        <button type="button" class="btn-close" style="color:#FFFFFF;" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>

      <div class="modal-body overflow-y-auto" style="max-height:100vh;">
        <form action="" id="form-filter-mobile">
           <!-- Brands Start -->
           <div class="border-bottom">
             <h5 class="font-weight-semi-bold my-2">Brand</h5>
             <div class="max-h-[150px] overflow-y-auto">

                @for ($j=1;$j <= 8; $j++)
                  <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between mb-1">
                    <input type="checkbox" class="custom-control-input text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" id="brand-all-mobile-{{$j}}"/>
                    <label class="custom-control-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="brand-all">Brand {{ $j }}</label>
                  </div>
                @endfor
               
             </div>
           </div>
           <!-- Brands End -->
 
           <!-- Categories Start -->
           <div class="border-bottom">
             <h5 class="font-weight-semi-bold my-2">Categories</h5>
             <div class="max-h-[150px] overflow-y-auto pb-2">
              
                @for ($k=1;$k <= 8; $k++)
                <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                  <input type="checkbox" class="custom-control-input" id="categories-{{$k}}"/>
                  <label class="custom-control-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="makeup">Kategori {{ $k }}</label>
                </div>
                @endfor
             
            </div>
           </div>
           <!-- Categories End -->
 
           <!-- Price Start -->
           <div class="border-bottom">
             <h5 class="font-weight-semi-bold my-2">Filter by price</h5>
             <div>
               <div class="price-range-container">
                 <div class="grid gap-1">
                   <label for="min-price" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Harga Terendah: </label>
                   <input class="w-full" type="range" id="min-price-mobile" name="min-price" min="0" max="500000" step="10000" value="0" oninput="updatePriceRange()"/>
                   <span id="min-price-value" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Rp0</span>
                 </div>
 
                 <div class="grid gap-1">
                   <label for="max-price" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Harga Tertinggi: </label>
                   <input class="w-full" type="range" id="max-price-mobile" name="max-price" min="500000" max="1000000" step="10000" value="1000000" oninput="updatePriceRange()"/>
                   <span id="max-price-value" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Rp1,000,000</span>
                 </div>
 
               </div>
             </div>
           </div>
           <!-- Price End -->
 
           <!-- Rating Start -->
           <div class="border-bottom mb-2">
             <h5 class="font-weight-semi-bold my-2">Ratings</h5>
             <div>
               <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                 <input type="checkbox" class="custom-control-input" checked id="all-rating-mobile"/>
                 <label class="custom-control-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="rating-all">All Rating</label>
               </div>
               <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                 <input type="checkbox" class="custom-control-input" id="mobile-rating-5" value="5"/>
                 <label class="custom-control-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="5">
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small>5</small>
                 </label>
               </div>
               <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                 <input type="checkbox" class="custom-control-input" id="mobile-rating-4" value="4"/>
                 <label class="custom-control-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="4">
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small>4</small>
                 </label>
               </div>
               <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                 <input type="checkbox" class="custom-control-input" id="mobile-rating-3" value="3"/>
                 <label class="custom-control-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="3">
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small>3</small>
                 </label>
               </div>
               <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                 <input type="checkbox" class="custom-control-input" id="mobile-rating-2" value="2"/>
                 <label class="custom-control-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="2">
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small>2</small>
                 </label>
               </div>
               <div class="custom-control custom-checkbox d-flex align-items-center justify-content-between">
                 <input type="checkbox" class="custom-control-input" id="mobile-rating-1" value="1"/>
                 <label class="custom-control-label text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" for="2">
                   <small class="fas fa-star text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="color:orange;"></small>
                   <small>1</small>
                 </label>
               </div>
             </div>
           </div>
           <!-- Rating End -->
 
           <div>
              <button class="btn text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] text-white border w-full rounded-sm mb-2" type="submit" id="useFilterMobile"  style="background-color: #183018">
                Gunakan Filter
              </button>
              <button class="btn text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] text-white border w-full rounded-sm mb-2" type="submit" id="resetFilterMobile"  style="background-color: #183018">
                Reset Filter
              </button>
           </div>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- END MODAL FILTER -->

<script>
  document.querySelectorAll('input[type="checkbox"]').forEach(function (checkbox) {
    checkbox.addEventListener('change', function () {
      if (this.checked) {
        // Deselect other checkboxes with the same name
        document.querySelectorAll('input[name="' + this.name + '"]').forEach(function (otherCheckbox) {
          if (otherCheckbox !== checkbox) {
            otherCheckbox.checked = false;
          }
        });
      }
    });
  });
</script>

@endsection

