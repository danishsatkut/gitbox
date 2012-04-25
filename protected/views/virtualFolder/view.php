    <div class="span9">
        <?php if(Yii::app()->user->hasFlash('folderCreationSuccess')): ?>
        <?php $flashMessage = Yii::app()->user->getFlash('folderCreationSuccess'); ?>
        <div class="alert alert-success alert-block fade in">
            <a class="close" data-dismiss="alert" href="#">&times;</a>
            <h4 class="alert-heading"><?php echo $flashMessage['heading']; ?></h4>
            <?php echo $flashMessage['body']; ?>
        </div>
        <?php endif; ?>
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
            <a href="#" class="btn"><i class="icon-arrow-up"></i> Upload File</a>
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
                </ul>
            </div>
        </div>
    </div>

<?php echo $this->renderPartial('_sidebar', array('user'=>$user)); ?>