<body>

    <?php
    $host = "sql207.infinityfree.com";
    $user = "if0_40040294";
    $pass = "Gagan123Shah";
    $dB = "if0_40040294_gndpolyo_web";

    $con = mysqli_connect($host, $user, $pass, $dB);
    $qry = "SELECT * FROM lib_news ORDER BY sr_no DESC";
    $res = mysqli_query($con, $qry);
    while ($r = mysqli_fetch_array($res)) {
        echo "<ul>";
        echo "<li><b>(" . $r[1] . ")</b> - <span class='fw-bold text-primary'>" . $r[2] . "</span> - ";
        echo "$r[3]</li>";
        echo "</ul>";
    }
    ?>
</body>
