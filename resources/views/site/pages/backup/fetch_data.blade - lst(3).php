<?php

//fetch_data.php

//include('database_connection.php');
$connect = new PDO("mysql:host=localhost;dbname=furnituredb", "karim", "yujw9n?edrocvKxgblts");

if(isset($_POST["action"]))
{
$query = "
   SELECT * FROM products WHERE status = '1'  
   ";
 $query3 = "
  SELECT product_id FROM product_categories WHERE id != 's'  AND category_id IN('".$category['id']."') GROUP BY product_id;
 ";
$id =  "AND id IN ('";
$ids =  "";
$skuids =  "";
$sku =  "AND sku IN ('";
 $statement3 = $connect->prepare($query3);
 $statement3->execute();
 $result3 = $statement3->fetchAll();
 $total_row3 = $statement3->rowCount();
 
if($total_row3 > 0 )
 {
	 $elements3 = array();
  foreach($result3 as $row3)
  {
	  
	  $elements3[] =  $row3['product_id'] ;
  
	}
	$sp3= implode("','", $elements3);
	$ids .= $sp3 ;
	$id .= $ids;
	$id .= "')";
  $query .= $id;
  echo ("sp3 is:" .$sp3)  ;
} 

	   $query2 = "
  SELECT  sku FROM product_attributes WHERE id != 's'  
 ";
  foreach ($attributes as $filter) {
    if(isset($_POST[$filter['name']]))
 {

  $storage_filter = implode("','", $_POST[$filter['name']]);
  $query2 .= "
   AND ".$filter['name']." IN('".$storage_filter."')
  ";
     $statement2 = $connect->prepare($query2);
 $statement2->execute();
 $result2 = $statement2->fetchAll();
 $total_row2 = $statement2->rowCount();
  
if($total_row2 > 0)
 {
	 $elements2 = array();
  foreach($result2 as $row2)
  {
	  $elements2[] =  $row2['sku'] ;
  
	}
	$sp2= implode("','", $elements2);
	$skuids .= $sp2;
} 
 echo ("query2: ". $query2) ;
echo ("skuids: ". $skuids) ; 
 }

}
if(isset($total_row2) == 1){
	 $attrsconnect = $connect->prepare($query2);
 $attrsconnect->execute();
 $attrsresult = $attrsconnect->fetchAll();
 $total_row_attrs = $attrsconnect->rowCount();
 if($total_row_attrs < 1){
	 $query = "SELECT * FROM products WHERE status = '2' ";
 }else{
	 
	$sku = $skuids;
	$sku .= "')";
	$query = "SELECT * FROM products WHERE status = '1' ";
  $query .= $sku;
	 
 }
}


}
echo $query;
echo $query3;

 $statement = $connect->prepare($query);
 $statement->execute();
 $result = $statement->fetchAll();
 $total_row = $statement->rowCount();
 $output = '';
 ?>
 @if($total_row > 0)
 
  @foreach($result as $product)
  
   <div class="col-xl-3 col-lg-6 col-md-6 col-sm-6 col-12">
											<div class="product-style-03 margin-top-40">
													
												<div class="content text-center">
												
													<span class="brand">Brand: DasKind</span>
													<h6 class="title"><a href="{{ route('product.show', $product['slug']) }}">{{ $product['name'] }}</a></h6>
													<div class="content-price d-flex align-self-center justify-content-center">
														 
													</div>
												</div>
											</div>
										</div>
   @endforeach
 @else
 
  <h3>No Data Found</h3>';
 
@endif


