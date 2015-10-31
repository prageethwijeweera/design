<?php
class Ajax{
		
	public function submitForm($data=array()){
		//form - name attribute
		//do   - ajax page do_
		//get - ajax result
		//do_pages
		//fancybox - open fancy box
		//inline_result_id - inline result
		//inline_result_url - inline result load url
		$ajax_path = ($data['ajax_path']!="")?$data['ajax_path'] :  AJAX_PATH;
		
		return '<script language="javascript" type="text/javascript">
					$(document).ready(function (data){
						$(\'form[name='.$data['form'].']\').validate({
								submitHandler: function(form) {
									$.ajax({
										type : \'post\',
										url	   : \'' . $ajax_path . ''. $data['do'].'\',
										data   : $(form).serialize(),
										dataType : \'json\',
										success : function(data){
											if(data.status){
												$(\''. $data['get'] .'\').html(data.message).removeClass("sys_message information").addClass("success").fadeIn(1000).delay(2000).fadeOut(1000);
												if(data.inline_result){ 
													$(data.inline_result_id).hide().load(data.inline_result_url).slideDown(600);
													$(\'form[name='.$data['form'].']\').hide();
												}												
												if(data.fancybox){
														$.fancybox({
														 	\'href\'	:	data.fancyboxurl,
														 	\'overlayShow\'	: true,
															\'transitionIn\'	: \'fade\',
															\'transitionOut\'	: \'elastic\',
															\'width\'			: \'75%\',
															\'height\'			: \'100%\',
															\'modal\'			: true,
															\'showCloseButton\' : false
														});
													}
												try {$.fancybox.close();} catch(e){}
												if(data.jredirect){
													window.location = data.jredirecturl;
												}	
											} else {
												
												$(\''. $data['get'] .'\').html(data.message).removeClass("sys_message success").addClass("information").fadeIn(1000).delay(2000).fadeOut(1000);
											
											}
																					
										},
										error : function(data) { alert("missing file"); }
									});
									
									return false;
								 }
						});
					});
				</script>';
	}
	
	public function formValidate($data){
		return '<script type="text/javascript" language="javascript">
					$(document).ready(function (data){
						$(\'form[name='.$data['form'].']\').validate()
					});
				</script>';
	}
	
	public function fancybox_close($data){
		return '<script language="javascript" type="text/javascript">
		$(document).ready(function (data){
			$(\'input[name='.$data['name'].']\').click( function (data){
				try {$.fancybox.close();} catch(e){}
			});
		});
		</script>';
	}
	
	public function showHide($click='',$id=''){
		return '<script language="javascript" type="text/javascript">
					$(document).ready(function (data){
						$(\''.$click.'\').click( function (data) {
							$(\''.$id.'\').hide().fadeIn(1000);
						});
					});
				</script>';
	}
	
	public function loadPage($data=array()){
		//form - name attribute
		//do   - ajax page do_
		//get - ajax result
		return '<script language="javascript" type="text/javascript">
					$(document).ready(function (data){
							$(\'form[name='.$data['form'].']\').submit(function (data){
								$.ajax({
									method : \'post\',
									url	   : \'' . AJAX_PATH . ''. $data['do'].'\',
									data   : $(this).serialize(),
									dataType : \'html\',
									success : function(data){
										$(\''. $data['get'] .'\').hide().html(data).slideDown(800);
									},
									error : function(data) {alert(\'missing file\'); }
								});
								return false;
							});
					});
				</script>';
	}
	
	public function populateParentsChilds($data=array()){
		//parent
		//do
		//child
		
		return '<script type="text/javascript" language="javascript">
					$(document).ready(function (data){
						$(\'select[name='.$data['parent'].']\').change(function (data){
							$(\'select[name='.$data['child'].']\').empty();
								$.ajax({
									type : \'post\', 
									dataType : \'json\',
									url	 : \'' . AJAX_PATH . ''. $data['do'].'\',
									data : $(this).serialize(),
									success : function(data){
										$.each(data, function(index,value){
											$(\'select[name='.$data['child'].']\').append("<option value=" + value.id + ">" + value.name + "</option>");
										});
									}
								});
						});
					});
					</script>';
	} 
	
	public function tagAutoComplete($data){
		$id = $data['id'];		
		return '<script type="text/javascript">
        $(document).ready(function() {
        	$(\''. $id .'\').tokenInput("http://shell.loopj.com/tokeninput/tvshows.php", {
                theme: "facebook"
            });
        });
        </script>';
	}
	
	public function fancyBoxAuto($url){
		return '<script type="text/javascript">
				 $(document).ready(function (data){
					$.fancybox({
					 	\'href\'	:	\'' . $url . '\',
					 	\'overlayShow\'	: true,
						\'transitionIn\'	: \'fade\',
						\'transitionOut\'	: \'elastic\',
						\'width\'			: \'75%\',
						\'height\'			: \'100%\'
					});
					});
				</script>';
	}
	
	public function fancyBox($id){
		return '<script type="text/javascript">
					 $("#'.$id.'").fancybox({
						  	\'overlayShow\'	: true,
							\'transitionIn\'	: \'fade\',
							\'transitionOut\'	: \'elastic\',
							\'width\'			: \'75%\',
							\'height\'			: \'100%\'
						});
				</script>';
	}
	
	public function fancyBoxByRel($name){
		return '<script type="text/javascript">
					 $("a[rel='.$name.']").fancybox({
						  	\'overlayShow\'	: true,
							\'transitionIn\'	: \'fade\',
							\'transitionOut\'	: \'fade\',
							\'width\'			: \'75%\',
							\'height\'			: \'100%\'
						});
				</script>';
	}
	
	public function fancyBoxByClass($name){
		return '<script type="text/javascript">
					 $(".'.$name.'").fancybox({
						autoCenter : true,
						scrolling : \'no\'
					 });
				</script>';
	}
	
	public function submitFormWithValidate($data=array()){
		//form - name attribute
		//do   - ajax page do_
		// get - ajax result
		return '<script language="javascript" type="text/javascript">
					$(document).ready(function (data){
						$(\'form[name='.$data['form'].']\').validate({
								submitHandler: function(form) {
									$.ajax({
										method : \'post\',
										url	   : \'' . AJAX_PATH . ''. $data['do'].'\',
										data   : $(form).serialize(),
										dataType : \'html\',
										success : function(data){
											$(\''. $data['get'] .'\').html(data).fadeIn(1000);
										},
										error : function(data) {alert(\'missing file\'); }
									});
									return false;
								 }
						});
					});
				</script>';
	}
	
	public function mask($id,$patten){
		return '<script language="javascript" type="text/javascript">
					$(document).ready(function (data){
						 $("#'.$id.'").mask("'.$patten.'");
					});
				</script>';
	}
	
	public function uploadify_Auto($id,$response){
		return '<script type="text/javascript" language="javascript">
				$(document).ready(function() {
				  $(\'#'.$id.'\').uploadify({
					\'uploader\'  : \'' . PATH_3DPARTY . 'uploadify/uploadify.swf\',
					\'script\'    : \'' . PATH_3DPARTY . 'uploadify/uploadify_image_resize_watermark_small.php\',
					\'cancelImg\' : \'' . PATH_3DPARTY . 'uploadify/cancel.png\',
					\'folder\'    : \'' . UPLOAD_ITEM_PATH . '\',
					\'auto\'      : true,
					\'multi\'    : false,
					\'fileSizeLimit\' : \'70KB\',
					\'uploadLimit\' : 1,
					\'fileExt\'     : \'*.jpg;*.png;*.gif;*.jpeg\',
					\'onComplete\'  : function(event, ID, fileObj, response, data) {
						$(\'#'.$response.'\').empty();
						$(\'#'.$response.'\').append(\'<li class="span4"><div class="thumbnail"><img src="'. UPLOAD_THUMB_PATH .'\' + response + \'"><input type="checkbox" name="images[]" value="\' + response + \'" checked /> Select</div></li>\');
					}
				  });				  	
				});
				</script>';
	}
	
	public function uploadify($id,$response){
		//<a href="javascript:$('#file_upload').uploadifyUpload($('.uploadifyQueueItem').last().attr('id').replace('file_upload',''));">Upload Last File</a>
		return '<script type="text/javascript" language="javascript">
				$(document).ready(function() {
				  $(\'#'.$id.'\').uploadify({
					\'uploader\'  : \'' . PATH_3DPARTY . 'uploadify/uploadify.swf\',
					\'script\'    : \'' . PATH_3DPARTY . 'uploadify/uploadify.php\',
					\'cancelImg\' : \'' . PATH_3DPARTY . 'uploadify/cancel.png\',
					\'folder\'    : \'' . UPLOAD_FILE_PATH . '\',
					\'auto\'      : true,
					\'multi\'	  : false,
					\'fileExt\'     : \'*.pdf;*.doc;*.docx;*.ppt\',
					\'onComplete\'  : function(event, ID, fileObj, response, data) {
				      $(\'#'.$response.'\').val(response);
				    }
				  });
				  	
				});
				</script>';
	}
	
	public function uploadify_multi_resizeimage_withwatermark($id,$response){
		return '<script type="text/javascript" language="javascript">
				$(document).ready(function() {
				  $(\'#'.$id.'\').uploadify({
					\'uploader\'  : \'' . PATH_3DPARTY . 'uploadify/uploadify.swf\',
					\'script\'    : \'' . PATH_3DPARTY . 'uploadify/uploadify_image_resize_watermark.php\',
					\'cancelImg\' : \'' . PATH_3DPARTY . 'uploadify/cancel.png\',
					\'folder\'    : \'' . UPLOAD_ITEM_PATH . '\',
					\'auto\'      : true,
					\'multi\'	  : true,
					\'fileExt\'     : \'*.jpg;*.png;*.gif;*.jpeg\',
					\'onComplete\'  : function(event, ID, fileObj, response, data) {
						$(\'#'.$response.'\').append(\'<li><div class="img-thumbnail"><img src="'. UPLOAD_THUMB_PATH .'\' + response + \'"><br /><input type="checkbox" name="images[]" value="\' + response + \'" checked /> Select <br /> <input type="text" class="form-control" name="image_description[]" placeholder="Description"></div></li>\');
					}
				  });				  	
				});
				</script>';
	}
	
	public function setAutoSize($id,$normal,$width){
		return '<script type="text/javascript" language="javascript">
				$(document).ready(function() {
					$(\'#'.$id.'\').focus(function(){						
						$(this).animate({
							width: '.$width .'
						}, 800 )
					});
					$(\'#'.$id.'\').blur(function(){						
						$(this).animate({
							width: '.$normal .'
						}, 800 )
					});
				});
				</script>';
	}
	
	public function setAutoSizeHeight($id,$normal,$height){
		return '<script type="text/javascript" language="javascript">
				$(document).ready(function() {
					$(\'#'.$id.'\').focus(function(){						
						$(this).animate({
							height: '.$height .'
						}, 800 )
					});
					$(\'#'.$id.'\').blur(function(){						
						$(this).animate({
							height: '.$normal .'
						}, 800 )
					});
				
				});
				</script>';
	}
	public function bootpage($data){
		$contentpanel = $data['content'];
		$paginationpanel = $data['pagination'];
		$total = round($data['total'] / MAX_ITEMS_PER_PAGE, 0);
		$do 	= $data['do'];
		
		$searchform = $data['form'];
		
    	return '<script type="text/javascript" language="javascript">
    				$("'.$contentpanel.'").load("'. AJAX_PATH . 'pagination/' . $do .'", {next: 0}); 
					
    				$(\''.$paginationpanel.'\').bootpag({
					    total: '.$total.',
					    page: 1,
					    maxVisible: 10,
					    href: "#page-{{number}}", 	
					    leaps: true,
					    next: \'next\',
					    prev: \'prev\'
				    }).live(\'page\', function(event, num){
				    	$("'.$contentpanel.'").hide().load("'. AJAX_PATH . 'pagination/' . $do .'", {next:(num - 1) * '. MAX_ITEMS_PER_PAGE .'}).fadeIn(200); 
					});
				</script>';
	}
	
	public function twbsPagination($data){
		$contentpanel = $data['content'];
		$paginationpanel = $data['pagination'];
		$total = round($data['total'] / MAX_ITEMS_PER_PAGE, 0);
		$do 	= $data['do'];
		return '
			<script type="text/javascript" language="javascript">
				$("'.$contentpanel.'").load("'. AJAX_PATH . 'pagination/' . $do .'", {next: 0});
				$(\''.$paginationpanel.'\').twbsPagination({
					totalPages: '.$total.',
					visiblePages: 4,
					onPageClick: function (event, num) {
						$("'.$contentpanel.'").hide().load("'. AJAX_PATH . 'pagination/' . $do .'", {next:(num - 1) * '. MAX_ITEMS_PER_PAGE .'}).fadeIn(200);
					}
				});
			</script>';
	}
}
?>
