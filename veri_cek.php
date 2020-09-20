<?php 
header('Content-type: application/json'); // Tarayıcıdan girdiğimizde JSON formatında görelim.

$db = new SQLite3('veritabanimiz.db'); //SQLite veritabanımıza bağlanalım.

$jsonDizisi = array(); // JSON Dizimizi Oluşturalım.

$sayac = 0; // İndis sayacımız

$results = $db->query('SELECT * FROM kisiler'); //Kişiler tablomuzdan tüm verileri çekelim.

while ($row = $results->fetchArray()) { // Satır satır verileri çektik.

    $jsonDizisi['kisiler'][$sayac]['id'] = $row["id"]; // json dizimizin kisiler -> indis -> id değerine çektiğimiz değeri atadık.
    $jsonDizisi['kisiler'][$sayac]['isim'] = $row["isim"]; // json dizimizin kisiler -> indis -> isim değerine çektiğimiz değeri atadık.
    $jsonDizisi['kisiler'][$sayac]['soyisim'] = $row["soyisim"]; // json dizimizin kisiler -> indis -> soyisim değerine çektiğimiz değeri atadık.
    $jsonDizisi['kisiler'][$sayac]['yas'] = $row["yas"]; // json dizimizin kisiler -> indis -> yas değerine çektiğimiz değeri atadık.
    $jsonDizisi['kisiler'][$sayac]['cinsiyet'] = $row["cinsiyet"]; // json dizimizin kisiler -> indis -> cinsiyet değerine çektiğimiz değeri atadık.

    $sayac++; // İndis sayacımızı arttırdık.
}

echo json_encode($jsonDizisi); //json dizimizi json formatına encode edip yazdırdık.
?>