<?php

$rex_values_settings = json_decode(rex_article_slice::getArticleSliceById($rex_slice_id)->getValue(1), true);

$outputBuilder = new CM_OutputBuilder(
    $rex_values_settings[BootstrapColWidth::lg],
    $rex_values_settings[BootstrapColWidth::md],
    $rex_values_settings[BootstrapColWidth::sm],
    $rex_values_settings[BootstrapColWidth::xs]
);

$rex_values_content = json_decode(rex_article_slice::getArticleSliceById($rex_slice_id)->getValue(2), true);

$htmlOutput = '';
if (isset($rex_values_settings['padding']) && $rex_values_settings['padding'] == '1') {
    $htmlOutput = '<div class="container">
    <div class="row">
        <div class="col-md-12">';
}
$htmlOutput .= '<div class="text-block">' . $rex_values_content['wasiwyg_text'] . '</div>';

if (isset($rex_values_settings['padding']) && $rex_values_settings['padding'] == '1') {
    $htmlOutput .= '</div>
    </div>
</div>';
}

$outputBuilder->withFrontendOutput($htmlOutput);

echo $outputBuilder->build();
