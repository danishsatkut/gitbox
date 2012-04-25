<li class="clip">
    <i class="icon-clip <?php echo $virtualFolder->folder->isShared() ? 'folder-shared' : 'folder-generic'; ?>"></i>
    <div class="clip-info">
        <div class="clip-file">
            <a href="<?php echo $this->createUrl('virtualFolder/view', array('id' => $virtualFolder->virtualFolderId_pk)); ?>">
            <span class="clip-file-name"><?php echo $virtualFolder->name; ?></span>
            </a>

            <div class="btn-toolbar clip-buttons pull-right">
                <a class="btn btn-primary btn-mini" href="#share">
                    <i class="icon-share"></i> Share
                </a>
                <div class="btn-group ">
                    <a class="btn btn-mini dropdown-toggle" data-toggle="dropdown" href="#">
                        Options
                        <span class="caret"></span>
                    </a>
                    <ul class="dropdown-menu">
                        <li><a href="<?php echo $this->createUrl('virtualFolder/rename', array('id'=> $virtualFolder->virtualFolderId_pk)); ?>">Rename</a></li>
                        <li><a href="#move">Move</a></li>
                        <li><a href="#copy">Copy</a></li>
                        <li><a href="#comment">Comment</a></li>
                    </ul>
                </div>
                <button class="btn btn-mini btn-danger file-delete">
                    <i class="icon-trash"></i>
                </button>
            </div>
        </div>
        <div class="clip-file-description">
            <span class="clip-file-status"><?php echo $virtualFolder->folder->lastActionLabel(); ?></span>
            <span class="clip-file-date"><?php echo $virtualFolder->folder->lastActionDate(); ?></span> by
            <span class="clip-file-user"><a href="<?php echo $this->createUrl('user/view', array('id'=>Yii::app()->user->id)); ?>"><?php echo $virtualFolder->folder->lastActionBy(); ?></a></span> - 
            <span class="clip-file-count"><i class="icon-file"></i><?php echo $virtualFolder->folder->filesCount; ?></span>
            <span class="clip-file-comments"><i class="icon-comment"></i> 0</span>
            <?php if($virtualFolder->folder->isShared()): ?>
            <span class="clip-file-collaborators"><i class="icon-user"></i> </span>
            <?php endif; ?>
        </div>
    </div>
</li>