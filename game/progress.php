<?php
require_once('../connection.php');

if (!isset($_SESSION['user_id'])) {
    die("You must be logged in to access this page.");
}

$user_id = $_SESSION['user_id'];

// Fetch user information
$query = "SELECT username, avatar, planet, levels_completed, sessions_completed_today, coins, current_streak FROM users WHERE id = :user_id";
$stmt = $connection->prepare($query);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

// Function to check if user owns an avatar or planet
function userOwns($table, $user_id, $item_id, $connection)
{
    $query = "SELECT * FROM $table WHERE user_id = :user_id AND id = :item_id";
    $stmt = $connection->prepare($query);
    $stmt->bindParam(':user_id', $user_id);
    $stmt->bindParam(':item_id', $item_id);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_ASSOC);
}


// Function to handle purchase
function handlePurchase($table, $item_id, $user_id, $cost, $column, $connection, $item_name)
{
    global $user;

    if ($user['coins'] >= $cost) {
        // Deduct coins
        $update_coins = "UPDATE users SET coins = coins - :cost WHERE id = :user_id";
        $stmt = $connection->prepare($update_coins);
        $stmt->bindParam(':cost', $cost);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        // Add item to user's inventory
        $insert_item = "INSERT INTO user_{$table} (user_id, id) VALUES (:user_id, :item_id)";
        $stmt = $connection->prepare($insert_item);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->bindParam(':item_id', $item_id);
        $stmt->execute();

        // Update user's current avatar/planet
        $update_user = "UPDATE users SET $column = :item WHERE id = :user_id";
        $stmt = $connection->prepare($update_user);
        $stmt->bindParam(':item', $item_name);
        $stmt->bindParam(':user_id', $user_id);
        $stmt->execute();

        return "You have successfully purchased and equipped a new $column!";
    } else {
        return "You do not have enough coins.";
    }
}

// Handle avatar purchase request
if (isset($_POST['avatar_id'])) {
    $avatar_id = $_POST['avatar_id'];

    // Check if the avatar exists and fetch its cost
    $avatar_query = "SELECT * FROM avatars WHERE id = :avatar_id";
    $stmt = $connection->prepare($avatar_query);
    $stmt->bindParam(':avatar_id', $avatar_id);
    $stmt->execute();
    $avatar = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($avatar) {
        // Check if user already owns the avatar
        if (!userOwns('user_avatars', $user_id, $avatar_id, $connection)) {
            echo handlePurchase('avatars', $avatar_id, $user_id, $avatar['cost'], 'avatar', $connection, $avatar['avatar_name']);
        } else {
            // Equip the avatar
            $update_user_avatar = "UPDATE users SET avatar = :avatar WHERE id = :user_id";
            $stmt = $connection->prepare($update_user_avatar);
            $stmt->bindParam(':avatar', $avatar['avatar_image']); // Update with avatar name
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            // echo "Avatar equipped successfully!";
            header('location:progress.php');
            exit;
        }
    } else {
        echo "Avatar not found.";
    }
}

// Handle planet purchase request
if (isset($_POST['planet_id'])) {
    $planet_id = $_POST['planet_id'];

    // Check if the planet exists and fetch its cost
    $planet_query = "SELECT * FROM planets WHERE id = :planet_id";
    $stmt = $connection->prepare($planet_query);
    $stmt->bindParam(':planet_id', $planet_id);
    $stmt->execute();
    $planet = $stmt->fetch(PDO::FETCH_ASSOC);

    if ($planet) {
        // Check if user already owns the planet
        if (!userOwns('user_planets', $user_id, $planet_id, $connection)) {
            echo handlePurchase('planets', $planet_id, $user_id, $planet['cost'], 'planet', $connection, $planet['planet_name']);
        } else {
            // Equip the planet
            $update_user_planet = "UPDATE users SET planet = :planet WHERE id = :user_id";
            $stmt = $connection->prepare($update_user_planet);
            $stmt->bindParam(':planet', $planet['planet_image']); // Update with planet name
            $stmt->bindParam(':user_id', $user_id);
            $stmt->execute();
            // echo "Planet equipped successfully!";
            header('location:progress.php');
            exit;
        }
    } else {
        echo "Planet not found.";
    }
}
?>



