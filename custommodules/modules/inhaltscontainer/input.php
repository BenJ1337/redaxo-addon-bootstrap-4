<?php
echo '<input style="display: none;" type="text" id="text1" name="REX_INPUT_VALUE[1][slide_collector]" value="1" />';
?>

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#general">Allgemein</a></li>
    <li><a data-toggle="tab" href="#nested">Verschachtelt</a></li>
</ul>

<div class="tab-content">
    <div id="general" class="tab-pane fade in active">
        <div class="form-group">
            <?php
            $slice = rex_article_slice::getArticleSliceById($rex_slice_id);
            $dropDown = new DropDown(
                "Breite des Inhalts",
                1,
                ["bootstrap_width"],
                $slice != null ? rex_var::toArray($slice->getValue(1)) : null,
                array(
                    "normal" => "",
                    "Rand" => "-fluid"
                )
            );
            $dropDown->getHTML();
            ?>
        </div>
        <div class="form-group">
            <?php
            $dropDown = new DropDown(
                "Anzahl Blöcke",
                1,
                ["slice_count"],
                $slice != null ? rex_var::toArray($slice->getValue(1)) : null,
                array(
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6",
                    "7" => "7",
                    "8" => "8",
                    "9" => "9",
                    "10" => "10",
                    "11" => "11",
                    "12" => "12"
                )
            );
            $dropDown->getHTML();
            ?>
        </div>
        <div class="form-group">
            <?php
            $dropDown = new DropDown(
                "Theme",
                1,
                ["theme_class"],
                $slice != null ? rex_var::toArray($slice->getValue(1)) : null,
                array(
                    '' => '',
                    'Weiß' => 'white-theme',
                    'Grau' => 'grey-theme',
                    'Gelb' => 'yellow-theme'
                )
            );
            $dropDown->getHTML();
            ?>
        </div>
        <div class="form-group">
            <?php
            $checkbox = new Checkbox(
                "Keine Ränder",
                1,
                ["no_padding"],
                $slice != null ? rex_var::toArray($slice->getValue(1)) : null,
                'no_padding'
            );
            $checkbox->getHTML();
            ?>
        </div>
    </div>
    <div id="nested" class="tab-pane fade">
        <div class="form-group">
            <?php
            $dropDown = new DropDown(
                rex_i18n::msg('cm_bootstrap_grid_large'),
                1,
                ["bootstrap_column_width_lg"],
                $slice != null ? rex_var::toArray($slice->getValue(1)) : null,
                array(
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6",
                    "7" => "7",
                    "8" => "8",
                    "9" => "9",
                    "10" => "10",
                    "11" => "11",
                    "12" => "12"
                )
            );
            $dropDown->setDefaultValue("12");
            $dropDown->getHTML();
            ?>
        </div>
        <div class="form-group">
            <?php
            $dropDown = new DropDown(
                rex_i18n::msg('cm_bootstrap_grid_medium'),
                1,
                ["bootstrap_column_width"],
                $slice != null ? rex_var::toArray($slice->getValue(1)) : null,
                array(
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6",
                    "7" => "7",
                    "8" => "8",
                    "9" => "9",
                    "10" => "10",
                    "11" => "11",
                    "12" => "12"
                )
            );
            $dropDown->setDefaultValue("12");
            $dropDown->getHTML();
            ?>
        </div>
        <div class="form-group">
            <?php
            $dropDown = new DropDown(
                rex_i18n::msg('cm_bootstrap_grid_small'),
                1,
                ["bootstrap_column_width_sm"],
                $slice != null ? rex_var::toArray($slice->getValue(1)) : null,
                array(
                    "1" => "1",
                    "2" => "2",
                    "3" => "3",
                    "4" => "4",
                    "5" => "5",
                    "6" => "6",
                    "7" => "7",
                    "8" => "8",
                    "9" => "9",
                    "10" => "10",
                    "11" => "11",
                    "12" => "12"
                )
            );
            $dropDown->setDefaultValue("12");
            $dropDown->getHTML();
            ?>
        </div>
    </div>
    <div class="form-group">
        <?php
        $dropDown = new DropDown(
            rex_i18n::msg('cm_bootstrap_grid_extra_small'),
            1,
            ["bootstrap_column_widt_xs"],
            $slice != null ? rex_var::toArray($slice->getValue(1)) : null,
            array(
                "1" => "1",
                "2" => "2",
                "3" => "3",
                "4" => "4",
                "5" => "5",
                "6" => "6",
                "7" => "7",
                "8" => "8",
                "9" => "9",
                "10" => "10",
                "11" => "11",
                "12" => "12"
            )
        );
        $dropDown->setDefaultValue("12");
        $dropDown->getHTML();
        ?>
    </div>
</div>
</div>