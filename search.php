<?php
    if(isset($_POST['name'])){
        $name = $_POST["name"];
    }
?>

<!DOCUTYPE html>
<html lang="en" dir="ltr">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
				
		<style>
            table {
              font-family: arial, sans-serif;
              border-collapse: collapse;
              width: 100%;
            }
            
            td, th {
              border: 1px solid #000000;
              text-align: left;
              padding: 8px;
            }
            
            tr:nth-child(even) {
              background-color: #dddddd;
            }
        </style>
        <title>Search</title>
    </head>
    <body>
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <ul class="nav navbar-nav">
                    <li><a href="/index.php">Home</a></li>
                    <li><a href="/reporting">Reporting</a></li>
                    <li><a href="/searchCommitteeSearch">Search Committee Search</a></li>
                    <li><a href="/applicantSearch">Applicant Search</a></li>
                    <li class="active"><a href="/maintenance.html">Database Maintenance</a></li>
                </ul>
            </div>
        </nav>

        <h1 style="margin-left:1%">Association Management</h1>
		<div class="card text-center">
			<div class="card-header">
            <form method='GET' action="<?php echo $_SERVER['$PHP_SELF'];?>">
                <input type="text" value="" name="name">
                <input type='submit' value='Search'>
            </form>
			</div>
			<div class="card-body">
                <table>
                    <thead>
                        <tr>
                            <th>Name</th>
                            <th>Description</th>
                            <th>Address</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            print("<h4>Associations</h4>");
                            require_once 'connect.php';
                            if (isset($_GET['page_no']) && $_GET['page_no']!="") {
                                $page_no = $_GET['page_no'];
                            } else {
                                $page_no = 1;
                            }
                            if (isset($_GET['name']) && $_GET['name']!="") {
                                $name = $_GET['name'];
                            } else {
                                
                            }
                            $total_records_per_page = 10;
                            $offset = ($page_no-1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "4"; 

                            $result_count = mysqli_query($link,"SELECT COUNT(*) As total_records FROM `Association` WHERE name LIKE '%" . $name . "%'");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; // total page minus 1

                            $result = mysqli_query($link,"SELECT * FROM `Association` WHERE name LIKE '%" . $name . "%' LIMIT $offset, $total_records_per_page ");
                            while($row = mysqli_fetch_array($result)){
                                echo "<tr>
                                        <td>".$row['name']."</td>
                                        <td>".$row['description']."</td>
                                        <td>".$row['address']."</td>
                                        <td><a href='/deleteAssociation.php?id=".$row['association_id'] . "'>" . "DELETE</a></td>
                                      </tr>";
                            }
                            ?>
                    </tbody>
                </table>
                
                <div style='padding: 10px 20px 0px; border-top: dotted 1px #CCC;'>
                    <strong>Page <?php echo $page_no." of ".$total_no_of_pages; ?></strong>
                </div>

                <ul class="pagination" align="center">
                    <?php //if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                    <li style="padding-right:1%" <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                        <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page&name=$name' "; } ?>>Previous</a>
                    </li>
                    <?php 
                    if ($total_no_of_pages <= 10){  	 
                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                            if ($counter == $page_no) {
                           echo "<li style='padding-left:1%;padding-right:1%' class='active'><a>$counter</a></li>";	
                                }else{
                           echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$counter&name=$name'>$counter</a></li>";
                                }
                        }
                    }
                    elseif($total_no_of_pages > 10){
		
                        if($page_no <= 12) {			
                            for ($counter = 1; $counter < 8; $counter++){		 
                                if ($counter == $page_no) {
                                    echo "<li style='padding-left:1%;padding-right:1%' class='active'><a>$counter</a></li>";	
                                }else{
                                    echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$counter&name=$name'>$counter</a></li>";
                                }
                            }
                            echo "<li style='padding-left:1%;padding-right:1%'><a>...</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$second_last&name=$name'>$second_last</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$total_no_of_pages&name=$name'>$total_no_of_pages</a></li>";
                        }
    
                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=1&name=$name'>1</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=2&name=$name'>2</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a>...</a></li>";
                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                               if ($counter == $page_no) {
                                    echo "<li style='padding-left:1%;padding-right:1%' class='active'><a>$counter</a></li>";	
                                }else{
                                    echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$counter&name=$name'>$counter</a></li>";
                                }                  
                            }
                            echo "<li style='padding-left:1%;padding-right:1%'><a>...</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$second_last&name=$name'>$second_last</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$total_no_of_pages&name=$name'>$total_no_of_pages</a></li>";      
                        }
            
                        else {
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=1&name=$name'>1</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=2&name=$name'>2</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a>...</a></li>";
    
                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                if ($counter == $page_no) {
                                    echo "<li style='padding-left:1%;padding-right:1%' class='active'><a>$counter</a></li>";	
                                }else{
                                    echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$counter&name=$name'>$counter</a></li>";
                                }                   
                            }
                        }
                    }
                    ?>
                    <li style="padding-left:1%;" <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                        <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page&name=$name' "; } ?>>Next</a>
                    </li>
                </ul>


                <br /><br />
            </div>
		</div>
	</body>
</html>