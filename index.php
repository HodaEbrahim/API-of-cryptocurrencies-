<?php
    include("included/getApi.php");
?>
<!doctype html>
<html lang="en">
<head>
    <title>Task One</title>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
    <link href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet" integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

    <script
            src="https://code.jquery.com/jquery-3.3.1.min.js"
            integrity="sha256-FgpCb/KJQlLNfOu91ta32o/NMZxltwRo8QtmkMRdAu8="
            crossorigin="anonymous">
    </script>

    <style>
        .table .thead-dark th
        {
            width: 250px;
        }
    </style>
</head>

<body>
<br>
<div class="form-group  col-lg-4 float-left">
    <span>
        Show:
    </span>
    <select id="entries" class="custom-select col-lg-3">
        <option value="10" selected>10</option>
        <option value="20">20</option>
        <option value="30">30</option>
        <option value="50">50</option>
    </select>
    <span>
         entiries
    </span>
</div>
<div class="form-group row float-right">
    <label for="searchInput" class="col-form-label">Search</label>
    <div class="col-lg-9">
        <input type="email" class="form-control" id="searchInput">
    </div>
</div>

<select id="currency" class="custom-select col-lg-1">
    <option value="USD" selected>USD</option>
    <option value="LTC">LTC</option>
    <option value="EUR">EUR</option>
</select>

<select id="sortedBy" class="custom-select col-lg-1">
    <option value="name" selected>Name</option>
    <option value="price">price</option>
</select>
<select id="sortedTyp" class="custom-select col-lg-1">
    <option value="asc" selected>ASC</option>
    <option value="desc">DESC</option>
</select>


<table class="table table-hover" id="myTable">
    <thead class="thead-dark">
    <tr id="price">
        <th id="id" scope="col"># </th>
        <th id="rank" scope="col">Rank</th>
        <th id="name" scope="col">Name</th>
        <th  scope="col">Currency</th>
    </tr>
    </thead>
    <tbody id="data" >
    <?php for($i = $start; $i < $entries ; $i++) : ?>
        <tr>
            <th scope="row"><?php echo  $data["data"][$i]["id"] ?></th>
            <td><?php echo $data["data"][$i]["cmc_rank"] ?></td>
            <td><?php echo  $data["data"][$i]["name"] ?></td>
            <td><?php echo  $data["data"][$i]["quote"][$selectedCurrency]["price"] ?></td>
        </tr>
    <?php endfor; ?>
    </tbody>
</table>
<br>
<nav aria-label="Page navigation example" class="float-right">
    <ul class="pagination">
        <li class='page-item pre-page'><a class='page-link' href='javascript:void(0)'>Previous</a></li>
        <li class='page-item next-page'><a class='page-link' href='javascript:void(0)'> Next</a></li>
    </ul>
</nav>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<script src="js/script.js"></script>

</body>
</html>