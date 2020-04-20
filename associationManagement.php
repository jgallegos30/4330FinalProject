<?php session_start(); ?>
<!DOCTYPE html>
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
        <title>Association Maintenance</title>
    </head>
    <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand">ROCS.sa JobSearch</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" href="/employerWelcome.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/reporting">Reporting</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/applicantSearch.php">Applicant Search</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                Database Maintenance
                </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                <a class="dropdown-item active" href="/associationManagement.php">Manage Associations<span class="sr-only">(current)</span></a>
                <a class="dropdown-item" href="/companyManagement.php">Manage Companies</a>
                <a class="dropdown-item" href="/employeeManagement.php">Manage Employees</a>
                <a class="dropdown-item" href="/jobManagement.php">Manage Jobs</a>
                <a class="dropdown-item" href="/applicationManagement.php">Manage Applicants</a>
                <a class="dropdown-item" href="/committeeManagement.php">Manage Committees</a>
                </div>
            </li>
            </ul>
        </div>
        <div>
            <span class="navbar-text" style="padding:5px">
                <?php echo $_SESSION['ID_Number']; ?>
            </span>
        </div>
        <div align="right">
            <form class="form-inline" action="/index.html">
                <button class="btn btn-sm btn-outline-secondary" type="submit">Log Out</button>
            </form>
        </div>
    </nav>
        <h1 style="margin-left:1%">Association Management</h1>
		<div class="card text-center">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
                        <a class="nav-link active" href="/associationManagement.php">Manage Associations</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link" href="/createAssociation.php">Create New Association</a>
					</li>
				</ul>
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

                            $total_records_per_page = 10;
                            $offset = ($page_no-1) * $total_records_per_page;
                            $previous_page = $page_no - 1;
                            $next_page = $page_no + 1;
                            $adjacents = "4"; 

                            $result_count = mysqli_query($link,"SELECT COUNT(*) As total_records FROM `Association`");
                            $total_records = mysqli_fetch_array($result_count);
                            $total_records = $total_records['total_records'];
                            $total_no_of_pages = ceil($total_records / $total_records_per_page);
                            $second_last = $total_no_of_pages - 1; // total page minus 1

                            $result = mysqli_query($link,"SELECT * FROM `Association` LIMIT $offset, $total_records_per_page");
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
                    <?php // if($page_no > 1){ echo "<li><a href='?page_no=1'>First Page</a></li>"; } ?>

                    <li style="padding-right:1%" <?php if($page_no <= 1){ echo "class='disabled'"; } ?>>
                        <a <?php if($page_no > 1){ echo "href='?page_no=$previous_page' "; } ?>>Previous</a>
                    </li>
                    <?php 
                    if ($total_no_of_pages <= 10){  	 
                        for ($counter = 1; $counter <= $total_no_of_pages; $counter++){
                            if ($counter == $page_no) {
                           echo "<li style='padding-left:1%;padding-right:1%' class='active'><a>$counter</a></li>";	
                                }else{
                           echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$counter'>$counter</a></li>";
                                }
                        }
                    }
                    elseif($total_no_of_pages > 10){
		
                        if($page_no <= 12) {			
                            for ($counter = 1; $counter < 8; $counter++){		 
                                if ($counter == $page_no) {
                                    echo "<li style='padding-left:1%;padding-right:1%' class='active'><a>$counter</a></li>";	
                                }else{
                                    echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$counter'>$counter</a></li>";
                                }
                            }
                            echo "<li style='padding-left:1%;padding-right:1%'><a>...</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";
                        }
    
                        elseif($page_no > 4 && $page_no < $total_no_of_pages - 4) {		 
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=1'>1</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=2'>2</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a>...</a></li>";
                            for ($counter = $page_no - $adjacents; $counter <= $page_no + $adjacents; $counter++) {			
                               if ($counter == $page_no) {
                                    echo "<li style='padding-left:1%;padding-right:1%' class='active'><a>$counter</a></li>";	
                                }else{
                                    echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$counter'>$counter</a></li>";
                                }                  
                            }
                            echo "<li style='padding-left:1%;padding-right:1%'><a>...</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$second_last'>$second_last</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$total_no_of_pages'>$total_no_of_pages</a></li>";      
                        }
            
                        else {
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=1'>1</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=2'>2</a></li>";
                            echo "<li style='padding-left:1%;padding-right:1%'><a>...</a></li>";
    
                            for ($counter = $total_no_of_pages - 6; $counter <= $total_no_of_pages; $counter++) {
                                if ($counter == $page_no) {
                                    echo "<li style='padding-left:1%;padding-right:1%' class='active'><a>$counter</a></li>";	
                                }else{
                                    echo "<li style='padding-left:1%;padding-right:1%'><a href='?page_no=$counter'>$counter</a></li>";
                                }                   
                            }
                        }
                    }
                    ?>
                    <li style="padding-left:1%;" <?php if($page_no >= $total_no_of_pages){ echo "class='disabled'"; } ?>>
                        <a <?php if($page_no < $total_no_of_pages) { echo "href='?page_no=$next_page' "; } ?>>Next</a>
                    </li>
                </ul>


                <br /><br />
            </div>
		</div>
	</body>
</html>
