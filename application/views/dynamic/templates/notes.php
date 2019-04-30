<div id="todo_list">
    <div class="panell odd">
        <h3><i class="fas fa-list-ol"></i> To-Do List</h3>
        <textarea class="form-control" ref="note_maker regex_check" rel="note_maker" placeholder="Type anything you need to do here..."></textarea>  
        <label class="option">Submit an entry by pressing [ENTER] <input class="spec2" type="checkbox" checked="checked"></label>
    </div>
    <div class="panell even">
        <h3><i class="fas fa-list-alt"></i> Current To-Do List</h3>
        <div class="white_bg" id="notes">
            <?php 
                if(empty($notes)){
                    echo "No notes for now. Feel free to make one!";
                }else{
                    foreach($notes as $nc => $noteData):
                        //$note_dt['note_date'] = $this->base_model->dflt_dfmt($noteData['note_date']);   
            ?>
            <div class='note' note_id='<?php echo $noteData['note_id'] ?>'><div class='note_content'><?php echo $noteData['note'] ?></div>

            <span class='prop date'><?php echo $noteData['note_date']; ?> 
            <div class="options2" rel="45"><button class="small_btn spec2" ref="edit_cell" rel="<?php echo $noteData['note_id']; ?>" type="notes"><i class="fas fa-edit"></i> Edit</button><button class="small_btn spec2" ref="delete_cell" rel="<?php echo $noteData['note_id']; ?>" type="notes"><i class="fas fa-backspace"></i> Delete</button></div>
            </span>

            </div>
            <?php   endforeach;  
            } ?>
        </div>
    </div>
</div>  