<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('virtualFolderId_pk')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->virtualFolderId_pk), array('view', 'id'=>$data->virtualFolderId_pk)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('userId_fk')); ?>:</b>
	<?php echo CHtml::encode($data->userId_fk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('folderId_fk')); ?>:</b>
	<?php echo CHtml::encode($data->folderId_fk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parentVirtualFolderId_fk')); ?>:</b>
	<?php echo CHtml::encode($data->parentVirtualFolderId_fk); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('isOwner')); ?>:</b>
	<?php echo CHtml::encode($data->isOwner); ?>
	<br />


</div>