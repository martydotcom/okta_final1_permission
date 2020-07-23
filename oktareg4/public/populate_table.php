<?php 

session_start();




if(isset($_POST['search']))
{
    $valueToSearch = $_POST['valueToSearch'];
    // search in all table columns
    // using concat mysql function
  
   $query = "SELECT * FROM `test` WHERE CONCAT(`id`, `date`, `timeslot`, `event`,'username) LIKE '%".$valueToSearch."%'";
    $search_result = filterTable($query);
    
}
 else {
    
	$query = "SELECT * FROM `test`";
    $search_result = filterTable($query);
}

// function to connect and execute the query
function filterTable($query)
{
	

    $connect = mysqli_connect('localhost', 'root', '', 'registration2');
    $filter_Result = mysqli_query($connect, $query);
    return $filter_Result;
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>PHP HTML TABLE DATA SEARCH</title>
		<link rel="stylesheet" type="text/css" href="style.css">
        <style>
            table,tr,th,td
            {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
            
            <table>
                <tr>
                    <th>Id</th>
					<th>Date</th>
                    <th>Timeslot</th>
                    <th>Event</th>              
					<th>Username</th>

      <!-- populate table from mysql database -->
                <?php while($row = mysqli_fetch_array($search_result)):?>
                <tr>
                    <td><?php echo $row['id'];?></td>
					<td><?php echo $row['date'];?></td>
                    <td><?php echo $row['timeslot'];?></td>
                    <td><?php echo $row['event'];?></td>
					 <td><?php echo $row['username'];?></td>
                </tr>
                <?php endwhile;?>
            </table>
        </form>
  <!-- Site footer -->
    <footer class="site-footer">
      <div class="container">
        <div class="row">
       
          <div class="col-xs-6 col-md-3">
         
            <ul class="footer-links">
              <li><a href="/index.php">Home</a></li>
              
            </ul>
          </div>
        </div>
        <hr>
      </div>
       

</body>
</html>

