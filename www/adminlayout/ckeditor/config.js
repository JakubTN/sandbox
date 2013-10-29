/**
 * @license Copyright (c) 2003-2013, CKSource - Frederico Knabben. All rights reserved.
 * For licensing, see LICENSE.html or http://ckeditor.com/license
 */

CKEDITOR.editorConfig = function( config ) {
	config.language = 'sk';
	config.removePlugins = 'elementspath';
	config.filebrowserUploadUrl = window.info.basePath+'/admin/content?do=ckeditorImageUpload';
	
	// Toolbar configuration generated automatically by the editor based on config.toolbarGroups.
	config.toolbar = [
		{ name: 'document', items: [ 'Source', '-', 'Maximize', '-', 'Templates' ] },
		{ name: 'clipboard', items: [ 'Cut', 'Copy', 'Paste', 'PasteText', 'PasteFromWord', 'Undo', 'Redo' ] },
		{ name: 'basicstyles', items: [ 'Bold', 'Italic', 'Underline', 'Strike', 'Subscript', 'Superscript', 'RemoveFormat' ] },
		{ name: 'paragraph', items: [ 'NumberedList', 'BulletedList', 'Outdent', 'Indent', 'Blockquote', 'CreateDiv', 'JustifyLeft', 'JustifyCenter', 'JustifyRight', 'JustifyBlock', 'BidiLtr', 'BidiRtl' ] },
		{ name: 'links', items: [ 'Link', 'Unlink', 'Anchor' ] },
		{ name: 'insert', items: [ 'CreatePlaceholder', 'Image', 'Flash', 'Table', 'HorizontalRule', 'SpecialChar', 'PageBreak', 'Iframe', 'InsertPre' ] },
		{ name: 'styles', items: [ 'Styles', 'Format', 'Font', 'FontSize'] },
		{ name: 'colors', items: [ 'TextColor', 'BGColor' ] },
	];
};
