		<!-- Main content -->
 		<div class="col-9">
 			<article>
 				<h2><?php echo e($page->title); ?></h2>
 				<?php echo $page->body; ?> 
 			</article>
 		</div>
 		
 		<!-- Sidebar -->
 		<div class="col-3 sidebar">
 			<h2>Recent news</h2>
<?php $this->load->view('sidebar'); ?>
 		</div>