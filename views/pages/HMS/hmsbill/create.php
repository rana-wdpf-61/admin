<style>
	body {
		font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
		margin: 0;
		padding: 0;
		background-color: #f4f6f8;
		color: #333;
	}

	.container {
		width: 850px;
		margin: 20px auto;
		padding: 20px;
		background: #ffffff;
		border-radius: 10px;
		box-shadow: 0 4px 10px rgba(0, 0, 0, 0.15);
		border: 1px solid #e1e4e8;
	}

	.header {
		text-align: center;
		border-bottom: 2px solid #007bff;
		padding-bottom: 20px;
		margin-bottom: 30px;
	}

	.header h1 {
		font-size: 28px;
		margin: 0;
		color: #007bff;
		text-transform: uppercase;
	}

	.header p {
		font-size: 16px;
		margin: 5px 0;
		color: #555;
	}

	.section {
		margin-bottom: 30px;
		padding: 20px;
		border: 1px solid #e1e4e8;
		border-radius: 8px;
		background-color: #f9fbfc;
	}

	.section-title {
		font-size: 20px;
		font-weight: bold;
		color: #007bff;
		margin-bottom: 15px;
		border-bottom: 1px solid #007bff;
		padding-bottom: 5px;
	}

	.details p {
		margin: 5px 0;
		font-size: 15px;
		line-height: 1.5;
	}

	table {
		width: 100%;
		border-collapse: collapse;
		margin-top: 10px;
	}

	table th,
	table td {
		border: 1px solid #ccc;
		padding: 10px;
		text-align: left;
		font-size: 15px;
	}

	table th {
		background-color: #007bff;
		color: #ffffff;
	}

	table tbody tr:nth-child(odd) {
		background-color: #f1f7ff;
	}

	.footer {
		text-align: center;
		margin-top: 20px;
	}

	.payment-methods {
		display: flex;
		flex-wrap: wrap;
		justify-content: space-around;
		margin-top: 20px;
	}

	.payment-methods img {
		width: 120px;
		margin: 10px;
	}

	.totals {
		text-align: right;
		font-size: 16px;
		font-weight: bold;
	}

	.totals div {
		margin: 5px 0;
	}

	.grand-total {
		color: #007bff;
		font-size: 18px;
		font-weight: bold;
	}
</style>

<div class="container">
	<!-- Header -->
	<div class="header">
		<h1>Medjestic Telemedicine Virtual Healthcare</h1>
		<p>Dhanmondi, Dhaka, Bangladesh</p>
		<p>Mobile: 01675600847</p>
	</div>

	<!-- Invoice Details -->
	<div class="section">
		<div class="section-title">Invoice Details</div>
		<div class="details">
			<p><strong>Invoice Number:</strong> INV-<?php echo date("Ymd", strtotime(date('Y-m-d'))) ?>-<?php echo HmsBill::get_last_id() + 1 ?></p>
			<p><strong>Date:</strong> <?php echo  date("F d, Y", strtotime(date('Y-m-d')))   ?></p>
			<p><strong>Patient Name: </strong> <input type="text" name="pname" id="pname"></p>
			<p><strong>Contact:</strong><input type="text" name="pmobile" id="pmobile"></p>

			<?php
			//for referance
			// echo HmsPatient::html_select()
			?>
		</div>
	</div>

	<!-- Payment Breakdown -->
	<div class="section">
		<div class="section-title">Payment Breakdown</div>
		<table>
			<thead>
				<tr>
					<th>Description</th>
					<th>Quantity</th>
					<th>Unit Price (BDT)</th>
					<th>Total (BDT)</th>
					<th> <button id="clearAll" class="btn btn-danger clearAll">Clear All</button></th>
				</tr>
				<tr>
					<th>

						<?php
						echo  HmsService::html_select("service")
						?>

					</th>
					<th> <input type="number" class="qty"></th>
					<th id="unit_price"></th>
					<th id="sub_price"></th>
					<th><button class="add_service">Add</button></th>
				</tr>
			</thead>
			<tbody id="items">


			</tbody>
		</table>

		<div class="totals">
			<div>Subtotal: <strong>2,100 BDT</strong></div>
			<div>Discount (10%): <strong>-210 BDT</strong></div>
			<div>Tax (15%): <strong>283.50 BDT</strong></div>
			<div class="grand-total">Grand Total: <strong>2,173.50 BDT</strong></div>
			<button class="btn btn-success btn_process">Process</button>
		</div>
	</div>

	<!-- Payment Methods -->
	<div class="section">
		<div class="section-title">Payment Methods</div>
		<p>You can pay using the following methods:</p>
		<div class="payment-methods">
			<img src="https://via.placeholder.com/120x50?text=bKash" alt="bKash">
			<img src="https://via.placeholder.com/120x50?text=Nagad" alt="Nagad">
			<img src="https://via.placeholder.com/120x50?text=Rocket" alt="Rocket">
			<img src="https://via.placeholder.com/120x50?text=Upay" alt="Upay">
			<img src="https://via.placeholder.com/120x50?text=Visa" alt="Visa">
			<img src="https://via.placeholder.com/120x50?text=Mastercard" alt="Mastercard">
			<img src="https://via.placeholder.com/120x50?text=DBBL" alt="DBBL">
			<img src="https://via.placeholder.com/120x50?text=PayPal" alt="PayPal">
		</div>
	</div>

	<!-- Footer -->
	<div class="footer">
		<p>Thank you for choosing Medjestic Telemedicine Virtual Healthcare!</p>
	</div>
