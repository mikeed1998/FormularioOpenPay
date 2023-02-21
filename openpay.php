<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Document</title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-GLhlTQ8iRABdZLl6O3oVMWSktQOp6b7In1Zl3/Jr59b6EGGoI1aFkw7cmDA6j6gD" crossorigin="anonymous">
</head>
<body>
	<div class="container d-flex justify-content-center">				
		<form class="col-8" action="#" method="POST" id="payment-form">
			<input type="hidden" name="token_id" id="token_id">
			<input type="hidden" name="use_card_points" id="use_card_points" value="false">
			<div class="pymnt-itm card  active" style="border-radius:16px; background:#f7f7f7;">
				<div class="card-header " style="background:#e8e8e8;">
					<h5 class="my-auto">Tarjeta de crédito o débito</h5>
				</div>
										<div class="pymnt-cntnt p-3">

											<div class="card-expl p-3 d-flex row mb-4">
												<div class="credit col-4"><h5>Tarjetas de crédito</h5><img src="tarjetas-mini.jpg" style="width:150px;"></div>
												<div class="debit col-8"><h5>Tarjetas de débito</h5><img src="bancos.jpg" style="width:600px;"></div>
											</div>

											<div class="sctn-row">

												<div class="col-12 p-3 d-flex row">
													<div class="col-6">
														<label>Nombre del titular</label><input class="form-control" type="text" placeholder="Como aparece en la tarjeta" autocomplete="off" data-openpay-card="holder_name">
													</div>
													<div class="col-6">
														<label>Número de tarjeta</label><input class="form-control" type="text" autocomplete="off" data-openpay-card="card_number"></div>
													</div>
												</div>


												<div class="col-12 p-3 d-flex row">

													<div class="col-6">
														<label>Fecha de expiración</label>
														<div class="col-12  d-flex row">
															<div class="col-4 half l"><input class="form-control" type="text" placeholder="Mes" data-openpay-card="expiration_month"></div>
															<div class="col-4 half l"><input class="form-control" type="text" placeholder="Año" data-openpay-card="expiration_year"></div>
														</div>
													</div>

													<div class="col-6 cvv"><label>Código de seguridad</label>
														<div class="col-12  d-flex row">
															<div class="col-5 half l"><input class="form-control" type="text" placeholder="3 dígitos" autocomplete="off" data-openpay-card="cvv2"></div>
															<div class="col-4"><i class="far fa-credit-card" style="font-size:35px;"></i></div>
														</div>
													</div>

												</div>

												<div>
													<div><div></div>
													<div></div>
												</div>

												<div  class="col-12 p-3 d-flex row justify-content-end">

													<div class="openpay col-5 d-flex flex-column justify-content-center">
														<p class="col-12 text-end">Transacciones realizadas vía:</p>
														<div class="col-12 d-flex row justify-content-end">
															<img src="openpay-color.jpg" style="width:150px;">
														</div>
													</div>
													<div class="col-1" style="border-right: 1px solid #000;">
														
													</div>
													<div  class="shield col-6 d-flex flex-column justify-content-center">
														<div class="col-12 d-flex row">
														<div class="col-1 m-auto" style="font-size:30px;"><i class="fas fa-check-circle "></i></div>
														<p class="col-11 my-auto p-4">Tus pagos se realizan de forma segura con encriptación de 256 bits.</p>
														</div>
														
													</div>

												</div>


											</div>

											<div class="sctn-row col-12 d-flex justify-content-end">
													<a class="btn btn-danger col-2 m-3" id="pay-button" style="border-radius:16px;">Pagar</a>
											</div>

										</div>

								</div>
							</form>

					</div>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js" integrity="sha384-w76AqPfDkMBDXo30jS1Sgez6pr3x5MlQ1ZAGC+nuZB+EYdgRZgiwxhTBTkF7CXvN" crossorigin="anonymous"></script>
</body>
</html>