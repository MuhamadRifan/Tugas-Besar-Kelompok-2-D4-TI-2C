<html lang="en">
	<head>
    	<title><?php echo $title?></title>
    </head>
    <body align="center">
    <h1>Data Mahasiswa</h1>
	
	<table align="center" border="1" cellpadding="0" cellspacing="0">
    	<tr>
            <th>No</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Jurusan</th>
        </tr>
        <?php
            $no=1;
            if(isset($data)){
        	    foreach($data as $row){
        ?>
        <tr>
            <td><?php echo $no++; ?></td>
            <td><?php echo $row->nama; ?></td>
            <td><?php echo $row->kelas; ?></td>
            <td><?php echo $row->jurusan; ?></td>
        </tr>    
        <?php }
            }
        ?>
    </table>

    </body>
</html>