<?php
/*

[0]=>
  array(14) {
    ["dbid_ref"]=>
    string(1) "1"
    ["table_name"]=>
    string(15) "Commercial List"
    ["permission_val"]=>
    string(4) "3321"
    ["is_editable"]=>
    string(1) "0"
    ["dbfid"]=>
    string(2) "65"
    ["is_intangible"]=>
    string(5) "false"
    ["admin"]=>
    string(9) "nolvorite"
    ["misc_props"]=>
    string(0) ""
    ["last_modified"]=>
    string(19) "2017-09-19 21:53:34"
    ["default_view"]=>
    string(1) "0"
    ["is_open"]=>
    string(5) "false"
    ["redir_after_submit"]=>
    string(4) "true"
    ["redir_opt"]=>
    string(1) "1"
    ["intangible_dbf"]=>
    string(0) ""
  }

*/
?>
<?php //table display
	foreach($tables as $index => $table): ?>
<div class="table_display<?php echo (intval($index) % 2 === 1) ? " even" : ""; ?>">
	<h4><?php echo $table['table_name']; ?></h4>
	<div class="table_pad">
		<table class="table table-striped" tableId="<?php echo $table['dbfid']; ?>" index="<?php echo $index; ?>">
			<tr>
            <th class="centr" width='1%'>#</th>
			<?php 
                $span = 1;
                foreach($columns[$index] as $index2 => $column): $span++; ?>
				<th dbcid="<?php echo $column['dbcid']; ?>" type="<?php echo $column['type']; ?>">
					<?php echo $column['dbc_name']; ?>
				</th>
			<?php endforeach; ?>
			</tr>
            <tr class="loadings"><td class="loadings" colspan="<?php echo $span; ?>" class="alerts alert-light">Loading... <span class="loading-sm"></span></tr>
		</table>
	</div>
</div>
<?php endforeach; ?>