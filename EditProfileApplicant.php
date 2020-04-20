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
        <title>Maintenance</title>
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
                <a class="nav-link" href="/applicantWelcome.php">Home </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/reporting">My Profile</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="/jobSearch.php">Job Search</a>
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
        
        <h1 style="margin-left:1%">Edit Profile</h1>
        <div class="card text-center">
			<div class="card-header">
				<ul class="nav nav-tabs card-header-tabs">
					<li class="nav-item">
                        <a class="nav-link" href="/profileManagement.php">My Profile</a>
					</li>
					<li class="nav-item">
                        <a class="nav-link active" href="/EditProfileApplicant.php.php">Edit Profile</a>
					</li>
				</ul>
			</div>
		<div class="card text-center">
			<div class="card-body">
				<div id="container">
                    <form action="/insert_company.php" method="post">
                        <div class=row style="margin-left:1%">
                            <div class="col-3">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="name">First Name</span>
                                    </div>
                                    <input type="text" class="form-control" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="last_name">Last Name</span>
                                    </div>
                                    <input type="text" class="form-control" id="last_name" name="last_name">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="input-group input-group-sm mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="resume">Resume</span>
                                    </div>
                                    <input type="text" class="form-control" id="resume" name="resume">
                                </div>
                            </div>
                            
                            <div class="col-3">
                                <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="email">Email</span>
                                    </div>
                                    <input type="email" class="form-control" id="email" name="resume">
                                </div>
                            </div>
                        </div>
                        <div class="row" style="margin-left:1%">
                        <div class="col-3">
                                <div class="input-group input-group-sm mb-3">
                                <div class="input-group-prepend">
                                        <span class="input-group-text" id="skills">Skills</span>
                                    </div>
                                    <input type="email" class="form-control" id="skills" name="skills">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="text-center">
                                    <img src="//placehold.it/100" class="avatar img-circle" alt="avatar">
                                    <h6>Upload a different photo...</h6>
                                    <input type="file" class="form-control" id="photo" name="photo">
                                </div>
                            </div>
                            
                        </div>
                        <br/>
                        <button type="submit" class="btn btn-primary">Update Profile</button>
                    </form>
                </div>
			</div>
        </div>
	</body>
</html>