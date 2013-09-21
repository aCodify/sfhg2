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

	// set value data
	$abstract_count = '';
	$array_abstract = array();
	$s_id_studen = ( ! empty( $_POST[ 'id_studen' ] ) ) ? $_POST[ 'id_studen' ] : '' ;
	$s_from_group = ( ! empty( $_POST[ 'from_group' ] ) ) ? $_POST[ 'from_group' ]-1 : '' ;
	$s_to_group = ( ! empty( $_POST[ 'to_group' ] ) ) ? $_POST[ 'to_group' ]-1 : '' ;

	// check post data sort
	if ( ! empty( $_POST['abstract_str'] ) ) 
	{
		$array_abstract = explode( ",", $_POST['abstract_str'] );

		// if is not post show error
		if (  empty( $_POST[ 'id_studen' ] ) AND  empty( $_POST[ 'from_group' ] ) AND  empty( $_POST[ 'to_group' ] ) ) 
		{
			echo "value post is not data , system requrs data post";
			die();
		}

	}

	// check empty coures id and total group
	if ( ! empty( $_POST[ 'course_id' ] ) AND ! empty( $_POST[ 'total_group' ] ) ) 
	{
		// get coures
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

		if ( empty( $data_student ) ) 
		{
			echo "Student is empty";
			die();
		}

		$abstract_data = $data_student;

		// set sort studen

		$set_set_abstract = array();

		foreach ($array_abstract as $key => $value) 
		{
			foreach ($abstract_data as $key_set => $info) 
			{
				if ( $info->id_Student == $value ) 
				{
					$set_set_abstract[] = $abstract_data[$key_set];
				}
			}
		}

		// set sort studen
		$data_student = ( ! empty( $set_set_abstract ) ) ? $set_set_abstract : $data_student ;

		// set array 
		if ( ! empty( $_POST['abstract_str'] ) ) 
		{
			$count_abstract = explode( ",", $_POST['abstract_count'] );
			$ty_count = count($count_abstract);
			unset($count_abstract[$ty_count-1]);

			$h = 0;
			foreach ($count_abstract as $key => $value) 
			{
				for ($i=0; $i < $value; $i++) 
				{ 	
					$arr_ss[$key][] = $data_student[$h];
					$h++;
				}

			}

			$data_student = $arr_ss;

		} 
		else 
		{
			$data_student = array_chunk( $data_student , $_POST[ 'total_group' ] );
		}

		// end set array

		// set group array
		if (  empty( $_POST['abstract_str'] ) ) 
		{
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


		}

		// set grouping of the same size.
		if ( ! empty( $_POST['abstract_str'] ) ) 
		{
			
			foreach ($data_student as $key => $value) 
			{
				foreach ($value as $key_set => $value_set) 
				{
					if ( $value_set->id_Student == $s_id_studen ) 
					{
						$group_id_studen = $key;
						$this_gruop_id = $key_set;
					}
				}
				
			}

			$data_student[$s_to_group][] = $data_student[$group_id_studen][$this_gruop_id];

			unset($data_student[$group_id_studen][$this_gruop_id]);

		}


		foreach ($data_student as $key => $value) 
		{
			$abstract_count .= count($data_student[$key]).',';
		}


	}
	else // chow error
	{
		echo "<caption>	system is error. system is request method post value </caption>";
		die();
	}

	$max_studen = count($data_student[0]);

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
        

	<table class="table table-hover" >
		<caption><h2>Student list</h2></caption>
		<thead>
			<tr>
				<th>No</th>
				<th>ID</th>
				<th>Name</th>
				<th>Cum.Grade</th>

				<?php foreach ( $coures_array as $key ): ?>
					<th><?php echo $key ?></th>
				<?php endforeach ?>
				
				<th>Fitness = <span class="post_set"></span></th>
			</tr>
		</thead>
		<tbody>
			<?php $array_main_data = array(); ?>
			<?php $str_arr = array(); ?>
			<?php foreach ($data_student as $key => $info): ?>
				<tr>
					<td><b>Group <?php echo $no_group = $key+1 ?></b></td>
					<td></td>
					<td></td>
					<?php  

					for ($i=0; $i <= $count_m; $i++) 
					{ 
						echo "<td></td>";
					}

					?>
					
					<td><span class="hhl_<?php echo $key+1 ?>"></span></td>
				</tr>
				<?php $array_data = array(); ?>
				<?php $all_data = array(); ?>
				<?php 
					// set value
					$total_cum = 0;
					$count_studen = 0;
					$cs = array();
					$str_set = '';
					$c1 = 0;
					$c2 = 0;
					$c3 = 0;
					$c4 = 0; 
					$no = 0;
				?>
				<?php foreach ($info as $key => $value): ?>
					<?php $count_set = $count_m ?>
					<?php $string_grad = '' ?>
					<?php $total_check = 0; ?>
					<tr>
						<td><?php echo ++$no ?></td>
						<td><?php echo $value->id_Student ?></td>
						<td><?php echo $value->Name ?></td>
						<td><?php echo $value->cum_Grad ?></td>
						<?php 
							$string_grad .= ' '.$value->cum_Grad.' ,'; 
							$total_cum = $value->cum_Grad+$total_cum
						?>
						
						<?php if ( --$count_set >= 0 ): ?>
							<td><?php echo transliterate_grad($value->course_G1) ?></td>
							<?php $du = ( $count_set > 0 ) ? ' ,' : '' ; ?>
							<?php 
								$string_grad .= ' '.$value->course_G1.$du;
								$c1 = $c1+$value->course_G1;
								$total_check++;
							?>
						<?php endif ?>

						<?php if ( --$count_set >= 0 ): ?>
							<td><?php echo transliterate_grad($value->course_G2) ?></td>
							<?php $du = ( $count_set > 0 ) ? ' ,' : '' ; ?>
							<?php 
								$string_grad .= ' '.$value->course_G2.$du; 
								$c2 = $c2+$value->course_G2;
								$total_check++;
							?>
						<?php endif ?>

						<?php if ( --$count_set >= 0 ): ?>
							<td><?php echo transliterate_grad($value->course_G3) ?></td>
							<?php $du = ( $count_set > 0 ) ? ' ,' : '' ; ?>
							<?php 
								$string_grad .= ' '.$value->course_G3.$du; 
								$c3 = $c3+$value->course_G3;
								$total_check++;
							?>
						<?php endif ?>

						<?php if ( --$count_set >= 0 ): ?>
							<td><?php echo transliterate_grad($value->course_G4) ?></td>
							<?php $du = ( $count_set > 0 ) ? ' ,' : '' ; ?>
							<?php 
								$string_grad .= ' '.$value->course_G4.$du; 
								$c4 = $c4+$value->course_G4;
								$total_check++;
							?>
						<?php endif ?>
						
						<?php

							$array_data[] = explode(",", $string_grad);

							$count_studen++;
						
						?>
						<td class='total_grade<?php echo $no_group.'_'.$key ?>'></td>

					</tr>
				<?php endforeach ?>
				<?php 

					if ( $total_cum != 0 ) 
					{
						$total_cum = number_format(($total_cum/$count_studen),3); 
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
					
					$str_set = '';

					if( !empty($cs) )
					{
						for ($i=0; $i < $total_check; $i++) { 
							$str_set .= ' , '.$cs[$i];
						}
						
					}

					$str_arr[] = $total_cum.$str_set;
					$all_data = $total_cum.$str_set;

					$array_main_data[] = explode(",", $all_data);
				?>

			<?php endforeach ?>

		</tbody>
	</table>

<?php  
// set data 
foreach ($str_arr as $key => $value) 
{
	echo "<span style='display: none;' class='total_cum".$key."'>".$value."</span>";
}

?>


<?php  

$set_4 = 0;

$total_group_end = count($array_main_data);

$max_total_group = count($array_main_data[0]);

$str_2 = '';


if( !empty($cs) )
{

	for ($i=1; $i < $total_group_end; $i++) 
	{ 
		
		for ($g=1; $g < $total_group_end; $g++) { 

			$str_1 = '';
			$set_3 = 0;
			$set_4 = 0;
			for ($a=1; $a <= $max_total_group; $a++) 
			{ 
				if ( ($i-1) == $g ) 
				{
					continue;
				}

				$val_1 = $array_main_data[$i-1][$a-1];
				$val_2 = $array_main_data[$g][$a-1];

				abs( $val_1 - $val_2 ).' = '.$val_1.'( '.($i-1).($a-1).' )'.'-'.$val_2.'( '.($g).($a-1).' )';
				$set_1 = abs( $val_1 - $val_2 );
				pow($set_1,2).'= pow('.$set_1.',2)' ;
				$set_2 = pow($set_1,2);

				$set_3 += $set_2;

				$str_1 .= $set_2.'+';
			}	

			$set_4 = sqrt($set_3);
			
			$str_2 .= $set_4.' + ';

			$set_4 += $set_4;

		}

	}

}

// set data
echo "<span style='display: none;' class='total_all_set'>".$set_4."</span>";


?>

<?php 

$abstract_str = '';

if ( ! empty( $array_abstract ) ) 
{
	foreach ($data_student as $key => $value) 
	{
		foreach ($value as $key_dmp => $info_dmp) 
		{
			$abstract_str .= $info_dmp->id_Student .',';
		}
	};
} 
else 
{
	foreach ($abstract_data as $key => $value) 
	{
	    $abstract_str .= $value->id_Student;
	    if ( end($abstract_data)->id_Student != $value->id_Student ) 
	    {
	        $abstract_str .= ',';
	    }
	};

}

?>

	<div  style="margin: 0px auto; display: table;" >

		<h3>Manage Student Groups</h3>
		<form method="POST" accept-charset="utf-8" >
			<span>Move Studen ID
				<input value="" name="id_studen" style="width: 10em;" type="text"> Form Group 
				<input value="" name='from_group' style="width: 3em;" type="text"> To group 
				<input value="" name='to_group' style="width: 3em;" type="text"> </span>
			<input type="hidden" name='abstract_str' value='<?php echo $abstract_str ?>'>
			<input type="hidden" name='total_group' value="<?php echo $_POST[ 'total_group' ] ?>">
			<input type="hidden" name='course_id' value="<?php echo $_POST[ 'course_id' ] ?>">
			<input type="hidden" name='abstract_count' value='<?php echo $abstract_count ?>'>
			<br><button class="btn" type="submit">ประมวลผล</button>
		</form>	

	</div>

    </body>
</html>


<script type="text/javascript" charset="utf-8" >
	
	jQuery(document).ready(function($) 
	{

		for (var i = 0; i < '<?php echo count($data_student) ?>'; i++) 
		{
			p = i+1;
			data_set = $('.total_cum'+i).html()
			$('.hhl_'+p).html(data_set);
		};

		n = $('.total_all_set').html();
		$('.post_set').html(n);
		
	});

</script>


<?php  

foreach ($array_abstract as $key => $value) 
{
	
	foreach ($abstract_data as $key_set => $info) 
	{
		if ( $info->id_Student == $value ) 
		{
			$set_set_abstract[] = $abstract_data[$key_set];
		}
	}

}



?>