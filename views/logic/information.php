<div class="col-md-12">
    <div class="card">
	<?php  if(isset($_SESSION['admin'])): ?>
<div class="card-header" data-background-color="green-dark">
<?php  endif; ?>
<?php  if(isset($_SESSION['instructor'])): ?>
<div class="card-header" data-background-color="orange">
<?php  endif; ?>
            <h3 class="title"><b>¡Datos Importantes!</b></h3>
           <h4><p class="category"><b>Informate de los eventos pendientes y realizados últimamente . . .</b></p></h4>
        </div> 
        <div class="card-content table-responsive">
        <div class="row">
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="green">
								
									<i class="material-icons">group</i>
								</div>
								<div class="card-content">
								<a href="https://www.facebook.com/Money-work-1960884790840633/">
									<center><p class="category">FACEBOOK</p>
									<h3 class="title">☝</h3></center>
								</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="red">
                                <i class="material-icons">settings_cell</i>
								</div>
								<div class="card-content">
								<a href="https://www.youtube.com/channel/UCnWOvN6N1HedzA4-7XVhOyQ">
									<center><p class="category">YOUTUBE</p>
									<h3 class="title">☝</h3></center>
								</a>
								</div>
							</div>
						</div>
						<div class="col-lg-4 col-md-6 col-sm-6">
							<div class="card card-stats">
								<div class="card-header" data-background-color="blue">
									<i class="material-icons">party_mode</i>
								</div>
								<div class="card-content">
								<a href="https://www.instagram.com/money_work_global/?hl=es-la">
									<center><p class="category">INSTAGRAM</p>
									<h3 class="title">☝</h3></center>
								</a>	
								</div>
							</div>
						</div>

						
					</div>
        </div>
    </div>
</div>