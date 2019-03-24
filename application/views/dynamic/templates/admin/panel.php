<?php
	
	$ttOnDrag = $this->lang->line("draggable_message");
	$enableDrag = $this->lang->line("drag1");
	$disableDrag = $this->lang->line("drag2");
	$siteTitle = $this->config->item("site")['title'];

?>
<div id="admin_panel">
	<div class="panell odd">
		<h3><i class="fas fa-cogs"></i> Admin Panel</h3>
		<ul class="nav nav-pills" id="admin_tab" role="tablist">
			<li class="nav-item">
			<a class="nav-link" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="false">Features</a>
			</li>
			<li class="nav-item">
			<a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Settings</a>
			</li>
			<li class="nav-item">
			<a class="nav-link active" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="true">Content</a>
			</li>
		</ul>
		<div class="tab-content white_bg" id="admin_content">
		<?php //array(5) { ["iconClass"]=> string(11) "fas fa-cogs" ["url"]=> string(8) "#/admin/" ["to"]=> string(5) "admin" ["limits"]=> string(0) "" ["id"]=> string(9) "admin_btn" } ?>
			<div class="tab-pane fade" id="home" role="tabpanel" aria-labelledby="home-tab">...</div>
			<div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
				<div class="container-fluid nopad" id="settings">
					<div class="col-md-6 nopad">
						<div class="card">
							<div class="card-header">General</div>
							<div class="card-body">
								<div class="form-group">
									<label>Site Name</label>
									<input class="form-control" value="<?php echo $siteTitle; ?>">
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="tab-pane fade show active" id="contact" role="tabpanel" aria-labelledby="contact-tab">
				<div class="container-fluid" id="menus">
					<div class="row">
						
						<div class="colomn col-lg-3 col-md-4">
							<div class="card">
								<div class="card-header">
									Menu Items  <span class="badge badge-warning toggleDrag" control="menusortadmin" enable="<?php echo $enableDrag;?>" disable="<?php echo $disableDrag;?>"><?php echo $disableDrag;?></span> <span data-toggle="tooltip" class="question" data-placement="bottom" title="<?php echo $ttOnDrag; ?>">
								<i class="fa fa-question-circle" aria-hidden="true"></i>
								</span>
								</div>
								<div class="card-body sorter">
									<div class="nav flex-column nav-pills sortablee" id="menusortadmin">								
									<?php 
									$classText = "even";
									for($i = 0; $i < count($menu); $i++){
										
										for($j = 0; $j < count($menu); $j++){  
											$menuItem = $menu[$j];
											$classText = $classText === "even" ? "odd" : "even";
											$text = $this->lang->line("menu",FALSE)[$menuItem['content']];
											if($menuItem['properties']['order'] === "".($i+1)){
									?>
									<button class="nav-link btn btn-sm" draggable="true" contentId="<?php echo $menuItem['content_id']; ?>">
									<span class="icon"><i class="<?php echo htmlspecialchars($menuItem['properties']['iconClass']); ?>"></i></span> <?php echo $text; ?>
									</button>
										
									<?php }}} ?>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
				
			</div>
		</div>
	</div>
</div>