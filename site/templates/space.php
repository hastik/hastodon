<?php namespace ProcessWire; 

// Template file for pages using the “basic-page” template

?>

<style>
	.project{
		border: 2px dashed #ddd;
		padding: 2rem;		
		display: block;
	}

</style>


<div class="space">


<?php if($input->urlSegment1=="fullview"):?>

	<?php foreach($page->children() as $child): ?>
		
		<h2><?=$child->title?></h2>
		<?=$child->render()?>

	<?php endforeach; ?>

<?php else:?>

	<?php foreach($page->children() as $child): ?>
		
		<a class="project" href="<?=$child->url?>"><?=$child->title?></a>

	<?php endforeach; ?>


	<?php endif;?>

</div>


