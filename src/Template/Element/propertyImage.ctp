<?php
if (file_exists(WWW_ROOT.DS.'img'.DS.$path)) {
    echo $this->Html->image($path, ['alt' => 'Property image', 'class' => 'rounded-left img-fluid']);
} else {
?>
    <h1 class="display-1 text-xs-center text-success"><i class="fa fa-home fa-lg"></i></h1>
<?php
}
?>
