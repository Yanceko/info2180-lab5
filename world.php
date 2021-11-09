
<?php
header('Access-Control-Allow-Origin: *');
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123'; 
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);


$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$context = filter_input(INPUT_GET, "context", FILTER_SANITIZE_STRING);
$my_country = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $my_country->fetchAll(PDO::FETCH_ASSOC);

$q_city= $conn->query("SELECT cities.name, cities.district, cities.population
FROM cities LEFT JOIN countries ON countries.code = cities.country_code
WHERE countries.name LIKE '%$country%'");
$city = $q_city->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if(isset($country)&&(!isset($context))):?>
  <table class = "display">
      <caption><h2>TABLE SHOWING COUNTRIES<h2></caption>
    <thead>
      <tr>
          <th class = "row1">Name</th>
          <th class = "row2">Continent</th>
          <th class = "row3">Independence</th>
          <th class = "row4">Head of State</th>
      </tr>
    </thead>
    <tbody>
        <?php foreach ($results as $country): ?>
          <tr>
            <td><?php echo $country["name"]; ?></td>
            <td><?php echo $country["continent"]; ?></td>
            <td><?php echo $country["independence_year"]; ?></td>
            <td><?php echo $country["head_of_state"]; ?></td>
          </tr>
        <?php endforeach; ?>
    </tbody>
  </table>
<?php endif; ?>

<?php if (isset($context)):?>
  <table class = "display">
    <caption><h2>TABLE SHOWING CITIES</h2></caption>
    <thead>
      <tr>
        <th class = "tb1">Name</th>
        <th class = "tb2">District</th>
        <th class = "tb3">Population</th>
      </tr>
    </thead>
    <tbody>
      <?php foreach ($city as $city): ?>
        <tr>
          <td><?php echo $city["name"]; ?></td>
          <td><?php echo $city["district"]; ?></td>
          <td><?php echo $city["population"]; ?></td>
        </tr>
      <?php endforeach; ?>
    </tbody>
  </table>
<?php endif ?>


