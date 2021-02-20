<head>
    <?php
    $servername = rex::getServerName();
    if (isset($title) && $title != "" && $title !== "Kein Artikel vorhanden") {
        echo "<title>" . $title . "</title>";
    } else {
        echo "<title>" . $servername . "</title>";
    }

    ?>
    <meta charset="UTF-8">
    <meta name="description" content="<?php echo $meta_description; ?>">
    <meta name="author" content="Benjamin Hacker">
    <link rel="icon" type="image/png" href="/assets/addons/'<?php echo $addonName; ?>'/favicon.png">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link rel="stylesheet" href="/assets/addons/<?php echo $addonName; ?>/frontend/bootstrap.min.css">


    <link rel="stylesheet" href="/public/styles/styles.css">

    <script src="/assets/addons/<?php echo $addonName; ?>/frontend/jquery-3.3.1.slim.min.js"></script>

    <?php
    $slicksliderInUse = rex_config::get('.$addonName.', "slickslider");
    $photoswipeInUse = rex_config::get('.$addonName.', "photoswipe");
    $tinysliderInUse = rex_config::get('.$addonName.', "tinyslider");
    $isotopeInUse = rex_config::get('.$addonName.', "isotope");
    $mswitchInUse = rex_config::get('.$addonName.', "mswitch");
    $countUpInUse = rex_config::get('.$addonName.', "countUp");
    $fontawesomeInUse = rex_config::get('.$addonName.', "fontawesome");
    if (isset($slicksliderInUse) && $slicksliderInUse) {
        echo '<link rel="stylesheet" href="/assets/addons/' . $addonName . '/frontend/slick-slider/slick.css">
            <link rel="stylesheet" href="/assets/addons/' . $addonName . '/frontend/slick-slider/slick-theme.css">';
    }
    if (isset($photoswipeInUse) && $photoswipeInUse) {
        echo '<link rel="stylesheet" href="/assets/addons/' . $addonName . '/frontend/photoswipe.css">
            <link rel="stylesheet" href="/assets/addons/' . $addonName . '/frontend/default-skin/default-skin.css">';
    }
    if (isset($tinysliderInUse) && $tinysliderInUse) {
        echo '<link rel="stylesheet" href="/assets/addons/' . $addonName . '/frontend/tiny-slider.css">';
    }
    if (isset($mswitchInUse) && $mswitchInUse) {
        echo '<link rel="stylesheet" type="text/css" href="/assets/addons/' . $addonName . '/frontend/mswitch/jquery.mswitch.css">';
    }
    if (isset($countUpInUse) && $countUpInUse) {
        echo '<script src="/assets/addons/' . $addonName . '/countUp.min.js" type="module"></script>';
    }
    if (isset($fontawesomeInUse) && $fontawesomeInUse) {
        echo '<link rel="stylesheet" href="/assets/addons/' . $addonName . '/frontend/fontawesome-free-5.11.2-web/css/fontawesome.min.css">
            <link rel="stylesheet" href="/assets/addons/' . $addonName . '/frontend/fontawesome-free-5.11.2-web/css/all.css">';
    }
    ?>
</head>