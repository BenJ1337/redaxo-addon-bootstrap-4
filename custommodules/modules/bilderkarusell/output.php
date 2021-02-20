<?php
rex_addon::get("custommodul")->setConfig("slickslider", true);


$rex_values_settings = json_decode(rex_article_slice::getArticleSliceById($rex_slice_id)->getValue(1), true);
$rex_values_content = json_decode(rex_article_slice::getArticleSliceById($rex_slice_id)->getValue(2), true);
if (rex::isBackend()) {
    echo '<div class="panel panel-default"><div class="panel-heading">'
        . rex_i18n::msg('cm_slice_settings')
        . '</div><div class="panel-body">'
        . '<div>' . rex_i18n::msg('cm_bootstrap_grid_large') . ' <span class="badge">' . $rex_values_settings["bootstrap_column_width_lg"] . '</span></div>'
        . '<div>' . rex_i18n::msg('cm_bootstrap_grid_medium') . ' <span class="badge">' . $rex_values_settings["bootstrap_column_width"] . '</span></div>'
        . '<div>' . rex_i18n::msg('cm_bootstrap_grid_small') . ' <span class="badge">' . $rex_values_settings["bootstrap_column_width_sm"] . '</span></div>'
        . '<div>' . rex_i18n::msg('cm_bootstrap_grid_extra_small') . ' <span class="badge">' . $rex_values_settings["bootstrap_column_widt_xs"] . '</span></div>'
        . '</div></div>';
    echo
    '<div class="panel panel-default"><div class="panel-heading">'
        . rex_i18n::msg('cm_slice_content')
        . '</div><div class="panel-body">';
}

$rex_values_content = json_decode(rex_article_slice::getArticleSliceById($rex_slice_id)->getValue(2), true);
?>
<div class="slick-slider slick-slider-<?php echo $rex_slice_id; ?>">
    <?php
    foreach (explode(',', $rex_values_content["bilder"]) as $img) {
        if ($img !== "") {
            $medium = rex_media::get($img);
            $filename = '';
            if ($medium != null) {
                $medium->getTitle() != "" ? trim($medium->getTitle()) : $medium->getFileName();
            }
            echo '<img class="img-fluid" src="/media/' . $img . '" alt="' . $filename . '">';
        }
    }
    ?>
</div>

<script>
    $(document).ready(function() {
        try {
            $(".slick-slider-<?php echo $rex_slice_id; ?>").css("max-height", (window.innerHeight - 72) + "px")

            $(".slick-slider-<?php echo $rex_slice_id; ?>").slick({
                <?php
                if (isset($rex_values_content['infinity']) && $rex_values_content['infinity'] != '')
                    echo 'infinite: ' . $rex_values_content['infinity'] . ',';
                else
                    echo 'infinite: false,';

                if (isset($rex_values_content['dots']) && $rex_values_content['dots'] != '')
                    echo 'dots: ' . $rex_values_content['dots'] . ',';
                else
                    echo 'dots: false,';

                if (isset($rex_values_content['speed']) && $rex_values_content['speed'] != '')
                    echo $rex_values_content['speed'] != '' ? 'autoplay: true, speed: 500, autoplaySpeed: ' . $rex_values_content['speed'] . ',' : '';

                if (isset($rex_values_content['arrows']) && $rex_values_content['arrows'] != '')
                    echo 'arrows: ' . $rex_values_content['arrows'] . ',';
                else
                    echo 'arrows: false,';

                if (isset($rex_values_content['fade']) && $rex_values_content['fade'] != '')
                    echo 'fade: ' . $rex_values_content['fade'] . ',';
                else
                    echo 'fade: false,';

                if (isset($rex_values_content['stop_on_mouseover']) && $rex_values_content['stop_on_mouseover'] != '')
                    echo 'pauseOnHover: ' . $rex_values_content['stop_on_mouseover'] . ',';
                else
                    echo 'pauseOnHover: false,';

                ?>
            });
        } catch (e) {
            console.log(e);
        }
    });
</script>
<?php

if (rex::isBackend()) {
    echo '</div></div>';
}
if (rex::isBackend()) {
    print("
            <link rel=\"stylesheet\" href=\"/assets/addons/custommodul/frontend/slick-slider/slick.css\">
            <link rel=\"stylesheet\" href=\"/assets/addons/custommodul/frontend/slick-slider/slick-theme.css\">
            <script src=\"/assets/addons/custommodul/frontend/slick-slider/slick.min.js\"></script>");
}
?>