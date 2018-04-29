		<!-- Main content -->
 		<div class="col-9">
 			<div class="row">
 				<div class="col-9"><?php if(isset($articles[0])) echo get_excerpt($articles[0]); ?></div>
 			</div>
 			<div class="row">
	 			<div class="col-5"><?php if(isset($articles[1])) echo get_excerpt($articles[1]); ?></div>
	 			<div class="col-4"><?php if(isset($articles[2])) echo get_excerpt($articles[2]); ?></div>
	 		</div>
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="col-3 sidebar">
 			<h2>Recent news</h2>
<?php $articles = array_slice($articles, 3); ?>
<?php echo article_links($articles); ?>
 		</div>