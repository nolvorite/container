<?php

/*
$data =
array(7) {
  ["content_id"]=>
  string(1) "2"
  ["content_type"]=>
  string(4) "menu"
  ["content"]=>
  string(10) "menu_admin"
  ["properties"]=>
  array(6) {
    ["iconClass"]=>
    string(11) "fas fa-cogs"
    ["url"]=>
    string(8) "#/admin/"
    ["to"]=>
    string(5) "admin"
    ["order"]=>
    string(1) "1"
    ["limits"]=>
    string(0) ""
    ["id"]=>
    string(9) "admin_btn"
  }
  ["updated_at"]=>
  string(19) "2019-03-19 00:42:01"
  ["created_at"]=>
  string(19) "2019-03-19 00:42:01"
  ["text"]=>
  string(19) "Root Admin Settings"
}

*/
?>
<div class="form-group">
	<label>Icon Class</label>
	<input type="text" class="form-control keyboard" ttype="iconchange" value="<?php echo $data['properties']['iconClass']; ?>" name="iconClass" autocomplete="off" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
	<div class="dropdown-menu panel" aria-labelledby="dLabel">
		<div class="desc">
			Selected Icon: <span class="iconnn"><i class="<?php echo $data['properties']['iconClass']; ?>"></i></span>
		</div><div class="displayer"></div>
		<div class="iconlist"><div class="displayer">Loading...</div></div>
	</div>
</div>
<div class="form-group even">
    <label>Text</label>
    <div class="dropdown">
        <a class="btn btn-secondary dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?php echo $this->lang->line("menu")[$data['content']];?></a>

        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
            <?php foreach($this->lang->line("menu") as $key => $val): 
                  $menuText = $val;
                  $isKey = $data['content'] === $key ? " selected active" : "";
            ?>
            <a href="" class="dropdown-item char <?php echo $isKey; ?>" refer="<?php echo $key;?>"><?php echo $menuText; ?></a>
            <?php endforeach; ?>
            <a href="" class="dropdown-item char gray" refer="_new">...Add New Text</a>
        </div>
    </div>
</div>
<div class="form-group">
    <label>Links To...</label>
    <div>
      <input class="form-control" placeholder="Insert URL Here..." name="link" value="<?php echo $data['properties']['url']; ?>"> 
    </div>

</div>
<div class="form-group even">
    <label>Label in Controller</label>
    <div>
      <input class="form-control" placeholder="Insert URL Here..." disabled='disabled' name="link" value="<?php echo $data['properties']['url']; ?>"> 
    </div>

</div>
<div class="form-group">
    <label>Set HTML ID</label>
    <div>
      <input class="form-control" placeholder="Set HTML ID..." name="id" value="<?php echo isset($data['properties']['id']) ? $data['properties']['id'] : ""; ?>"> 
    </div>

</div>