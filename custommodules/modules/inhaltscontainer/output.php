<?php
$rex_values_content = json_decode(rex_article_slice::getArticleSliceById($rex_slice_id)->getValue(1), true);

if (rex::isBackend()) {
    echo "
		<script>
			var slice_count" . $rex_slice_id . " = " . $rex_values_content["slice_count"] . ";
			$( document ).ready(function() {
			    var slices = $('#slice' + " . $rex_slice_id . ").parent().children();

			    var index_of_slice = $('#slice' + " . $rex_slice_id . ").index();

				var color = '#'+(Math.random()*0xFFFFFF<<0).toString(16);
				$('#slice' + " . $rex_slice_id . ").children(0).children(0).css('border', '3px solid ' + color);
			    for(let i = 1; i <= slice_count" . $rex_slice_id . "; i++) {
					if($(slices[index_of_slice + 2*i]).children(0).prop('tagName') == 'FORM') {
				    	$(slices[index_of_slice + 2*i]).children(0).children(0).children(0).css('border', '3px solid ' + color);
						console.log('edit');
					} else {
						$(slices[index_of_slice + 2*i]).children(0).children(0).css('border', '3px solid ' + color);
						console.log('view');
					}
					$(slices[index_of_slice + 2*i]).children(0).css('padding-left', '20px');
			    }
			});
		</script>
	";
}
