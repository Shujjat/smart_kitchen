
					if( !('articles_name' in CKEDITOR.instances)) {
						CKEDITOR.replace( 'articles_name' );
					}

					if( !('articles_body' in CKEDITOR.instances)) {
						CKEDITOR.replace( 'articles_body' );
					}
$('#articles_last_update_on').datetimepicker({ dateFormat: 'yy-mm-dd', timeFormat: 'hh:mm:ss'});

