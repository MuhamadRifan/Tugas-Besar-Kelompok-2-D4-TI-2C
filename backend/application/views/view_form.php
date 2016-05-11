<html>
<head>
<title>Codeigniter Json</title>
<link href='http://fonts.googleapis.com/css?family=Source+Sans+Pro|Open+Sans+Condensed:300|Raleway' rel='stylesheet' type='text/css'>
</head>
<body>
<div class="main">
<div id="content">
<h2 id="form_head">Convert CodeIgniter Query to Json & Insert Into Database</h2>
<div id="form_input">
<?php
echo form_open('welcome/insert_data');
echo form_label('Nama' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
$data_name = array(
'name' => 'nama',
'id' => 'nama_id',
'class' => 'input_box',
'placeholder' => 'Masukan Nama . .',
'required' => 'required'
);
echo form_input($data_name);
echo "<br>";

echo form_label('Masukan Kelas' . '&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;');
$data_name = array(
'name' => 'kelas',
'id' => 'emp_name_id',
'class' => 'input_box',
'placeholder' => 'Please Enter Name',
'required' => 'required'
);
echo form_input($data_name);
echo "<br>";

echo form_label('Masukan Jurusan' . '&nbsp;&nbsp;');
$data_name = array(
'name' => 'jurusan',
'id' => 'emp_name_id',
'class' => 'input_box',
'placeholder' => 'Please Enter Name',
'required' => 'required'
);
echo form_input($data_name);

echo "</div>";
?>
</div>
<div id="form_button">
<?php echo form_submit('submit', 'Submit', "class='submit'"); ?>
</div>
<?php echo form_close(); ?>
</div>
</div>
<?php
if (isset($result_msg)) {
echo "<div id='res_msg'>";
echo $result_msg;
echo "</div>";
}
?>
</body>
</html>