<div class="section" id="skibaShares">
	<h2><?php p($l->t('Überblick über geteilte Inhalte')); ?></h2>
	<input type="text" class="search" placeholder="Suche" /><br/><br/>

	<table class="grid">
		<thead>
			<tr>
				<th class="sort" style="display: none;" data-sort="id"><strong>id</strong></th>
				<th class="sort" data-sort="file_target"><strong><?php p($l->t('Pfad')); ?></strong></th>
				<th class="sort" data-sort="item_type"><strong><?php p($l->t('Typ')); ?></strong></th>
				<th class="sort" data-sort="uid_initiator"><strong><?php p($l->t('Nutzer')); ?></strong></th>
				<th class="sort" data-sort="share_with"><strong><?php p($l->t('Geteilt mit')); ?></strong></th>
			</tr>
		</thead>
		<tbody class="list">
		</tbody>
	</table>
	<ul class="pagination"></ul>
</div>

<?php
script ( 'skibaaddins', 'list.min' );
script ( 'skibaaddins', 'list.pagination.min' );
script ( 'skibaaddins', 'admin-shares' );
style  ( 'skibaaddins', 'style' );
?>