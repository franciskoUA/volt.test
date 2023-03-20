<?php 

    /* Bank list reqeust */
    $headers = array(
        'Authorization: Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJpYXQiOjE2NzkxMzQ0NzksImV4cCI6MTY3OTIyMDg3OSwicm9sZXMiOlsiUk9MRV9NRVJDSEFOVF9BUEkiXSwidXNlcm5hbWUiOiJhdmU2MzdiNDM2ZmFkZmYwMS44NjUyNzkyOEB2b2x0LmlvIiwiZW52aXJvbm1lbnQiOiJzYW5kYm94IiwidHlwZSI6ImFwaSIsImNsaWVudF9pZCI6IjAwZGY2MjNmLWZiMGMtNGM1YS1iMmE3LTg4ZDQ2OWQwODgwOSIsImN1c3RvbWVyX2lkIjoiYzkyNWFjYmItNzVhNi00NTFhLWEzZmEtNzM3ZWI5YWJjMDcwIiwidXNlcl9pZCI6bnVsbCwidm9sdF9lbXBsb3llZSI6ZmFsc2UsImlkIjoiM2E4NTY2ZjQtOTA5YS00NzA3LTk2MWQtOTdkMzI2MGQyZGM2In0.bV_pSfX_wlvhRih7ndhjgxGut6_Nze4Gr75YaLmSwNPxVeJLsn72TSS7f13i2UhtVNVaGoi6gp3UoXIs_gOtSvjbwcsJHSvDqemPp_glsdEvdA2WLtsi4NSm0JK8pXqZMEl90Lgye0AMSgKwDbMeTZ9gxpYgj-FRyq4EznakJyhQBtC9F3ZUhv_LHVgyqdS62CGPDD-__jzLrZZkPOUvJSkOsJZrhNaCasGVYl5I3g9KVzCfaXM-3X6yZqgO8mhfQwezeLf0yEPL7WhB6-06tCkd3D7Qe5fJFiZ2o8KIhCapxRae7WBKvUD4fgzaDgWOSjyvfk2DhxHyJ_TnRcT6INivzpq5fopLjEYulN3ouQqVvTtFsMusNalFjv7VabNLfehAOyqobtYpjTluGPAY8vt1XDRqqKg-kX7Y4gDvcqRfE3hEP90JmL9akXcXELmv4aTF-QluMzMGrP1NXc6CVwUiq4TdFf54OkSkmaplwVS_fFWICyqUeEzb4SAUCA75223My3GkHMf0wa-RsHGk8Nrw1K9EkEzGhw-wyb2fD-ONay8lwUQeSiUjwhkmLN7HgcAXP55MO0SldRJU5oygr2FcV_WAbNWKNaX4OBj2YnSr52dhoqgUueZNZSgEFEEfHvjj1gYA8mOW8FVA1LjI9_caqe6tT0RXrZR7pNcMZQw',
        'Content-Type: application/json',
    );

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, 'https://api.sandbox.volt.io/banks');
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        echo 'Error:' . curl_error($ch);
    }
    curl_close($ch);
    $result_parse = json_decode($response, TRUE);
   
    echo "<pre>";
    var_dump($result_parse);
    echo "</pre>";
?>