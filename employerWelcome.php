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
        <style>
            .header {
  padding: 10px;
  text-align: left;
  background: #737CA1;
  color: white;
}
/* Increase the font size of the h1 element */
.header h1 {
  font-size: 40px;
}


/* Column container */
/* .row {  
 /*  display: flex;
 /*  flex-wrap: wrap;
}
/* Create two unequal columns that sits next to each other */
/* Sidebar/left column */
.side {
  flex: 30%;
  background-color: #f1f1f1;
  padding: 20px;
}

/* Main column */
.main {   
  flex: 70%;
  background-color: white;
  padding: 20px;
}

/* Fake image, just for this example */
.fakeimg {
  background-color: #aaa;
  width: 100%;
  padding: 20px;
}

/* Footer */
/*.footer {
  padding: 20px;
  text-align: center;
  background: #ddd;
}
/* Responsive layout - when the screen is less than 700px wide, make the two columns stack on top of each other instead of next to each other */
@media screen and (max-width: 700px) {
  .row {   
    flex-direction: column;
  }
}

/* Responsive layout - when the screen is less than 400px wide, make the navigation links stack on top of each other instead of next to each other */
@media screen and (max-width: 400px) {
  .navbar a {
    float: none;
    width:100%;
  }
}
.navbar .search-container button:hover {
  background: #ccc;
}

@media screen and (max-width: 600px) {
  .navbar a, .navbar input[type=text], .navbar .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  
 .navbar input[type=text] {
    border: 1px solid #ccc;  
  }
  
.navbar .search-container {
  float: right;
}

/* } expected might be lower*/

.navbar input[type=text] {
  float: right;
  padding: 6px;
  margin-top: 8px;
  margin-right: 16px;
  border: none;
  font-size: 17px;
}


.navbar .search-container button {
  float: right;
  padding: 6px 10px;
  margin-top: 8px;
  margin-right: 16px;
  background: #ddd;
  font-size: 17px;
  border: none;
  cursor: pointer;
}

.navbar .search-container button:hover {
  background: #ccc;
}

}
@media screen and (max-width: 600px) {
  .navbar .search-container {
    float: none;
  }
  .navbar a, .navbar input[type=text], .navbar .search-container button {
    float: none;
    display: block;
    text-align: left;
    width: 100%;
    margin: 0;
    padding: 14px;
  }
  .navbar input[type=text] {
    border: 1px solid #ccc;  
  }

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
                    <li class="nav-item active">
                        <a class="nav-link active" href="/employerWelcome.php">Home<span class="sr-only">(current)</span></a>
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
                        <a class="dropdown-item" href="/associationManagement.php">Manage Associations</a>
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
        
        <div style="padding-left:10px">
            <h1>Welcome!</h1>
            <h3>to ROCS.sa JobSearch's Employer Home Page</h3>
        </div>    

<div class="row">
  <div class="side">
    <a href="/homepage/homepage.html">Explore Jobs</a>
    <h5>Jobs Recommended for you:</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Based on your interests and profile</p>
    <a href ="/homepage/homepage.html">Jobs You Favorited</a>
    <div class="fakeimg" style="height:60px;">Image</div><br>
    <div class="fakeimg" style="height:60px;">Image</div><br>
    <div class="fakeimg" style="height:60px;">Image</div>
     <li class="active"><a href="#">See more jobs</a></li>
  </div>
<div class="row">
  <div class="side">
    <h2>Explore Companies</h2>
    <h5>Companies Recommended for you:</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Based on your interests and profile</p>
    <li><a href="#">See more companies</a></li>
  </div>

  <div class="row">
  <div class="side">
    <h2>Explore Careers</h2>
    <h5>Careers Recommended for you:</h5>
    <div class="fakeimg" style="height:200px;">Image</div>
    <p>Based on your interests and profile</p>
    <li><a href="#">See more careers</a></li>
  </div>
    </body>
</html>