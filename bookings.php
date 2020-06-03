<?php
include_once __DIR__ . "/partials/bookings/server.php";

// Head
include_once __DIR__ . "/partials/templates/head.php";
?>

<main class="container">
    <div class="row">
        <div class="col-12">
            <header class="my-4">
                <h1 class="text-primary">Hotel Bookings</h1>
            </header>

            <table class="table">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>ID ROOM</th>
                        <th>CREATED</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>

                <tbody>
                    <?php 
                        foreach ($bookings as $booking) { ?>
                        <tr>
                            <td><?php echo $booking["id"]; ?></td>
                            <td><?php echo $booking["stanza_id"]; ?></td>
                            <td><?php echo $booking["created_at"]; ?></td>
                            <td><a href="#" class="text-success">View</a></td>
                            <td><a href="#" class="text-primary">Update</a></td>
                            <td><a href="#" class="text-danger">Delete</a></td>
                        </tr>
                        <?php } ?>


                </tbody>
            </table>
        </div>
    </div>

</main>

<?php
include_once __DIR__ . "/partials/templates/footer.php";
?>