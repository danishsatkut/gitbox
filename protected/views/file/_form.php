<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'fileName'); ?>
		<?php echo $form->textField($model,'fileName',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'fileName'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'fileDescription'); ?>
		<?php echo $form->textArea($model,'fileDescription',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'fileDescription'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'size'); ?>
		<?php echo $form->textField($model,'size',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'size'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'mime'); ?>
		<?php echo $form->textField($model,'mime',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'mime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'filePath'); ?>
		<?php echo $form->textField($model,'filePath',array('size'=>31,'maxlength'=>31)); ?>
		<?php echo $form->error($model,'filePath'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dateCreated'); ?>
		<?php echo $form->textField($model,'dateCreated'); ?>
		<?php echo $form->error($model,'dateCreated'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'createdBy_fk'); ?>
		<?php echo $form->textField($model,'createdBy_fk',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'createdBy_fk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folderId_fk'); ?>
		<?php echo $form->textField($model,'folderId_fk',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'folderId_fk'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->