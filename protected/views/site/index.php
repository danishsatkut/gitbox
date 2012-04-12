<?php $this->pageTitle=Yii::app()->name; ?>

<p>Welcome, <?php echo Yii::app()->user->name; ?></p>

<div>
    <span><?php echo CHtml::link('Create new folder', $this->createUrl('folder/create')); ?></span>
    <span><?php echo CHtml::link('Upload File', $this->createUrl('file/upload')); ?></span>
</div>

<div>
    <span>Your folders</span>
</div>

<?php echo "There are " . count($user->virtualfolders) . " folders in your box"; ?>

<?php foreach($user->virtualfolders as $virtualFolder): ?>
    <div>
        <b><?php echo $virtualFolder->folder->folderName; ?></b>
        <?php if(isset($virtualFolder->folder->folderDescription)): ?>
        <div><?php echo $virtualFolder->folder->folderDescription; ?></div>
        <?php else: ?>
        <div>There is no description.</div>
        <?php endif; ?>
        <div><?php echo $virtualFolder->folder->dateCreated; ?></div>
        
    </div>
<?php endforeach; ?>

<?php foreach($user->files as $file): ?>

    <div><?php echo $file->fileName; ?></div>
        
<?php endforeach; ?>

<?php //var_dump(Yii::app()->user->id); ?>