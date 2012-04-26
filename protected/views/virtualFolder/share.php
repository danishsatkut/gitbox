<?php if(Yii::app()->user->hasFlash('shareSuccess')): ?>
        <?php $flashMessage = Yii::app()->user->getFlash('shareSuccess'); ?>
        <div class="alert alert-success alert-block fade in">
            <a class="close" data-dismiss="alert" href="#">&times;</a>
            <h4 class="alert-heading"><?php echo $flashMessage['heading']; ?></h4>
            <?php echo $flashMessage['body']; ?>
        </div>
        <?php endif; ?>

<?php if(Yii::app()->user->hasFlash('shareFailure')): ?>
        <?php $flashMessage = Yii::app()->user->getFlash('shareFailure'); ?>
        <div class="alert alert-error alert-block fade in">
            <a class="close" data-dismiss="alert" href="#">&times;</a>
            <h4 class="alert-heading"><?php echo $flashMessage['heading']; ?></h4>
            <?php echo $flashMessage['body']; ?>
        </div>
        <?php endif; ?>

<?php $form = $this->beginWidget('CActiveFormHtml5', array(
        'id'=>'virtual-folder-form',
        'enableClientValidation'=>true,
        'enableAjaxValidation'=>true,
        'htmlOptions'=>array('class'=>'well form-horizontal'),
    )); ?>
<fieldset>
    <legend>Add Collaborator</legend>
    <div class="control-group">
        <div class="control-label">
        <?php echo $form->labelEx($model, 'email'); ?>
        </div>
        <div class="controls">
        <?php echo $form->emailField($model, 'email'); ?>
        <?php echo $form->error($model,'email'); ?>
        </div>
        <div class="form-actions">
        <?php echo CHtml5::submitButton('Add collaborator', array('class'=>'btn btn-primary')); ?>
            <?php echo CHtml5::link('Cancel',
                        array('site/index'),
                        array('class'=>'btn')
                    ); ?>
        </div>
    </div>
</fieldset>
<?php $this->endWidget(); ?>