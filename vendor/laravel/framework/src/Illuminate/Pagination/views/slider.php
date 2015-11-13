<?php
$presenter = new Illuminate\Pagination\BootstrapPresenter($paginator);
?>

<?php if ($paginator->getLastPage() > 1): ?>
	<div class="dataTables_paginate paging_full_numbers" id="dyntable2_paginate">
		<div class="dataTables_info" id="dyntable2_info">Showing <?php echo $paginator->getCurrentPage()?> to <?php echo $paginator->getPerPage()?> of <?php echo $paginator->getTotal()?> entries</div>
		<div class="pagination">
			<a href="<?php echo $paginator->getUrl(1)?>"><span class="first paginate_button paginate_button_disabled" id="dyntable2_first">First</span></a>
			 <span>
				<?php echo $presenter->render(); ?>
			</span>
			<a href="<?php echo $paginator->getUrl($paginator->getLastPage())?>"><span class="last paginate_button" id="dyntable2_last">Last</span></a>
		</div>
	</div>
<?php endif; ?>