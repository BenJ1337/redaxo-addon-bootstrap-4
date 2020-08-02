<?php
    echo '<input style="display: none;" type="text" id="text1" name="REX_INPUT_VALUE[1][slide_collector]" value="1" />';
?>

<ul class="nav nav-tabs">
  <li class="active"><a data-toggle="tab" href="#general">Allgemein</a></li>
  <li><a data-toggle="tab" href="#nested">Verschachtelt</a></li>
</ul>

<div class="tab-content">
    <div id="general" class="tab-pane fade in active">
        <?php
            $rex_value_json_key = "bootstrap_width";
            $options = array(
                "normal" => "",
                "Rand" => "-fluid"
            );
            $value1 = rex_var::toArray("REX_VALUE[1]");
            $rex_value_1 = $value1[$rex_value_json_key];

            echo    '<div class="form-group">'.
                    '<label for="options">Breite:</label>
            <select class="form-control" name="REX_INPUT_VALUE[1]['.$rex_value_json_key.']" id="options">';
            foreach ($options as $key => $value) {
                $selected = '';
                if($value == $rex_value_1) {
                    $selected = 'selected';
                }
                echo '<option value="'.$value.'"'.$selected.'>'.$key.'</option>';
            }
            echo '</select>'.
                '</div>';

            $rex_value_json_key = "slice_count";
            $options = array(
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
            );
            $value1 = rex_var::toArray("REX_VALUE[1]");
            $rex_value_1 = $value1[$rex_value_json_key];

            echo    '<div class="form-group">'.
                    '<label for="options">Blöcke:</label>
            <select class="form-control" name="REX_INPUT_VALUE[1]['.$rex_value_json_key.']" id="options">';
            foreach ($options as $key => $value) {
                $selected = '';
                if($value == $rex_value_1) {
                    $selected = 'selected';
                }
                echo '<option value="'.$value.'"'.$selected.'>'.$key.'</option>';
            }
            echo '</select>'.
                '</div>';

            $rex_value_json_key = "theme_class";
            $options = array(
                ''=>'',
                'Weiß'=>'white-theme',
                'Grau'=>'grey-theme',
                'Gelb'=>'yellow-theme'
            );
            $value1 = rex_var::toArray("REX_VALUE[1]");
            $rex_value_1 = $value1[$rex_value_json_key];

            echo    '<div class="form-group">'.
                    '<label for="options">Theme:</label>
            <select class="form-control" name="REX_INPUT_VALUE[1]['.$rex_value_json_key.']" id="options">';
            foreach ($options as $key => $value) {
                $selected = '';
                if($value == $rex_value_1) {
                    $selected = 'selected';
                }
                echo '<option value="'.$value.'"'.$selected.'>'.$key.'</option>';
            }
            echo '</select>'.
                '</div>';
        ?>
    </div>
    <div id="nested" class="tab-pane fade">
        <?php
            $rex_value_json_key = "bootstrap_column_width";
            $options = array(
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
            );
            $value1 = rex_var::toArray("REX_VALUE[1]");
            $rex_value_1 = $value1[$rex_value_json_key];

            echo    '<div class="form-group">'.
                    '<label for="options">Spaltenbreite:</label>
            <select class="form-control" name="REX_INPUT_VALUE[1]['.$rex_value_json_key.']" id="options">';
            foreach ($options as $key => $value) {
                $selected = '';
                if($value == $rex_value_1) {
                    $selected = 'selected';
                }
                echo '<option value="'.$value.'"'.$selected.'>'.$key.'</option>';
            }
            echo '</select>'.
                '</div>';
        ?>

    </div>
</div>
