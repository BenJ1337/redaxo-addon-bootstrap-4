<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#general">Einstellungen</a></li>
    <li><a data-toggle="tab" href="#nested">Breite</a></li>
</ul>

<div class="tab-content">
    <div id="general" class="tab-pane fade in active">
        <?php
        $slice = rex_article_slice::getArticleSliceById($rex_slice_id);
        $dropDown = new DropDown(
            rex_i18n::msg('cm_module_platzhalter_hoehe'),
            2,
            ["placeholder_height"],
            $slice != null ? rex_var::toArray($slice->getValue(2)) : null,
            array(
                "10" => "10",
                "20" => "20",
                "30" => "30",
                "40" => "40",
                "50" => "50",
                "60" => "60",
                "70" => "70",
                "80" => "80",
                "90" => "90",
                "100" => "100",
                "110" => "110",
                "120" => "120"
            )
        );
        $dropDown->getHTML();
        ?>
    </div>
    <div id="nested" class="tab-pane fade">
        <?php
        $bootstrapFormBuilder = new CM_BootstrapFormBuilder($slice);
        $bootstrapFormBuilder->withLgWidth('12');
        $bootstrapFormBuilder->withMdWidth('12');
        $bootstrapFormBuilder->withSmWidth('12');
        $bootstrapFormBuilder->withXsWidth('12');
        echo $bootstrapFormBuilder->build();
        ?>
    </div>
</div>