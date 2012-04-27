<li class="clip">
    <i class="icon-clip <?php echo $virtualFolder->folder->isShared() ? 'folder-shared' : 'folder-generic'; ?>"></i>
    <div class="clip-info">
        <div class="clip-file">
            <a href="<?php echo $this->createUrl('virtualFolder/view', array('id' => $virtualFolder->virtualFolderId_pk)); ?>">
            <span class="clip-file-name"><?php echo $virtualFolder->name; ?></span>
            </a>
            <?php if($virtualFolder->folder->isShared() && $virtualFolder->isOwner): ?>
            <span class="label label-default">Owner</span>
            <?php endif; ?>
            <div class="btn-toolbar clip-buttons pull-right">
                <?php if($virtualFolder->isOwner): ?>
                <a class="btn btn-primary btn-mini" href="<?php echo $this->createUrl('virtualFolder/share', array('id'=>$virtualFolder->virtualFolderId_pk)); ?>">
                    <i class="icon-share"></i> Share
                </a>
                <?php endif; ?>
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
                <a class="btn btn-mini btn-danger file-delete" href="<?php echo $this->createUrl('virtualFolder/delete', array('id'=>$virtualFolder->virtualFolderId_pk)); ?>">
                    <i class="icon-trash"></i>
                </a>
            </div>
        </div>
        <div class="clip-file-description">
            <span class="clip-file-status"><?php echo $virtualFolder->folder->lastActionLabel(); ?></span> on
            <span class="clip-file-date"><?php echo $virtualFolder->folder->lastActionDate(); ?></span> by
            <span class="clip-file-user"><a href="<?php echo $this->createUrl('user/view', array('id'=>$virtualFolder->owner->id)); ?>"><?php echo $virtualFolder->folder->lastActionBy(); ?></a></span> - 
            <span class="clip-file-count"><i class="icon-file"></i><?php echo $virtualFolder->folder->filesCount; ?></span>
            <span class="clip-file-comments"><i class="icon-comment"></i> 0</span>
            <?php if($virtualFolder->folder->isShared()): ?>
            <span class="clip-file-collaborators"><i class="icon-user"></i> <?php echo $virtualFolder->folder->getCollaboratorCount(); ?></span>
            <?php endif; ?>
        </div>
    </div>
    <div class="modal fade" id="adeleteModal">
                        <div class="modal-header">
                            <a class="close" data-dismiss="modal">×</a>
                            <h3>
                                Deleting Folder - <?php echo $virtualFolder->name; ?>
                            </h3>
                            </div>
                            <div class="modal-body">
                                <p>Are you sure you want to delete this folder.</p>
                            </div>
                            <div class="modal-footer">
                                <a href="#" class="btn" data-dismiss="modal">Close</a>
                                <button class="btn btn-danger">Delete</button>
                            </div>
                        </div>
</li>