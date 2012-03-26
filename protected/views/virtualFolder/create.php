<?php
$this->breadcrumbs=array(
	'Virtual Folders'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List VirtualFolder', 'url'=>array('index')),
	array('label'=>'Manage VirtualFolder', 'url'=>array('admin')),
);
?>

<h1>Create VirtualFolder</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>