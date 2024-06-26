<?php
session_start();

include ("_includes\connection.php");
include_once ("view/header.php");
?>
  
  <main class="main-content">
    <!--== Start Page Header Area Wrapper ==-->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/slider/IMG-20240326-WA0055.jpg">
      <div class="container pt--0 pb--0">
        <div class="row">
          <div class="col-12">
            <div class="page-header-content">
              <h2 class="title">Gallary</h2>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!--== End Page Header Area Wrapper ==-->

    <!--== Start Blog Area Wrapper ==-->
    <section class="blog-area blog-grid-area">
      <div class="container">
        <div class="row">

          <div class="col-sm-6 col-lg-4">
            <!--== Start Blog Post Item ==-->
            <div class="post-item">
              <div class="thumb">
                <a href="#"><img src="assets/img/slider/IMG-20240326-WA0111.jpg" alt="Image" width="370" height="270"></a>
              </div>
            </div>
            <!--== End Blog Post Item ==-->
          </div>

          <div class="col-sm-6 col-lg-4">
            <!--== Start Blog Post Item ==-->
            <div class="post-item">
              <div class="thumb">
                <a href="#"><img src="assets/img/slider/IMG-20240326-WA0108.jpg" alt="Image" width="370" height="270"></a>
              </div>
            </div>
            <!--== End Blog Post Item ==-->
          </div>

          <div class="col-sm-6 col-lg-4">
            <!--== Start Blog Post Item ==-->
            <div class="post-item">
              <div class="thumb">
                <a href="#"><img src="assets/img/slider/IMG-20240326-WA0106.jpg" alt="Image" width="370" height="270"></a>
              </div>
            </div>
            <!--== End Blog Post Item ==-->
          </div>
          
          <div class="col-sm-6 col-lg-4">
            <!--== Start Blog Post Item ==-->
            <div class="post-item">
              <div class="thumb">
                <a href="#"><img src="assets/img/slider/IMG-20240326-WA0089.jpg" alt="Image" width="370" height="270"></a>
              </div>
            </div>
            <!--== End Blog Post Item ==-->
          </div>
          
        </div>
        <div class="row">
          <div class="col-lg-12 text-center">
            <div class="pagination-area">
              <nav>
                <ul class="page-numbers d-inline-flex">
                  <li>
                    <a class="page-number active" href="#">1</a>
                  </li>
                  <li>
                    <a class="page-number" href="#">2</a>
                  </li>
                  <li>
                    <a class="page-number" href="#">3</a>
                  </li>
                  <li>
                    <a class="page-number" href="#">4</a>
                  </li>
                  <li>
                    <a class="page-number next" href="#">
                      <i class="icofont-long-arrow-right"></i>
                    </a>
                  </li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!--== End Blog Area Wrapper ==-->
  </main>

  <?php
include ("view/footer.php");
?>