<?php

class IconPicker {

    private $rid;
    private $storedValue;
    private $itemId;
    private $label;

    function __construct($label, $rid, $itemId, $storedValue) {
        $this->rid = $rid;
        $this->itemId = $itemId;
        $this->storedValue = $storedValue;
        $this->label = $label;
    }

    public function getHTML() {
        $rex_value_1 = '';
        if(isset($this->storedValue)) {
            foreach ($this->itemId as $value) {
                if(isset($this->storedValue[$value]) || isset($rex_value_1[$value])) {
                    if($rex_value_1 == '') {
                        $rex_value_1 = $this->storedValue[$value];
                    }
                    else {
                        $rex_value_1 = $rex_value_1[$value];
                    }
                }
            }
        }

        echo '<label style="width: 100%;" for="c-'.join("-", $this->itemId).'">'.$this->label.':</label>'.
                '<div class="btn-group">
                    <button type="button" class="btn btn-primary iconpicker-component">
                        <i class="'.(!empty($rex_value_1) ? $rex_value_1 : 'fas fa-haykal').' iconpicker-component"></i>
                    </button>
                    <button id="c-'.join("-", $this->itemId).'" type="button" class="icp icp-dd-'.join("-", $this->itemId).' btn btn-primary dropdown-toggle " data-selected="fa-car" data-toggle="dropdown" aria-expanded="false">
                        <span class="caret"></span>
                        <span class="sr-only">Toggle Dropdown</span>
                    </button>
                    <div id="rex-icon-picker" class="dropdown-menu iconpicker-container"></div>
                </div>
                <input style="display:none;" type="text" value="'.
                    (!empty($rex_value_1) ? $rex_value_1 : 'fas fa-haykal').
                    '" name="REX_INPUT_VALUE['.$this->rid.']['.join("][", $this->itemId).']"" id="REX_INPUT_VALUE-'.join("-", $this->itemId).'">
                <script>
                    $(".icp-dd-'.join("-", $this->itemId).'").iconpicker({});
                    $(".icp-dd-'.join("-", $this->itemId).'").on("iconpickerSelected", function(event) {
                        console.log(event.iconpickerValue);
                        document.getElementById("REX_INPUT_VALUE-'.join("-", $this->itemId).'").value = event.iconpickerValue;
                    });
                </script>';
    }

}

?>
