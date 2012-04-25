<?php $this->beginContent('//layouts/main'); ?>

    <div class="row"><!-- Sub header content -->
        
        <?php echo $content; ?>
        
        
    </div>
    <div id="folderCreate" class="modal fade">
        <div class="modal-header">
            <a class="close" data-dismiss="modal">x</a>
            <h3>Create a new folder</h3>
        </div>
        <div class="modal-body">
            <?php //echo $this->renderPartial('_form', array('model'=>$model)); ?>
        </div>
        <div class="modal-footer">
            <a href="#" class="btn" data-dismiss="modal">Cancel</a>
            <?php //echo CHtml5::htmlSubmitButton($model->isNewRecord ? 'Create' : 'Save',
                    //array('folder/create'), // Url
                    //array('type'=>'POST'), // ajaxOptions
                    //array('class'=>'btn btn-primary', 'form'=>'folder-form') // htmlOptions
                //); ?>
        </div>
    </div>
    
    <?php  ?>
<?php $this->endContent(); ?>