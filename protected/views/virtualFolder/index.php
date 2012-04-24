<?php
$this->breadcrumbs=array(
	'Virtual Folders',
);

$this->menu=array(
	array('label'=>'Create VirtualFolder', 'url'=>array('create')),
	array('label'=>'Manage VirtualFolder', 'url'=>array('admin')),
);
?>

<h1>Virtual Folders</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
