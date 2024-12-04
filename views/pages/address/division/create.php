
<div class="container" >
	<form id="edit_division">
		<div class="mb-3">
			<label for="name" class="form-label">name</label>
			<input type="text" class="form-control name" id="name">

		</div>
		<button type="submit" class="btn btn-primary">Submit</button>
	</form>
</div>

<script>
	$(function() {

		$("#edit_division").on("submit",function(e){
			e.preventDefault()

			let name =$("#name").val();

			//console.log(name);
			
            $.ajax({
				url:"<?php echo $base_url ?>/api/division/save",
				type:"post",
				data:{name:name},
				success:function(res){
                    console.log(res);
					window.location = `<?php echo $base_url ?>/division`;
				},
				error:function(error){
                       console.log(error);
					   
				}
			});

		})







	})
</script>