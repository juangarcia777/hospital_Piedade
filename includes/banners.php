
<div class="content2">
<div class="banners">

<div class="cycle-slideshow" 
    data-cycle-timeout="7000"
    data-cycle-speed="600"
    data-cycle-slides="> .slide"
    data-cycle-prev=".cycle-slideshow .prev"
    data-cycle-next=".cycle-slideshow .next"     
    >
    
    
<?php
$db = new DB();
$pesquisa = $db->select("SELECT * FROM banners ORDER BY id LIMIT 5");
$i=1;
while($row = $db->expand($pesquisa)){
	echo '
		
		<div class="slide">
			
       		<img src="'.$root_doc.'images/'.$row['banner'].'">
    	</div>
	
	';
}
?>  
   
      
     
    <div class="cycle-pager"></div>
    
           
    
</div>


</div>
</div>