
<?php  
session_start(); ?>
<html>
<p> Hi <?php echo $_SESSION['username']; ?>!</p>
<p> You live in <?php echo $_SESSION['city']; ?>!</p>
<p> You live in <?php echo $_SESSION['area']; ?>! </p>

<form id="login" method="POST" action="update_info.php">
	<table>
		<tr>
			<span>
				<td>
					Item:
				</td>
				<td>
					<input id="item" type="text" name="item" required>
				</td>
			</span>
		</tr>
		<tr>
			<span>
				<td>
					Quantity:
				</td>
				<td>
					<input id="quantity" type="number" name="quantity" required>

				</td>
			</span>
		</tr>		
	</table>
	<input type="submit" name="submit" value="+">
	
</form>
</html>
