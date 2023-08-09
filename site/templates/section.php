<?php namespace ProcessWire; 

// Template file for pages using the “basic-page” template

?>



<style>
	.section{
		background: white;
		border-radius: 1rem;
		padding: 2rem;
		border: 1px solid rgb(15 23 42 / .4);
	}
</style>

<div class="section" id="section<?=$page->id?>">
	<div class="section_title filtered">
		<h2><?=$page->title?></h2>
	</div>


<?php


	if($input->urlSegment1=="orderprior"){
		$tasks = $page->children("sort=priority");
	}
	else{
		$tasks = $page->children();
	}



?>

<?php foreach($tasks as $child): ?>

	<?= $child->render(); ?>

<?php endforeach; ?>


<div class="newtask">
	<button>+</button>
	<div class="newtaskforn">
		
	</div>
</div>

</div>

<script>
	new Sortable(section<?=$page->id?>, {
		filter: '.filtered',
		sort: false,
    	group: 'tasks', // set both lists to same group
    	animation: 150
	});
</script>