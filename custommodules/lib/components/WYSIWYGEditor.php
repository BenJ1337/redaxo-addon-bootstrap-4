<?php

class WYSIWYGEditor {

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
                    echo '<div class="form-group">'.
                        '<label for="text1">'.$this->label.'</label>'.
                        '<textarea class="form-control jodit-editor" type="text" id="text1" name="REX_INPUT_VALUE[2]['.join("][", $this->itemId).']">'.
                        $rex_value_1.
                        '</textarea>'.
                        '</div>';
    }

}
