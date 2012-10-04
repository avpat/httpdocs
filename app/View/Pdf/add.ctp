<h1>Add PDF to the merger</h1>
<?php
echo $this->Form->create('Model', array('type' => 'file'));
echo $this->Form->input('fileName', array('type' => 'file'));
echo $this->Form->end('Upload');


/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */
?>