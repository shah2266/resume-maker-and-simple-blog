<form id="tagForm" name="tagForm" class="form-horizontal">
	@csrf
	<input type="hidden" name="tag_id" id="tag_id">
	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Name</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="name" name="name" placeholder="Name" value="" maxlength="50" required="">
		</div>
	</div>

	<div class="form-group">
		<label for="name" class="col-sm-2 control-label">Slug</label>
		<div class="col-sm-10">
			<input type="text" class="form-control" id="slug" name="slug" placeholder="Slug" value="" maxlength="50" required="">
			<span id="error_slug" class="error"></span>
		</div>
	</div>

	<div class="form-group">
		<label class="col-sm-2 control-label" for="description">Description</label>
		<div class="col-sm-10">
			<textarea id="description" name="description" placeholder="Enter description" class="form-control"></textarea>
		</div>
	</div>
	<div class="form-group">
		<div class="col-sm-offset-2 col-sm-10">
			<div class="submit-btn">
				<button type="submit" class="btn btn-success btn-flat" name="submit" id="btn-save" value="create">Save</button>
				<a id="cancel" class="btn btn-danger" style="display: none">Cancel</a>
			</div>
		</div>
	</div>
</form>