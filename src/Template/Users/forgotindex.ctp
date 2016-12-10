<nav class="large-3 medium-4 columns" id="actions-sidebar">
    
</nav>
<div class="forgotPassword form large-9 medium-8 columns content">
<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header" align="center">
    
    
        <u><legend><?= __('Forgot Password?') ?></legend></u></div>
		<div id="div-forms">
		<?= $this->Form->create() ?>
		<form id="forgotPassword-form">
						<div class="modal-body">
        <?php
        $this->Form->input('password',array('label'=>'New Password'))            
        ?>
    </div></div>
    <div class="form-group row">
                    <div class="col-md-5 col-sm-3"></div>
					<div class="col-md-3 col-sm-9 ">
					<?= $this->Form->submit('Continue',array('class'=>'btn btn-primary btn-block')); ?>
                    <?= $this->Form->end(); ?>  
                    </div>
					
                </div>
            </form> <!-- /form -->
        </div>