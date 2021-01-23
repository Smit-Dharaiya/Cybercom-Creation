<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
	<h1>Data :</h1>
    <table>
        <thead>
            <tr>
                <td>Key</td>
                <td>Value</td>
            </tr>
        </thead>
        <?php
        foreach ($_GET as $key => $value) {
            if ($key != 'submit') {
                echo "<tr>";
                echo "<td>";
                echo $key;
                echo "</td>";
                echo "<td>";
                echo $value;
                echo "</td>";
                echo "</tr>";
            } else continue;
        }
        ?>
    </table>
</body>
</html>