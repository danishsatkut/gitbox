<?php
$this->breadcrumbs=array(
	'Folders'=>array('index'),
	$model->folderId_pk,
);

$this->menu=array(
	array('label'=>'List Folder', 'url'=>array('index')),
	array('label'=>'Create Folder', 'url'=>array('create')),
	array('label'=>'Update Folder', 'url'=>array('update', 'id'=>$model->folderId_pk)),
	array('label'=>'Delete Folder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->folderId_pk),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Folder', 'url'=>array('admin')),
);
?>

<h1>View Folder #<?php echo $model->folderId_pk; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'folderId_pk',
		'folderName',
		'folderDescription',
		'dateCreated',
		'dateModified',
		'createdBy_fk',
		'modifiedBy_fk',
		'folderPath',
	),
)); ?>
