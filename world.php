
<?php
$host = 'localhost';
$username = 'lab5_user';
$password = 'password123';
$dbname = 'world';
$country = $_GET['country'];




$conn = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $username, $password);

$stmt = $conn->query("SELECT * FROM countries WHERE name LIKE '%$country%'");
$country = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<?php if(!(isset($_GET['context']))):?>

   
<table>
    <div>
<thead>
   <th>Country Name</th>
   <th>Continent</th>
   <th>Independence Year</th>
   <th>Head of State</th>
</thead>
<tbody>
    <?php foreach ($country as $row): ?>
 <tr>
     <td> <?=$row['name']?></td>
     <td> <?=$row['continent']?></td>
     <td> <?=$row['independence_year']?></td>
     <td> <?=$row['head_of_state']?></td>
     
 </tr>   
  <?php endforeach; ?>  
    
</tbody>
</div>
</table>

<?php else : ?>

<table>
    <div>
<thead>
   <th>City Name</th>
   <th>District</th>
   <th>Population</th>
   
</thead>
<tbody>
    <?php foreach ($country as $row):
    $country_code = $row['code'];

    $sstmt= $conn->query("SELECT c.name, c.district, c.population 
    FROM cities c 
    INNER JOIN countries cs
    ON cs.code = c.country_code
    WHERE cs.code = '{$country_code}'");
  
    ?>
    <?php endforeach; ?>

    <?php foreach ($sstmt as $row):?>
  

 <tr>
     <td> <?=$row['name']?></td>
     <td> <?=$row['district']?></td>
     <td> <?=$row['population']?></td>  
 </tr>
    
    <?php endforeach; ?>  
    
</tbody>
</div>
</table>
<?php endif; ?>