<?php
$pdo = require_once "connection.php";
?>

<?php
$limit = 5;
if (isset($_GET['page'])){
    $page = $_GET['page'];
}else {
    $page = 1;
}
$offset = ($page - 1) * $limit;

$statement = $pdo->prepare("SELECT * FROM customersdetails LIMIT {$offset}, {$limit}");
$statement->execute();
$details = $statement->fetchAll(PDO::FETCH_ASSOC);


$statement = $pdo->prepare("SELECT * FROM customersdetails");
$statement->execute();
$records = $statement->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8"/>
    <meta
            name="viewport"
            content="width=device-width, initial-scale=1, shrink-to-fit=no"
    />
    <title>Bootstrap Simple Data Table</title>
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

        .table-responsive {
            margin: 30px 0;
        }

        .table-wrapper {
            min-width: 1000px;
            background: #fff;
            padding: 20px;
            box-shadow: 0 1px 1px rgba(0, 0, 0, 0.05);
        }

        .table-title {
            padding-bottom: 10px;
            margin: 0 0 10px;
            min-width: 100%;
        }

        .table-title h2 {
            margin: 8px 0 0;
            font-size: 22px;
        }

        .search-box {
            position: relative;
            float: right;
        }

        .search-box input {
            height: 34px;
            border-radius: 20px;
            padding-left: 35px;
            border-color: #ddd;
            box-shadow: none;
        }

        .search-box input:focus {
            border-color: #3fbae4;
        }

        .search-box i {
            color: #a0a5b1;
            position: absolute;
            font-size: 19px;
            top: 8px;
            left: 10px;
        }

        table.table tr th,
        table.table tr td {
            border-color: #e9e9e9;
        }

        table.table-striped tbody tr:nth-of-type(odd) {
            background-color: #fcfcfc;
        }

        table.table-striped.table-hover tbody tr:hover {
            background: #f5f5f5;
        }

        table.table th i {
            font-size: 13px;
            margin: 0 5px;
            cursor: pointer;
        }

        table.table td:last-child {
            width: 130px;
        }

        table.table td a {
            color: #a0a5b1;
            display: inline-block;
            margin: 0 5px;
        }

        table.table td a.view {
            color: #03a9f4;
        }

        table.table td button.edit {
            color: #ffc107;
        }

        table.table td button.delete {
            color: #e34724;
        }

        table.table td i {
            font-size: 19px;
        }

        .pagination {
            float: right;
            margin: 0 0 5px;
        }

        .pagination li a {
            border: none;
            font-size: 95%;
            width: 30px;
            height: 30px;
            color: #999;
            margin: 0 2px;
            line-height: 30px;
            border-radius: 30px !important;
            text-align: center;
            padding: 0;
        }

        .pagination li a:hover {
            color: #666;
        }

        .pagination li.active a {
            background: #03a9f4;
        }

        .pagination li.active a:hover {
            background: #0397d6;
        }

        .pagination li.disabled i {
            color: #ccc;
        }

        .pagination li i {
            font-size: 16px;
            padding-top: 6px;
        }

        .hint-text {
            float: left;
            margin-top: 6px;
            font-size: 95%;
        }
    </style>
    <script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
        });
    </script>
</head>

<body style="display: flex !important; flex-direction: column; justify-content: space-between; height: 100vh;">
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

<!-- Table Start -->
<div class="container-xl">
    <div class="table-responsive">
        <div class="table-wrapper">
            <div class="table-title">
                <div class="row">
                    <div class="col-sm-8">
                        <h2>Customer <b>Details</b></h2>
                    </div>
                </div>
            </div>
            <table class="table table-striped table-hover table-bordered">
                <thead>
                <tr>
                    <th>#</th>
                    <th>Name <i class="fa fa-sort"></i></th>
                    <th>Address</th>
                    <th>City <i class="fa fa-sort"></i></th>
                    <th>Pin Code</th>
                    <th>Country <i class="fa fa-sort"></i></th>
                    <th>Actions</th>
                </tr>

                </thead>
                <tbody>
                <?php foreach ($details as $i => $detail) : ?>

                    <tr>
                        <td><?php echo $i + 1 ?></td>
                        <td><?php echo $detail["name"] ?></td>
                        <td><?php echo $detail["address"] ?></td>
                        <td><?php echo $detail["city"] ?></td>
                        <td><?php echo $detail["pin_code"] ?></td>
                        <td><?php echo $detail["country"] ?></td>
                        <td class="d-flex flex-row">
                            <a href="view.php?id=<?php echo $detail['id'] ?>" class="view" title="View"
                               data-toggle="tooltip"
                            ><i class="material-icons">&#xE417;</i></a
                            >
                            <form class="d-flex flex-row" method="get" action="update.php">

                                <input type="hidden" name="id" value="<?php echo $detail['id'] ?>">
                                <button class="edit mr-2" title="Edit" data-toggle="tooltip" type="submit"
                                        style="outline: none !important;  border: none !important; background-color: transparent;">
                                    <i class="material-icons">&#xE254;</i></button
                                >
                            </form>
                            <form class="d-flex flex-row" method="post" action="delete.php">
                                <input type="hidden" name="id" value="<?php echo $detail['id'] ?>">
                                <button type="submit"
                                        class="delete"
                                        title="Delete"
                                        data-toggle="tooltip"
                                        style="outline: none !important;  border: none !important; background-color: transparent;"
                                ><i class="material-icons">&#xE872;</i></button>
                            </form>

                        </td>
                    </tr>
                <?php
                endforeach;
                ?>
                </tbody>
            </table>
            <!-- Table End -->

            <div class="clearfix">
                <div class="hint-text">
                    Showing <b><?php echo sizeof($details)?></b> out of <b><?php echo sizeof($records)?></b> entries
                </div>
                <?php

                if(sizeof($records) > 0){
                    $totalRecords = sizeof($records);
                    $totalPages = ceil($totalRecords / $limit);
                    echo "<ul class='pagination'>";

                    if($page > 1 ){

                        echo '<li class="page-item">
                        <a href="index.php?page='.($page - 1).'" class="page-link"
                        ><i class="fa fa-angle-double-left"></i></a>
                    </li>';
                    }

                    for($a = 1; $a <=$totalPages; $a++){
                        if($a == $page){
                            $active = "page-item active";
                        }else{
                            $active = "page-item";
                        }
                        echo "<li class='{$active}'><a href='index.php?page={$a}' class='page-link'>{$a}</a></li>";
                    }

                    if($totalPages > $page){
                        echo '<li class="page-item">
                        <a href="index.php?page='.($page + 1).'" class="page-link"
                        ><i class="fa fa-angle-double-right"></i
                            ></a>
                    </li>';
                    }

                    echo "</ul>";
                }
                ?>

            </div>
        </div>
    </div>
</div>
<?php require_once "./footer.php" ?>

<!-- Javascript -->
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
</body>
</html>
