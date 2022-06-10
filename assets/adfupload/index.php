<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8"/>
    <title>Fileinout</title>


    

    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link href="css/font/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="css/font/fontawesome/css/all.css">

    <!-- load the CSS files in the right order -->
	<link href="css/fileinput.min.css" rel="stylesheet">
	<link href="themes/explorer/theme.css" rel="stylesheet">

	<script src="js/jquery-3.3.1.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="css/font/bootstrap.min.js"></script>

	<!-- load the JS files in the right order -->
	<script src="js/fileinput.js"></script>
	<script src="themes/fas/theme.js" type="text/javascript"></script>
	<script src="themes/explorer/theme.js"></script>
	<script src="themes/explorer-fas/theme.js" type="text/javascript"></script>
	<script src="js/locales/fa.js" type="text/javascript"></script>
    <script src="js/plugins/piexif.js" type="text/javascript"></script>
    <script src="js/plugins/sortable.js" type="text/javascript"></script>

</head>
<body>

	<div class="file-loading">
	    <input id="input-ke-2" name="input-ke-2[]" type="file" multiple>
	</div>


	<script type="text/javascript">
	$("#input-ke-2").fileinput({
	    theme: "explorer",
	    language: 'fa',
	    uploadUrl: "/file-upload-batch/2",
	    minFileCount: 2,
	    maxFileCount: 5,
	    maxFileSize: 10000,
	    removeFromPreviewOnError: true,
	    overwriteInitial: false,
	    previewFileIcon: '<i class="fas fa-file"></i>',
	    initialPreviewAsData: true, // defaults markup  
	    uploadExtraData: {
	        img_key: "1000",
	        img_keywords: "happy, nature"
	    },
	    preferIconicPreview: true, // this will force thumbnails to display icons for following file extensions
	         previewFileIconSettings: { // configure your icon file extensions
	        'doc': '<i class="fas fa-file-word text-primary"></i>',
	        'xls': '<i class="fas fa-file-excel text-success"></i>',
	        'ppt': '<i class="fas fa-file-powerpoint text-danger"></i>',
	        'pdf': '<i class="fas fa-file-pdf text-danger"></i>',
	        'zip': '<i class="fas fa-file-archive text-muted"></i>',
	        'htm': '<i class="fas fa-file-code text-info"></i>',
	        'txt': '<i class="fas fa-file-alt text-info"></i>',
	        'mov': '<i class="fas fa-file-video text-warning"></i>',
	        'mp3': '<i class="fas fa-file-audio text-warning"></i>',
	        // note for these file types below no extension determination logic 
	        // has been configured (the keys itself will be used as extensions)
	        'jpg': '<i class="fas fa-file-image text-danger"></i>', 
	        'gif': '<i class="fas fa-file-image text-muted"></i>', 
	        'png': '<i class="fas fa-file-image text-primary"></i>'    
	    },
	    previewFileExtSettings: { // configure the logic for determining icon file extensions
	        'doc': function(ext) {
	            return ext.match(/(doc|docx)$/i);
	        },
	        'xls': function(ext) {
	            return ext.match(/(xls|xlsx)$/i);
	        },
	        'ppt': function(ext) {
	            return ext.match(/(ppt|pptx)$/i);
	        },
	        'zip': function(ext) {
	            return ext.match(/(zip|rar|tar|gzip|gz|7z)$/i);
	        },
	        'htm': function(ext) {
	            return ext.match(/(htm|html)$/i);
	        },
	        'txt': function(ext) {
	            return ext.match(/(txt|ini|csv|java|php|js|css)$/i);
	        },
	        'mov': function(ext) {
	            return ext.match(/(avi|mpg|mkv|mov|mp4|3gp|webm|wmv)$/i);
	        },
	        'mp3': function(ext) {
	            return ext.match(/(mp3|wav)$/i);
	        }
	    }
	});
	</script>

</body>
</html>