<?php
    // Update assets
    rex_dir::deleteFiles($this->getAssetsPath(), true);
    rex_dir::copy($this->getPath('assets'), $this->getAssetsPath());
?>
