<?php namespace ProcessWire; 

// Template file for pages using the “basic-page” template
	

	$page = wire()->pages->get($input->urlSegment2);

	

?>

<?=$page->render();?>




