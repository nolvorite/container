

<div id="panel" class="container-fluid">
	<div class="row">
		<div id="left_menu" class="col-lg-3">
			<div id="left_tab">
				<h3>Menu</h3>
				<div id="list_container">
					<?php foreach($menuData as $menu): 
						$menu['properties'] = (array) $menu['properties'];
						$link = htmlspecialchars($menu['properties']['url']);
						$to = htmlspecialchars($menu['properties']['to']);
						$iconClass = htmlspecialchars($menu['properties']['iconClass']);
						$actualText = htmlspecialchars($this->lang->line("menu",FALSE)[$menu['content']]);
						$id_pad = isset($menu['properties']['id']) ? " id='".htmlspecialchars($menu['properties']['id'])."'" : ""
					//var_dump($menu['properties']); ?>
					<a href="<?php echo $link; ?>" to="<?php echo $to; ?>"<?php echo $id_pad; ?>><span class="icon"><i class="<?php echo $iconClass; ?>"></i></span> <?php echo $actualText; ?></a>
	            	<?php endforeach;?>
	            	
	            </div>
            </div>
		</div>
		<div id="right_side" class="col-lg-9">
			<?php 
				//echo $this->load->view($defaultView,['notes' => $defaultData],TRUE);
			?>
		</div>
		<?php echo $this->load->view("dynamic/templates/bits/modal.php",[],TRUE); ?>
	</div>
</div>