<div id="sidebar" class="span3">
    <section id="account-info" class="">
        <h4>Account Information - <?php echo $user->username; ?></h4>
        <div class="info-container">
            <span><i class="icon-inbox" style="vertical-align: bottom"></i> Storage usage: </span>
                <div id="storage-usage-progress" class="progress progress-striped progress-danger">
                    <div class="bar" style="width: 80%"></div>
                </div>
                <span>0 MB</span>
                <span class="pull-right">100 MB</span>
        </div>
    </section>
    <section id="resources">
        <h4>Resources</h4>
        <div class="info-container">
            <ul class="unstyled">
                <li><a><i class="icon-trash" style="vertical-align: text-top"></i> Trash</a></li>
                <li><a><i class="icon-flag" style="vertical-align: text-top"></i> Help Topics</a></li>
            </ul>
        </div>
    </section>
    <div class="alert alert-info"><!-- Alert message -->
        <a class="close" data-dismiss="alert">&times;</a>
        <h4 class="alert-heading">Tips and Tricks</h4>
        You can change your profile information using the profile link.
    </div>
</div>
