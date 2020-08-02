<?php
$rex_values_content = json_decode(rex_article_slice::getArticleSliceById(REX_SLICE_ID)->getValue(1), true);

if(rex::isBackend()) {
	echo "
		<script>
			var slice_countREX_SLICE_ID = ".$rex_values_content["slice_count"].";
			$( document ).ready(function() {
			    var slices = $('#slice' + REX_SLICE_ID).parent().children();
			    
			    var index_of_slice = $('#slice' + REX_SLICE_ID).index();

				var color = '#'+(Math.random()*0xFFFFFF<<0).toString(16);
				$('#slice' + REX_SLICE_ID).children(0).children(0).css('border', '3px solid ' + color);
			    for(let i = 1; i <= slice_countREX_SLICE_ID; i++) {
				    $(slices[index_of_slice + 2*i]).children(0).children(0).css('border', '3px solid ' + color);
				    $(slices[index_of_slice + 2*i]).children(0).css('padding-left', '20px');
			    }
			});


		</script>
	";
}

?>