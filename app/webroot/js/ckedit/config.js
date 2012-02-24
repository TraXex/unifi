/*
Copyright (c) 2003-2010, CKSource - Frederico Knabben. All rights reserved.
For licensing, see LICENSE.html or http://ckeditor.com/license
*/

CKEDITOR.editorConfig = function( config )
{
	// Define changes to default configuration here. For example:
	// config.language = 'fr';
	// config.uiColor = '#AADC6E';
        config.filebrowserBrowseUrl = 'file:///Applications/XAMPP/xamppfiles/htdocs/ezeegrab/app/webroot/js/ckedit/filemanager/index.html';
        config.filebrowserImageBrowseUrl = 'file:///Applications/XAMPP/xamppfiles/htdocs/ezeegrab/app/webroot/js/ckedit/filemanager/index.html?type=Images';
        config.filebrowserFlashBrowseUrl = 'file:///Applications/XAMPP/xamppfiles/htdocs/ezeegrab/app/webroot/js/ckedit/filemanager/index.html?type=Flash';
        config.filebrowserUploadUrl = 'file:///Applications/XAMPP/xamppfiles/htdocs/ezeegrab/app/webroot/js/ckedit/filemanager/connectors/php/filemanager.php';
        config.filebrowserImageUploadUrl = 'file:///Applications/XAMPP/xamppfiles/htdocs/ezeegrab/app/webroot/js/ckedit/filemanager/connectors/php/filemanager.php?command=QuickUpload&type;=Images';
        config.filebrowserFlashUploadUrl = 'file:///Applications/XAMPP/xamppfiles/htdocs/ezeegrab/app/webroot/js/ckedit/filemanager/connectors/php/filemanager.php?command=QuickUpload&type;=Flash';
};
