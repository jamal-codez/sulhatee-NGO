<?php
session_start();
include ("./_includes/connection.php");
include ("view/header.php");
?>

<main class="main-content">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-mQagI5bPnE9LFAc7GF8UNv5+5L3p6s9dHZVdrjjUe1SpG1gV8L2nS5pI9O8jzCjil8hTKEczST6B7Yyk1haOGbg==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <!-- Start Page Header Area Wrapper -->
    <div class="page-header-area sec-overlay sec-overlay-black" data-bg-img="assets/img/slider/IMG-20240326-WA0055.jpg">
        <div class="container pt--0 pb--0">
            <div class="row">
                <div class="col-12">
                    <div class="page-header-content">
                        <h2 class="title">SULHATEE POVERTY ALLEVIATION FOUNDATION</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Page Header Area Wrapper -->

    <!-- Start Login Area Wrapper -->
    <section class="account-login-area">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-10 col-lg-7 col-xl-6">
                    <div class="login-register-form-wrap register-form-wrap">
                        <div class="login-register-form">
                            <div class="form-title">
                                <h4 class="title">Set Profile Image</h4>
                            </div>
                            <div class="tab-content" id="pills-tabContent">
                                <div class="tab-pane fade show active" id="candidate" role="tabpanel" aria-labelledby="candidate-tab">
                                <form action="./action/signup_action.php" method="POST" enctype="multipart/form-data">
                                        <input type="hidden" name="action" value="signup_img">
                                        <input type="hidden" name="webcam_image" id="webcam_image">

                                        <!-- Modal for Camera -->
                                        <div class="modal" id="cameraModal" tabindex="-1" role="dialog">
                                            <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Camera</h5>
                                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close" onclick="closeCameraModal()">
                                                            <span aria-hidden="true">&times;</span>
                                                        </button>
                                                    </div>
                                                    <div class="modal-body text-center">
                                                        <video id="cameraFeed" width="100%" height="auto" autoplay require></video>
                                                        <button type="button" class="btn btn-primary mt-3" onclick="captureImage()"><i class="icofont-camera"></i> Capture</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="row mb-3 text-center">
                                            <label for="image" class="form-label">Take a Passport</label>
                                            <div class="col-sm-12 text-center">
                                                <img id="selectedImagePreview" class="img-thumbnail text-center" alt="Selected Image Preview"
                                                     style="max-width: 200px; max-height: 200px; display: none; margin: auto;">
                                            </div>
                                        </div>

                                        <!-- Add a button to trigger the camera -->
                                        <div class="row mb-3">
                                            <label for="applicant_image" class="col-sm-2 col-form-label"></label>
                                            <div class="col-sm-6 d-flex align-items-center justify-content-center">
                                                <input type="file" name="image" hidden id="image" class="form-control" size="30">
                                                <div class="invalid-feedback">Please select a Passport Image.</div>
                                                <button type="button" class="btn btn-success" onclick="openCamera()">  <i class="icofont-camera"></i>  </button>
                                                &nbsp;
                                                <button type="button" class="btn btn-warning" onclick="recaptureImage()">  <i class="icofont-refresh"></i>  </button>
                                            </div>
                                        </div>

                                        <script>
                                            document.getElementById('image').addEventListener('change', function (e) {
                                                var fileInput = e.target;
                                                var selectedImagePreview = document.getElementById('selectedImagePreview');

                                                if (fileInput.files && fileInput.files[0]) {
                                                    var reader = new FileReader();

                                                    reader.onload = function (e) {
                                                        selectedImagePreview.src = e.target.result;
                                                        selectedImagePreview.style.display = 'block';
                                                    };

                                                    reader.readAsDataURL(fileInput.files[0]);
                                                }
                                            });

                                            function openCamera() {
                                                $('#cameraModal').modal('show');
                                                var video = document.getElementById('cameraFeed');
                                                var constraints = { video: true };
                                                navigator.mediaDevices.getUserMedia(constraints)
                                                    .then(function (stream) {
                                                        video.srcObject = stream;
                                                    })
                                                    .catch(function (err) {
                                                        console.error('Error accessing webcam:', err);
                                                    });
                                            }

                                            function captureImage() {
                                                var video = document.getElementById('cameraFeed');
                                                var canvas = document.createElement('canvas');
                                                var context = canvas.getContext('2d');
                                                canvas.width = video.videoWidth;
                                                canvas.height = video.videoHeight;
                                                context.drawImage(video, 0, 0, canvas.width, canvas.height);
                                                var dataURL = canvas.toDataURL('image/png');
                                                var selectedImagePreview = document.getElementById('selectedImagePreview');
                                                selectedImagePreview.src = dataURL;
                                                selectedImagePreview.style.display = 'block';
                                                var hiddenInput = document.getElementById('webcam_image');
                                                hiddenInput.value = dataURL.split(',')[1];
                                                closeCameraModal();
                                            }

                                            function closeCameraModal() {
                                                var video = document.getElementById('cameraFeed');
                                                var stream = video.srcObject;
                                                var tracks = stream.getTracks();
                                                tracks.forEach(track => track.stop());
                                                $('#cameraModal').modal('hide');
                                            }

                                            function recaptureImage() {
                                                document.getElementById('selectedImagePreview').style.display = 'none';
                                                document.getElementById('webcam_image').value = '';
                                                document.getElementById('image').value = '';
                                            }
                                        </script>

                                        <!-- Submit Button -->
                                        <div class="col-12 mt-3 text-center">
                                            <div class="form-group">
                                                <input type="submit" class="btn-theme" name="signup_img" value="Save and Continue">
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- End Login Area Wrapper -->
</main>

<!-- Start Footer Bottom -->
<div class="footer-bottom">
    <div class="container pt--0 pb--0">
        <div class="row">
            <div class="col-12">
                <div class="footer-bottom-content">
                    <p class="copyright">© 2024 Powered By <a target="_blank" href="#">NGSoft Limited.</a> All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- End Footer Bottom -->

<!-- Start Aside Menu -->
<aside class="off-canvas-wrapper offcanvas offcanvas-start" tabindex="-1" id="AsideOffcanvasMenu" aria-labelledby="offcanvasExampleLabel">
    <!-- Your Aside Menu Content Goes Here -->
</aside>
<!-- End Aside Menu -->

<!-- Javascript -->
<script src="assets/js/modernizr.js"></script>
<script src="assets/js/jquery-main.js"></script>
<script src="assets/js/jquery-migrate.js"></script>
<script src="assets/js/popper.min.js"></script>
<script src="assets/js/bootstrap.min.js"></script>
<script src="assets/js/swiper.min.js"></script>
<script src="assets/js/fancybox.min.js"></script>
<script src="assets/js/aos.min.js"></script>
<script src="assets/js/counterup.js"></script>
<script src="assets/js/waypoint.js"></script>
<script src="assets/js/custom.js"></script>

</body>
</html>