<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Profile</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="icon" href="../images/logo.jpg" />

    <style>
        .profile-img {
            width: 100%;
            height: 100%;
        }

        img {
            width: 60%;
            height: 60%;
        }

        .bg-black {
            background: #000;
        }

        .skill-block {
            width: 30%;
        }

        @media (min-width: 991px) and (max-width:1200px) {
            .skill-block {
                padding: 32px !important;
            }
        }

        @media (min-width: 1200px) {
            .skill-block {
                padding: 56px !important;
            }
        }

        body {
            background-image: url('../images/bg2.jpg');
        }
    </style>


</head>

<body>

    <div class="container mt-5 mb-5">
        <div class="row no-gutters">
            <div class="col-md-4 col-lg-4"><img class="profile-img" src="avatars/<?= htmlspecialchars($user['avatar']); ?>" alt="Avater"></div>
            <div class="col-md-8 col-lg-8">
                <div class="d-flex flex-column">
                    <div class="d-flex flex-row justify-content-between align-items-center p-5 bg-dark text-white mt-3">
                        <h3 class="display-5"><?= htmlspecialchars($user['username']); ?></h3><i class="fa fa-facebook"></i><i class="fa fa-google"></i><i class="fa fa-youtube-play"></i><i class="fa fa-dribbble"></i><i class="fa fa-linkedin"></i>
                    </div>
                    <div class="d-flex flex-row text-white mt-4">
                        <div class="bg-primary text-center skill-block">
                            <h5>Planet</h5>
                            <img src="planets/<?= htmlspecialchars($user['planet']); ?>" alt="Planet"
                                class="img-fluid w-100">
                        </div>
                        <div class="p-3 bg-success text-center skill-block">
                            <h4>Levels Completed:</h4>
                            <h6> <?= htmlspecialchars($user['levels_completed']); ?> </h6>
                        </div>
                        <div class="p-3 bg-info text-center skill-block">
                            <h4>Coins:</h4>
                            <h6> <?= htmlspecialchars($user['coins']); ?> </h6>
                        </div>
                        <div class="p-3 bg-primary text-center skill-block">
                            <h4>Streak:</h4>
                            <h6> <?= htmlspecialchars($user['current_streak']); ?> </h6>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <div class="container mt-5 mb-5">
        <!-- Customization Section -->
        <div class="customization-options ">
            <h4 class="text-info text-uppercase border-info rounded pl-5 mb-0">Avatars</h4>
            <div class="row border border-info rounded p-4 m-4" style="background: rgba(0, 0, 0, .2) ">
                <?php
                // Fetch all avatars
                $avatar_query = "SELECT * FROM avatars";
                $stmt = $connection->query($avatar_query);
                $avatars = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($avatars as $avatar): ?>
                    <div class="col-md-2 m-2 p-2">
                        <img src="avatars/<?= htmlspecialchars($avatar['avatar_image']); ?>" alt="Avatar">
                        <p class="text-white"><?= htmlspecialchars($avatar['avatar_name']); ?> (<?= htmlspecialchars($avatar['cost']); ?>
                            coins)</p>
                        <form method="POST">
                            <input type="hidden" name="avatar_id" value="<?= htmlspecialchars($avatar['id']); ?>">
                            <button type="submit" class="btn btn-outline-danger">Buy/Equip</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>

            <h4 class="text-info text-uppercase border-info rounded pl-5 mb-0">Planets</h4>
            <div class="row border border-info rounded p-4 m-4 " style="background: rgba(0, 0, 0, .6) ">
                <?php
                // Fetch all planets
                $planet_query = "SELECT * FROM planets";
                $stmt = $connection->query($planet_query);
                $planets = $stmt->fetchAll(PDO::FETCH_ASSOC);

                foreach ($planets as $planet): ?>
                    <div class="col-md-2 m-2 p-2">
                        <img src="planets/<?= htmlspecialchars($planet['planet_image']); ?>" alt="Planet">
                        <p class="text-white"><?= htmlspecialchars($planet['planet_name']); ?> (<?= htmlspecialchars($planet['cost']); ?>
                            coins)</p>
                        <form method="POST">
                            <input type="hidden" name="planet_id" value="<?= htmlspecialchars($planet['id']); ?>">
                            <button type="submit" class="btn btn-outline-danger">Buy/Equip</button>
                        </form>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>

    <center>
        <a href="../index.php" class="btn btn-outline-warning btn-block m-3">Back To Home Page</a>
    </center>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>