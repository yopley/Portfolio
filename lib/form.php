<?php
function input($id){
  $value = isset($_POST[$id]) ? $_POST[$id] : '';
  return "<input type='text' id='$id' name='$id' placeholder='Nom d&#39;utilisateur' value='$value'>";
}

function inputCategory($id){
  $value = isset($_POST[$id]) ? $_POST[$id] : '';
  return "<input type='text' id='$id' name='$id' class='form-control' value='$value'>";
}

function textarea($id){
  $value = isset($_POST[$id]) ? $_POST[$id] : '';
  return "<textarea type='text' id='$id' name='$id' class='form-control'>$value</textarea>";
}

function select($id, $option = array()){
  $return = "<select class='form-control' id='$id' name='$id' >";
foreach($option as $k => $v){
  $selected = '';
  if(isset($_POST[$id]) && $k == $_POST[$id]){
    $selected = ' selected = "selected"';
  }
    $return .= "<option value='$k' $selected>$v</option>";
}
$return .= '</select>';
return $return;
}
