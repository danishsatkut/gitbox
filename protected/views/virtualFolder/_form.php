<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'virtual-folder-form',
	'enableAjaxValidation'=>false,
    'enableClientValidation'=>true,
    'htmlOptions'=>array('class'=>'well form-horizontal'),
)); ?>
    
    
        
        <div class="control-group">
            <div class="control-label">
            <?php echo $form->labelEx($model,'name'); ?>
            </div>
            <div class="controls">
            <?php echo $form->textField($model,'name',array('size'=>30,'maxlength'=>30)); ?>
            <?php echo $form->error($model,'name'); ?>
            </div>
        </div>

        <div class="control-group">
            <div class="control-label">
            <?php echo $form->labelEx($model,'description'); ?>
            </div>
            <div class="controls">
            <?php echo $form->textField($model,'description',array('size'=>30,'maxlength'=>140)); ?>
            <?php echo $form->error($model,'description'); ?>
            </div>
        </div>

        <div class="form-actions">
            <?php echo CHtml5::submitButton($model->isNewRecord ? 'Create' : 'Save',
                        array('class'=>'btn btn-primary')
                    ); ?>
            <?php echo CHtml5::link('Cancel',
                        array('site/index'),
                        array('class'=>'btn')
                    ); ?>
        </div>

<?php $this->endWidget(); ?>

</div><!-- form -->