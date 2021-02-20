<?php
$addonName = 'custommodules';

foreach (array(
    "slickslider",
    "photoswipe",
    "tinyslider",
    "isotope",
    "mswitch",
    "countUp",
    "fontawesome"
) as $modul) {
    rex_addon::get("custommodul")->setConfig($modul, false);
}

$arr = rex_article_slice::getSlicesForArticle($article_id);
$content = ContentBuilder::buildContent($arr);
?>

<!DOCTYPE html>
<html lang="de">
<?php include("header.php"); ?>

<body>
    <?php include("navigation.php"); ?>
    <main>
        <?php
        echo $content;
        ?>
    </main>
    <?php include("footer.php"); ?>
</body>

</html>