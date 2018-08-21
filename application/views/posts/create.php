<h2><?= $title?></h2>


<?php echo validation_errors() ?>

<?php echo form_open('posts/create'); ?>
	<div class="col-sm-12">
		<div class="form-group">
			<label for="judul">Judul Artikel</label>
			<input type="text" class="form-control" id="judul" placeholder="Masukan Judul" name="title" required>
		</div>
	</div>
	<br>
	<!-- End Select -->
	<div class="clearfix"></div>
	<div class="col-sm-12">
		<div class="form-group">
			<label for="editor1">Isi Artikel</label>
			<textarea class="form-control" name="body" id="editor" rows="5"></textarea>
		</div>
	</div>
	<hr>
	<div class="box-footer">
		<button type="publish" class="btn btn-primary btn-lg pull-right" name="publish">Publish</button>
	</div>
</form>
<script src="<?php echo base_url(); ?>assets/plugin/ckeditor/ckeditor.js"></script>
<script>
	// Replace the <textarea id="editor1"> with a CKEditor
	// instance, using default configuration.
	CKEDITOR.replace('editor');
</script>