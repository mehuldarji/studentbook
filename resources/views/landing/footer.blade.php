<footer class="">
    <!-- fixed-bottom -->
    <div class="container footerDesign">
        <div class="row">
            <div class="col-lg-5 col-md-5 col-xs-12 col-sm-12 footerabut footer-border  pl-4">
                <h4 class="widget-title">About Our Company</h4>
                <p>Leaders in IT consulting, offshore Mobile Application development, testing and user interface design. With more than 4 years executing highly technical projects on-time, within scope and with lower cost than similar U.S./European-based development centers. We work on projects of diverse complexity, ranging from simple information systems and web sites to complex enterprise type architectures, mobile or web-enabled applications, traditional n-tier and service oriented architectures.</p>
            </div>
            <div class="col-lg-4 col-md-4 col-xs-12 col-sm-12 pl-5 footer-border">
                <h4 class="widget-title">Usefull Link</h4>
                <ul id="menu-footer-menu-links-1" class="menu">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14"><a href="#">Sign Up</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="#">Help Center</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="#">About</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="#">Blog</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="#">Careers</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="#">Learning</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="#">Jobs</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="#">People</a></li>

                </ul>
            </div>
            <div class="col-lg-3 col-md-3 col-xs-12 col-sm-12  pl-5">
                <h4 class="widget-title">Browse</h4>
                <ul id="menu-footer-menu-links-1" class="menu">
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-14"><a href="#">Privacy Policy</a></li>
                    <li class="menu-item menu-item-type-custom menu-item-object-custom menu-item-15"><a href="#">Terms & Conditions</a></li>
                    <ul id="appicon">
                        <li><a href="#"><img src="{{ asset('img/android.png') }}" width="135" height="40" alt="android"></a></li>
                        <li><a href="#"><img src="{{ asset('img/ios.png') }}" width="135" height="40" alt="ios"></a></li>


                    </ul>

                </ul>
            </div>
        </div>
    </div>
    <div class="container-fuild copyright">
        <div class="container copyright">
            <div class="d-flex justify-content-between align-items-center">

                <p class="small text-muted mb-0">Copyright © <?= date('Y') ?> {{ config('constants.PROJECT_NAME'); }}. All Rights Reserved..</p>


                <ul class="list-inline mb-0">
                    <li class="list-inline-item">
                        <a class="btn btn-sm btn-light" href="#">
                            <span class="feather-facebook"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-sm btn-light" href="#">
                            <span class="feather-youtube"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-sm btn-light" href="#">
                            <span class="feather-twitter"></span>
                        </a>
                    </li>
                    <li class="list-inline-item">
                        <a class="btn btn-sm btn-light" href="#">
                            <span class="feather-github"></span>
                        </a>
                    </li>
                </ul>

            </div>
        </div>
    </div>
</footer>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}" type="48632658e8f27a523ee43f01-text/javascript"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}" type="48632658e8f27a523ee43f01-text/javascript"></script>

<script type="48632658e8f27a523ee43f01-text/javascript" src="{{ asset('vendor/slick/slick.min.js') }}"></script>

<script src="{{ asset('js/osahan.js') }}" type="48632658e8f27a523ee43f01-text/javascript"></script>
<script src="{{ asset('js/rocket-loader.min.js') }}" data-cf-settings="48632658e8f27a523ee43f01-|49" defer=""></script>
<script defer src="https://static.cloudflareinsights.com/beacon.min.js/vaafb692b2aea4879b33c060e79fe94621666317369993" integrity="sha512-0ahDYl866UMhKuYcW078ScMalXqtFJggm7TmlUtp0UlD4eQk0Ixfnm5ykXKvGJNFjLMoortdseTfsRT8oCfgGA==" data-cf-beacon='{"rayId":"76af6bd18c369ba0","version":"2022.11.0","r":1,"token":"dd471ab1978346bbb991feaa79e6ce5c","si":100}' crossorigin="anonymous"></script>
<script>
 $("document").ready(function() {
        $(".loader").fadeOut("slow");

    });
    </script>

</body>

</html>