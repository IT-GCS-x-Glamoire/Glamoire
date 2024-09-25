@extends('user.layouts.master')

@section('content')
<section class="md:px-20 lg:px-24 xl:px-24">
  <div class="container-fluid mb-2 mb-md-4">
    <div class="d-flex gap-2">
      <a href="/home" class="text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Home</a>
      <p class="text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
      <a href="#" class="text-black text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Help Center</a>
    </div>
  </div>

  <div class="container-fluid">
    <nav class="tabbable">
      <div class="nav nav-tabs border-secondary mb-4">
          <a class="nav-item nav-link active text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#akun">Akun</a>
          <a class="nav-item nav-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#order">Order</a>
          <a class="nav-item nav-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#payment">Payment</a>
          <a class="nav-item nav-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#shipping">Shipping</a>
      </div>
    </nav>

    <div class="tab-content">
      <div class="tab-pane active" id="akun">
  
      <div id="accordion-color" data-accordion="collapse" data-active-classes="bg-blue-100 dark:bg-gray-800 text-blue-600 dark:text-white">
        <h2 id="accordion-color-heading-1">
          <button type="button" class="flex items-center justify-between w-full p-3 p-md-4 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 rounded-t-xl focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-1" aria-expanded="true" aria-controls="accordion-color-body-1">
            <span class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">What is Flowbite?</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
          </button>
        </h2>
        <div id="accordion-color-body-1" class="hidden" aria-labelledby="accordion-color-heading-1">
          <div class="p-3 p-md-4 border border-b-0 border-gray-200 dark:border-gray-700 dark:bg-gray-900">
            <p class="mb-2 text-gray-500 dark:text-gray-400 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Flowbite is an open-source library of interactive components built on top of Tailwind CSS including buttons, dropdowns, modals, navbars, and more.</p>
          </div>
        </div>

        <h2 id="accordion-color-heading-2">
          <button type="button" class="flex items-center justify-between w-full p-3 p-md-4 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-2" aria-expanded="false" aria-controls="accordion-color-body-2">
            <span class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Is there a Figma file available?</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
          </button>
        </h2>
        <div id="accordion-color-body-2" class="hidden" aria-labelledby="accordion-color-heading-2">
          <div class="p-3 p-md-4 border border-b-0 border-gray-200 dark:border-gray-700">
            <p class="mb-2 text-gray-500 dark:text-gray-400 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
            <p class="text-gray-500 dark:text-gray-400 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
          </div>
        </div>

        <h2 id="accordion-color-heading-3">
          <button type="button" class="flex items-center justify-between w-full p-3 p-md-4 font-medium rtl:text-right text-gray-500 border border-b-0 border-gray-200 focus:ring-4 focus:ring-blue-200 dark:focus:ring-blue-800 dark:border-gray-700 dark:text-gray-400 hover:bg-blue-100 dark:hover:bg-gray-800 gap-3" data-accordion-target="#accordion-color-body-3" aria-expanded="false" aria-controls="accordion-color-body-3">
            <span class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Is there a Figma file available?</span>
            <svg data-accordion-icon class="w-3 h-3 rotate-180 shrink-0" aria-hidden="true" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 10 6">
              <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5 5 1 1 5"/>
            </svg>
          </button>
        </h2>
        <div id="accordion-color-body-3" class="hidden" aria-labelledby="accordion-color-heading-3">
          <div class="p-3 p-md-4 border border-b-0 border-gray-200 dark:border-gray-700">
            <p class="mb-2 text-gray-500 dark:text-gray-400 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Flowbite is first conceptualized and designed using the Figma software so everything you see in the library has a design equivalent in our Figma file.</p>
            <p class="text-gray-500 dark:text-gray-400 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Check out the <a href="https://flowbite.com/figma/" class="text-blue-600 dark:text-blue-500 hover:underline">Figma design system</a> based on the utility classes from Tailwind CSS and components from Flowbite.</p>
          </div>
        </div>
      </div>

      </div>
      <div class="tab-pane" id="order"> 
        <div class="accordion" id="accordionExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
              <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
                How do I place an order?
              </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse show" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
              <div class="accordion-body">
              To place an order, browse our product catalog, add the items you want to your cart, and proceed to checkout. Follow the on-screen instructions to complete your purchase.
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                Can I change or cancel my order?
              </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                Once an order is placed, it is immediately processed to ensure quick delivery. If you need to make changes or cancel your order, please contact our customer service team as soon as possible. We will do our best to accommodate your request.  
              </div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                How can I track my order?
              </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
              <div class="accordion-body">
                After placing an order, you will receive a confirmation email with a tracking number. Use this number on our 'Order Tracking' page to see the current status of your order.   
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="tab-pane" id="payment">
          <div class="row">
              <div class="col-md-6">
                  <h4 class="mb-4 text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">1 review for "Colorful Stylish Shirt"</h4>
                  
                  <div class="media mb-4">
                      <img src="images/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                      <div class="media-body">
                          <h6 class="mb-2 text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]">John Doe<small> - <i>01 Jan 2045</i></small></h6>
                          <div class="text-primary mb-2 d-flex">
                              <i class="fas fa-star mr-1 text-[14px] md:text-[16px] lg:text-[18px] xl:text-[18px]" style="color:orange;"></i>
                              <p class="text-[12px] md:text-[14px] lg:text-[16x] xl:text-[16px]">5</p>
                          </div>
                          <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                      </div>
                  </div>
                  <div class="media mb-4">
                      <img src="images/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                      <div class="media-body">
                          <h6 class="mb-2 text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]">John Doe<small> - <i>01 Jan 2045</i></small></h6>
                          <div class="text-primary mb-2 d-flex">
                              <i class="fas fa-star mr-1 text-[14px] md:text-[16px] lg:text-[18px] xl:text-[18px]" style="color:orange;"></i>
                              <p class="text-[12px] md:text-[14px] lg:text-[16x] xl:text-[16px]">5</p>
                          </div>
                          <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                      </div>
                  </div>
                  <div class="media mb-4">
                      <img src="images/user.jpg" alt="Image" class="img-fluid mr-3 mt-1" style="width: 45px;">
                      <div class="media-body">
                          <h6 class="mb-2 text-[12px] md:text-[12px] lg:text-[14px] xl:text-[16px]">John Doe<small> - <i>01 Jan 2045</i></small></h6>
                          <div class="text-primary mb-2 d-flex">
                              <i class="fas fa-star mr-1 text-[14px] md:text-[16px] lg:text-[18px] xl:text-[18px]" style="color:orange;"></i>
                              <p class="text-[12px] md:text-[14px] lg:text-[16x] xl:text-[16px]">5</p>
                          </div>
                          <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Diam amet duo labore stet elitr ea clita ipsum, tempor labore accusam ipsum et no at. Kasd diam tempor rebum magna dolores sed sed eirmod ipsum.</p>
                      </div>
                  </div>
              </div>
          </div>
      </div>
      <div class="tab-pane" id="shipping">
        <div class="accordion accordion-flush" id="accordionFlushExample">
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingOne">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseOne" aria-expanded="false" aria-controls="flush-collapseOne">
                What are the shipping options?
              </button>
            </h2>
            <div id="flush-collapseOne" class="accordion-collapse collapse" aria-labelledby="flush-headingOne" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">We offer standard and express shipping options. Standard shipping typically takes 3-5 business days, while express shipping takes 1-2 business days. Shipping rates and times vary depending on your location.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingTwo">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseTwo" aria-expanded="false" aria-controls="flush-collapseTwo">
                How can I qualify for free shipping?
              </button>
            </h2>
            <div id="flush-collapseTwo" class="accordion-collapse collapse" aria-labelledby="flush-headingTwo" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">We offer free standard shipping on orders over a certain amount. Please check our website for the current free shipping threshold.</div>
            </div>
          </div>
          <div class="accordion-item">
            <h2 class="accordion-header" id="flush-headingThree">
              <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#flush-collapseThree" aria-expanded="false" aria-controls="flush-collapseThree">
                What should I do if my order is delayed or lost?
              </button>
            </h2>
            <div id="flush-collapseThree" class="accordion-collapse collapse" aria-labelledby="flush-headingThree" data-bs-parent="#accordionFlushExample">
              <div class="accordion-body">If your order is delayed or lost, please contact our customer service team. We will work with the shipping carrier to locate your order and ensure it reaches you as soon as possible.</div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
