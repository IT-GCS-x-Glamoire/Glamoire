@extends('user.layouts.master')

@section('content')
<section class="mb-2 mb-md-4 md:px-20 lg:px-24 xl:px-24">
  <div class="container-fluid">
    <div class="shadow-sm border border-black rounded-md py-2 py-md-3 my-1 my-md-3">
      <div class="d-flex gap-2 pl-2">
        <a href="/home" class="text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Beranda</a>
        <p class="text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="#" class="text-black text-[7px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Pusat Bantuan</a>
      </div>
    </div>
  </div>

  <div class="container-fluid">
    <nav class="tabbable">
      <div class="nav nav-tabs border-secondary mb-4">
          <a class="nav-item nav-link active text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#akun">Akun</a>
          <a class="nav-item nav-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#order">Pembelian</a>
          <a class="nav-item nav-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#payment">Pembayaran</a>
          <a class="nav-item nav-link text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#shipping">Pengiriman</a>
      </div>
    </nav>

    <div class="tab-content">
      <div class="tab-pane active" id="akun">
        <div class="container mt-5">
          <div class="faq-title text-center">Hal yang sering ditanyakan terkait akun</div>

          <div class="row">
              <div class="col-md-12">
                  <div class="faq-item">
                      <h5>What's the best thing about Switzerland?</h5>
                      <p>I don't know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>How do you make holy water?</h5>
                      <p>You boil the hell out of it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>What do you call someone with no body and no nose?</h5>
                      <p>Nobody knows. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why can't you hear a pterodactyl go to the bathroom?</h5>
                      <p>Because the pee is silent. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why do you never see elephants hiding in trees?</h5>
                      <p>Because they're so good at it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why did the invisible man turn down the job offer?</h5>
                      <p>He couldn't see himself doing it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
              </div>
          </div>

          <div class="contact-info">
              <p>Have a different question and can’t find the answer you’re looking for? Reach out to our support team by <a href="mailto:support@example.com">sending us an email</a> and we’ll get back to you as soon as we can.</p>
          </div>
        </div>
      </div>
      
      <div class="tab-pane" id="order"> 
        <div class="container mt-5">
          <div class="faq-title text-center">Hal yang sering ditanyakan terkait pembelian</div>

          <div class="row">
              <div class="col-md-12">
                  <div class="faq-item">
                      <h5>What's the best thing about Switzerland?</h5>
                      <p>I don't know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>How do you make holy water?</h5>
                      <p>You boil the hell out of it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>What do you call someone with no body and no nose?</h5>
                      <p>Nobody knows. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why can't you hear a pterodactyl go to the bathroom?</h5>
                      <p>Because the pee is silent. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why do you never see elephants hiding in trees?</h5>
                      <p>Because they're so good at it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why did the invisible man turn down the job offer?</h5>
                      <p>He couldn't see himself doing it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
              </div>
          </div>

          <div class="contact-info">
              <p>Have a different question and can’t find the answer you’re looking for? Reach out to our support team by <a href="mailto:support@example.com">sending us an email</a> and we’ll get back to you as soon as we can.</p>
          </div>
        </div>
      </div>
      
      <div class="tab-pane" id="payment">
        <div class="container mt-5">
          <div class="faq-title text-center">Hal yang sering ditanyakan terkait pembayaran</div>

          <div class="row">
              <div class="col-md-12">
                  <div class="faq-item">
                      <h5>What's the best thing about Switzerland?</h5>
                      <p>I don't know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>How do you make holy water?</h5>
                      <p>You boil the hell out of it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>What do you call someone with no body and no nose?</h5>
                      <p>Nobody knows. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why can't you hear a pterodactyl go to the bathroom?</h5>
                      <p>Because the pee is silent. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why do you never see elephants hiding in trees?</h5>
                      <p>Because they're so good at it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why did the invisible man turn down the job offer?</h5>
                      <p>He couldn't see himself doing it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
              </div>
          </div>

          <div class="contact-info">
              <p>Have a different question and can’t find the answer you’re looking for? Reach out to our support team by <a href="mailto:support@example.com">sending us an email</a> and we’ll get back to you as soon as we can.</p>
          </div>
        </div>
      </div>

      <div class="tab-pane" id="shipping">
        <div class="container mt-5">
          <div class="faq-title text-center">Hal yang sering ditanyakan terkait pengiriman</div>

          <div class="row">
              <div class="col-md-12">
                  <div class="faq-item">
                      <h5>What's the best thing about Switzerland?</h5>
                      <p>I don't know, but the flag is a big plus. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>How do you make holy water?</h5>
                      <p>You boil the hell out of it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>What do you call someone with no body and no nose?</h5>
                      <p>Nobody knows. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why can't you hear a pterodactyl go to the bathroom?</h5>
                      <p>Because the pee is silent. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why do you never see elephants hiding in trees?</h5>
                      <p>Because they're so good at it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
                  <div class="faq-item">
                      <h5>Why did the invisible man turn down the job offer?</h5>
                      <p>He couldn't see himself doing it. Lorem ipsum dolor sit amet consectetur adipiscing elit. Quas cupiditate laboriosam fugit.</p>
                  </div>
              </div>
          </div>

          <div class="contact-info">
              <p>Have a different question and can’t find the answer you’re looking for? Reach out to our support team by <a href="mailto:support@example.com">sending us an email</a> and we’ll get back to you as soon as we can.</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
@endsection
