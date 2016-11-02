/*
 * Copyright (c) 2016 Daniel Gimbatschki <gimbatschki@elkom-plan.de>
 *
 * This file is licensed under the Affero General Public License version 3
 * or later.
 *
 * See the COPYING-README file.
 *
 */

(function(OCA) {

	OCA.Files = OCA.Files || {};

	/**
	 * @namespace OCA.Files.SkibaPlugin
	 *
	 * Extends the file actions and file list to include a favorite action icon
	 * and addition "data-tags" and "data-favorite" attributes.
	 */
	OCA.Files.SkibaPlugin = {
		name: 'Skiba',

		allowedLists: [
			'files',
			'favorites'
		],

		/**
		 * Extends display name of shared files with complete original folder structure
		 */
		_extendFileList: function(fileList) {
			// extend row prototype
			var that = this;
			that._originalSharePaths = null;
			fileList.$el.addClass('has-skiba');
			var oldCreateRow = fileList._createRow;


			// check if listed file is shared with you
			var isSharedWithYou = function(fileData) {
				return Object.prototype.hasOwnProperty.call(fileData, 'shareOwner');
			};

			var updateRow = function(tr, fileData) {
				// stop update when ajax failed
				if(that._originalSharePaths === false)
					return;

				// stall update until data received
				if(that._originalSharePaths === null) {
					setTimeout(updateRow.bind(that, tr, fileData), 50);
					return;
				}

				var displayName = fileData.displayName || fileData.name;
				var directory = '';
				if(fileData.id in that._originalSharePaths) {
					directory = that._originalSharePaths[fileData.id];
					directory = directory.substr(0, directory.lastIndexOf(fileData.name));
				}

				// apply displayname
				$(tr).find('span.innernametext').text(directory + displayName);
			};

			fileList._createRow = function(fileData) {
				var tr = oldCreateRow.apply(this, arguments);

				if(isSharedWithYou(fileData))
					updateRow(tr, fileData);

				return tr;
			}

			// requesting mount point via ajax
			var posting = $.get(OC.filePath('skibaaddins', 'ajax', 'getoriginalfolderstructure.php'));
			posting.done(function(res) {
				that._originalSharePaths = res.data;
			});
			posting.fail(function() {
				that._originalSharePaths = false;
				fileList._createRow = oldCreateRow;
			});
		},

		attach: function(fileList) {
			if (this.allowedLists.indexOf(fileList.id) < 0) {
				return;
			}
			this._extendFileList(fileList);
		},
	};
})(OCA);

OC.Plugins.register('OCA.Files.FileList', OCA.Files.SkibaPlugin);