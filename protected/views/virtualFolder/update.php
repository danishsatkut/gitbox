<?php
$this->breadcrumbs=array(
	'Virtual Folders'=>array('index'),
	$model->virtualFolderId_pk=>array('view','id'=>$model->virtualFolderId_pk),
	'Update',
);

$this->menu=array(
	array('label'=>'List VirtualFolder', 'url'=>array('index')),
	array('label'=>'Create VirtualFolder', 'url'=>array('create')),
	array('label'=>'View VirtualFolder', 'url'=>array('view', 'id'=>$model->virtualFolderId_pk)),
	array('label'=>'Manage VirtualFolder', 'url'=>array('admin')),
);
?>

<h1>Update VirtualFolder <?php echo $model->virtualFolderId_pk; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>