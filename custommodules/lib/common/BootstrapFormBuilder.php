<?php
class CM_BootstrapFormBuilder
{
    private $lgWidth = '6';
    private $mdWidth = '6';
    private $smWidth = '12';
    private $xsWidth = '12';
    private $slice;

    function __construct($slice)
    {
        $this->slice = $slice;
    }

    public function withLgWidth($width)
    {
        $this->lgWidth = $width;
    }

    public function withMdWidth($width)
    {
        $this->mdWidth = $width;
    }

    public function withSmWidth($width)
    {
        $this->smWidth = $width;
    }

    public function withXsWidth($width)
    {
        $this->xsWidth = $width;
    }

    public function build()
    {
        $output = '';
        $output .= '<div class="form-group">';
        $dropDown = new DropDown(
            rex_i18n::msg('cm_bootstrap_grid_large'),
            1,
            [BootstrapColWidth::lg],
            $this->slice != null ? rex_var::toArray($this->slice->getValue(1)) : null,
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
        $dropDown->setDefaultValue($this->lgWidth);
        $output .= $dropDown->getHTML()
            . '</div>'
            . '<div class="form-group">';
        $dropDown = new DropDown(
            rex_i18n::msg('cm_bootstrap_grid_medium'),
            1,
            [BootstrapColWidth::md],
            $this->slice != null ? rex_var::toArray($this->slice->getValue(1)) : null,
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
        $dropDown->setDefaultValue($this->mdWidth);
        $output .= $dropDown->getHTML()
            . '</div>'
            . '<div class="form-group">';
        $dropDown = new DropDown(
            rex_i18n::msg('cm_bootstrap_grid_small'),
            1,
            [BootstrapColWidth::sm],
            $this->slice != null ? rex_var::toArray($this->slice->getValue(1)) : null,
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
        $dropDown->setDefaultValue($this->smWidth);
        $output .= $dropDown->getHTML()
            . '</div>'
            . '<div class="form-group">';

        $dropDown = new DropDown(
            rex_i18n::msg('cm_bootstrap_grid_extra_small'),
            1,
            [BootstrapColWidth::xs],
            $this->slice != null ? rex_var::toArray($this->slice->getValue(1)) : null,
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
        $dropDown->setDefaultValue($this->xsWidth);
        $output .= $dropDown->getHTML()
            . '</div>';

        return $output;
    }
}
