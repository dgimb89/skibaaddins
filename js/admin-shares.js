$( document ).ready(function() {
	var options = { 
		valueNames: [ 'id', 'file_target', 'item_type', 'uid_initiator', 'share_with' ],
		item: '<tr><td class="id" style="display: none;"></td><td class="file_target"></td><td class="item_type"></td><td class="uid_initiator"></td><td class="share_with"></td></tr>',
		page: 10,
		plugins: [ ListPagination({}) ],
	};
	var listObj = new List('skibaShares', options);

	var posting = $.get(OC.filePath('skibaaddins', 'ajax', 'getsharesinfo.php'));
	posting.done(function(res) {
		for (var i = res.data.length - 1; i >= 0; i--) {
			listObj.add(res.data[i]);
		}
		listObj.sort('id', { order: "desc" });
	});
});