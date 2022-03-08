<script>
    <script type="text/javascript">
      $(document).ready(function() {

      // click file upload
      $('#dropzoneUpload').click(function() {
        $('#files').click();
      });

      if(window.File && window.FileList && window.FileReader) {
          $("#files").on("change",function(e) {
              var html = '';
              var files = [...e.target.files];
              filesLength = files.length;
              
              for (const [index, file] of files.entries()) {
                var fileReader = new FileReader();

                fileReader.onload = (function(e) {
                  var mime_type = file.type.split("/");

                  $('#dropzoneUpload .dz-message').hide();

                  // check file size > 1MB alert and dz message show
                  if(file.size > 1000000) {
                    alert('File size is too large');
                    if($("#parent").length == 0) {
                      $('#dropzoneUpload .dz-message').show();
                    }
                    return false
                  }

                  // mimetype is application
                  if(mime_type[0] == 'application') {
                    result = `<span class="dz-file-initials fs-1">File</span>`;
                  } else {
                    result = `<div class="dz-img">
                                <img class="img-fluid dz-img-inner" alt="${file.name}" src="${e.target.result}">
                            </div>`;
                  }

                  // size is bigger than 1MB
                  if(file.size > 1000000) {
                    size = `<span class="dz-size"><strong>${Math.round(file.size/1000000).toFixed(2)} MB</strong></span>`;
                  } else {
                    size = `<span class="dz-size"><strong>${Math.round(file.size/1000).toFixed(2)} KB</strong></span>`;
                  }


                  html = `
                  <div id="parent" class="col test h-100 px-1 mb-2 dz-processing dz-success dz-image-preview dz-error dz-complete">
                    <div class="dz-preview dz-file-preview">
                      <div class="d-flex justify-content-end dz-close-icon mb-1">        
                        <small id="remove" class="fa fa-times" data-dz-remove="${index}"></small>      
                      </div>
                      <div class="dz-details media mb-1">
                        
                        ${result}
                        
                        <div class="media-body dz-file-wrapper">         
                          <h6 class="dz-filename">          
                            <span class="dz-title" data-dz-name="">${file.name}</span>        
                          </h6>         
                          <div class="dz-size" data-dz-size="">
                            
                            ${size}

                          </div>        
                        </div>
                    </div>
                  </div>
                  `;

                  // insert html to dropzone
                  $(html).insertAfter(".dz-message");

                  $("#remove").click(function(e){

                    //  stop bubbling
                    e.stopPropagation();
                    
                    // find index of file and remove index of file
                    var index = $(this).data('dz-remove');
                    files.splice(index, 1);
                    
                    $("#files").files[index] = null;

                    $(this).parent().parent().parent().remove();
                    if($("#parent").length == 0) {
                      $('#dropzoneUpload .dz-message').show();
                    }
                      
                    console.log(files);
                    console.log($("#files"));
                    {{ request()->file('files') }}
                });

               });
               fileReader.readAsDataURL(file);
            }
        });
      } else { alert("Your browser doesn't support to File API") }
      });

    </script>
</script>