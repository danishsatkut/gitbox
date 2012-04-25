<div class="span6 offset3">
    <?php if(Yii::app()->user->hasFlash('folderRenameFailure')): ?>
    <?php $flashMessage = Yii::app()->user->getFlash('folderRenameFailure'); ?>
    <div class="alert alert-error alert-block fade in">
        <a class="close" data-dismiss="alert" href="#">&times;</a>
        <h4 class="alert-heading"><?php echo $flashMessage['heading']; ?></h4>
        <p><?php echo $flashMessage['body']; ?></p>
    </div>
    <?php endif; ?>
    <fieldset>
        <legend>Rename folder</legend>
        <?php echo $this->renderPartial('_form', array('model'=>$model)); ?>
    </fieldset>
</div>