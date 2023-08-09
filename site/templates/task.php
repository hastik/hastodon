<?php namespace ProcessWire; 

// Template file for pages using the “basic-page” template

?>

<style>
	.task{
		
		padding: 2rem;
		background: white;
		box-shadow: 2px 2px 8px rgb(15 23 42 / 0.05);
		border-radius: 0.5rem;
		margin-bottom: 1rem;

		--tw-text-opacity: 0.15;

		border: 1px solid rgb(15 23 42 / var(--tw-text-opacity));
	}

	.task.p1{
		border-color: #d1453b;
		background-color: #FAECEB;
	}
	.task.p2{
		border-color: #eb8909;
		background-color: #FDF3E6;
	}
	.task.p3{
		border-color: #246fe0;
		background-color: #E9F0FC;
	}

	.task .task{
		background: none;
		padding: 0.5rem;
		font-size: 0.8em;
		margin-bottom: 0.25rem;
	}

	.task .task .desc{
		display:none;
	}
	.task .task h3{
		font-size: 0.9em;
		margin: 0;
	}

	.task .subtasks{
		margin-top: 1rem;
	}
</style>

<?php 
	$boxclass = $input->urlSegment1=="edit" ? "filtered" : "non";
?>

<div class="task p<?=$page->priority?> <?=$boxclass?> " id="task-<?=$page->id?>">

<?php if($input->urlSegment1=="edit"): ?>

	Editace
	<?php


		/*$form = modules()->get("InputfieldForm"); // the form module		  
		$form->method = 'post';
		$form->action = './';
		$form->attr("name+id", "pro_form"); // it will be as much the name as the id
		$form->attr("class", "uk-form-stacked no-form-ul"); //any CSS class.

		$f = modules()->get("InputfieldHidden");
		$f->attr("id+name", session()->CSRF->getTokenName());
		$f->attr("maxlength", 30);
		$f->attr("class", "uk-input");
		$f->attr("value", session()->CSRF->getTokenValue());

		$form->add($f);

		$ff = modules()->get("InputfieldText");
		$ff->attr("id+name", "text");
		$ff->attr("value", "Tada");

		$form->add($ff)	;

		echo $form->render();*/

		$form = $modules->get('InputfieldForm');
		$form->action("");
		$form->attr("hx-post",$page->url."edit");
		$form->attr("hx-target","#task-".$page->id);
		$form->attr("hx-swap","outerHTML");
		$f = $form->InputfieldText;
		$f->attr('id+name', "title");
		$f->attr('value', $page->title);
		$f->label = 'Title';
		$f->required = true;
		$form->add($f);

		$f = $form->InputfieldText;
		$f->attr('id+name', "priority");
		$f->attr('value', $page->priority);
		$f->label = 'Priority';
		$f->required = true;
		$form->add($f);

		$f = $form->InputfieldSubmit;
		$f->attr('name', 'submit_subscribe');
		$f->val('Submit');
		$form->add($f);



		// ProcessWire versions 3.0.205+
		if($form->isSubmitted('submit_subscribe')) {
		if($form->process()) {
			$name = $form->getValueByName('your_name');
			$email = $form->getValueByName('your_email');
			echo "<h3>Thank you, you have been subscribed!</h3>";


			$p = $page; // create new page object
			$p->of(false);
			//$p->template = 'chat'; // set template
			//$p->par ent = $page; // set the parent
			$p->title = wire("input")->post("title"); // set page title (not neccessary but recommended)
			$p->priority = wire("input")->post("priority");
			$p->save();

			wire("session")->redirect("./");


		} else {
			echo "<h3>There were errors, please fix</h3>";
			echo $form->render();
		}
		} else {
		// form not submitted, just display it
		echo $form->render();
		}
		  
	?>

	



<?php else : ?>



	<h3><?=$page->title?></h3>
	<p class="desc">
		P<?=$page->priority?> <br>
		<?=$page->type?>

		<a hx-get="<?=$page->url?>edit" href="<?=$page->url?>edit" hx-swap="outerHTML" hx-target="#task-<?=$page->id?>">
    		Edit
		</a>


		<?php if($page->children()->count()):?>

			<div class="subtasks" id="subtasksof<?=$page->id?>">
				<?php foreach($page->children() as $subtask):?>

					<?=$subtask->render()?>

				<?php endforeach; ?>
			</div>

			<script>
				new Sortable(subtasksof<?=$page->id?>, {
					filter: '.filtered',
					group: 'subtasksof<?=$page->id?>', // set both lists to same group
					animation: 150
				});
			</script>

		<?php endif; ?>

	</p>



<?php endif; ?>

</div>	