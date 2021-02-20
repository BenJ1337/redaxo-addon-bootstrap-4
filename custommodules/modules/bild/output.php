<?php

$rex_values_settings = json_decode(rex_article_slice::getArticleSliceById($rex_slice_id)->getValue(1), true);

$outputBuilder = new CM_OutputBuilder(
    $rex_values_settings[BootstrapColWidth::lg],
    $rex_values_settings[BootstrapColWidth::md],
    $rex_values_settings[BootstrapColWidth::sm],
    $rex_values_settings[BootstrapColWidth::xs]
);

$rex_values_content = json_decode(rex_article_slice::getArticleSliceById($rex_slice_id)->getValue(2), true);


if (isset($rex_values_content["bild"]) && $rex_values_content["bild"] != '') {
    $alt = $rex_values_content["bild"];
    $medium = rex_media::get($rex_values_content["bild"]);
    if ($medium != null) {
        $alt = $medium->getTitle() != "" ? trim($medium->getTitle()) : $medium->getFileName();
    }
    $outputBuilder->withFrontendOutput('<img class="img-fluid" src="/media/' . $rex_values_content["bild"] . '" alt="' . $alt . '">');
}

echo $outputBuilder->build();
