<?php 

include('php/dbcon.php');
include('header.php');

?>

<div class="container">

	<div class="dept_heading">
        <h2 style="font-size: 30px; color: #FFA500; text-align: center; padding: 30px;text-transform: uppercase">Search Results</h2>
    </div>

    <div class="view_jobs">
    	<h1>Job Vacancies</h1>


	    <table class="job">
	            <tr>
	            	<th>Department</th>
	                <th>Position</th>
	                <th style="width: 15%;" >Closing Date</th>
	                <th>View</th>
	            </tr>

    	<?php


    	 	$search_query = $_GET['user_query'];
            $get_job="SELECT * FROM jobs INNER JOIN department ON jobs.dept_id=department.dept_id where position like '%$search_query%' OR title like '%$search_query%' ;";

            
    	//$get_job = "SELECT * FROM jobs WHERE position like '%$search_query%' OR title like '%$search_query%' ;";

    	$run_job = mysqli_query($connection, $get_job);

    	while ($row_job=$run_job-> fetch_assoc()) {
    		
    		$position = $row_job['position'];
    		$closing_date = $row_job['closing_date'];

    		 echo   
                    '<tr>
                    	<td>Department</td>
                        <td>'.$position.'  </td>
            
                        <td>'.$closing_date.'  </td>

                        <td>'. '<buttob><a style="text-decoration: none; color: black;" href="/fashion/pages/job_description.php?job_id='.$row_job["job_id"].'">View</a></button> </td>
                    </tr>
                                    
            ';
    	}

    	

    	?>

	           
	    </table>

	</div>
	

</div>


<?php include('footer.php') ?>