</div>



<script>
	$(function() {

		// cart initialized
		let cart = new Cart("Invoice");
		printCart()
		// get service data
		$("#service").on("change", function() {
			let service_id = $(this).val()
			$.ajax({
				url: "<?php echo $base_url ?>/api/HmsService/find",
				type: "get",
				data: {
					sid: service_id
				},
				success: function(res) {
					let data = JSON.parse(res);
					let data2 = data.hmsservice;

					$("#unit_price").text(data2.price)
					$("#sub_price").text(data2.price)
					$(".qty").val(1)
				},
				error: function(res) {}
			})

		})

		// change service quy to total price
		$(".qty").on("change", function() {
			let qty = $(this).val();
			let unintp = $("#unit_price").text()

			if (qty) {
				$("#sub_price").text(qty * unintp)
			}
		})


		$(".add_service").on("click", function() {
			let service_id = $("#service").val();
			let service_name = $("#service option:selected").text();
			let unit_price = $("#unit_price").text()
			let qty = $(".qty").val()

			let item = {
				item_id: service_id,
				name: service_name,
				unit_price: unit_price,
				qty: qty
			}

			cart.save(item);
			printCart()
		})


		function printCart() {

			let invoice = cart.getCart();
			console.log(invoice);

			let subtotal = 0;
			var html = "";
			if (invoice != null) {


				invoice.forEach(function(item, i) {
					//console.log(item.name);
					subtotal += item.price * item.qty - item.discount;

					html += `
					<tr>
					<td>${item.name}</td>
					<td>${item.qty}</td>
					<td>${item.unit_price}</td>
					<td>${item.unit_price * item.qty}</td>
					<td><button data-id='${item.item_id}' class="delete btn btn-info remove_item">R</button></td>
				      </tr>
					`;



				});
			}

			$("#items").html(html);

			//Order Summary
			$("#subtotal").html(subtotal);
			let tax = (subtotal * 0.05).toFixed(2);
			$("#tax").html(tax);
			$("#net-total").html(parseFloat(subtotal) + parseFloat(tax));
		}


		$("body").on("click", ".delete", function() {
			let id = $(this).data("id");
			cart.delItem(id)
			printCart();
		});

		$("#clearAll").on("click", function() {
			cart.clearCart();
			printCart();
		});


		//Save into database table
		$(".btn_process").on("click", function() {
	

			 let pname = $("#pname").val();
			 let pmobile = $("#pmobile").val();
		     let invoice = cart.getCart();

			console.log(pname,pmobile, invoice);
			 

			$.ajax({
				url: '<?php echo $base_url?>/api/HmsBill/hmsinvoice',
				type: 'POST',
				data: {
					"pname": pname,
					"pmobile": pmobile,
					"invoice": invoice
				},
				success: function(res) {
					console.log(res);
					cart.clearCart();
					$("#items").html("");
				}
			});

		});



	})
</script>

<script src="<?php echo $base_url ?>/js/cart.js"></script>