<?php
$this->breadcrumbs=array(
	'Folders'=>array('index'),
	$model->folderId_pk=>array('view','id'=>$model->folderId_pk),
	'Update',
);

$this->menu=array(
	array('label'=>'List Folder', 'url'=>array('index')),
	array('label'=>'Create Folder', 'url'=>array('create')),
	array('label'=>'View Folder', 'url'=>array('view', 'id'=>$model->folderId_pk)),
	array('label'=>'Manage Folder', 'url'=>array('admin')),
);
?>

<h1>Update Folder <?php echo $model->folderId_pk; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>