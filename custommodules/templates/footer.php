<footer>
    <div class="container-fluid bg-dark">
        <div class="row">
            <div class="col-12">
                <div class="footer-wrapper">
                    <a href="<?php echo rex_getUrl(5); ?>">Impressum</a>
                    <a href="<?php echo rex_getUrl(6); ?>">Datenschutzerklärung</a>
                </div>
            </div>
        </div>
    </div>
</footer>
<?php
echo '<!--<script src="/assets/addons/' . $addonName . '/frontend/bootstrap.min.js"></script>-->';


$slicksliderInUse = rex_config::get("' . $addonName . '", "slickslider");
$photoswipeInUse = rex_config::get("' . $addonName . '", "photoswipe");
$tinysliderInUse = rex_config::get("' . $addonName . '", "tinyslider");
$isotopeInUse = rex_config::get("' . $addonName . '", "isotope");
$mswitchInUse = rex_config::get("' . $addonName . '", "mswitch");
$countUpInUse = rex_config::get("' . $addonName . '", "countUp");
$fontawesomeInUse = rex_config::get("' . $addonName . '", "fontawesome");
if (isset($slicksliderInUse) && $slicksliderInUse) {
    echo '<script src="/assets/addons/' . $addonName . '/frontend/slick-slider/slick.min.js"></script>';
}
if (isset($photoswipeInUse) && $photoswipeInUse) {
    echo '<script src="/assets/addons/' . $addonName . '/photoswipe.min.js"></script>
        <script src="/assets/addons/' . $addonName . '/photoswipe-ui-default.min.js"></script>';
}
if (isset($tinysliderInUse) && $tinysliderInUse) {
    echo '<script src="/assets/addons/' . $addonName . '/tiny-slider.js"></script>';
}
if (isset($isotopeInUse) && $isotopeInUse) {
}
if (isset($mswitchInUse) && $mswitchInUse) {
    echo '<script src="/assets/addons/' . $addonName . '/mswitch/jquery.mswitch.js"></script>';
}
if (isset($countUpInUse) && $countUpInUse) {
    echo '<script src="/assets/addons/' . $addonName . '/countUp.min.js" type="module"></script>';
}
if (isset($fontawesomeInUse) && $fontawesomeInUse) {
    echo '<script src="/assets/addons/' . $addonName . '/frontend/fontawesome-free-5.11.2-web/js/fontawesome.min.js"></script>';
}
?>
<script src="/assets/addons/<?php echo $addonName; ?>/frontend/main.js" type="module"></script>

<script>
    $(document).ready(function() {
        console.log("Footer Script loaded...");
    });
</script>

<?php
if (isset($photoswipeInUse) && $photoswipeInUse) {
    /*echo '<link rel="stylesheet" type="text/css" href="/public/cookieconsent/cookieconsent.min.css" />
    <script src="/public/cookieconsent/cookieconsent.min.js"></script>
    <script>
    window.addEventListener("load", function(){
    window.cookieconsent.initialise({
    "palette": {
        "popup": {
        "background": "#aaaaaa",
        "text": "#252525"
        },
        "button": {
        "background": "#252525",
        "text": "#aaaaaa"
        }
    },
    "theme": "edgeless",
    "position": "bottom-right",
    "content": {
        "href": "<?php echo rex_getUrl(6); ?>"
    }
    })});
    </script>';*/

    echo '<!-- Root element of PhotoSwipe. Must have class pswp. -->
    <div class="pswp" tabindex="-1" role="dialog" aria-hidden="true">

        <!-- Background of PhotoSwipe.
            It\'s a separate element as animating opacity is faster than rgba(). -->
        <div class="pswp__bg"></div>

        <!-- Slides wrapper with overflow:hidden. -->
        <div class="pswp__scroll-wrap">

            <!-- Container that holds slides.
                PhotoSwipe keeps only 3 of them in the DOM to save memory.
                Don\'t modify these 3 pswp__item elements, data is added later on. -->
            <div class="pswp__container">
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
                <div class="pswp__item"></div>
            </div>

            <!-- Default (PhotoSwipeUI_Default) interface on top of sliding area. Can be changed. -->
            <div class="pswp__ui pswp__ui--hidden">

                <div class="pswp__top-bar">

                    <!--  Controls are self-explanatory. Order can be changed. -->

                    <div class="pswp__counter"></div>

                    <button class="pswp__button pswp__button--close" title="Close (Esc)"></button>

                    <button class="pswp__button pswp__button--share" title="Share"></button>

                    <button class="pswp__button pswp__button--fs" title="Toggle fullscreen"></button>

                    <button class="pswp__button pswp__button--zoom" title="Zoom in/out"></button>

                    <!-- Preloader demo https://codepen.io/dimsemenov/pen/yyBWoR -->
                    <!-- element will get class pswp__preloader--active when preloader is running -->
                    <div class="pswp__preloader">
                        <div class="pswp__preloader__icn">
                            <div class="pswp__preloader__cut">
                                <div class="pswp__preloader__donut"></div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="pswp__share-modal pswp__share-modal--hidden pswp__single-tap">
                    <div class="pswp__share-tooltip"></div>
                </div>

                <button class="pswp__button pswp__button--arrow--left" title="Previous (arrow left)">
                </button>

                <button class="pswp__button pswp__button--arrow--right" title="Next (arrow right)">
                </button>

                <div class="pswp__caption">
                    <div class="pswp__caption__center"></div>
                </div>

            </div>

        </div>

    </div>';
}
?>