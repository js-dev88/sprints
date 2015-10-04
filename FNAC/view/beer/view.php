

<h2><?php echo $data->name; ?></h2>
<p>
<?php
echo $data->brewery->name." (".$data->brewery->country.") ".$data->degree."°"; 

?>
</p>
