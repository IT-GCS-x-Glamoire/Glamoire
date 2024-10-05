@extends('user.layouts.master')

@section('content')
<div class="md:px-20 lg:px-24 xl:px-24 py-2">
  <div class="container-fluid">
    <div class="shadow-sm border border-black rounded-md py-2 py-md-3 my-1 my-md-3">
      <div class="d-flex gap-2 pl-2">
        <a href="/" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Beranda</a>
        <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="/newsletter" class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Artikel</a>
        <p class="text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]"> > </p>
        <a href="#" class="text-black text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</a>
      </div>
    </div>

    <div class="row">
      <div class="col-md-8 col-12 border-right border-bottom">
        <div class="pb-2 mb-2 border-bottom">
          <div class="d-flex gap-2 mb-2">
            <h3 class="text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px]">CATEGORY</h3>
            <h3 class="text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px]">|</h3>
            <h3 class="text-[12px] md:text-[14px] lg:text-[16px] xl:text-[18px]">29 Agustus 2024</h3>
          </div>
          <div class="mb-2">
            <h1 class="font-bold">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
          </div>
          <div class="d-flex">
            <h6  class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">by <a class="font-bold">Admin Glamoire</a></h6>
          </div>
        </div>
      

        <article class="blog-post">
          <img src="images/carousel-1.jpg" alt="">

          <p class="text-justify text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] py-2">
            Produk skincare kedua MERIT setelah Great Skin™ Instant Glow Serum ini memiliki bahan utama Great Skin Complex™ yang merupakan inovasi dari merek tersebut yang terbuat dari campuran peptides, spermidine, dan polysaccharides yang dikembangkan untuk manfaat hidrasi dan perlindungan jangka pendek dan jangka panjang.
          </p>

          <p class="text-justify text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] py-2">
          Menariknya, Great Skin Complex™ berasal dari sumber unik yang tidak terduga, yakni food waste atau limbah makanan. Semua elemen Complex bersumber dari produk sampingan arctic microalgae yang tumbuh secara berkelanjutan di reaktor Islandia untuk industri makanan.
          </p>
          
          <p class="text-justify text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] py-2">
          “Salah satu fondasi utama dari setiap dasar yang sehat dan bercahaya adalah hidrasi. Produk perawatan kulit terbaru MERIT, Great Skin Moisturizer, sangat cocok untuk memberikan kelembapan jangka pendek dan jangka panjang pada kulit,” kata perwakilan merek dan ahli estetika Biba de Sousa, dilansir dari siaran pers.
          </p>
        </article>

        <div class="d-flex mb-2 gap-2 justify-content-end">
          <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Share this post : </p>
          <a href="" title="Facebook Glamoire" target="_blank" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">
            <i class="fab fa-facebook fa-lg"></i>
          </a>
          <a href="" title="Twitter Glamoire" target="_blank" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">
            <i class="fab fa-twitter fa-lg"></i>
          </a>
          <a href="https://www.instagram.com/glamoire.idn/" title="Instagram Glamoire" target="_blank" class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">
            <i class="fab fa-instagram fa-lg"></i>
          </a>
        </div>


        <div class="py-4">
          <h6 class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Comments</h6>

          @if (session('id_user'))
            <form class="my-4" name="comment-form" id="comment-form">
              <div>
                <input type="text" class="hidden" name="article_id" id="article_id" value="12">
                <p class="py-2 px-4 rounded-sm badge badge-white border text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px] text-black font-light">{{ session('username') }}</p>
              </div>
              <div class="control-group w-full py-1">
                <textarea class="form-control text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]"  rows="2" id="comment" placeholder="Masukkan Komentar Anda" name="comment" required="required" data-validation-required-message="Please enter your comment"></textarea>
                <p class="help-block text-danger"></p>
              </div>
              <div class="w-full">
                <button class="btn w-full rounded-sm text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]" style="background-color: #183018" type="submit" id="sendArticleComment"><p class="text-white">Kirim Komentar</p></button>
              </div>
            </form>
          @endif
          
          <div class="bg-secondary p-2">
            <div class="d-flex gap-2 border-bottom mb-1">
              <i class="fa fa-thin fa-user"></i>
              <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Username</p>
            </div>
            <div>
              <p class="text-[10px] md:text-[12px] lg:text-[14px] xl:text-[16px]">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Donec ligula nibh, interdum non enim sit amet, iaculis aliquet nunc.</p>
            </div>
          </div>
        </div>
      </div>

      <div class="col-md-4 pt-2 pt-md-0">
        <div class="position-sticky" style="top: 2rem">
          <div class="mb-3 bg-light rounded">

            <nav class="tabbable">
              <div class="nav nav-tabs mb-4" id="nav-tab" role="tablist">
                <a class="nav-item nav-link active text-[8px] md:text-[12px] lg:text-[14px] xl:text-[16px]" data-toggle="tab" href="#all">All</a>
                <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#newest">Newest</a>
                <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#beauty">Beauty</a>
                <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#skincare">Skincare</a>
                <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#dailyroutine">Daily Tips</a>
                <a class="nav-item nav-link text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]" data-toggle="tab" href="#dailyroutine">Daily Tips</a>
              </div>
            </nav>
        
            <div class="tab-content p-1 md:p-4 lg:md-4 xl:md-4 m-0">
              <div class="tab-pane fade show active overflow-y-auto overflow-x-hidden  minimal-scrollbar" style="max-height:100vh;" id="all">
                <div class="row gap-4">
                  <!-- Card Items -->

                  @for ($i=1; $i <= 4; $i++)
                  <div class="border-bottom pb-3 d-flex gap-2">
                    <img  class="w-1/4" src="images/produk.png" alt="">
                    <div>
                      <div class="d-flex gap-2 mb-2">
                        <h3 class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">CATEGORY</h3>
                        <h3 class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">|</h3>
                        <h3 class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">29 Agustus 2024</h3>
                      </div>
                      <div class="mb-2">
                        <a href="/blog">
                          <h1 class="font-bold text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                        </a>
                      </div>
                      <div class="d-flex">
                        <h6  class="text-[10px] md:text-[6px] lg:text-[8px] xl:text-[10px]">by <span class="font-bold">Admin Glamoire</span></h6>
                      </div>
                    </div>
                  </div>
                  @endfor
                  
                  <!-- End Card Items -->
                </div>
              </div>

              <div class="tab-pane fade overflow-y-auto overflow-x-hidden" id="newest">
                <div class="row gap-4">
                  <!-- Card Items -->
                  <div class="border-bottom pb-3 d-flex gap-2">
                    <img  class="w-1/4" src="images/produk.png" alt="">
                    <div>
                      <div class="d-flex gap-2 mb-2">
                        <h3 class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">CATEGORY</h3>
                        <h3 class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">|</h3>
                        <h3 class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">29 Agustus 2024</h3>
                      </div>
                      <div class="mb-2">
                        <h1 class="font-bold text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                      </div>
                      <div class="d-flex">
                        <h6  class="text-[10px] md:text-[6px] lg:text-[8px] xl:text-[10px]">by <a class="font-bold">Admin Glamoire</a></h6>
                      </div>
                    </div>
                  </div>
                  <div class="border-bottom pb-3 d-flex gap-2">
                    <img  class="w-1/4" src="images/produk.png" alt="">
                    <div>
                      <div class="d-flex gap-2 mb-2">
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">CATEGORY</h3>
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">|</h3>
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">29 Agustus 2024</h3>
                      </div>
                      <div class="mb-2">
                        <h1 class="font-bold text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                      </div>
                      <div class="d-flex">
                        <h6  class="text-[4px] md:text-[6px] lg:text-[8px] xl:text-[10px]">by <a class="font-bold">Admin Glamoire</a></h6>
                      </div>
                    </div>
                  </div>
                  <div class="border-bottom pb-3 d-flex gap-2">
                    <img  class="w-1/4" src="images/produk.png" alt="">
                    <div>
                      <div class="d-flex gap-2 mb-2">
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">CATEGORY</h3>
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">|</h3>
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">29 Agustus 2024</h3>
                      </div>
                      <div class="mb-2">
                        <h1 class="font-bold text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                      </div>
                      <div class="d-flex">
                        <h6  class="text-[4px] md:text-[6px] lg:text-[8px] xl:text-[10px]">by <a class="font-bold">Admin Glamoire</a></h6>
                      </div>
                    </div>
                  </div>
                  <!-- End Card Items -->
                </div>
              </div>

              <div class="tab-pane fade overflow-y-auto overflow-x-hidden" id="beauty">
                <div class="row gap-4">
                  <!-- Card Items -->
                  <div class="border-bottom pb-3 d-flex gap-2">
                    <img  class="w-1/4" src="images/produk.png" alt="">
                    <div>
                      <div class="d-flex gap-2 mb-2">
                        <h3 class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">CATEGORY</h3>
                        <h3 class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">|</h3>
                        <h3 class="text-[10px] md:text-[8px] lg:text-[10px] xl:text-[12px]">29 Agustus 2024</h3>
                      </div>
                      <div class="mb-2">
                        <h1 class="font-bold text-[10px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                      </div>
                      <div class="d-flex">
                        <h6  class="text-[10px] md:text-[6px] lg:text-[8px] xl:text-[10px]">by <a class="font-bold">Admin Glamoire</a></h6>
                      </div>
                    </div>
                  </div>
                  <div class="border-bottom pb-3 d-flex gap-2">
                    <img  class="w-1/4" src="images/produk.png" alt="">
                    <div>
                      <div class="d-flex gap-2 mb-2">
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">CATEGORY</h3>
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">|</h3>
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">29 Agustus 2024</h3>
                      </div>
                      <div class="mb-2">
                        <h1 class="font-bold text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                      </div>
                      <div class="d-flex">
                        <h6  class="text-[4px] md:text-[6px] lg:text-[8px] xl:text-[10px]">by <a class="font-bold">Admin Glamoire</a></h6>
                      </div>
                    </div>
                  </div>
                  <div class="border-bottom pb-3 d-flex gap-2">
                    <img  class="w-1/4" src="images/produk.png" alt="">
                    <div>
                      <div class="d-flex gap-2 mb-2">
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">CATEGORY</h3>
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">|</h3>
                        <h3 class="text-[6px] md:text-[8px] lg:text-[10px] xl:text-[12px]">29 Agustus 2024</h3>
                      </div>
                      <div class="mb-2">
                        <h1 class="font-bold text-[8px] md:text-[10px] lg:text-[12px] xl:text-[14px]">Experts: Apakah Sampo Non SLS Bisa Bikin Rambut Kering & Kulit Kepala Gatal?</h1>
                      </div>
                      <div class="d-flex">
                        <h6  class="text-[4px] md:text-[6px] lg:text-[8px] xl:text-[10px]">by <a class="font-bold">Admin Glamoire</a></h6>
                      </div>
                    </div>
                  </div>
                  <!-- End Card Items -->
                </div>
              </div>
            </div>

          </div>
        </div>
      </div>
    </div>
  </div>
