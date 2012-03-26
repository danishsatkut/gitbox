<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'group_id'); ?>
		<?php echo $form->textField($model,'group_id',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'username'); ?>
		<?php echo $form->textField($model,'username',array('size'=>60,'maxlength'=>200)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'salt'); ?>
		<?php echo $form->textField($model,'salt',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'title'); ?>
		<?php echo $form->textField($model,'title',array('size'=>50,'maxlength'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'realname'); ?>
		<?php echo $form->textField($model,'realname',array('size'=>40,'maxlength'=>40)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'url'); ?>
		<?php echo $form->textField($model,'url',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'facebook'); ?>
		<?php echo $form->textField($model,'facebook',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'twitter'); ?>
		<?php echo $form->textField($model,'twitter',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'linkedin'); ?>
		<?php echo $form->textField($model,'linkedin',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'skype'); ?>
		<?php echo $form->textField($model,'skype',array('size'=>60,'maxlength'=>100)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'jabber'); ?>
		<?php echo $form->textField($model,'jabber',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'icq'); ?>
		<?php echo $form->textField($model,'icq',array('size'=>12,'maxlength'=>12)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'msn'); ?>
		<?php echo $form->textField($model,'msn',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'aim'); ?>
		<?php echo $form->textField($model,'aim',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'yahoo'); ?>
		<?php echo $form->textField($model,'yahoo',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'location'); ?>
		<?php echo $form->textField($model,'location',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'signature'); ?>
		<?php echo $form->textArea($model,'signature',array('rows'=>6, 'cols'=>50)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disp_topics'); ?>
		<?php echo $form->textField($model,'disp_topics'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'disp_posts'); ?>
		<?php echo $form->textField($model,'disp_posts'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email_setting'); ?>
		<?php echo $form->textField($model,'email_setting'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'notify_with_post'); ?>
		<?php echo $form->textField($model,'notify_with_post'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'auto_notify'); ?>
		<?php echo $form->textField($model,'auto_notify'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'show_smilies'); ?>
		<?php echo $form->textField($model,'show_smilies'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'show_img'); ?>
		<?php echo $form->textField($model,'show_img'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'show_img_sig'); ?>
		<?php echo $form->textField($model,'show_img_sig'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'show_avatars'); ?>
		<?php echo $form->textField($model,'show_avatars'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'show_sig'); ?>
		<?php echo $form->textField($model,'show_sig'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'access_keys'); ?>
		<?php echo $form->textField($model,'access_keys'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'timezone'); ?>
		<?php echo $form->textField($model,'timezone'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dst'); ?>
		<?php echo $form->textField($model,'dst'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_format'); ?>
		<?php echo $form->textField($model,'time_format',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'date_format'); ?>
		<?php echo $form->textField($model,'date_format',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'language'); ?>
		<?php echo $form->textField($model,'language',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'style'); ?>
		<?php echo $form->textField($model,'style',array('size'=>25,'maxlength'=>25)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'num_posts'); ?>
		<?php echo $form->textField($model,'num_posts',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_post'); ?>
		<?php echo $form->textField($model,'last_post',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_search'); ?>
		<?php echo $form->textField($model,'last_search',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_email_sent'); ?>
		<?php echo $form->textField($model,'last_email_sent',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registered'); ?>
		<?php echo $form->textField($model,'registered',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'registration_ip'); ?>
		<?php echo $form->textField($model,'registration_ip',array('size'=>39,'maxlength'=>39)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'last_visit'); ?>
		<?php echo $form->textField($model,'last_visit',array('size'=>10,'maxlength'=>10)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'admin_note'); ?>
		<?php echo $form->textField($model,'admin_note',array('size'=>30,'maxlength'=>30)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activate_string'); ?>
		<?php echo $form->textField($model,'activate_string',array('size'=>60,'maxlength'=>80)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'activate_key'); ?>
		<?php echo $form->textField($model,'activate_key',array('size'=>8,'maxlength'=>8)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avatar'); ?>
		<?php echo $form->textField($model,'avatar'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avatar_width'); ?>
		<?php echo $form->textField($model,'avatar_width'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'avatar_height'); ?>
		<?php echo $form->textField($model,'avatar_height'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->