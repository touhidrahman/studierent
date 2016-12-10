<h1 class="display-4">My Properties</h1>
<?php foreach ($properties as $property){
    echo $this->element('adSnippetLandlord', ['property' => $property]);

} ?>
<div class="text-xs-center">
    <?php echo $this->Paginator->prev('<<'); ?>
    <?php echo $this->Paginator->numbers(); ?>
    <?php echo $this->Paginator->next('>>'); ?>
</div>
