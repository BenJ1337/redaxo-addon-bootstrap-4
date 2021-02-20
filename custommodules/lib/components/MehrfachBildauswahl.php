<?php

class MehrfachBildauswahl
{

    private $rid;
    private $storedValue;
    private $itemId;
    private $label;

    function __construct($label, $rid, $itemId, $storedValue)
    {
        $this->rid = $rid;
        $this->itemId = $itemId;
        $this->storedValue = $storedValue;
        $this->label = $label;
    }



    public function getHTML()
    {
        $rex_value_1 = '';
        if (isset($this->storedValue) && $this->storedValue != null) {
            foreach ($this->itemId as $value) {
                if (isset($this->storedValue[$value]) || isset($rex_value_1[$value])) {
                    if ($rex_value_1 == '') {
                        $rex_value_1 = $this->storedValue[$value];
                    } else {
                        $rex_value_1 = $rex_value_1[$value];
                    }
                }
            }
        }
        echo
        '<label style="width: 100%;">' . $this->label . ':</label>
        <select class="form-control" name="REX_MEDIALIST_SELECT[1]" id="REX_MEDIALIST_SELECT_1" size="10">';
        foreach (explode(',', $rex_value_1) as $img) {
            echo '<option value="' . $img . '">' . $img . '</option> ';
        }
        echo '</select>
        <input type="hidden" name="REX_INPUT_VALUE[' . $this->rid . '][' . join("][", $this->itemId) . ']" id="REX_MEDIALIST_1" value="' . $rex_value_1 . '">
        <span class="input-group-addon">
        <div class="btn-group-vertical">
            <a href="#" class="btn btn-popup" onclick="moveREXMedialist(1,\'top\');return false;" title="Ausgewähltes Medium an den Anfang verschieben"><i class="rex-icon rex-icon-top"></i></a>
            <a href="#" class="btn btn-popup" onclick="moveREXMedialist(1,\'up\');return false;" title="Ausgewähltes Medium nach oben verschieben"><i class="rex-icon rex-icon-up"></i></a>
            <a href="#" class="btn btn-popup" onclick="moveREXMedialist(1,\'down\');return false;" title="Ausgewähltes Medium nach unten verschieben"><i class="rex-icon rex-icon-down"></i></a>
            <a href="#" class="btn btn-popup" onclick="moveREXMedialist(1,\'bottom\');return false;" title="Ausgewähltes Medium an das Ende verschieben"><i class="rex-icon rex-icon-bottom"></i></a>
        </div>
        <div class="btn-group-vertical">
            <a href="#" class="btn btn-popup" onclick="openREXMedialist(1,\'\');return false;" title="Medium auswählen"><i class="rex-icon rex-icon-open-mediapool"></i></a>
            <a href="#" class="btn btn-popup" onclick="addREXMedialist(1,\'\');return false;" title="Neues Medium hinzufügen"><i class="rex-icon rex-icon-add-media"></i></a>
            <a href="#" class="btn btn-popup" onclick="deleteREXMedialist(1);return false;" title="Ausgewähltes Medium löschen"><i class="rex-icon rex-icon-delete-media"></i></a>
            <a href="#" class="btn btn-popup" onclick="viewREXMedialist(1,\'\');return false;" title="Ausgewähltes Medium anzeigen"><i class="rex-icon rex-icon-view-media"></i></a>
        </div>
    </span>';
    }
}
