<div class="row">
    <div class="span9 tabbable"><!-- Tabs for switching between files and comments  -->
        <ul class="nav nav-tabs">
            <li class="active"><a href="#1" data-toggle="tab"><i class="icon-folder-open" style="width: 16px"></i> Files and Folders</a></li>
            <li><a href="#2" data-toggle="tab"><i class="icon-comment"></i> Comments</a></li>
            <li><a href="#3" data-toggle="tab">Search Results</a></li>
        </ul>
        <div class="tab-content minimum-height">
            <div class="tab-pane active" id="1"><!-- Files tab -->
                <ul id="clip-list" class="unstyled">
                    <?php if($user->virtualfolderCount > 0): ?>
                        <?php foreach($user->virtualfolders as $virtualFolder): ?>
                            <!-- Display each folder accordingly -->
                            <li class="clip">
                                <i class="icon-clip <?php echo $virtualFolder->folder->isShared() ? 'folder-shared' : 'folder-generic'; ?>"></i>
                                <div class="clip-info">
                                    <div class="clip-file">
                                        <span class="clip-file-name"><?php echo $virtualFolder->folder->folderName; ?></span>

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
                                                    <li><a href="#rename">Rename</a></li>
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
                        <?php endforeach; ?>
                    <?php endif; ?>
                    
                    
                    <li class="clip">
                        <i class="icon-clip thumbnail"><img src="img/44x44.gif" alt="Image Snapshot"></i>
                        <div class="clip-info">
                            <div class="clip-file">
                                <span class="clip-file-name">Web Design.gif</span>
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
                                        <li><a href="#rename">Rename</a></li>
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
                            <div class="clip-file-description">This is a text file</div>
                        </div>
                    </li>
                    <li class="clip">
                        <i class="icon-clip file-docx"></i>
                        <div class="clip-info">
                            <div class="clip-file">
                                <span class="clip-file-name">Word.docx</span>
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
                                            <li><a href="#rename">Rename</a></li>
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
                            <div class="clip-file-description">This is a docx file.</div>
                        </div>
                    </li>
                </ul>

            </div>
            <div class="tab-pane" id="2"><!-- Comments tab -->

                <ul id="comment-list" class="unstyled">
                    <li class="clip">
                        <i class="icon-clip user-avatar"></i>
                        <div class="clip-info">
                            <div class="clip-file">
                                <span class="clip-file-name">Vivek Rathod</span>
                            </div>
                            <div class="btn-toolbar clip-buttons pull-right">
                                    <a class="btn btn-mini" href="#edit">
                                        <i class="icon-share"></i> Edit
                                    </a>
                                    <button class="btn btn-mini btn-danger file-delete">
                                        <i class="icon-trash"></i>
                                    </button>
                                </div>
                            <div class="clip-file-description">This rar file contains all the program</div>
                        </div>
                    </li>
                </ul>

            </div>
        </div>
</div>

<?php foreach($user->virtualfolders as $virtualFolder): ?>
    <div>
        <b><?php echo $virtualFolder->folder->folderName; ?></b>
        <?php if(isset($virtualFolder->folder->folderDescription)): ?>
        <div><?php echo $virtualFolder->folder->folderDescription; ?></div>
        <?php else: ?>
        <div>There is no description.</div>
        <?php endif; ?>
        <div><?php echo $virtualFolder->folder->dateCreated; ?></div>
        
    </div>
<?php endforeach; ?>

<?php foreach($user->files as $file): ?>

    <div><?php echo $file->fileName; ?></div>
        
<?php endforeach; ?>

<?php //var_dump(Yii::app()->user->id); ?>