<!DOCTYPE html>
<html>
<head>
<!-- bootstrap --> 
   <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" 
        integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    
    <!-- font awesome -->
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" 
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
 
</head>
<body>

<table border="1" width="100%">
	<tbody>
		<tr>
			<td colspan="2" height="100px"><?php  $this->getChild('header')->toHtml();  ?></td>
		</tr>
		<tr width="100%">
			<td><?php  $this->getChild('message')->toHtml();  ?></td>
			<td> <?php $this->getChild('content')->toHtml();  ?> </td>
		</tr>
		<tr>
			<td colspan="2" height="100px"> <?php $this->getChild('footer')->toHtml(); ?> </td>
		</tr>

	</tbody>
</table>
</body>
</html>