<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('group_id')); ?>:</b>
	<?php echo CHtml::encode($data->group_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('username')); ?>:</b>
	<?php echo CHtml::encode($data->username); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('password')); ?>:</b>
	<?php echo CHtml::encode($data->password); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('salt')); ?>:</b>
	<?php echo CHtml::encode($data->salt); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email')); ?>:</b>
	<?php echo CHtml::encode($data->email); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('title')); ?>:</b>
	<?php echo CHtml::encode($data->title); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('realname')); ?>:</b>
	<?php echo CHtml::encode($data->realname); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('url')); ?>:</b>
	<?php echo CHtml::encode($data->url); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('facebook')); ?>:</b>
	<?php echo CHtml::encode($data->facebook); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('twitter')); ?>:</b>
	<?php echo CHtml::encode($data->twitter); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('linkedin')); ?>:</b>
	<?php echo CHtml::encode($data->linkedin); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('skype')); ?>:</b>
	<?php echo CHtml::encode($data->skype); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('jabber')); ?>:</b>
	<?php echo CHtml::encode($data->jabber); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('icq')); ?>:</b>
	<?php echo CHtml::encode($data->icq); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('msn')); ?>:</b>
	<?php echo CHtml::encode($data->msn); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('aim')); ?>:</b>
	<?php echo CHtml::encode($data->aim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('yahoo')); ?>:</b>
	<?php echo CHtml::encode($data->yahoo); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('location')); ?>:</b>
	<?php echo CHtml::encode($data->location); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('signature')); ?>:</b>
	<?php echo CHtml::encode($data->signature); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disp_topics')); ?>:</b>
	<?php echo CHtml::encode($data->disp_topics); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('disp_posts')); ?>:</b>
	<?php echo CHtml::encode($data->disp_posts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('email_setting')); ?>:</b>
	<?php echo CHtml::encode($data->email_setting); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('notify_with_post')); ?>:</b>
	<?php echo CHtml::encode($data->notify_with_post); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('auto_notify')); ?>:</b>
	<?php echo CHtml::encode($data->auto_notify); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('show_smilies')); ?>:</b>
	<?php echo CHtml::encode($data->show_smilies); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('show_img')); ?>:</b>
	<?php echo CHtml::encode($data->show_img); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('show_img_sig')); ?>:</b>
	<?php echo CHtml::encode($data->show_img_sig); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('show_avatars')); ?>:</b>
	<?php echo CHtml::encode($data->show_avatars); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('show_sig')); ?>:</b>
	<?php echo CHtml::encode($data->show_sig); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('access_keys')); ?>:</b>
	<?php echo CHtml::encode($data->access_keys); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timezone')); ?>:</b>
	<?php echo CHtml::encode($data->timezone); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dst')); ?>:</b>
	<?php echo CHtml::encode($data->dst); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_format')); ?>:</b>
	<?php echo CHtml::encode($data->time_format); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('date_format')); ?>:</b>
	<?php echo CHtml::encode($data->date_format); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('language')); ?>:</b>
	<?php echo CHtml::encode($data->language); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('style')); ?>:</b>
	<?php echo CHtml::encode($data->style); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('num_posts')); ?>:</b>
	<?php echo CHtml::encode($data->num_posts); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_post')); ?>:</b>
	<?php echo CHtml::encode($data->last_post); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_search')); ?>:</b>
	<?php echo CHtml::encode($data->last_search); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_email_sent')); ?>:</b>
	<?php echo CHtml::encode($data->last_email_sent); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registered')); ?>:</b>
	<?php echo CHtml::encode($data->registered); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('registration_ip')); ?>:</b>
	<?php echo CHtml::encode($data->registration_ip); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('last_visit')); ?>:</b>
	<?php echo CHtml::encode($data->last_visit); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('admin_note')); ?>:</b>
	<?php echo CHtml::encode($data->admin_note); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activate_string')); ?>:</b>
	<?php echo CHtml::encode($data->activate_string); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('activate_key')); ?>:</b>
	<?php echo CHtml::encode($data->activate_key); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar')); ?>:</b>
	<?php echo CHtml::encode($data->avatar); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar_width')); ?>:</b>
	<?php echo CHtml::encode($data->avatar_width); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('avatar_height')); ?>:</b>
	<?php echo CHtml::encode($data->avatar_height); ?>
	<br />

	*/ ?>

</div>