<?php 
    // struktur kontrol di php
    echo "<h1>struktur kontrol di php</h1>";

    // switch
    echo "<h2>ini switch</h2>";

    $role = "budi";

    switch ($role) {
        case "admin":
            echo "selamat datang admin <br/>";
            break;
        case "user":
            echo "selamat datang user <br/>";
            break;
        default:
            echo "selamat datang $role <br/>";
            break;
    }

    // match
    echo "<h2>ini match</h2>";

    $role = "admin";
    $greeting = match ($role) {
        "admin" => "selamat datang admin <br/>",
        "user" => "selamat datang user <br/>",
        default => "akses tidak dikenali : $role <br/>"
    };
    echo $greeting;

    // loop (for, while, do while, foreach)
    
    // for
    echo "<h2>ini for loop</h2>";

    for ($i=1; $i <= 10; $i++) { 
        echo "$i <br/>";
    }

    // while
    echo "<h2>ini while loop</h2>";

    $a = 0;
    while ($a <= 10) {
        echo "$a </br>";
        $a++;
    }

    // do while
    echo "<h2>ini do while loop</h2>";

    $b = 5;
    do {
        echo $b . "</br>";
        $b++;
    } while ($b <= 10);

    // foreach (biasanya utk array)
    echo "<h2>ini foreach loop</h2>";

    $array = ["apple", "banana", "orange"];
    foreach ($array as $value) {
        echo $value . "</br>";
    }


    // function & array php
    echo "<h1>function & array php</h1>";
    
    // function
    echo "<h2>function</h2>";

    
    function tambah($a, $b) {
        return $a + $b;
    }

    $a = 10;
    $b = 20;

    echo "Hasil dari ".$a." + ".$b." adalah ".tambah(10, 20);

    // array
    echo "<h2>array</h2>";
    
    // indexed array
    echo "<h3>indexed array</h3>";

    $array = [1,2,3,4];
    echo $array[0];
    echo "</br>";
    echo $array[3];
    
    // associative array
    echo "<h3>associative array</h3>";

    $array_a = ["name"=>"budi", "umur"=>17];
    
    echo $array_a["name"];

    // multidimensional array
    echo "<h3>multidimensional array</h3>";
    
    $array_a = [
        ["name"=>"budi", "umur"=>17],
        ["name"=>"agus", "umur"=>30]
    ];
    
    echo $array_a[1]["name"];

    // update, add, remove, sorting array
    echo "<h3>update, add, remove, sorting array</h3>";
    
    $array_a = [
        ["name"=>"budi", "umur"=>17],
        ["name"=>"agus", "umur"=>30]
    ];
    
    $array_a[0]["umur"] = 20; // update umur budi
    $array_a[] = ["name"=>"joko", "umur"=>35]; // tambah data array baru
    unset($array_a[1]); // menghapus index array 1 (agus)


    foreach ($array_a as $key => $value) {
        echo "nama : ".$value["name"]." umur : ".$value["umur"]."</br>";
    }

    // echo $array_a[0]["umur"];

    $array_sort = [1,8,20,5,67,100,7,26,9,3,2,10];
    sort($array_sort); // sorting array

    echo "jumlah array: ".count($array_sort) . "</br>"; // counting array

    array_push($array_sort, 50); // array_push (manambahkan elemen ke akhir array)

    array_pop($array_sort); // array_pop (menghapus elemen terakhir dari array)

    foreach ($array_sort as $value) {
        echo $value . "</br>"; // menampilkan sorting array
    }

    
?>