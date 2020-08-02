<?php
    class ContentBuilder {
        private static $rowSize = 12;
        public static function buildContent( $rexArticleSlice) {
            $depth						= 0;
            $content 					= '';
            $sliceIdInCollector 		= array(0);
            $sliceIdCounterInCollector 	= array(0);
            $isSliceInCollector 		= false;
            $containerOpen 				= false;
            $rowFillingDegree 			= array(0);
            $rowOpen 					= array(false);
            $columnSize 				= 0;
            $columnOpen					= array(false);
            $css_classes 				= '';

            //iterates through slices of one article
            foreach($rexArticleSlice as $slice) {

               $rex_values_settings = json_decode($slice->getValue(1), true);
               $colSize = $rex_values_settings['bootstrap_column_width'];
               $theme_class = isset($rex_values_settings['theme_class']) ? $rex_values_settings['theme_class'] : '';
               $no_padding_class = isset($rex_values_settings['no_padding']) ? $rex_values_settings['no_padding'] : '';

               $css_classes = $theme_class . " " . $no_padding_class;
                if ( !$containerOpen ) {
                    $content .= self::openContainer();
                    $containerOpen = true;
                }
                if(isset($rex_values_settings['slide_collector'])) {
                    $containerSize = $rex_values_settings['bootstrap_width'];
                    if ($rowOpen[$depth] == true && $depth == 0) {
                        $rowOpen[$depth] = false;
                        $content .= self::closeRow();
                        $rowFillingDegree[$depth] = 0;
                    }
                    $depth += 1;
                    $isSliceInCollector = true;
                    $sliceIdInCollector[] = 0;
                    $sliceIdCounterInCollector[] = $rex_values_settings['slice_count'];
                    if ($depth > 1) {
                        $columnOpen[] = true;
                        $sliceIdInCollector[$depth-1] += 1;
                        $rowFillingDegree[$depth-1] += (isset($colSize) ? $colSize : 12);
                        $content .= self::openColumn( (isset($colSize) ? $colSize : 12), $css_classes );
                    }else {
                        if ( !$containerOpen ) {
                            $content .= self::openContainer( $containerSize, $css_classes );
                            $containerOpen = true;
                        }else {
                            $content .= self::closeContainer();
                            $content .= self::openContainer( $containerSize, $css_classes );
                            $containerOpen = true;
                        }
                    }
                    $content .= self::openRow();
                    $rowFillingDegree[] = 0;
                    $rowOpen[] = true;
                }else {
                    if ($rowOpen[$depth] == false) {
                        $rowOpen[$depth] = true;
                        $content .= self::openRow();
                        $rowFillingDegree[$depth] = 0;
                    }else if ($rowFillingDegree[$depth] + $colSize > self::$rowSize ) {
                        $content .= self::closeRow();
                        $content .= self::openRow();
                        $rowFillingDegree[$depth] = 0;
                    }
                    $rowFillingDegree[$depth] += $colSize;
                    $BackgroundColor = '';
                    $content .= self::openColumn( $colSize, $css_classes );
                    $content .= $slice->getSlice();
                    if ($isSliceInCollector) {
                        $sliceIdInCollector[$depth] += 1;
                    }
                    $content .= self::closeColumn();
                    while ($isSliceInCollector & $sliceIdInCollector[$depth] == $sliceIdCounterInCollector[$depth]) {
                        if (array_pop($columnOpen)) {
                            $content .= self::closeColumn();

                        }
                        array_pop($rowOpen);
                        array_pop($rowFillingDegree);
                        $content .= self::closeRow();
                        if ($depth == 1) {
                            $isSliceInCollector = false;
                            $content .= self::closeContainer();
                            $containerOpen = false;
                        }
                        $depth -= 1;
                        array_pop($sliceIdInCollector);
                        array_pop($sliceIdCounterInCollector);
                    }
                    if (!($isSliceInCollector & $sliceIdInCollector[$depth] == $sliceIdCounterInCollector[$depth])) {
                        if ($rowFillingDegree[$depth] == 12 && $rowOpen[$depth]) {
                            $content .= self::closeRow();
                            $rowOpen[$depth] = false;
                        }
                    }
                }
            }
            $tmpDepth = $depth;
            while( $tmpDepth > -1 ) {
                if (isset($columnOpen[$tmpDepth]) && $columnOpen[$tmpDepth])
                    $content .= self::closeColumn();
                array_pop($columnOpen);
                if ($rowOpen[$tmpDepth])
                    $content .= self::closeRow();
                array_pop($rowOpen);
                $tmpDepth -= 1;
            }
            if($containerOpen) {
                $content .= self::closeContainer();
            }
            return $content;
        }
        private static function openContainer( $containerSize = '', $css_classes = '') {
            $content = '';
            $content .= '<div class="container' . $containerSize . ' ' . $css_classes . '">';
            return $content;
        }
        private static function openColumn( $currentSliceColumnSize,  $css_classes = '') {
            $currentSliceColumnSize = !isset($currentSliceColumnSize) || $currentSliceColumnSize == '' ? '12' : $currentSliceColumnSize;
            return '<div class="col-md-' . $currentSliceColumnSize . ' ' . $css_classes . '">';
        }
        private static function openRow($css_classes = '') {
            return '<div class="row"' . $css_classes .'>';
        }
        private static function closeRow() {
            return '</div>';
        }
        private static function closeColumn() {
            return '</div>';
        }
        private static function closeContainer() {
            $content = '';
            return $content . '</div>';
        }
    }
