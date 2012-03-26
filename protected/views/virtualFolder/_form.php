<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'virtual-folder-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'userId_fk'); ?>
		<?php echo $form->textField($model,'userId_fk',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'userId_fk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'folderId_fk'); ?>
		<?php echo $form->textField($model,'folderId_fk',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'folderId_fk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parentVirtualFolderId_fk'); ?>
		<?php echo $form->textField($model,'parentVirtualFolderId_fk',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'parentVirtualFolderId_fk'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'isOwner'); ?>
		<?php echo $form->textField($model,'isOwner'); ?>
		<?php echo $form->error($model,'isOwner'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->