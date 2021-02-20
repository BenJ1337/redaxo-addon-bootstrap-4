<?php

class Inputfield {

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
        if(isset($this->storedValue) && $this->storedValue != null) {
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
        echo
            '<label style="width: 100%;" for="c-'.join("-", $this->itemId).'">'.$this->label.':</label>'.
            '<input type="text" data-rex-item-id="'.join(",", $this->itemId).'" name="REX_INPUT_VALUE['.$this->rid.']['.join("][", $this->itemId).']" value="'.$rex_value_1.'" id="c-'.join("-", $this->itemId).'" />';
    }

}
