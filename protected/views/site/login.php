<h1>Login</h1>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>true,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array(
            'class'=>'well form-horizontal',
        )
)); ?>
    <div class="control-group">
	<div class="control-label">
		<?php echo $form->labelEx($model,'email'); ?>
        </div>
        <div class="controls">
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email', array('class'=>'help-block')); ?>
	</div>
    </div>
    
    <div class="control-group">
	<div class="control-label">
		<?php echo $form->labelEx($model,'password'); ?>
        </div>
        <div class="controls">
		<?php echo $form->passwordField($model,'password'); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>
    </div>

	<div class="rememberMe">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
	</div>

	<div class="buttons">
		<?php echo CHtml::submitButton('Login'); ?>
	</div>
    

<?php $this->endWidget(); ?>
</div><!-- form -->
