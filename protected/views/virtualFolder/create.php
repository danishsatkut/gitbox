<div class="span6 offset3">
    <?php if(Yii::app()->user->hasFlash('folderCreationFailure')): ?>
    <?php $flashMessage = Yii::app()->user->getFlash('folderCreationFailure'); ?>
    <div class="alert alert-error alert-block fade in">
        <a class="close" data-dismiss="alert" href="#">&times;</a>
        <h4 class="alert-heading"><?php echo $flashMessage['heading']; ?></h4>
        <p><?php echo $flashMessage['body']; ?></p>
    </div>
    <?php endif; ?>
    <fieldset>
        <legend>Create new folder</legend>
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </fieldset>
</div>
