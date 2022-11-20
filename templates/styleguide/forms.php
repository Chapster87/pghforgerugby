<div class="form-group mb-3">
	<label class="form-label" for="test">Text Field</label>
	<input type="text" id="test" class="form-control" name="test"/>
</div>
<div class="form-group mb-3 required">
	<label class="form-label" for="test">Required Text Field</label>
	<input type="text" id="test" class="form-control" name="test"/>
</div>
<div class="form-group mb-3">
	<label class="form-label" for="test">Text Field with Error</label>
	<input type="text" id="test" class="form-control is-invalid" name="test"/>
	<div class="invalid-feedback">This is a test error</div>
</div>
<div class="form-group mb-3">
	<label class="form-label" for="test">Text Field with Help Text</label>
	<input type="text" id="test" class="form-control" name="test" aria-describedby="fieldHelp"/>
	<div id="fieldHelp" class="form-text">Example Help Text</div>
</div>
<div class="form-group mb-3">
	<label class="form-label" for="test">Text Field with Help Tooltip </label>
	<span class="info-icon">
		<span class="icon">i</span>
		<div class="tooltip">Testing Tooltip Content</div>
	</span>
	<input type="text" id="test" class="form-control" name="test"/>
</div>
<div class="form-group mb-3">
	<label class="form-label" for="test2">Select Box</label>
	<span class="info-icon">
		<span class="icon">i</span>
		<div class="tooltip">Testing Tooltip Content</div>
	</span>
	<select class="form-select form-control" id="test2" name="test" aria-label="test">
		<option label=""></option>
		<option label="Test Value 1">Test Value 1</option>
		<option label="Test Value 2">Test Value 2</option>
		<option label="Test Value 3">Test Value 3</option>
	</select>
</div>

<div class="form-group mb-3">
	<div class="form-check">
		<input type="checkbox" class="form-check-input" id="checkbox-test" name="checkbox-test" value="true" checked/>
		<label class="form-check-label" for="checkbox-test">Checkbox</label>
	</div>
	<div class="form-check">
		<input type="checkbox" class="form-check-input" id="checkbox-test2" name="checkbox-test2" value="true" disabled/>
		<label class="form-check-label" for="checkbox-test2">Disabled</label>
	</div>
</div>

<div class="form-group mb-3">
	<div class="form-check">
		<input type="radio" class="form-check-input" id="radio-test1"  name="radio-test" checked>
		<label for="radio-test1" class="form-check-label">
			<span>Option 1</span>
		</label>
	</div>
	<div class="form-check">
		<input type="radio" class="form-check-input" id="radio-test2" name="radio-test">
		<label for="radio-test2" class="form-check-label">
			<span>Option 2</span>
		</label>
	</div>
	<div class="form-check">
		<input type="radio" class="form-check-input" id="radio-test3" name="radio-test" disabled>
		<label for="radio-test3" class="form-check-label">
			<span>Disabled</span>
		</label>
	</div>
</div>