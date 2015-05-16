<div class="panel panel-info" id="photoPanel">
    <div class="panel-heading"><h3 class="panel-title">Photos of Item</h3></div>
    <div class="panel-body form-horizontal">
        <div class="form-group">
            <label for="inputPhoto" class="col-lg-2 control-label">Photo <i class="fa fa-camera-retro fa-fw"></i></label>
            <div class="col-lg-4">
                <input type="file" name="photo[]" id="files" class="form-control" accept="image/*" id="inputPhoto" multiple="true">
                <p class="help-block">Selling Increases by Adding Photos.</p>
            </div>
        </div>
        <div class="form-group">
        <label class="col-lg-2 control-label"></label>
            <div class="col-lg-4">
                <output id="list"></output>
            </div>
        </div>
        <?php if($session->is_logged_in()):?>
        <div class="form-group">
          <div class="col-lg-offset-2 col-lg-10">
            <input type="submit" name="submit" data-loading-text="Loading..." style="max-width: 200px;" class="btn btn-success btn-lg btn-block" Value="Submit">
          </div>
        </div>
        <?php endif;?>
    </div>
</div>
<script>
  function handleFileSelect(evt) {
    var files = evt.target.files; // FileList object

    // Loop through the FileList and render image files as thumbnails.
    for (var i = 0, f; f = files[i]; i++) {

      // Only process image files.
      if (!f.type.match('image.*')) {
        continue;
      }

      var reader = new FileReader();

      // Closure to capture the file information.
      reader.onload = (function(theFile) {
        return function(e) {
          // Render thumbnail.
          var span = document.createElement('span');
          span.innerHTML = ['<img id="image_x" class="thumbnail" style="width: 200px; height: 150px;" src="', e.target.result,
                            '" title="', escape(theFile.name), '"/>'].join('');
          document.getElementById('list').insertBefore(span, null);
        };
      })(f);

      // Read in the image file as a data URL.
      reader.readAsDataURL(f);
    }
  }

  document.getElementById('files').addEventListener('change', handleFileSelect, false);
</script>