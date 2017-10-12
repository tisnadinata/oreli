<?php
include_once 'functions/functions.php';
function getTableData($tableName, $page = 1, $limit)
{
    $dataTable = array();
    $startRow = ($page - 1) * $limit;
    $query = $mysqli->query('SELECT * FROM '.$tableName.' ORDER BY produk_nama ASC LIMIT '.$startRow.', '.$limit);
 
    while ($data = $query->fetch_assoc()) 
        array_push($dataTable, $data);
 
    return $dataTable;
}

function showPagination($tableName, $limit = 20)
{
    $countTotalRow = $mysqli->query('SELECT COUNT(*) AS total FROM `'.$tableName.'`');
    $queryResult = $countTotalRow->fetch_assoc();
    $totalRow = $queryResult['total'];
 
    $totalPage = ceil($totalRow / $limit);
 
    $page = 1;
	?>
		<center><strong><font size='5'>
		<nav>
		  <ul class="pagination pagination-sm">
	<?php
if($_GET['p'] == 1){
	echo'    <li class="disabled">
		  <span aria-hidden="true">&laquo;</span>
		  <li>
	';
}else{
	echo'    <li>
		  <a href="?page=list&p='.$page.'&pP='.$limit.'" aria-label="Previous">
			<span aria-hidden="true">&laquo;</span>
		  </a>
		</li>
	';
}
    while ($page <= $totalPage) 
    {
	
		if($_GET['p'] == $page){
			echo'    <li class="active"><a href="?page=list&p='.$page.'&pP='.$limit.'">'.$page.'</a></li>';
		}else{
			echo'    <li><a href="?page=list&p='.$page.'&pP='.$limit.'">'.$page.'</a></li>';
		}
		$page++;
    }
if($page == $_GET['p']+1){	
echo'    <li class="disabled">
        <span aria-hidden="true">&raquo;</span>
    </li>';
}else{
	$p = $page-1;
echo'    <li>
			<a href="?page=list&p='.$p.'&pP='.$limit.'" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>';
}

	?>
	  </ul>
	</nav>
		</font></strong></center>
	<?php

}
?>
