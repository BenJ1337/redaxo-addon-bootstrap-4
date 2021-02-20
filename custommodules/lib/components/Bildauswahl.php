<?php

class Bildauswahl
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
            <div class="rex-js-widget rex-js-widget-media">
                <div class="input-group">
                    <input class="form-control" type="text" name="REX_INPUT_VALUE[' . $this->rid . '][' . join("][", $this->itemId) . ']" value="' . $rex_value_1 . '" id="REX_MEDIA_1" readonly=""><span class="input-group-btn">
                        <a href="#" class="btn btn-popup" onclick="openREXMedia(1,\'\');return false;" title="Medium auswählen"><i class="rex-icon rex-icon-open-mediapool"></i></a>
                        <a href="#" class="btn btn-popup" onclick="addREXMedia(1,\'\');return false;" title="Neues Medium hinzufügen"><i class="rex-icon rex-icon-add-media"></i></a>
                        <a href="#" class="btn btn-popup" onclick="deleteREXMedia(1);return false;" title="Ausgewähltes Medium löschen"><i class="rex-icon rex-icon-delete-media"></i></a>
                        <a href="#" class="btn btn-popup" onclick="viewREXMedia(1,\'\');return false;" title="Ausgewähltes Medium anzeigen"><i class="rex-icon rex-icon-view-media"></i></a></span>
                </div>
                <div class="rex-js-media-preview"></div>
            </div>';
    }
}
