<h1 class="display-4">Favorite Properties</h1>
<?php foreach ($properties as $property) {
    echo $this->element('adSnippet', ['property' => $property]);
} ?>

<!-- Pagination -->
<div class="text-xs-center">
    <?php echo $this->Paginator->prev('<<'); ?>
    <?php echo $this->Paginator->numbers(); ?>
    <?php echo $this->Paginator->next('>>'); ?>
</div>
