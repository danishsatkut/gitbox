<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'user-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'group_id'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>200)); ?>
		<?php echo $form->error($model,'username'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'password'); ?>
		<?php echo $form->passwordField($model,'password',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'password'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'salt'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
		<?php echo $form->error($model,'title'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'realname'); ?>
		<?php echo $form->textField($model,'realname',array('size'=>40,'maxlength'=>40)); ?>
		<?php echo $form->error($model,'realname'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'url'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'facebook'); ?>
		<?php echo $form->textField($model,'facebook',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'facebook'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'twitter'); ?>
		<?php echo $form->textField($model,'twitter',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'twitter'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'linkedin'); ?>
		<?php echo $form->textField($model,'linkedin',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'linkedin'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'skype'); ?>
		<?php echo $form->textField($model,'skype',array('size'=>60,'maxlength'=>100)); ?>
		<?php echo $form->error($model,'skype'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'jabber'); ?>
		<?php echo $form->textField($model,'jabber',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'jabber'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'icq'); ?>
		<?php echo $form->textField($model,'icq',array('size'=>12,'maxlength'=>12)); ?>
		<?php echo $form->error($model,'icq'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'msn'); ?>
		<?php echo $form->textField($model,'msn',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'msn'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'aim'); ?>
		<?php echo $form->textField($model,'aim',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'aim'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'yahoo'); ?>
		<?php echo $form->textField($model,'yahoo',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'yahoo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'location'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'signature'); ?>
		<?php echo $form->textArea($model,'signature',array('rows'=>6, 'cols'=>50)); ?>
		<?php echo $form->error($model,'signature'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disp_topics'); ?>
		<?php echo $form->textField($model,'disp_topics'); ?>
		<?php echo $form->error($model,'disp_topics'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'disp_posts'); ?>
		<?php echo $form->textField($model,'disp_posts'); ?>
		<?php echo $form->error($model,'disp_posts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email_setting'); ?>
		<?php echo $form->textField($model,'email_setting'); ?>
		<?php echo $form->error($model,'email_setting'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'notify_with_post'); ?>
		<?php echo $form->textField($model,'notify_with_post'); ?>
		<?php echo $form->error($model,'notify_with_post'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'auto_notify'); ?>
		<?php echo $form->textField($model,'auto_notify'); ?>
		<?php echo $form->error($model,'auto_notify'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show_smilies'); ?>
		<?php echo $form->textField($model,'show_smilies'); ?>
		<?php echo $form->error($model,'show_smilies'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show_img'); ?>
		<?php echo $form->textField($model,'show_img'); ?>
		<?php echo $form->error($model,'show_img'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show_img_sig'); ?>
		<?php echo $form->textField($model,'show_img_sig'); ?>
		<?php echo $form->error($model,'show_img_sig'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show_avatars'); ?>
		<?php echo $form->textField($model,'show_avatars'); ?>
		<?php echo $form->error($model,'show_avatars'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'show_sig'); ?>
		<?php echo $form->textField($model,'show_sig'); ?>
		<?php echo $form->error($model,'show_sig'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'access_keys'); ?>
		<?php echo $form->textField($model,'access_keys'); ?>
		<?php echo $form->error($model,'access_keys'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'timezone'); ?>
		<?php echo $form->textField($model,'timezone'); ?>
		<?php echo $form->error($model,'timezone'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dst'); ?>
		<?php echo $form->textField($model,'dst'); ?>
		<?php echo $form->error($model,'dst'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'time_format'); ?>
		<?php echo $form->textField($model,'time_format',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'time_format'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'date_format'); ?>
		<?php echo $form->textField($model,'date_format',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'date_format'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'language'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'style'); ?>
		<?php echo $form->textField($model,'style',array('size'=>25,'maxlength'=>25)); ?>
		<?php echo $form->error($model,'style'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'num_posts'); ?>
		<?php echo $form->textField($model,'num_posts',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'num_posts'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_post'); ?>
		<?php echo $form->textField($model,'last_post',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'last_post'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_search'); ?>
		<?php echo $form->textField($model,'last_search',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'last_search'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_email_sent'); ?>
		<?php echo $form->textField($model,'last_email_sent',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'last_email_sent'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registered'); ?>
		<?php echo $form->textField($model,'registered',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'registered'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'registration_ip'); ?>
		<?php echo $form->textField($model,'registration_ip',array('size'=>39,'maxlength'=>39)); ?>
		<?php echo $form->error($model,'registration_ip'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'last_visit'); ?>
		<?php echo $form->textField($model,'last_visit',array('size'=>10,'maxlength'=>10)); ?>
		<?php echo $form->error($model,'last_visit'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'admin_note'); ?>
		<?php echo $form->textField($model,'admin_note',array('size'=>30,'maxlength'=>30)); ?>
		<?php echo $form->error($model,'admin_note'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activate_string'); ?>
		<?php echo $form->textField($model,'activate_string',array('size'=>60,'maxlength'=>80)); ?>
		<?php echo $form->error($model,'activate_string'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'activate_key'); ?>
		<?php echo $form->textField($model,'activate_key',array('size'=>8,'maxlength'=>8)); ?>
		<?php echo $form->error($model,'activate_key'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar'); ?>
		<?php echo $form->textField($model,'avatar'); ?>
		<?php echo $form->error($model,'avatar'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar_width'); ?>
		<?php echo $form->textField($model,'avatar_width'); ?>
		<?php echo $form->error($model,'avatar_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'avatar_height'); ?>
		<?php echo $form->textField($model,'avatar_height'); ?>
		<?php echo $form->error($model,'avatar_height'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->