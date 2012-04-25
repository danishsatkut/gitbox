<?php if(Yii::app()->user->hasFlash('registerSuccess')): ?>
<?php $flashMessage = Yii::app()->user->getFlash('registerSuccess'); ?>
<div class="alert alert-success alert-block fade in">
    <a class="close" data-dismiss="alert" href="#">&times;</a>
    <h4 class="alert-heading"><?php echo $flashMessage['heading']; ?></h4>
    <?php echo $flashMessage['body']; ?>
</div>
<?php endif; ?>

<div class="form">
<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'login-form',
	'enableClientValidation'=>false,
	'clientOptions'=>array(
		'validateOnSubmit'=>true,
	),
        'htmlOptions'=>array(
            'class'=>'well form-horizontal',
        )
)); ?>
    <fieldset>
        <legend>Login</legend>
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

	<div class="control-group">
        <div class="controls">
            <label class="checkbox">
		<?php echo $form->checkBox($model,'rememberMe'); ?>
		<?php echo $form->label($model,'rememberMe'); ?>
		<?php echo $form->error($model,'rememberMe'); ?>
            </label>
        </div>
	</div>

	<div class="form-actions">
		<?php echo CHtml5::submitButton('Login', array('class'=>'btn btn-primary')); ?>
        <?php echo CHtml5::link('Register', array('site/register'), array('class'=>'btn btn-success')); ?>
	</div>
    </fieldset>

<?php $this->endWidget(); ?>
</div><!-- form -->
