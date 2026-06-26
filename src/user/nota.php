<?php

    if (($nota_a == 'Nota') or ($nota_b == 'Nota') or ($nota_c == 'Nota') or ($nota_b == 'Nota') or ($nota_e == 'Nota')) {
        exit;
    }

    $media = ($nota_a + $nota_b + $nota_c + $nota_d + $nota_e) / 5;

    $fk = $_GET['id'];

    $sql = "INSERT INTO avaliacao(
                            nota,
                            fk_usuario  
                            ) 
                        VALUES (
                            $media,
                            $fk
                        )";

    echo "<br><br>";

    if ($conn->query($sql) === TRUE) {
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    mysqli_close($conn);

?>