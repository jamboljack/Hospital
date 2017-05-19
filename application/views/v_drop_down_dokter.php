<?php        
	$style_dokter='class="select2_category form-control" id="dokter_id"';
	echo form_dropdown("lstDokter" , $listDokter, '', $style_dokter);
?>