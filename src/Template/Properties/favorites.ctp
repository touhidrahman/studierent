<h1 class="display-4">Favorite Properties</h1>

<?php if ($id_exists) { ?>
<?php foreach ($properties as $property) {
    echo $this->element('adSnippet', ['property' => $property, 'avgRatings' => $avgRatings]);
} ?>

<!-- Pagination -->
<div class="text-xs-center">
    <?php echo $this->Paginator->prev('<<'); ?>
    <?php echo $this->Paginator->numbers(); ?>
    <?php echo $this->Paginator->next('>>'); ?>
</div>
<?php } ?>
<?php if (!$id_exists) { ?>
<h2>Sorry, you have no favorite properties </h2>
<?php } ?>