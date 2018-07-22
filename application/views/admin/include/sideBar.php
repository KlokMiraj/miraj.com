<?php
if
 ($this->session->userdata('role') == 2) {
    $user = 0;
} elseif ($this->session->userdata('role') == 3) {
    $user = 1;
} else {
    $user = null;
}
?>
<!-- Side-Nav-->
<aside class="main-sidebar hidden-print">
    <section class="sidebar">
        <div class="user-panel">
            <div class="pull-left image"><img class="img-circle" src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="User Image"></div>
            <div class="pull-left info">
                <p><?= $this->session->userdata('name') ?></p>
            </div>
        </div>
        <!-- Sidebar Menu-->
        <ul class="sidebar-menu">
            <li class="active"><a href="<?= base_url('admin/dashboard') ?>"><i class="fa fa-dashboard"></i><span>Dashboard</span></a></li>
            
                    <?php if ($user == 1): ?>
                <li class="treeview"><a href="#"><i class="fa fa-search"></i><span>Search Artist</span><i class="fa fa-angle-right"></i></a>
                <?php endif; ?>
            <?php if ($user == 0): ?>
                <li class="treeview"><a href="#"><i class="fa fa-user"></i><span>Followers</span><i class="fa fa-angle-right"></i></a>

                <?php elseif ($user == 1): ?>
                <li class="treeview"><a href="#"><i class="fa fa-user"></i><span>Following</span><i class="fa fa-angle-right"></i></a>
                <?php endif; ?>
            <li ><a href="<?= base_url('admin/profiles')?>"><i class="fas fa-user-circle"></i><span>My Profile</span><i class="fa fa-angle-right"></i></a></li>

            <?php if ($user == 0): ?>

                <li class="treeview"><a href="#"><i class="fa fa-share"></i><span>File Dashboard</span><i class="fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href = "<?= base_url('admin/dashboard/upload/listfile')?>"><i class = "fa fa-circle-o">View Upload Lists</a>
                        <li><a href = "<?= base_url('admin/dashboard/upload')?>"><i class = "fa fa-circle-o">Upload Your Work</a>
                    </ul>
                </li>
               
                    
              
            <?php elseif ($user == 1): ?> 
                <li class="treeview"><a href="#"><i class="fa fa-share"></i><span>File Dashboard</span><i class="fa fa-angle-right"></i></a>
                    <ul class="treeview-menu">
                        <li><a href="<?= base_url('admin/dashboard/download')?>"><i class="fa fa-circle-o">Download Portal</a>
                        <li class="treeview"><a href="#"><i class="fa fa-circle-o"></i><span>Playlist</span><i class="fa fa-angle-right"></i></a>
                    </ul>  
                </li>
            <?php endif; ?>
                
        </ul>
       
    </section>
</aside>