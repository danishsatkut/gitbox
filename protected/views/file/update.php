<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->fileId_pk=>array('view','id'=>$model->fileId_pk),
	'Update',
);

$this->menu=array(
	array('label'=>'List File', 'url'=>array('index')),
	array('label'=>'Create File', 'url'=>array('create')),
	array('label'=>'View File', 'url'=>array('view', 'id'=>$model->fileId_pk)),
	array('label'=>'Manage File', 'url'=>array('admin')),
);
?>

<h1>Update File <?php echo $model->fileId_pk; ?></h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>