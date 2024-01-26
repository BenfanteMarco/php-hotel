<?php

    $hotels = [

        [
            'name' => 'Hotel Belvedere',
            'description' => 'Hotel Belvedere Descrizione',
            'parking' => true,
            'vote' => 4,
            'distance_to_center' => 10.4
        ],
        [
            'name' => 'Hotel Futuro',
            'description' => 'Hotel Futuro Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 2
        ],
        [
            'name' => 'Hotel Rivamare',
            'description' => 'Hotel Rivamare Descrizione',
            'parking' => false,
            'vote' => 1,
            'distance_to_center' => 1
        ],
        [
            'name' => 'Hotel Bellavista',
            'description' => 'Hotel Bellavista Descrizione',
            'parking' => false,
            'vote' => 5,
            'distance_to_center' => 5.5
        ],
        [
            'name' => 'Hotel Milano',
            'description' => 'Hotel Milano Descrizione',
            'parking' => true,
            'vote' => 2,
            'distance_to_center' => 50
        ],

    ];

$filtered_hotels = $hotels;

if (isset($_GET['parking']) && $_GET['parking'] != '') {

    $newHotels = [];
    $parking = $_GET['parking'];
    $parking = filter_var($parking, FILTER_VALIDATE_BOOLEAN);

    foreach ($filtered_hotels as $hotel) {
        if ($hotel['parking'] == $parking) {
            $newHotels[] = $hotel;
        };
    }

$filtered_hotels = $newHotels;
}


?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
    <title>php-hotel</title>
</head>
<body>
    <?php include './header.php' ?>
    <div class="container-fluid bg-black ">
        <div class="row">
            <div class="col-6 mt-4">
                <form action="./index.php" method="GET">
                    <div>
                        <label for="parking" class=" form-label text-white">Parking:</label>
                        <select class="w-25 form-select " name="parking" id="parking">
                            <option value="">Parking</option>
                            <option value="true">Yes</option>
                            <option value="false">No</option>
                        </select>
                        <div class="pt-4">
                            <button type="submit" class="btn btn-secondary">Filtra</button>
                        </div>
                    </div>
                </form>
            </div>
            <div class="col-12 mt-5">
                <table class="table text-center">
                    <thead>
                        <tr>
                            <th>Nome</th>
                            <th>Descrizione</th>
                            <th>Parcheggio</th>
                            <th>Voto</th>
                            <th>Distanza dal centro</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($filtered_hotels as $hotel) { ?>
                            <tr>
                                <td> <?php echo $hotel['name'] ?></td>
                                <td> <?php echo $hotel['description'] ?></td>
                                <td> <?php echo $hotel['parking'] == true ? 'Si' : 'No' ?></td>
                                <td> <?php echo $hotel['vote'] ?></td>
                                <td> <?php echo $hotel['distance_to_center'] ?></td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <?php include './footer.php' ?>
</body>
</html>