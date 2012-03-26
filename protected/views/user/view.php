<?php
$this->breadcrumbs=array(
	'Users'=>array('index'),
	$model->title,
);

$this->menu=array(
	array('label'=>'List User', 'url'=>array('index')),
	array('label'=>'Create User', 'url'=>array('create')),
	array('label'=>'Update User', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete User', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage User', 'url'=>array('admin')),
);
?>

<h1>View User #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'group_id',
		'username',
		'password',
		'salt',
		'email',
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
	),
)); ?>
