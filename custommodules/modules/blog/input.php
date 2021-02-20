<?php
$slice = rex_article_slice::getArticleSliceById($rex_slice_id);
?>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#general">Einstellungen</a></li>
    <li><a data-toggle="tab" href="#nested">Breite</a></li>
</ul>

<div class="tab-content">
    <div id="general" class="tab-pane fade in active">
        <div class="form-group">
            <div class="form-group">
                <?php
                $linkauswahl = new Linkauswahl(
                    "Verzeichnis mit Blog-Artikeln",
                    2,
                    ['link'],
                    $slice != null ? rex_var::toArray($slice->getValue(2)) : null
                );
                $linkauswahl->getHTML();
                ?>
            </div>
        </div>
    </div>
    <div id="nested" class="tab-pane fade">
        <div class="form-group">
            <?php
            $bootstrapFormBuilder = new CM_BootstrapFormBuilder($slice);
            echo $bootstrapFormBuilder->build();
            ?>
        </div>
    </div>