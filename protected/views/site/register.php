<?php if(Yii::app()->user->hasFlash('registerFailure')): ?>
<?php $flashMessage = Yii::app()->user->getFlash('registerFailure'); ?>
<div class="alert alert-error alert-block fade in">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <h4 class="alert-heading"><?php echo $flashMessage['heading']; ?></h4>
    <?php echo $flashMessage['body']; ?>
</div>
<?php endif; ?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-register-form',
    'enableClientValidation'=>true,
	'enableAjaxValidation'=>true,
    'htmlOptions'=>array(
            'class'=>'well form-horizontal',
        )
)); ?>

	<fieldset>
        <legend>Register</legend>
    <div class="control-group">
        <div class="control-label">
            <?php echo $form->labelEx($model,'username'); ?>
        </div>
        <div class="controls">
            <?php echo $form->textField($model,'username'); ?>
            <?php echo $form->error($model,'username'); ?>
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
    
    <div class="control-group">
        <div class="control-label">
		<?php echo $form->labelEx($model,'passwordCompare'); ?>
        </div>
        <div class="controls">
		<?php echo $form->passwordField($model,'passwordCompare'); ?>
		<?php echo $form->error($model,'passwordCompare'); ?>
        </div>
	</div>

	<div class="control-group">
        <div class="control-label">
		<?php echo $form->labelEx($model,'email'); ?>
        </div>
        <div class="controls">
		<?php echo $form->textField($model,'email'); ?>
		<?php echo $form->error($model,'email'); ?>
        </div>
	</div>

	<div class="control-group">
        <div class="control-label">
		<?php echo $form->labelEx($model,'firstname'); ?>
        </div>
        <div class="controls">
		<?php echo $form->textField($model,'firstname'); ?>
		<?php echo $form->error($model,'firstname'); ?>
        </div>
	</div>

	<div class="control-group">
        <div class="control-label">
		<?php echo $form->labelEx($model,'middlename'); ?>
        </div>
        <div class="controls">
		<?php echo $form->textField($model,'middlename'); ?>
		<?php echo $form->error($model,'middlename'); ?>
        </div>
	</div>

	<div class="control-group">
        <div class="control-label">
		<?php echo $form->labelEx($model,'lastname'); ?>
        </div>
        <div class="controls">
		<?php echo $form->textField($model,'lastname'); ?>
		<?php echo $form->error($model,'lastname'); ?>
        </div>
	</div>


	<div class="form-actions">
		<?php echo CHtml::submitButton('Submit', array('class'=>'btn btn-primary')); ?>
	</div>
    </fieldset>

<?php $this->endWidget(); ?>

</div><!-- form -->