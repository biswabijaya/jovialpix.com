<li class="rd-nav-item active"><a class="rd-nav-link" href="#home">Home</a></li>
<?php
if($result = mysqli_query($mysqli, "SELECT * From products where category='Website' and subcategory='Customisable' order by id asc")){
while($res = mysqli_fetch_array($result)){
  echo '<li class="rd-nav-item"><a class="rd-nav-link" href="#psectionid'.$res['id'].'">'.$res['name'].'</a></li>';
  }
}
?>
<li class="rd-nav-item"><a class="rd-nav-link" href="#contacts-us">Contact</a></li>
