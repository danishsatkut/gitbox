<?php $this->beginContent('//layouts/main'); ?>

    <div class="row"><!-- Sub header content -->
        <div class="span9">
            <div class="alert alert-block"><!-- Alert message -->
                <a class="close" data-dismiss="alert">&times;</a>
                <h4 class="alert-heading">Welcome!</h4>
                Looks like this is the first time you have logged in. Please use the navigation
                links above.
            </div>
            <ul class="breadcrumb">
                <li>
                    <a href="#">Home</a><span class="divider">></span>
                </li>
                <li>
                    <a href="#">About</a><span class="divider">></span>
                </li>
                <li class="active">
                    Acknowledgement
                </li>
            </ul><!-- End of breadcrumb area -->

            <div class="pull-right">
                <a class="btn" data-toggle="modal" href="#folderCreate"><i class="icon-plus"></i> New Folder</a>
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
	
    <?php echo $content; ?>    
    
        <div class="span-5 last">
		<div id="sidebar">
		<?php
			$this->beginWidget('zii.widgets.CPortlet', array(
				'title'=>'Operations',
			));
			$this->widget('zii.widgets.CMenu', array(
				'items'=>$this->menu,
				'htmlOptions'=>array('class'=>'operations'),
			));
			$this->endWidget();
		?>
		</div><!-- sidebar -->
	</div>

<?php $this->endContent(); ?>