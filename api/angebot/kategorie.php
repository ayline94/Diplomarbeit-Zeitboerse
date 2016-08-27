<?php

    $connect = mysqli_connect("localhost","root","root","zeitboerse");
    $result = mysqli_query($connect, "SELECT * FROM kategorie");
    $num = mysqli_query($connect, $result);
    echo $num;

    // Mitglieder ausgeben
    if(mysqli_num_rows($result) > 0):
    while($row = mysqli_fetch_array($result)):
?>

    <option value="<?php echo $row['idkategorie']; ?>" > <?php echo $row['text']; ?> </option>

<?php endwhile; endif; ?>
