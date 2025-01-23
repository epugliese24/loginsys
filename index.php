<?php
require_once('connect.php');

echo("
<form method=POST action='additem.php'>
<input type=text name='itemName' placeholder='input item name'></input>
<select  name='type'placeholder='select type'>
<option value='weapon'>weapon</option>
<option value='item'>item</option>
</select>
<input name='amt'type=number placeholder='amount'></input>
<input type=submit>
</form>
");
