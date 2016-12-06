<div class="row">
    <?= $this->element('userSidebar', ['id'=>$id], ['cache' => true]) ?>

    <!-- properties -->
    <div class="col-md-9 col-sm-8 col-xs-12">

        <h1 class="display-4">My Properties</h1>
        <?php foreach ($properties as $property){
            echo $this->element('adSnippetLandlord', ['property' => $property]);
        } ?>
        <div class="text-xs-center">
            <?php echo $this->Paginator->prev('<<'); ?>
            <?php echo $this->Paginator->numbers(); ?>
            <?php echo $this->Paginator->next('>>'); ?>
        </div>
    </div>

</div>
