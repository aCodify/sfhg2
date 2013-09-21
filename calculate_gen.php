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

	$query = $CI_DB->get( 'course' );
	$data = $query->result();

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
       
       <div>
       	<h2>Calculate</h2>
		<form class='data_form' method="POST" accept-charset="utf-8" action="">
			<p>
				<span class="width_7">Course ID</span> : 
				<select name="course_id" id="">

					<?php foreach ($data as $key => $value): ?>
						
						<option value="<?php echo $value->ID_course ?>"><?php echo $value->ID_course ?></option>

					<?php endforeach ?>
					
				</select>
			</p>
			<p class='input_total_group' ><span class="width_7">Total Group</span> : <input  name="total_group" type="text"></p>
			<p class='m_value'  style="display: none;" ><span class="width_7">M value</span> : <input  name="m_value" type="text"></p>
			<p>
				<span class="width_7"></span>
				<label><input class="input_radio" id="radio" type="radio" value="2" name="radio">SFHG method </label>
				<label><input class="input_radio" id="radio" type="radio" value="1" name="radio">Randomized method </label>
			</p>
			<p>
				<span class="width_7"></span>
				<button class="btn" type="submit">Analyze</button>
			</p>
		</form>


       </div>

    </body>
</html>


<script>
	
	jQuery(document).ready(function($) {


		a = $('.input_radio:checked').val();

		if ( a == 1 ) 
			{
				$('.data_form').attr('action' , '<?php echo ABSURL ?>form_gen_random.php');
				$('.m_value').show();
			} 
			else
			{
				$('.data_form').attr('action' , '<?php echo ABSURL ?>form_gen.php');
				$('.m_value').hide();
			};
		
		$('.input_radio').change(function(){
			a = $(this).val();
			if ( a == 1 ) 
				{
					$('.data_form').attr('action' , '<?php echo ABSURL ?>form_gen_random.php');
					$('.m_value').show();
					
				} 
				else
				{
					$('.data_form').attr('action' , '<?php echo ABSURL ?>form_gen.php');
					$('.m_value').hide();
				};
		})

	});
	

</script>