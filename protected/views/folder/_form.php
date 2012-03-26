<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'folder-form',
	'enableAjaxValidation'=>false,
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

	<div class="row">
		<?php echo $form->labelEx($model,'dateCreated'); ?>
		<?php echo $form->textField($model,'dateCreated'); ?>
		<?php echo $form->error($model,'dateCreated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateModified'); ?>
		<?php echo $form->textField($model,'dateModified'); ?>
		<?php echo $form->error($model,'dateModified'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdBy_fk'); ?>
		<?php echo $form->textField($model,'createdBy_fk',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'createdBy_fk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'modifiedBy_fk'); ?>
		<?php echo $form->textField($model,'modifiedBy_fk',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'modifiedBy_fk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folderPath'); ?>
		<?php echo $form->textField($model,'folderPath',array('size'=>31,'maxlength'=>31)); ?>
		<?php echo $form->error($model,'folderPath'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->