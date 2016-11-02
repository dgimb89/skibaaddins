$( document ).ready(function() {
	var options = { 
		valueNames: [ 'activity_id', 'file', 'type', 'timestamp', 'user', 'affecteduser' ],
		item: '<tr><td class="activity_id" style="display: none;"></td><td class="file"></td><td class="type"></td><td class="timestamp"></td><td class="user"></td><td class="affecteduser"></td></tr>',
		page: 10,
		plugins: [ ListPagination({}) ],
	};
	var listObj = new List('skibaActivities', options);

	var posting = $.get(OC.filePath('skibaaddins', 'ajax', 'getactivityinfo.php'));
	posting.done(function(res) {
		for (var i = res.data.length - 1; i >= 0; i--) {
			listObj.add(res.data[i]);
		}
		listObj.sort('activity_id', { order: "desc" });
	});
});