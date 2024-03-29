    <div class="span9">
        <?php echo $this->displayFlash('folderCreationSuccess'); ?>
        
        <?php echo $this->displayFlash('folderRenameSuccess'); ?>
        
        <?php
            // Can't call generateBreadcrumbs on home
            $this->pageTitle = Yii::app()->name . ' - ';
            if($currentFolder !== null) {
                $breadcrumbs = $currentFolder->generateBreadcrumbs();
                $this->pageTitle .= $breadcrumbs[0];
            } else {
                $this->pageTitle .= "All Files and Folders";
            }
        ?>
        <?php 
            $this->widget('FolderBreadcrumb', array(
                'links'=>$breadcrumbs,
                'homeLink'=>Yii::app()->request->baseUrl,
            ));
        ?>
        
        
        
        <div class="pull-right">
            <a class="btn" href="<?php echo $this->createUrl('virtualFolder/create', array('id'=>$currentFolder->virtualFolderId_pk)); ?>"><i class="icon-plus"></i> New Folder</a>
            <a href="<?php echo $this->createUrl('file/upload', array('id'=>$currentFolder->virtualFolderId_pk)); ?>" class="btn"><i class="icon-arrow-up"></i> Upload File</a>
        </div>
    </div>

    <!-- Search form -->
    <div class="span3">
        <form id="search-form">
            <div class="input-append">
                <input type="text" class="input-medium search-query" placeholder="Search here"><button class="btn btn-primary">
                    <i class="icon-search"></i></button>
            </div>
            <!--<input type="text" class="input-medium search-query" placeholder="Search files">-->
        </form>
    </div>
</div><!-- End of sub header -->
<div class="row"><!-- Start of the content -->
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
                            <?php echo $this->renderPartial('_virtualfolder', array('virtualFolder'=>$virtualFolder)) ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
                    <!-- perform similar operation in files -->
                    <?php if(count($files) > 0): ?>
                        <?php foreach($files as $file): ?>
                            <!-- Display each folder accordingly -->
                            <?php echo $this->renderPartial('_file', array('file'=>$file)) ?>
                        <?php endforeach; ?>
                    <?php endif; ?>
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
<?php //var_dump($files); ?>
<?php echo $this->renderPartial('_sidebar', array('user'=>$user)); ?>