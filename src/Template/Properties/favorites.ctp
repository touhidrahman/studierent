<div class="row">
    <?= $this->element('userSidebar', [], ['cache' => true]) ?>

    <!-- properties -->
        <div class="col-md-9 col-sm-8 col-xs-12">

            <h1 class="display-4">Favorite Properties</h1>
            <?php foreach ($properties as $property) {
                echo $this->element('adSnippet', ['property' => $property]);
            } ?>
    </div>


</div>
