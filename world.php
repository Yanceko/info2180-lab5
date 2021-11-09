<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123'; 
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
//$stmt = $conn->query("SELECT * FROM countries");

//$results = $stmt->fetchAll(PDO::FETCH_ASSOC);

$country = filter_input(INPUT_GET, "country", FILTER_SANITIZE_STRING);
$context = filter_input(INPUT_GET, "context", FILTER_SANITIZE_STRING);
$my_country = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$results = $my_country->fetchAll(PDO::FETCH_ASSOC);




?>

<?php if(isset($country)&&(!isset($context))):?>
  <table class = "display">
      <caption><h2>TABLE SHOWING COUNTRIES<h2></caption>
    <thead>
      <tr>
          <th class = "mth1">Name</th>
          <th class = "mth2">Continent</th>
          <th class = "mth3">Independence</th>
          <th class = "mth4">Head of State</th>
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