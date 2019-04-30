<div class="panell odd">
	<h3><i class="fa fa-user-circle"></i> User Settings</h3>
	<div class="white_bg">
		All your settings/preferences with regards to how the site displays content go here.
		<div class="form-group">
			<div class="alert alert-info notifc ">
				<table class="simpl">
					<tr>
						<td width="1%">
							<input class="form-check-input" type="checkbox" id="inlineCheckbox1" value="option1">
						</td>
						<td>
							<label class="form-check-label" for="inlineCheckbox1">Save changes before leaving</label>
						</td>
					</tr>
				</table>
			</div>
		</div>
	</div>
</div>
<div class="panell even">
	<h3><i class="fa fa-sliders-h fa-w-16"></i> Panel</h3>
	<div class="white_bg">
		<div class="btn-group" role="group" aria-label="Settings Navigation Tabs">
			<a href="#/panel/settings/general" class="btn btn-secondary selected">General Settings</a>
			<a href="#/panel/settings/personal" class="btn btn-secondary">Personal Settings</a>
		</div>
		<div id="settings-disp" class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="card">
						<div class="card-header">
							Option Category 1
						</div>
						<div class="card-body">
							<p>Option description lorem ipsum dolor sit amet. Option description lorem ipsum dolor sit amet. Option description lorem ipsum dolor sit amet. Option description lorem ipsum dolor sit amet. </p>
						
							<div class="form-group">
								<label class="form-check-label">Configuration</label>
								<input type="text" class="form-control ch23" name="id1" placeholder="Placeholder" value>
							</div>
							<div class="form-group">
								<label class="form-check-label">Configuration 2</label>
								<input type="text" class="form-control ch23" name="id2" placeholder="Placeholder" value="hasValue">
							</div>
							<div class="form-group">
								<label class="form-check-label">Configuration 3</label>
								<div class="selection-canvas">
									<div class="form-check">
										<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios1" value="option1" checked>
										<label class="form-check-label" for="exampleRadios1">
										Default radio
										</label>
									</div>
									<div class="form-check">
										<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios2" value="option2">
										<label class="form-check-label" for="exampleRadios2">
										Second default radio
										</label>
									</div>
									<div class="form-check">									
										<input class="form-check-input" type="radio" name="exampleRadios" id="exampleRadios3" value="option3" disabled>
										<label class="form-check-label" for="exampleRadios3">
										Disabled radio
										</label>
									</div>

								</div>
							</div>
							<div class="form-group">
								<label class="form-check-label">Configuration 4</label>
								<select class="form-control" name="selectconfig">
									<option value="1">Ayy</option>
									<option value="2">Lmaoo</option>
									<option value="3">Ayyyy</option>
								</select>
							</div>
							<div class="form-group">
								<label class="form-check-label">Configuration 5</label>
								<input type="text" class="form-control ch23 keyboard" ttype="dbsearchinput" name="id5" id="id5" placeholder="Select from database" table="db_columns" columns="/all" returns="array" data-toggle="dropdown">
								<div class="dropdown-menu pads" class="dbmenu" id="for_id5">
									Begin searching... <span class="loading-sm"></span>
								</div>
							</div>
							<div class="form-group">
								<label class="form-check-label">Configuration 6</label>
								<input type="text" class="form-control ch23 datepicker" name="id6" id="id6" placeholder="Choose date...">
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>