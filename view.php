<?php
$pdo =  require_once "connection.php";
?>

<?php


$id = $_GET['id'] ?? null;

if (!$id) {
    header('Location: index.php');
    exit;
}

$statement = $pdo->prepare('SELECT * FROM customersdetails WHERE id = :id');
$statement->bindValue(':id', $id);
$statement->execute();
$details = $statement->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8" />
    <meta
        name="viewport"
        content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Assignment No 2</title>
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Roboto"
    />
    <link
        rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
    />
    <link
        rel="stylesheet"
        href="https://fonts.googleapis.com/icon?family=Material+Icons"
    />
    <link
        rel="stylesheet"
        href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css"
    />

    <style>
        body {
            color: #566787;
            background: #009fff; /* fallback for old browsers */
            background: -webkit-linear-gradient(
                    to right,
                    #ec2f4b,
                    #009fff
            ); /* Chrome 10-25, Safari 5.1-6 */
            background: linear-gradient(
                    to right,
                    #ec2f4b,
                    #009fff
            ); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */

            background-size: 1000%;
            animation: bg-animation 50s infinite alternate;
            font-family: "Roboto", sans-serif;
        }

        @keyframes bg-animation {
            0% {
                background-position: left;
            }

            100% {
                background-position: right;
            }
        }
        nav {
            background: linear-gradient(to right, #ffffff00, #ffffff00) !important;
        }
        table{
            color: white !important;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body>
<!-- Navbar -->

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container">
        <a class="navbar-brand" href="index.php">Customer Details Service</a>
        <button
            class="navbar-toggler"
            type="button"
            data-toggle="collapse"
            data-target="#navbarNav"
            aria-controls="navbarNav"
            aria-expanded="false"
            aria-label="Toggle navigation"
        >
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a
                        class="btn btn-success mt-2 nav-link"
                        style="color: #ffff !important"
                        href="insert.php"
                    >Add Customer Details <span class="sr-only">(current)</span></a
                    >
                </li>
            </ul>
        </div>
    </div>
</nav>

<!-- Navbar End -->
<div class="container">
    <h1 style="color: white;" class="display-2 mb-5 mt-5">ID: <?php echo $details[0]['id'] ?></h1>
    <table class="table">
        <thead>
        <tr>
            <th scope="col">Name</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo "<h2>"; echo $details[0]["name"]; echo "</h2>"; ?></td>
        </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>

            <th scope="col">Address</th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo "<h2>"; echo $details[0]["address"]; echo "</h2>"; ?></td>
        </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>

            <th scope="col">City</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo "<h2>"; echo $details[0]["city"]; echo "</h2>"; ?></td>
        </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>

            <th scope="col">Pin Code</th>

        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo "<h2>"; echo $details[0]["pin_code"]; echo "</h2>"; ?></td>
        </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>
            <th>
                Country
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo "<h2>"; echo $details[0]["country"]; echo "</h2>"; ?></td>
        </tr>
        </tbody>
    </table>
    <table class="table">
        <thead>
        <tr>
            <th>
                Description
            </th>
        </tr>
        </thead>
        <tbody>
        <tr>
            <td><?php echo "<h3>"; echo $details[0]["description"]; echo "</h3>"; ?></td>
        </tr>
        </tbody>
    </table>
</div>
<?php require_once "./footer.php" ?>
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
