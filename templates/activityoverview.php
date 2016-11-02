<div class="section" id="skibaActivities">
	<h2><?php p($l->t('Aktivitätenüberblick')); ?></h2>
	<input type="text" class="search" placeholder="Suche" /><br/><br/>

	<table class="grid">
		<thead>
			<tr>
				<th class="sort" style="display: none;" data-sort="activity_id"><strong>activity_id</strong></th>
				<th class="sort" data-sort="file"><strong><?php p($l->t('Pfad')); ?></strong></th>
				<th class="sort" data-sort="type"><strong><?php p($l->t('Typ')); ?></strong></th>
				<th class="sort" data-sort="timestamp"><strong><?php p($l->t('Datum')); ?></strong></th>
				<th class="sort" data-sort="user"><strong><?php p($l->t('Nutzer')); ?></strong></th>
				<th class="sort" data-sort="affecteduser"><strong><?php p($l->t('Geteilt mit')); ?></strong></th>
			</tr>
		</thead>
		<tbody class="list">
		</tbody>
	</table>
	<ul class="pagination"></ul>
</div>

<?php
	script ( 'skibaaddins', 'admin-activity' );
?>