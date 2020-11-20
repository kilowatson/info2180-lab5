<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';

$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);
$country = $_GET['country'];
$context = $_GET['context'];
$stmt;
if($context == "cities"){
$stmt = $conn->query("SELECT cities.district, cities.population, cities.name 
FROM cities 
INNER JOIN countries ON cities.country_code=countries.code WHERE countries.name LIKE '%$country%'");
}
else{
    $stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
    
}


$results = $stmt->fetchAll(PDO::FETCH_ASSOC);


?>
<?php if($context == "countries"):?>
<table>
  <tr>
    
    <td>Name</td>
    <td>Continent</td>
    <td>Independence</td>
    <td>Head of State</td>
    
  </tr>
 <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['continent']; ?></td>
      <td><?= $row['independence_year']; ?></td>
      <td><?= $row['head_of_state']; ?></td>
  </tr>

<?php endforeach; ?>
</table>
 <?php endif; ?>

 <?php if($context == "cities"):?>
  <table>
  <tr>
    
    <td>Name</td>
    <td>District</td>
    <td>Population</td>
    
  </tr>
 <?php foreach ($results as $row): ?>
    <tr>
      <td><?= $row['name']; ?></td>
      <td><?= $row['district']; ?></td>
      <td><?= $row['population']; ?></td>
    
  </tr>

<?php endforeach; ?>
</table>

  <?php endif; ?>