</div>

<script>
  $(document).on("submit", "#comment-form", function (e) {
    e.preventDefault();

    let articleId = $("#article_id").val();
    let comment    = $("#comment").val();

    console.log({
      articleId,
      comment,
    });

    $.ajax({
        url: "{{ route('comment.article') }}",
        type: "POST",
        data: {
            _token: "{{ csrf_token() }}",
            articleId: articleId,
            comment: comment,
        },
        success: function (response) {
            if (response.success) {
              Toast.fire({
                icon: "success",
                text: response.message,
                title: "Berhasil",
                willOpen: () => {
                  const title = document.querySelector('.swal2-title');
                  const content = document.querySelector('.swal2-html-container');
                  if (title) title.style.color = '#ffffff'; // Ubah warna judul
                  if (content) content.style.color = '#ffffff'; // Ubah warna konten
                }
              }).then(function () {
                window.refresh(); // Redirect ke halaman utama atau halaman lain
              });
            } else {
                let errors = response.errors;
                let errorMessages = response.message;
                for (const key in errors) {
                    if (errors.hasOwnProperty(key)) {
                        errorMessages += errors[key][0] + "<br>";
                    }
                }
                Swal.fire("Error", errorMessages, "error");
            }
        },
        error: function (response) {
            Swal.fire("Error", "Maaf, Coba Lagi", "error");
        },
    });
  });
</script>
@endsection