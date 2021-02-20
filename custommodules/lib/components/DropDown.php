<?php
class DropDown {
    private $rid;
    private $storedValue;
    private $itemId;
    private $options;
    private $label;
    private $defaultValue;

    function __construct($label, $rid, $itemId, $storedValue, $options) {
        $this->rid = $rid;
        $this->itemId = $itemId;
        $this->storedValue = $storedValue;
        $this->options = $options;
        $this->label = $label;
    }

    public function setDefaultValue($defaultValue) {
        $this->defaultValue = $defaultValue;
    }

    public function getHTML() {
        if($this->defaultValue != null) {
            $rex_value_1 = $this->defaultValue;
        }

        if(isset($this->storedValue) && $this->storedValue != null) {
            foreach ($this->itemId as $value) {
                if(isset($this->storedValue[$value])) {
                $rex_value_1 = $this->storedValue[$value];
                }
            }
        }
        echo '<label for="c-'.join("-", $this->itemId).'">'.$this->label.':</label>
                <select class="rex-custom-input form-control" data-rex-item-id="'.join(",", $this->itemId).'" name="REX_INPUT_VALUE['.$this->rid.']['.join("][", $this->itemId).']" id="c-'.join("-", $this->itemId).'">';
                foreach ($this->options as $key => $value) {
                    $selected = '';
                    if(isset($rex_value_1) && $value == $rex_value_1) {
                        $selected = 'selected';
                    }
                    echo '<option value="'.$value.'"'.$selected.'>'.$key.'</option>';
                }
        echo '</select>';
    }
}

?>
