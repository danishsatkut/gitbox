<?php
$this->breadcrumbs=array(
	'Files'=>array('index'),
	$model->fileId_pk,
);

$this->menu=array(
	array('label'=>'List File', 'url'=>array('index')),
	array('label'=>'Create File', 'url'=>array('create')),
	array('label'=>'Update File', 'url'=>array('update', 'id'=>$model->fileId_pk)),
	array('label'=>'Delete File', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->fileId_pk),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage File', 'url'=>array('admin')),
);
?>

<h1>View File #<?php echo $model->fileId_pk; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'fileId_pk',
		'fileName',
		'fileDescription',
		'size',
		'mime',
		'filePath',
		'dateCreated',
		'createdBy_fk',
		'folderId_fk',
	),
)); ?>