<?php namespace ProcessWire; 

// Template file for pages using the “basic-page” template

?>
<script  type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/Sortable/1.10.2/Sortable.js" ></script>
<style>
	.project{
		
	}

	.sections{
		display: grid;
		grid-template-columns: 1fr 1fr 1fr 1fr;
		grid-gap: 2rem;
	}

	body{
		--tw-bg-opacity: 1;
		--tw-text-opacity: 1;
    	color: rgb(15 23 42 / var(--tw-text-opacity));
		background-color: rgb(249 250 251 / var(--tw-bg-opacity));
		font-family: Arial;
		padding: 2rem;
	}

	h2,h3,p{
		margin: 0;
	}

	h3{
		font-size: 1rem;
		margin-bottom: 0.75rem;
	}

	h2{
		font-size: 1.2rem;
		margin-bottom: 1.0rem;
	}

	p{
		font-size: 0.9rem;
	}
	
	.order{
		margin-bottom: 2rem;
	}

</style>

<script src="https://unpkg.com/htmx.org@1.9.4"></script>

  <!-- have a button POST a click via AJAX -->
  

  <div class="order">
	<?php if($input->urlSegment1=="orderprior"):?>

		<p>
			<a href="<?=$page->url?>">No Order</a>
			<span class="">Order by priority</span>
		</p>
		
		

		<?php else:?>

			<p>
			<span class="">No Order</span>
			<a href="<?=$page->url?>orderprior">Order by priority</a>
		</p>


		<?php endif;?>


</div>


<div class="sections" id="project<?=$page->id?>">


		

	

<?php foreach($page->children() as $child): ?>

	<?= $child->render(); ?>

<?php endforeach; ?>

</div>


<script>
	new Sortable(project<?=$page->id?>, {
    	group: 'sections', // set both lists to same group
    	animation: 150
	});
</script>
