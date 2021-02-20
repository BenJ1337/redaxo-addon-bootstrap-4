<?php

class CM_OutputBuilder
{

    private $frontendOutput = '';
    private $lgWidth = '';
    private $mdWidth = '';
    private $smWidth = '';
    private $xsWidth = '';

    function __construct($lgWidth, $mdWidth, $smWidth, $xsWidth)
    {
        $this->lgWidth = $lgWidth;
        $this->mdWidth = $mdWidth;
        $this->smWidth = $smWidth;
        $this->xsWidth = $xsWidth;
    }

    public function withFrontendOutput($output)
    {
        $this->frontendOutput = $output;
    }

    public function build()
    {
        $output = '';

        if (rex::isBackend()) {
            $output .= '<div class="panel panel-default"><div class="panel-heading">'
                . rex_i18n::msg('cm_slice_settings')
                . '</div><div class="panel-body">'
                . '<div>' . rex_i18n::msg('cm_bootstrap_grid_large') . ' <span class="badge">' . $this->lgWidth . '</span></div>'
                . '<div>' . rex_i18n::msg('cm_bootstrap_grid_medium') . ' <span class="badge">' . $this->mdWidth . '</span></div>'
                . '<div>' . rex_i18n::msg('cm_bootstrap_grid_small') . ' <span class="badge">' . $this->smWidth . '</span></div>'
                . '<div>' . rex_i18n::msg('cm_bootstrap_grid_extra_small') . ' <span class="badge">' . $this->xsWidth . '</span></div>'
                . '</div></div>';
            $output .=
                '<div class="panel panel-default"><div class="panel-heading">'
                . rex_i18n::msg('cm_slice_content')
                . '</div><div class="panel-body">';
        }

        $output .= $this->frontendOutput;

        if (rex::isBackend()) {
            $output .= '</div></div>';
        }

        return $output;
    }
}
