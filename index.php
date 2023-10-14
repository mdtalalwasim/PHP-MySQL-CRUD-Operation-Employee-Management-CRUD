<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Employee Management CRUD | PHP CRUD</title>

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css
">



<style>

/* for showing validation msg red */
*{
	padding: 0px;
	margin:0px;
}
.navbar{
	margin: 0px;
}
.error {
	color: red;
	font-style: italic;
}

.mycolor{
	background: #748EC6;
}
.text-w{
	color:#748EC6;
}
.background-color-w{
	color:#F2F5FA;
}

.section-bg {
    background-color: #f2f5fa;
    padding: 0px;
    margin: 0px;
}

.card-shadow{
    background-color: #ffffff;
    border-radius: 10px;
    box-shadow: 0px 5px 20px rgba(0, 0, 0, 0.1);
    padding: 30px;

}

</style>

</head>

<body>



<nav class="navbar navbar-expand-lg navbar-dark mycolor">
		<a class="navbar-brand" href="index.php">Employee Management</a>
		<button class="navbar-toggler" type="button" data-toggle="collapse"
			data-target="#navbarSupportedContent"
			aria-controls="navbarSupportedContent" aria-expanded="false"
			aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>

		<div class="collapse navbar-collapse" id="navbarSupportedContent">
			<ul class="navbar-nav mr-auto">
				<li class="nav-item active"><a class="nav-link" href="index.php">Home
						
				</a></li>
				<li class="nav-item active"><a class="nav-link" href="./create-new-employee.php">Add
						Employee</a></li>
				<li class="nav-item dropdown"><a
					class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
					role="button" data-toggle="dropdown" aria-haspopup="true"
					aria-expanded="false"> Dropdown </a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdown">
						<a class="dropdown-item" href="#">Action</a> <a
							class="dropdown-item" href="#">Another action</a>
						<div class="dropdown-divider"></div>
						<a class="dropdown-item" href="#">Something else here</a>
					</div></li>
					<li class="nav-item"><a class="nav-link disabled" href="#">Disabled</a>
				</li>
			</ul>
			 
		</div>
	</nav>

    <div class="container my-5">
        <h2 class="text-center">List of Employees</h2>
        <a href="./create-new-employee.php" role="button" class="btn btn-primary">New Employee</a>
        <br>


        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Name </th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Created At</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php
                //connect to database
                $servername = "localhost";
                $username = "root";
                $password = "";
                $database = "php_employee_management";

                //Create Connection
                $connection = new mysqli($servername, $username, $password, $database);

                //Check connection stablished or not!
                if ($connection->connect_error) {
                    die("Connection failed: " . $connection->connect_error);
                } else {
                    //echo "Connection Stablished";
                    //read all data from database table for employee details
                    $sql = "SELECT * from employee";
                    $result = $connection->query($sql);
                }



                if (!$result) {
                    die("Invalid query : " . $connection->error);
                } else {
                    //echo "I am ok";
                    //read data of each row
                    while ($row = $result->fetch_assoc()) {
                        # code...
                        echo "
                        <tr>
                            <td>$row[id]</td>
                            <td>$row[name]</td>
                            <td>$row[email]</td>
                            <td>$row[phone]</td>
                            <td>$row[address]</td>
                            <td>$row[created_at]</td>
                            <td>
                                <a href='./edit-employee.php?id=$row[id]' class='btn btn-primary btn-sm'>Edit</a>
                                <a href='./delete-employee.php?id=$row[id]' class='btn btn-danger btn-sm'>Delete</a>
                            </td>
                    </tr>
                    ";
                    }
                }





                ?>

            </tbody>
        </table>
    </div>
</body>
<!-- test change -->
</html>