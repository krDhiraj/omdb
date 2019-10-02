<section class="header">
	<h2>
		<a href="javascript:void(0)" onclick="main();"><img src="<?= base_url(); ?>assets/img/back-arrow.png"></a>Search Results
	</h2>
	<p><?= $text?></p>
</section>
<section class="movie-list">
	<?php if(!empty($Search) && is_array($Search)){
		foreach ($Search as $key => $value) { ?>
			<div class="col-4">
				<div class="movie-desc" id="<?= !empty($value['imdbID']) ? $value['imdbID'] : '';?>">
					<div class="movie-banner">
						<img src="<?= (!empty($value['Poster']) && $value['Poster'] !== 'N/A') ? $value['Poster'] : base_url().'assets/img/na.jpg';?>">
					</div>
					<div>
						<h3><?= !empty($value['Title']) ? $value['Title'] : '';?></h3>
						<p>Release year : <?= !empty($value['Year'])?$value['Year']:'';?></p>
						<p>Type : <?= !empty($value['Type'])? ucfirst($value['Type']):'';?></p>
					</div>
				</div>
			</div>
		<?php } } ?>
</section>
