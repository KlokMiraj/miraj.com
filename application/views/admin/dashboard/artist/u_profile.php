<?php
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
?>

<div class="container">
    <div class="panel">
        <div class="row">
            <div class="col-md-6">
                <img src="https://s3.amazonaws.com/uifaces/faces/twitter/jsa/48.jpg" alt="userimage" width="50%" height="50%">  
            </div>
            <div class="col-md-6">
<?php foreach ($res as $res): ?>
                    <div class="container">
                        <div class="row">
                            <h3>Artist Name:</h3>
                            <p><i><?php echo $res->name; ?></i></p>

                        </div>
                        <div class="row">
                            <h3>User Name:</h3>
                            <p><i><?php echo $res->email; ?></i></p>
                        </div>
                        <div class="row">
                            <h3>Phone:</h3>
                            <p><i><?php echo $res->phone; ?></i></p>
                        </div>
                        <?php if ($res->role == 2):?>
                        <div class="row">
                            <h3>Signed in as </h3>
                            <p><i><?php if ($res->role == 2): echo "Artist";
    elseif ($res->role == 3):echo "Listener";
    endif; ?></i></p>
                        </div>
                        <?php endif;?>
                    </div>
                <?php endforeach; ?>
                
            </div>
            <div class="row">
                 <?php if($this->session->userdata('id')!=$res->id):?>
            <div class="row">
                
                    <div class="col-sm-6">
                        
                    </div>
                    <div class="col-sm-6">
                        <button class="btn btn-primary" href=""><i class="fab fa-twitter">Follow</i></button>
                 </div>
                <?php endif;?>
                        <?php if ($this->session->userdata('id') == $res->id): ?>
                            <button href="" class="btn btn-primary">Edit Profile</button>
                        <?php endif; ?>
                    </div>
                </div>
            
            
               
           
        </div>

    </div>
</div>
