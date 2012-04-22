<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta name="description" content="GITBox - File Hosting, Sharing and Forum Service">
        <meta name="author" content="Bhavesh Prajapati, Vivek Rathod, Danish Satkut">

        <!-- Le styles -->
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/gitbox.css" rel="stylesheet">
        <link href="<?php echo Yii::app()->request->baseUrl; ?>/css/bootstrap-responsive.css" rel="stylesheet">
        <!-- Le HTML5 shim, for IE6-8 support of HTML5 elements -->
        <!--[if lt IE 9]>
        <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
        <![endif]-->

        <!-- Le fav and touch icons -->
        <link rel="shortcut icon" href="<?php echo Yii::app()->request->baseUrl; ?>/ico/favicon.ico">
        
	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
    </head>

<body>

    <?php 
        $navbar = $this->beginWidget('ext.ziix.widgets.CNavbar', array(
            'brand'=>array('label'=>'GITBox', 'url'=>array('site/index')),
            'responsive'=>true,
        ));
    ?>
    
    <?php
        $this->widget('ext.ziix.widgets.CNav', array(
            'items'=>array(
                array('label'=>'Files', 'url'=>array('site/index'), 'visible'=>!Yii::app()->user->isGuest, 
                    'icon'=>array('class'=>'icon-inbox icon-white'),),
                array('label'=>'Forum', 'url'=>Yii::app()->baseUrl . '/forum',
                    'icon'=>array('class'=>'icon-group-white')),
                array('label'=>'Contacts', 'url'=>array('contacts/index'), 'visible'=>!Yii::app()->user->isGuest,
                    'icon'=>array('class'=>'icon-contact-white')),
                array('label'=>'About', 'url'=>array('site/page', 'view'=>'about'),
                    'icon'=>array('class'=>'icon-info-sign icon-white')),
                array('label'=>'Help', 'url'=>array('site/page', 'view'=>'help'),
                    'icon'=>array('class'=>'icon-flag icon-white')),
            ),
            'htmlOptions'=>array('class'=>'nav'),
        ));
    ?>
    
    <?php
        $this->widget('ext.ziix.widgets.CNav', array(
            'items'=>array(
                array('label'=>Yii::app()->user->name, 'url'=>array('#user'), 'visible'=>!Yii::app()->user->isGuest, 
                        'icon'=>array(
                            'class'=>'icon-user-avatar',
                            'path'=>Yii::app()->user->getState('avatar'),
                            ),
                    
                    'linkOptions'=>array('class'=>'dropdown-toggle', 'data-toggle'=>'dropdown'),
                    'itemOptions'=>array('class'=>'dropdown'),
                    'caret'=>true,
                    'items'=>array(
                        array('label'=>'Profile', 'url'=>array('user/profile'),
                            'icon'=>array('class'=>'icon-user')),
                        array('label'=>'Settings', 'url'=>array('user/settings'),
                            'icon'=>array('class'=>'icon-cog')),
                        array('label'=>'Logout', 'url'=>array('site/logout'),
                            'icon'=>array('class'=>'icon-off')),
                    ),
                    'submenuOptions'=>array('class'=>'dropdown-menu'),
                    
                )
            ),
            'htmlOptions'=>array('class'=>'nav pull-right'),    // Set options on outer ul
        ));
    ?>
    
    <?php $this->endWidget(); ?>
    
    
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> by My Company.<br/>
		All Rights Reserved.<br/>
		<?php echo Yii::powered(); ?>
	</div><!-- footer -->

</div><!-- page -->
    
    <!-- Le javascript
        ================================================== -->
        <!-- Placed at the end of the document so the pages load faster -->
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/jquery.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-transition.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-alert.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-modal.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-dropdown.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-scrollspy.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tab.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-tooltip.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-popover.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-button.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-collapse.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-carousel.js"></script>
        <script src="<?php echo Yii::app()->request->baseUrl; ?>/js/bootstrap-typeahead.js"></script>
</body>
</html>