<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$.fn.yiiGridView.update('user-grid', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Users</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'user-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'group_id',
		'username',
		'password',
		'salt',
		'email',
		/*
		'title',
		'realname',
		'url',
		'facebook',
		'twitter',
		'linkedin',
		'skype',
		'jabber',
		'icq',
		'msn',
		'aim',
		'yahoo',
		'location',
		'signature',
		'disp_topics',
		'disp_posts',
		'email_setting',
		'notify_with_post',
		'auto_notify',
		'show_smilies',
		'show_img',
		'show_img_sig',
		'show_avatars',
		'show_sig',
		'access_keys',
		'timezone',
		'dst',
		'time_format',
		'date_format',
		'language',
		'style',
		'num_posts',
		'last_post',
		'last_search',
		'last_email_sent',
		'registered',
		'registration_ip',
		'last_visit',
		'admin_note',
		'activate_string',
		'activate_key',
		'avatar',
		'avatar_width',
		'avatar_height',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
