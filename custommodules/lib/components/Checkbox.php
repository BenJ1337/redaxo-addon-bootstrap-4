<?php
class Checkbox {
    private $rid;
    private $storedValue;
    private $itemId;
    private $label;
    private $checkbox_value;

    function __construct($label, $rid, $itemId, $storedValue, $checkbox_value) {
        $this->rid = $rid;
        $this->itemId = $itemId;
        $this->storedValue = $storedValue;
        $this->label = $label;
        $this->checkbox_value = $checkbox_value;
    }

    public function getHTML() {
        $rex_value_1 = "0";
        if(isset($this->storedValue) && $this->storedValue != null) {
            foreach ($this->itemId as $value) {
                if(isset($this->storedValue[$value])) {
                $rex_value_1 = $this->storedValue[$value];
                }
            }
        }

        $checked = "";
        if ($rex_value_1 == $this->checkbox_value) {
            $checked = "checked";
        }

        echo    '<div class="checkbox">'.
                '<label for="c-'.join("-", $this->itemId).'">'.
                '<input name="REX_INPUT_VALUE['.$this->rid.']['.join("][", $this->itemId).']"  data-rex-item-id="'.join(",", $this->itemId).'" type="checkbox" '.
                'id="c-'.join("-", $this->itemId).'" value="'.$this->checkbox_value.'"'.$checked.'>'.
                $this->label.'</label>'.
                '</div>';
    }
}
?>
