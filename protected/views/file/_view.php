<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileId_pk')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->fileId_pk), array('view', 'id'=>$data->fileId_pk)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileName')); ?>:</b>
	<?php echo CHtml::encode($data->fileName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('fileDescription')); ?>:</b>
	<?php echo CHtml::encode($data->fileDescription); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('size')); ?>:</b>
	<?php echo CHtml::encode($data->size); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('mime')); ?>:</b>
	<?php echo CHtml::encode($data->mime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('filePath')); ?>:</b>
	<?php echo CHtml::encode($data->filePath); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dateCreated')); ?>:</b>
	<?php echo CHtml::encode($data->dateCreated); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('createdBy_fk')); ?>:</b>
	<?php echo CHtml::encode($data->createdBy_fk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folderId_fk')); ?>:</b>
	<?php echo CHtml::encode($data->folderId_fk); ?>
	<br />

	*/ ?>

</div>