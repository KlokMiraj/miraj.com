<div class="row">
    
    <div class="col-md-12">
        <!-- general form elements -->
        <div class="box box-primary">
            <div class="box-header with-border">
                <h3 class="box-title">File Upload Centre</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" method="post" enctype="multipart/form-data">
                <div class="box-body">

                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label>File Name</label>
                            <input type="text" name="product_name" class="form-control" placeholder="Enter Name for the file" value="">
                            <?php // echo form_error('product_name');?>
                        </div>
                        <div class="form-group col-md-6">
                            <label>Genre</label>
                            <input type="text" name="sku" class="form-control" placeholder="Genre" value="">
                            <?php // echo form_error('sku')?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label>Price</label>
                            <div class="input-group">
                                <span class="input-group-addon"><i class="fa fa-dollar"></i></span>
                                <input type="text" name="price" class="form-control" placeholder="Enter Product Price" value="">
                                <?php // echo form_error('price')?>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group col-md-6">
                            <label>Display in Front</label>
                            <br>
                            <label class="switch">
                                <input type="checkbox" name="is_active">
                                <span class="slider round"></span>
                            </label>
                        </div>  
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <label>Short Description</label>
                            <textarea class="form-control" name="short_description" placeholder="Short Description"></textarea>
                            <?php // echo form_error('short_description')?>
                        </div>
                    </div>

                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <label>Long Description</label>
                            <textarea class="form-control" name="long_description" rows="4" placeholder="Long Description"></textarea>
                            <?php // echo form_error('long_description')?>
                        </div>
                    </div>

                </div>
                <!-- /.box-body -->

                <div class="box-header with-border">
                    <h3 class="box-title">Media Section</h3>
                </div>


                <div class="box-body" style="">


                    <div class="col-md-12">
                        <div class="form-group col-md-3">
                            <label>Select Media Option</label>
                            <select class="form-control" id="productMedia" >
                                <option value="proImage">Upload Image</option>
                                <option value="proVideoUrl">Add Video Url</option>
                                <option value="proIframeUrl">Add Iframe Url</option>
                                <option value="proVideo">Upload Video</option>
                            </select>
                        </div>

                        <div class="form-group col-md-9">
                            <div id="imageUpload">
                                <div class="btn btn-sm btn-primary pull-right" onclick="appendImage()">Add Another File</div>
                                <label>Choose File</label>
                                <?php if(isset($media)){ ?>
                                    <?php foreach ($media as $m){ ?>
                                        <?php if(($m->type) == 'image_file'){ ?>
                                            <div class="div_grp_<?php echo $m->id; ?>" style="display: inline-block; position: relative;">
                                                <img class="vir_<?php echo $m->id; ?> p_image"  src="<?= $m->media_url ?>" height="70">
                                                <a style="position: absolute; right: 3px; top: 3px;" href="javascript:void(0)" data-imageid="<?php echo $m->id; ?>" class="p_image">X</a>
                                                <input type="hidden" class="vir_<?php echo $m->id; ?>" name="image_file[]" value="<?php echo $m->media_url; ?>" />
                                            </div>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <input style="margin-top: 20px;" type="file" name="image_file[]" class="form-control">
                            </div>
                            
                            <div id="videoUrl">
                                <div class="btn btn-sm btn-primary pull-right" onclick="appendVideoUrl()">Add Another video Url</div>
                                <label>Paste Video Url</label>
                                <?php if(isset($media)){ ?>
                                    <?php foreach ($media as $m){ ?>
                                        <?php if(($m->type) == 'video_url'){ ?>
                                            <div class="p_video_url_<?= $m->id ?>">
                                                <input type="text" class="form-control" value="<?= $m->media_url ?>">
                                                <a href="javascript:void(0)" data-videourlid="<?= $m->id; ?>" class="p_video_url">X</a><br>
                                            </div>
                                            <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <input type="text" name="video_url[]" class="form-control">
                            </div>

                            <div id="iframeUrl">
                                <div class="btn btn-sm btn-primary pull-right" onclick="appendIframeUrl()">Add Another I-Frame Url</div>
                                <label>Paste I-frame Url </label>
                                <?php if(isset($media)){ ?>
                                    <?php foreach ($media as $m){ ?>
                                        <?php if(($m->type) == 'iframe_url'){ ?>
                                            <input type="text" name="iframe_url[]" class="form-control" value="<?= $m->media_url ?>" ><br>
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <input type="text" name="iframe_url[]" class="form-control">
                            </div>

                            <div id="videoUpload">
                                <div class="btn btn-sm btn-primary pull-right" onclick="appendVideo()">Add Another Video</div>
                                <label>Choose Video File</label>
                                <?php if(isset($media)){ ?>
                                    <?php foreach ($media as $m){ ?>
                                        <?php if(($m->type) == 'video_file'){ ?>
                                        <div class="p_video_file_<?= $m->id ?>">
                                            <input type="text" class="form-control" value="<?= $m->media_url ?>">
                                            <a href="javascript:void(0)" data-videofileid="<?= $m->id; ?>" class="p_video_file">X</a><br>
                                            <input type="hidden" name="video_file[]" value="<?= $m->media_url ?>">                                                                        
                                        </div>    
                                        <?php } ?>
                                    <?php } ?>
                                <?php } ?>
                                <input type="file" name="video_file[]" class="form-control">
                            </div>

                        </div>

                    </div>

                   
                    <div class="col-md-12">
                        <div class="form-group col-md-12">
                            <label>Displai Image</label><br>
                            <?php if(isset($media_url_admin)){ ?>
                            <img src="<?= $media_url_admin ?>" height="100px">
                            <input type="hidden" name="old_media_url_admin" value="<?= $media_url_admin ?>">
                            <?php } ?>
                            <input type="file" name="media_url_admin" class="form-control">
                        </div>
                    </div>
                   

                </div>


               

               <div class="box-body">
                    <div class="box-footer pull-right">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                </div>
              
            </form>
        </div>
        <!-- /.box -->

    </div>
    
</div>

    

