<?php namespace ProcessWire; 

// Template file for pages using the “basic-page” template

?>



<?php if($input->urlSegment1=="dashboard"): ?>

	<?php include "./routes/dashboard.php";?>

<?php elseif($input->urlSegment1=="id") : ?>

	<?php include "./routes/id.php";?>

<?php else : ?>

Chybí Segment


<?php endif; ?>