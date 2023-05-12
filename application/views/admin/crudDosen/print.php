<!DOCTYPE html>
<html lang="en">
<head>

</head>
<body>
    <table class="table table-hover" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>NIM</th>
                <th>Nama Dosen</th>
                <th>Prodi</th>
                <th>Email</th>
            </tr>
        </thead>
        <tbody>
        <?php 
            $no=1;
            foreach ($dosen as $row): ?>
			    <tr>
                    <td>
                        <?php echo $no; ?>
                    </td>
                    <td>
                        <?php echo $row->NIP; ?>
                    </td>
                    <td>
                        <?php echo $row->namaDosen; ?>
                    </td>
                    <td>
                        <?php echo $row->prodi; ?>
                    </td>
                    <td>
                        <?php echo $row->email; ?>
                    </td>
				</tr>
		<?php 
            $no++;
            endforeach; ?>
        </tbody>
    </table>
</body>
</html>
