
<div class="container">
    <div class="card">
        
       <?php if($this->session->flashdata('success')!=null):?>
            
            <div class="alert alert-info">
                <?php echo $this->session->flashdata('success'); ?>
            </div>
            <?php endif?>
        <div class="card-body">
            <?php $id['id'] = $this->session->userdata('id'); ?>
        
            
            <h3 class="card-title">What's on your mind?</h3>
            <form action="<?= base_url('admin/SecurityController/status/') ?>" method="post">
                <div class="form-group">                  
                    <div class="form-control">
                        <input class="form-control" name="user_id" type="hidden" value="<?php echo $id['id']; ?>">
                        <input class="form-control" type="text" name="status">
                        <input class="form-control" name="user_name" type="hidden" value="<?php echo $this->session->userdata('name'); ?>">
                        <button class="btn btn-sm btn-primary" type="submit">Post</button>
                    </div>
                </div>
            </form>
        </div>

        <?php $status = $this->Common_Model->get_where('user_status');
        ?>
        </br>
        <br/>



        <h1 class="card-title">News Feed</h1>
        <?php foreach ($status as $new_status): ?>

            <div class="card">
                <h1 class="card-title"><a href="<?= base_url('admin/profiles/other_user_profile/'.$new_status->user_id)?>"><?php echo $new_status->user_name; ?></a></h1>
                <div class="card-body">
                    <?php echo $new_status->status; ?>
                </div>
                <hr>
                <button class="btn-sm btn-warning"><i class="fal fa-thumbs-up"></i></button>
                <button class="btn-sm btn-warning"><i class="far fa-comment"></i></button>
                
            </div>

        <?php endforeach; ?>
    </div>

