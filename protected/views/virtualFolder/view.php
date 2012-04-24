<?php
$this->breadcrumbs=array(
	'Virtual Folders'=>array('index'),
	$model->virtualFolderId_pk,
);

$this->menu=array(
	array('label'=>'List VirtualFolder', 'url'=>array('index')),
	array('label'=>'Create VirtualFolder', 'url'=>array('create')),
	array('label'=>'Update VirtualFolder', 'url'=>array('update', 'id'=>$model->virtualFolderId_pk)),
	array('label'=>'Delete VirtualFolder', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->virtualFolderId_pk),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage VirtualFolder', 'url'=>array('admin')),
);
?>

<h1>View VirtualFolder #<?php echo $model->virtualFolderId_pk; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'virtualFolderId_pk',
		'userId_fk',
		'folderId_fk',
		'parentVirtualFolderId_fk',
		'isOwner',
	),
)); ?>
