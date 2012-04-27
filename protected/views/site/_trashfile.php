<li class="clip">
<i class="icon-clip file-<?php echo $file->extension ?>"></i>
<div class="clip-info">
<div class="clip-file">
<span class="clip-file-name"><?php echo $file->fileName; ?></span>

<div class="btn-toolbar clip-buttons pull-right">
    <a class="btn btn-primary btn-mini" href="<?php echo $this->createUrl('file/restore',  array('id'=>$file->fileId_pk)); ?>">
        <i class="icon-share"></i> Restore
    </a>
    <!--
    <div class="btn-group ">
        <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
            Options
            <span class="caret"></span>
        </a>
        <!--
        <ul class="dropdown-menu">
            <li><a href="#rename">Rename</a></li>
            <li><a href="#move">Move</a></li>
            <li><a href="#copy">Copy</a></li>
            <li><a href="#comment">Comment</a></li>
        </ul>
        
    </div>
    -->
    <a class="btn btn-mini btn-danger file-delete" href="<?php echo $this->createUrl('file/delete', array('id'=>$file->fileId_pk)); ?>">
        <i class="icon-trash"></i>
    </a>
</div>
</div>
        <div class="clip-file-description">
            <span class="clip-file-status">Created </span>
            <span class="clip-file-date"><?php echo $file->dateCreated; ?></span> by
            <span class="clip-file-user"><a href="<?php echo $this->createUrl('user/view', array('id'=>Yii::app()->user->id)); ?>"><?php echo $file->owner->username; ?></a></span> - 
            <span class="clip-file-comments"><i class="icon-comment"></i> 0</span>
        </div>
</div>
</li>
