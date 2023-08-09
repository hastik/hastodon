<?php namespace ProcessWire; 

// Template file for pages using the “basic-page” template

?>

<style>
	.project{
		border: 4px dotted #ddd;
		padding: 4rem;		
		display: block;
	}

</style>


<div class="space">

<?php if($input->urlSegment1=="fullview"):?>


<?php else:?>

	<?php foreach($page->children() as $child): ?>
	
		<a class="project" href="<?=$child->url?>"><?=$child->title?></a>

	<?php endforeach; ?>

<?php endif;?>




</div>

