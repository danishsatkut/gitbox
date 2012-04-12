<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'folder-form',
	'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>
   
	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'folderName'); ?>
		<?php echo $form->textField($model,'folderName',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'folderName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folderDescription'); ?>
		<?php echo $form->textArea($model,'folderDescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'folderDescription'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->