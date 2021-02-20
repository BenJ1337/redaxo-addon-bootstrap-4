<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#general">Einstellungen</a></li>
    <li><a data-toggle="tab" href="#nested">Breite</a></li>
</ul>
<div class="tab-content">
    <div id="general" class="tab-pane fade in active">
        <div class="form-group">
            <div class="rex-js-widget rex-js-widget-medialist">
                <div class="input-group">
                    <?php
                    $slice = rex_article_slice::getArticleSliceById($rex_slice_id);
                    $mehrfachbildauswahl = new MehrfachBildauswahl(
                        "Bilder",
                        2,
                        ['bilder'],
                        $slice != null ? rex_var::toArray($slice->getValue(2)) : null
                    );
                    $mehrfachbildauswahl->getHTML();
                    ?>
                </div>
            </div>
        </div>
        <div class="form-group">
            <?php
            $slice = rex_article_slice::getArticleSliceById($rex_slice_id);
            $slideSpeedInput = new InputField(
                "Anzeigedauer",
                2,
                ["speed"],
                $slice != null ? rex_var::toArray($slice->getValue(2)) : null
            );
            $slideSpeedInput->getHTML();
            ?>
        </div>
        <div class="form-group">
            <?php
            $checkbox = new Checkbox("Punkte", 2, ["dots"], $slice != null ? rex_var::toArray($slice->getValue(2)) : null, 'true');
            $checkbox->getHTML();
            ?>
        </div>
        <div class="form-group">
            <?php
            $checkbox = new Checkbox("Unendliches Scrollen", 2, ["infinity"], $slice != null ? rex_var::toArray($slice->getValue(2)) : null, 'true');
            $checkbox->getHTML();
            ?>
        </div>
        <div class="form-group">
            <?php
            $checkbox = new Checkbox("Pfeile", 2, ["arrows"], $slice != null ? rex_var::toArray($slice->getValue(2)) : null, 'true');
            $checkbox->getHTML();
            ?>
        </div>
        <div class="form-group">
            <?php
            $checkbox = new Checkbox("Verblassen-Effekt", 2, ["fade"], $slice != null ? rex_var::toArray($slice->getValue(2)) : null, 'true');
            $checkbox->getHTML();
            ?>
        </div>
        <div class="form-group">
            <?php
            $checkbox = new Checkbox("Stop bei Mouseover", 2, ["stop_on_mouseover"], $slice != null ? rex_var::toArray($slice->getValue(2)) : null, 'true');
            $checkbox->getHTML();
            ?>
        </div>
    </div>
    <div id="nested" class="tab-pane fade">
        <div class="form-group">
            <?php
            $dropDown = new DropDown(
                "Large",
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
                "Medium",
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
                "Small",
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
        <div class="form-group">
            <?php
            $dropDown = new DropDown(
                "Extra small",
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