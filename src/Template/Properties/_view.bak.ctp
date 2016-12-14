<div class="row">
    <div class="col-xs-12">
        <div class="fill">

        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
            <ol class="carousel-indicators">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
            </ol>
            <div class="carousel-inner" role="listbox">
                <?php $i = 0; foreach ($property->images as $img) : ?>

                <div class="carousel-item <?= ($i==0)? 'active' : ''; ?>">
                    <div class="fill">
                        <?= $this->Html->image('properties'.DS.$img->path); ?>
                    </div>
                </div>

                <?php $i++; endforeach; ?>
            </div>
            <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                <span class="icon-prev" aria-hidden="true"></span>
                <span class="sr-only">Previous</span>
            </a>
            <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                <span class="icon-next" aria-hidden="true"></span>
                <span class="sr-only">Next</span>
            </a>
        </div>
    </div>
