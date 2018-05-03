<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<?= $this->Html->css('login') ?>
<!------ Include the above in your HEAD tag ---------->

<div class="container">

<div class="row" style="margin-top:20px">
    <div class="col-xs-12 col-sm-8 col-md-6 col-sm-offset-2 col-md-offset-3">
		<?= $this->Flash->render('auth') ?>
		<?= $this->Form->create() ?>
			<fieldset>
				<h2>Ingrese sus datos</h2>
				<hr class="colorgraph">
				<div class="form-group">
					<?= $this->Form->control('email', ['class' => 'form-control input-lg', 'placeholder' => 'Correo electrónico', 'label' => false, 'required']) ?>
				</div>
				<div class="form-group">
					<?= $this->Form->control('password', ['class' => 'form-control input-lg', 'placeholder' => 'Contraseña', 'label' => false, 'required']) ?>
				</div>
				<hr class="colorgraph">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6">
						<?= $this->Form->button('Acceder', ['class' => 'btn btn-lg btn-success btn-block']) ?>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6">
						<?= $this->Html->link('Registrase', ['controller' => 'Users', 'action' => 'add'], ['class' => 'btn btn-lg btn-primary btn-block']) ?>
					</div>
				</div>
			</fieldset>
		<?= $this->Form->end() ?>
	</div>
</div>

</div>