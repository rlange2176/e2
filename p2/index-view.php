<!doctype html>
<html lang='en'>

<head>
    <title>Jackpot | Project 2 | Becca Lange</title>
    <meta charset="utf-8">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/pure-min.css"
        integrity="sha384-cg6SkqEOCV1NbJoCu11+bm0NvBRc8IYLRGXkmNrqUBfTjmMYwNKPWBTIKyw9mHNJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://unpkg.com/purecss@2.0.3/build/grids-responsive-min.css" />
    <link rel="stylesheet" href="css/e2.css" />
</head>

<body>
    <div class="pure-g">
        <div class="pure-u-1 pure-u-lg-1-1">
            <h1 class="splash-head">Jackpot</h1>
            <img class="pure-img" src="img/slot_machine.png" alt="slot machine by sahua d from the Noun Project">
        </div>
        <div class="pure-u-1 pure-u-lg-1-2">
            <h2>Instructions:</h2>
            <ul>
                <li>You are Player 1. Select your fruit.</li>
                <li>The House selects fruits 2 and 3.</li>
                <li>Bananas are worth $100, cherries are $50, apples are $40, and lemons are $25. The
                    total of the fruits displayed in each round make up the Jackpot.</li>
                <li>If all 3 cards match, you win the Jackpot! If not, The House keeps the Jackpot.
                </li>
            </ul>
        </div>
        <div class="pure-u-1 pure-u-lg-1-2">
            <form method='GET' action='process.php'>
                <label for='fruit1'>Select your fruit:</label>
                <select id='fruit1' name='fruit1'>
                    <option>Choose One</option>
                    <option>Banana</option>
                    <option>Apple</option>
                    <option>Cherry</option>
                    <option>Lemon</option>
                </select>
                <button class="pure-button" type='submit'>Run Slot Machine</button>
            </form>
        </div>
        <?php if ($haveFruit) { ?>
        <div class="pure-u-1 pure-u-lg-1-2">
            <h2>Results:</h2>
            <ul>
                <li>You chose <?php echo $fruit1; ?>.</li>
                <li>The House selects <?php echo $fruit2; ?> and
                    <?php echo $fruit3; ?>.
                </li>
                <li><?php echo $winner; ?> wins $<?php echo $jackpot; ?>! Play again.</li>
            </ul>
        </div>
        <?php } ?>
    </div>
</body>

</html>