

$(document).ready(function () {
    $.noConflict(true);
    $('#example1').DataTable();
    $(document).on("click",'.delete-item', function (e) {
        e.preventDefault();
        var choice = confirm($(this).attr('data-confirm'));
        if (choice) {
            window.location.href = $(this).attr('href');
        }
    });
});

$(document).ready(function () {
    
    $('#productMedia').on('change', function(){
        
        var proImage = document.getElementById("imageUpload");
        var proVideoUrl = document.getElementById("videoUrl");
        var proIframeUrl = document.getElementById("iframeUrl");
        var proVideo = document.getElementById("videoUpload");
        var inputValue = $(this).val();
        
        if( inputValue == 'proImage' ){
            
            proIframeUrl.style.display = 'none';
            proVideo.style.display = 'none';
            proVideoUrl.style.display = 'none';
            proImage.style.display = 'block';
            
        }else if( inputValue == 'proVideoUrl' ){
            
            proImage.style.display = 'none';
            proIframeUrl.style.display = 'none';
            proVideo.style.display = 'none';
            proVideoUrl.style.display = 'block';
            
        }else if( inputValue == 'proIframeUrl' ){
            
            proImage.style.display = 'none';
            proVideo.style.display = 'none';
            proVideoUrl.style.display = 'none';
            proIframeUrl.style.display = 'block';
            
        }else if( inputValue == 'proVideo' ){
            
            proImage.style.display = 'none';
            proVideoUrl.style.display = 'none';
            proIframeUrl.style.display = 'none';
            proVideo.style.display = 'block';
        }
        
    })
    
    $(document).on('click','.p_image',function(){
        var imgid = $(this).data('imageid');
        $('.div_grp_'+imgid).remove();
    });
    
    $(document).on('click','.p_video_file',function(){
        var videoFileid = $(this).data('videofileid');
        $('.p_video_file_'+videoFileid).remove();
    });
    
    $(document).on('click','.p_video_url',function(){
        var videourlid = $(this).data('videourlid');
        $('.p_video_url_'+videourlid).remove();
    });
    
    
    
    
    $(document).on('click','.is_pro_active',function(){
        var proId = $(this).attr('id');
        var url = document.getElementById('statusChangeUrl').value;
        
        $.ajax({
            
            url: url,
            data: 'id='+proId,
            type: 'post',
            success: function(data) {
                var nmsg = '<div class="alert alert-success alert-dismissible" style="text-align: center">\n\
                                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>\n\
                                '+data+'\n\
                            </div>';
                $('#js_flssh').append(nmsg);
                
                setTimeout(function(){
                    $('#js_flssh').html('');
                },2000);
                
            }
            
        });
        
    });
    
    
});



function appendImage(){
    $('#imageUpload').append('<br><input type="file" name="image_file[]" class="form-control">');
}

function appendVideoUrl(){
    
    $('#videoUrl').append('<br><input type="text" name="video_url[]" class="form-control">');
}

function appendIframeUrl(){
    $('#iframeUrl').append('<br><input type="text" name="iframe_url[]" class="form-control">');
}

function appendVideo(){
    $('#videoUpload').append('<br><input type="file" name="video_file[]" class="form-control">');
}


