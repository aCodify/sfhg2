<?php 

	/*
	# ---------------------------------------------------------------------
	@ WEBSITE DEVELOPMENT 	: Project SERVICE
	@ Date Create 			: 07-07-56 
	@ Create by 			: nharm Abstract code
	@ USE For ......
	@ © 2012-2013, Abstractcodify.com All Rights Reserved.
	# ---------------------------------------------------------------------
	*/

	// file config system and config database
	include_once 'config.php'; 
	include_once 'function.php';

	if ( empty( $_POST[ 'total_group' ] )  OR  empty( $_POST[ 'm_value' ] )  ) 
	{
		echo "<caption>	system is error. system is request method post value </caption>";
		die();
	}

	$total_group = $_POST[ 'total_group' ];

	$course_id = $_POST[ 'course_id' ];

	$m_value = $_POST[ 'm_value' ];

	$pc_value = $_POST[ 'pc_value' ];





	for ($m = 0; $m < $m_value; $m++) 
	{ 
				$array_cs = array();
				$data_student = '';
				$CI_DB->where( 'ID_course', $_POST[ 'course_id' ] );
				$query = $CI_DB->get( 'course' );
				$data_coures = $query->result();

				$data_coures = $data_coures[0];

				// set array
				$coures_array = array();
				$count_m = 0;
				if ( ! empty( $data_coures->course1 ) ) 
				{
					$coures_array[] = $data_coures->course1;
					$count_m++;
				}
				if ( ! empty( $data_coures->course2 ) ) 
				{
					$coures_array[] = $data_coures->course2;
					$count_m++;
				}
				if ( ! empty( $data_coures->course3 ) ) 
				{
					$coures_array[] = $data_coures->course3;
					$count_m++;
				}
				if ( ! empty( $data_coures->course4 ) ) 
				{
					$coures_array[] = $data_coures->course4;
					$count_m++;
				}
				

				// get student
				$CI_DB->where( 'ID_course', $_POST[ 'course_id' ] );
				$CI_DB->order_by( 'id_Student', 'RANDOM' );
				$query = $CI_DB->get( 'student_data' );
				$data_student = $query->result();

				// student is empty
				if ( empty( $data_student ) ) 
				{
					echo "Student is empty";
					die();
				}


				$data_student = array_chunk( $data_student , $_POST[ 'total_group' ] );

				$count_array_main = count($data_student);

				$end_array = end($data_student);

				$count_end_array = count($end_array);

				$check_end_array = round($count_end_array/$_POST[ 'total_group' ]);

				if ( $check_end_array == 0 ) 
				{
					foreach ($end_array as $key => $value) 
					{

						$data_student[0][] = $end_array[0];

					}
					unset($data_student[$count_array_main-1]);
				}

				foreach ($data_student as $key => $info) 
				{
					$total_check = 0;
					$count_studen = 0;
					$total_cum = 0;
					$cs = '';
					$c1 = 0;
					$c2 = 0;
					$c3 = 0;
					$c4 = 0; 

					foreach ($info as $index => $value) 
					{
						$count_set = $count_m;
						$count_studen++;
						$total_cum = $value->cum_Grad+$total_cum;

						if ( --$count_set >= 0 ) 
						{
							$c1 = $c1+$value->course_G1;
						}
						if ( --$count_set >= 0 ) 
						{
							$c2 = $c2+$value->course_G2;
						}
						if ( --$count_set >= 0 ) 
						{
							$c3 = $c3+$value->course_G3;
						}
						if ( --$count_set >= 0 ) 
						{
							$c4 = $c4+$value->course_G4;
						}


					}
					$arr_gate[] = array( $total_cum , $c1 , $c2 , $c3 , $c4 );

					if ( $total_cum != 0 ) 
					{
						$cs[] = number_format(($total_cum/$count_studen),3); 
					}

					if ( $c1 != 0 ) 
					{
						$cs[] = number_format($c1/$count_studen,3); 
					}
					if ( $c2 != 0 ) 
					{
						$cs[] = number_format($c2/$count_studen,3);
					}
					if ( $c3 != 0 ) 
					{
						$cs[] = number_format($c3/$count_studen,3); 
					}
					if ( $c4 != 0 ) 
					{
						$cs[] = number_format($c4/$count_studen,3); 
					}

					$array_cs[] = $cs;

				}

				// echo '<pre>';
				// print_r($arr_gate);
				// echo '</pre>';

				// echo '<pre>';
				// print_r($data_student);
				// echo '</pre>';

				// echo '<pre>';
				// print_r($array_cs);
				// echo '</pre>';



				$total_group_end = count($data_student);

				// echo '<pre>';
				// print_r($data_student);
				// echo '</pre>';
				
				$str_1 = '';
				$str_2 = '';
				$fitness = 0;
				$set_3 = 0;

				if( !empty($cs) )
				{

					for ($i=1; $i < $total_group_end; $i++) 
					{ 

						$max_total_group = count($data_student[$i]);
						
						for ($g=1; $g < $total_group_end; $g++) { 

							$str_1 = '';
							$set_3 = 0;
							$fitness = 0;
							for ($a=1; $a <= $max_total_group; $a++) 
							{ 
								if ( ($i-1) == $g ) 
								{
									continue;
								}

								$val_1 = $array_cs[$i-1][$a-1];
						
								$val_2 = $array_cs[$g][$a-1];

								$set_1 = abs( $val_1 - $val_2 );



								$set_2 = pow($set_1,2);

								$set_3 += $set_2;
								// echo "<br>";
								// echo $set_3;
							}	
							// echo "<br>";
							// echo "-----------";
							$fitness = sqrt($set_3);
							
							// echo $fitness;
							// echo "-----------";
							// echo "<br>";
							$fitness += $fitness;

						}

					}

				}
		// new set value
				
		$object = new stdClass();

		$object->fitness = $fitness;
		$object->data = $data_student;

		$array_object[] = $object;			

	}// end for main



	// echo '<pre>';
	// print_r($array_object);
	// echo '</pre>';

	$new_data = array();
	foreach ( $array_object as $key => $value ) 
	{

		$new_data[$key] = $value->fitness;

	}

	asort($new_data);


	foreach ( $new_data as $key => $value ) 
	{
		$set_new_data[] = $value;
	}

	$total_pc = ( $pc_value * $m_value ) / 100 ; 

	$st_value = abs( $total_pc-$m_value );

	// echo '<pre>';
	// print_r($set_new_data);
	// echo '</pre>';

	for ( $i=0 ; $i < $st_value ; $i++ ) 
	{ 
		$data_global = call_data( $_POST[ 'course_id' ] , $_POST[ 'total_group' ] );

		$over_set[] = $data_global->fitness;
	}


	// echo '<pre>';
	// print_r( $over_set );
	// echo '</pre>';

	$new_st_value = $st_value+2;
	$index_set = 0;



	for ( $i= $new_st_value; $i < $m_value; $i++ ) 
	{ 
		$set_new_data[$i] = $over_set[$index_set];
		$index_set++;
	}

	asort($set_new_data);

	echo '<pre>';
	print_r( $set_new_data );
	echo '</pre>';

	// end.

?>

<!doctype html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Student Formation by Heterogeneous grouping</title>
        <!-- css bootstrap -->
        <link rel="stylesheet" href="<?php echo ABSURL ?>script/bootstrap/css/bootstrap.css">
        <!-- css main -->
        <link rel="stylesheet" href="<?php echo ABSURL ?>script/style_gen.css">
        <!-- jquery.js -->
       	<script src="<?php echo ABSURL ?>script/jquery-1.8.3.js" type="text/javascript" charset="utf-8"></script>
    </head>

    <body>
    	




    </body>
</html>



