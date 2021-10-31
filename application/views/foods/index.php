<!-- Button trigger modal -->
<div class="container">
<!--Search Bar-->
	<div class="search">
		<form id="search_form">
		<div class="card-body row no-gutters align-items-center">
			<div class="col-lg-3  col-md-3 col-sm-6  col-12 ml-md-2 mt-1">
				<input type="text" name="title_search" id="title_search" class="form-control" placeholder="tarif adı..."
					   value="">
			</div>
			<div class="col-lg-2  col-md-2 col-sm-6  col-12  ml-md-2 mt-1">
				<select name="category_search" id="category_search" class="form-control">
					<option value="" selected="">Tüm Kategoriler</option>
					<?php foreach ($categories as $category): ?>
						<option value="<?php echo $category['id'] ?>"><?php echo $category['title'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>
			<div class="col-lg-2  col-md-2 col-sm-6  col-12 ml-md-2 mt-1">
				<select name="type_search" id="type_search" class="form-control">
					<option value="" selected="">Türü</option>
					<?php foreach ($types as $type): ?>
						<option value="<?php echo $type['id'] ?>"><?php echo $type['title'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="col-lg-2  col-md-2 col-sm-6  col-12 ml-md-2 mt-1">
				<select name="method_search" id="method_search" class="form-control">
					<option value="" selected="">Pişirme Yöntemi</option>
					<?php foreach ($methods as $method): ?>
						<option value="<?php echo $method['id'] ?>"><?php echo $method['title'] ?></option>
					<?php endforeach; ?>
				</select>
			</div>

			<div class="col-lg-2 col-md-3 col-sm-3  col-12  ml-md-2 mt-1">
				<button type="submit" id="submit_search" class="btn btn-danger">Getir</button>
			</div>
		</div>
		</form>
	</div>


<!--	Add Bar-->
	<div class="row2">
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 ">
		<button type="button" class="btn btn-success" data-toggle="modal" data-target="#addModal">
			Add new food
		</button>
		</div>
	</div>

	<?php
	$CI =& get_instance();
	$CI->load->model('category_model');
	?>

<!--	Content view-->
	<div class="row2" id="content">
		<?php foreach ($foods as $food): ?>
		<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12 " style="margin-top: 20px">
			<a href="#" class="recipeBox" title="<?php echo $food['title'] ?>">
        		<span>
        		    <div class="tag category" style="background-color: #be5309;"><?php echo $CI->category_model->get_category_by_id($food['category_id']); ?></div>
        		</span>
				<em>
					<img class="img-cover lazyloaded" width="340" height="263" src="<?php echo site_url(); ?>assets/images/foods/<?php echo $food['image_url'] ?>" alt="<?php echo $food['title'] ?>">
				</em>
				<b>
					<img src="https://ziyafet.com.tr/uploads/profile/avatar_22_61558a8f87580.jpg" alt="<?php echo $food['writer'] ?>"><?php echo $food['writer'] ?>
				</b>
				<strong><?php echo $food['title'] ?></strong>
				<span>
        		    <span>
        		        <i class="icon-fire-line"></i>
        		        <strong><?php echo $food['calorie'] ?> Kalori</strong>
        		    </span>
        		    <span></span>
        		    <span>
        		        <i class="icon-timer-line"></i>
        		        <strong><?php echo $food['cooking_time'] ?> dk Pişirme</strong>
        		    </span>
        		</span>
			</a>
		</div>
		<?php endforeach ?>
	</div>
</div>


<!-- Modal -->
	<div class="modal fade" id="addModal" tabindex="-1" role="dialog" aria-labelledby="addModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-header">
					<h5 class="modal-title" id="addModalLabel">Add Dew Food</h5>
					<button type="button" class="close" data-dismiss="modal" aria-label="Close">
						<span aria-hidden="true">&times;</span>
					</button>
				</div>
				<div class="modal-body">
					<form method="post" enctype="multipart/form-data" id="foodForm">
							<div class="form-group">
								<input type="text" class="form-control input-sm" id="title" placeholder="title" name="title">
							</div>
							<div class="form-group">
								<input type="text" class="form-control input-sm" id="writer" placeholder="Writer" name="writer">
							</div>
							<div class="form-group">
								<input type="number" class="form-control input-sm" id="calorie" placeholder="Calorie" name="calorie">
							</div>
							<div class="form-group">
								<input type="number" class="form-control input-sm" id="cooking_time" placeholder="Cooking Time" name="cooking_time">
							</div>
							<div class="form-group">
								<input type="number" class="form-control input-sm" id="preparation_time" placeholder="Preparation Time" name="preparation_time">
							</div>
							<div class="form-group">
								<input type="number" class="form-control input-sm" id="numberOfPerson" placeholder="Number Of Persons" name="numberOfPerson">
							</div>
							<div class="form-group">
								<textarea class="form-control input-sm" id="instructions" placeholder="Instructions" name="instructions"></textarea>
							</div>
							<div class="form-group">
								<select class="form-control input-sm" id="category" name="category">
									<?php foreach($categories as $category): ?>
										<option value="<?php echo $category['id']?>"><?php echo $category['title']?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<select class="form-control input-sm" id="type" name="type">
									<?php foreach($types as $type): ?>
										<option value="<?php echo $type['id']?>"><?php echo $type['title']?></option>
									<?php endforeach;?>
								</select>
							</div>
							<div class="form-group">
								<input type="file" class="form-control input-sm" id="image" name="userfile">
							</div>
							<div class="form-group">
								<select class="form-control input-sm" id="cooking_method" name="cooking_method">
									<?php foreach($methods as $method): ?>
										<option value="<?php echo $method['id']?>"><?php echo $method['title']?></option>
									<?php endforeach;?>
								</select>
							</div>
							<hr>
							<button id="saveFood" type="submit" class="btn btn-primary btn-small">Submit</button>
					</form>
				</div>
			</div>
		</div>
	</div>

<script type="application/javascript">
	$(function() {

		var category_obj = {
			1: 'Atıştırmalık Tarifler',
			2: 'Bakliyat Yemekleri',
			3: 'Balık Yemekleri',
			4: 'Börek Tarifleri',
			5:'Çikolatalı Tatlı Tarifleri',
			6:'Çorba Tarifleri',
			7:'Çörek Tarifleri',
			8:'Deniz Ürünleri',
			9:'Diyet Tatlı Tarifleri',
			10:'Diyet Yemekleri',
			11:'Dolma Tarifleri',
			12:'Dondurma Tarifleri',
			13:'Dünya Mutfakları Yemekleri',
			14:'Ekmek Tarifleri',
			15:'Etli Yemekler'
		}

		//Add New Food
		$(document).on('submit', '#foodForm', function(event){
			event.preventDefault();

			//Get input values
			var title = $('#title').val();
			var writer = $('#writer').val();
			var calorie = $('#calorie').val();
			var cooking_time = $('#cooking_time').val();
			var preparation_time = $('#preparation_time').val();
			var numberOfPerson = $('#numberOfPerson').val();
			var instructions = $('#instructions').val();
			var category = $('#category').val();
			var extension = $('#image').val().split('.').pop().toLowerCase();

			//Validation
			if(title != ''
					&& writer != ''
					&& calorie != ''
					&& cooking_time != ''
					&& preparation_time != ''
					&& numberOfPerson != ''
					&& instructions != ''
					&& category != '') {
				if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)
				{
					alert("Invalid Image File");
					$('#image').val('');
					return false;
				}

				//Create new food
				$.ajax({
					url:"<?php echo base_url() . 'food/store'?>",
					method:'POST',
					data:new FormData(this),
					contentType:false,
					processData:false,
					success:function(data)
					{
						alert("Data has been inserted successfully!!");
						$('#foodForm')[0].reset();
						$('#addModal').modal('hide');



					//	Load Content with ajax again
						$.ajax({
							url:"<?php echo base_url() . 'food/foodsList'?>",
							method:'POST',
							contentType:false,
							processData:false,
							success:function(dataa){
								console.log(dataa)
								$("#content").html("");

								dataa = JSON.parse(dataa)
								if (dataa.length !== 0 ){
									dataa.forEach(function(item) {
										const asArray = Object.entries(category_obj);
										const filtered = asArray.filter(([key, value]) => key === item['category_id']);

										$("#content").append('<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12" style="margin-top: 20px">'
												+ '<a href="#" class="recipeBox" title=' + item['title'] +'>'
												+ '<span>'
												+'<div class="tag category" style="background-color: #be5309;">' + filtered[0][1] + '</div>'
												+'</span>'
												+'<em>'
												+'<img class="img-cover lazyloaded" width="340" height="263" src="<?php echo site_url(); ?>assets/images/foods/' + item['image_url'] + '" alt="'+ item['image_url'] +'">'
												+'</em>'
												+'<b>'
												+'<img src="https://ziyafet.com.tr/uploads/profile/avatar_22_61558a8f87580.jpg" alt="'+item['writer']+'">'+item['writer']
												+'</b>'
												+'<strong>' + item['title'] + '</strong>'
												+'<span>'
												+'<span>'
												+'<i class="icon-fire-line"></i>'
												+'<strong>' + item['calorie'] +' Kalori</strong>'
												+'</span>'
												+'<span></span>'
												+'<span>'
												+'<i class="icon-timer-line"></i>'
												+'<strong>'+ item['cooking_time'] +' dk Pişirme</strong>'
												+'</span>'
												+'</span>'
												+'</a>'
												+'</div>'
										);
									});
								}


							}
						})

					}
				});
			}
			else
			{
				alert("Fields are Required");
			}
		});

		//Search Form
		$(document).on('submit', '#search_form', function(event){
			event.preventDefault();

			$.ajax({
				url:"<?php echo base_url() . 'food/searchFood'?>",
				method:'POST',
				data:new FormData(this),
				contentType:false,
				processData:false,
				success:function(data)
				{
					$("#content").html("");

					if (data.length !== 0 ){
						data.forEach(function(item) {
							const asArray = Object.entries(category_obj);
							const filtered = asArray.filter(([key, value]) => key === item['category_id']);

							console.log(filtered)
							$("#content").append('<div class="col-xl-3 col-lg-4 col-md-4 col-sm-6 col-12" style="margin-top: 20px">'
									+ '<a href="#" class="recipeBox" title=' + item['title'] +'>'
									+ '<span>'
									+'<div class="tag category" style="background-color: #be5309;">' + filtered[0][1] + '</div>'
									+'</span>'
									+'<em>'
									+'<img class="img-cover lazyloaded" width="340" height="263" src="<?php echo site_url(); ?>assets/images/foods/' + item['image_url'] + '" alt="'+ item['image_url'] +'">'
									+'</em>'
									+'<b>'
									+'<img src="https://ziyafet.com.tr/uploads/profile/avatar_22_61558a8f87580.jpg" alt="'+item['writer']+'">'+item['writer']
									+'</b>'
									+'<strong>' + item['title'] + '</strong>'
									+'<span>'
									+'<span>'
									+'<i class="icon-fire-line"></i>'
									+'<strong>' + item['calorie'] +' Kalori</strong>'
									+'</span>'
									+'<span></span>'
									+'<span>'
									+'<i class="icon-timer-line"></i>'
									+'<strong>'+ item['cooking_time'] +' dk Pişirme</strong>'
									+'</span>'
									+'</span>'
									+'</a>'
									+'</div>'
							);
						});
					}
				}
			});
		})
	});
</script>
