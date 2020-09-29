<!doctype html>
<html lang='en'>

<head>
    <title>Project 1 - Becca Lange</title>
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
                <li>Player 1 selects the first card.</li>
                <li>The House selects cards 2 and 3.</li>
                <li>Fruit values are: bananas = $100, cherries = $50, apples = $40, plums = $25, peaches = $20, limes =
                    $10, and lemons = $5.
                <li>If all 3 cards match, Player 1 wins the Jackpot! If not, The House keeps the Jackpot. Play again!
                </li>
            </ul>
        </div>
        <div class="pure-u-1 pure-u-lg-1-2">
            <h2>Results:</h2>
            <ul>
                <li>Player 1 selects <?php echo $fruit1; ?>.</li>
                <li>The House selects <?php echo $fruit2; ?> and
                    <?php echo $fruit3; ?>.
                </li>
                <li><?php echo $winner; ?> wins $<?php echo $jackpot; ?>! Play again.</li>
            </ul>
            <p><a class="pure-button" href="http://e2p1.beccalange.me">Play Again</a></p>
        </div>
    </div>
</body>

</html>