<div class="form-group">
	<label class="form-control-label" for="test">Text Field</label>
	<input type="text" id="test" class="form-control" name="test"/>
</div>
<div class="form-group required">
	<label class="form-control-label" for="test">Required Text Field</label>
	<input type="text" id="test" class="form-control" name="test"/>
</div>
<div class="form-group">
	<label class="form-control-label" for="test">Text Field with Error</label>
	<input type="text" id="test" class="form-control is-invalid" name="test"/>
	<div class="invalid-feedback">This is a test error</div>
</div>
<div class="form-group">
	<label class="form-control-label" for="test">Text Field with Help Text</label>
	<input type="text" id="test" class="form-control" name="test"/>
	<span>Example Help Text</span>
</div>
<div class="form-group">
	<label class="form-control-label" for="test">Text Field with Help Tooltip </label>
	<span class="info-icon">
		<span class="icon">i</span>
		<div class="tooltip">Testing Tooltip Content</div>
	</span>
	<input type="text" id="test" class="form-control" name="test"/>
</div>
<div class="form-group">
	<label class="form-control-label" for="test2">Select Box</label>
	<span class="info-icon">
		<span class="icon">i</span>
		<div class="tooltip">Testing Tooltip Content</div>
	</span>
	<select class="form-control custom-select" id="test2" name="test">
		<option label=""></option>
		<option label="Test Value 1">Test Value 1</option>
		<option label="Test Value 2">Test Value 2</option>
		<option label="Test Value 3">Test Value 3</option>  
	</select>
</div>

<div class="form-group custom-control custom-checkbox">
	<input type="checkbox" class="custom-control-input" id="checkbox-test" name="checkbox-test" value="true"/>
	<label class="custom-control-label" for="checkbox-test">Checkbox</label>
</div>

<div class="form-group custom-control custom-radio">
	<div class="start-lines">
		<input id="radio-test1" name="radio-test" type="radio" class="custom-control-input" checked>
		<label for="radio-test1" class="custom-control-label">
			<span>Option 1</span>
		</label>
	</div>
	<div class="start-lines">
		<input id="radio-test2" name="radio-test" type="radio" class="custom-control-input">
		<label for="radio-test2" class="custom-control-label">
			<span>Option 2</span>
		</label>
	</div>
	<div class="start-lines">
		<input id="radio-test3" name="radio-test" type="radio" class="custom-control-input">
		<label for="radio-test3" class="custom-control-label">
			<span>Option 3</span>
		</label>
	</div>
</div>