<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#general">Einstellungen</a></li>
    <li><a data-toggle="tab" href="#nested">Breite</a></li>
</ul>
<div class="tab-content">
    <div id="general" class="tab-pane fade in active">
        <div class="form-group">
            <?php
            $slice = rex_article_slice::getArticleSliceById($rex_slice_id);
            $bildauswahl = new Bildauswahl(
                "Bild",
                2,
                ['bild'],
                $slice != null ? rex_var::toArray($slice->getValue(2)) : null
            );
            $bildauswahl->getHTML();
            ?>
        </div>
    </div>
    <div id="nested" class="tab-pane fade">
        <div class="form-group">
            <?php
            $bootstrapFormBuilder = new CM_BootstrapFormBuilder($slice);
            $bootstrapFormBuilder->withLgWidth('6');
            $bootstrapFormBuilder->withMdWidth('6');
            $bootstrapFormBuilder->withSmWidth('6');
            $bootstrapFormBuilder->withXsWidth('12');
            echo $bootstrapFormBuilder->build();
            ?>
        </div>
    </div>
</div>