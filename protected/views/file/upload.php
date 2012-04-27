
<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'file-form',
	'enableAjaxValidation'=>true,
    'enableClientValidation'=>true,
    'htmlOptions'=>array(
        'class'=>'well form-horizontal',
        'enctype'=>'multipart/form-data',
        ),
)); ?>
    
    <div class="control-group">
            <div class="control-label">
            <?php echo $form->labelEx($model,'file'); ?>
            </div>
            <div class="controls">
            <?php echo $form->fileField($model,'file'); ?>
            <?php echo $form->error($model,'file'); ?>
            </div>
    </div>

        <div class="form-actions">
            <?php echo CHtml::submitButton('Upload', array('class'=>'btn btn-primary')); ?>
            <?php echo CHtml5::link('Cancel', array('virtualFolder/view', 'id'=>$id), array('class'=>'btn')); ?>
        </div>
    

<?php $this->endWidget(); ?>

</div><!-- form -->