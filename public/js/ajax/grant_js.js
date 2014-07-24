$(document).ready(function(){
	
	/*$(document).on("click",".btn_infor", function(e){
		e.preventDefault();
		var role_id = $(this).data("id");
		var url = $("#baseUrl").val()+"index.php/setting/manage_partnermanager";
		$.post(url, {role_id:role_id }).done(function(data){
			$("#body_panel").html(data);
		});
	} );*/
	
	$(document).on("click",".get_role",function(e){
		//alert($(this).data("id"));
		var user_id = $(this).data("id");
		var url = $("#baseUrl").val()+"index.php/setting/get_role_id";
		$.post(url, {'user_id':user_id}).done(function(data){
			$("#"+user_id).html(data);
		});
	});
	
	
	//ajax update enable
	$(document).on("click",".chk_enable",function(e){
		if($(this).val()==1){
			$(this).attr('value',0);
		}
		else{
			$(this).attr('value',1);
		}
		var id= $(this).data("id");
		var name=$(this).data("name");
		var val=$(this).val();
		var url= $("#baseUrl").val()+"index.php/setting/update_enable";
		$.post(url, {'id':id,'val':val}).done(function(data){
			if(data){
					if(val==1){
						alert("You just enable  user "+name);
					}else{
						
						alert("You just disable  user "+name);
					}
					
				}
		});
	});


	$(".grant").click(function(e){
		//alert(1);
		e.preventDefault();
		//var user_id = $(this).data("id");
		alert(user_id);
		//var url= $("#baseUrl").val()+"index.php/setting/grant_user";
		
		$.post(url, {user_id:user_id}).done(function(data){
			$('#loadmodal').html(data);
			$('#myModal').modal();
		});
	});



/*function      what = a[--L];
        while ((ax= arr.indexOf(what)) !== -1) {
            arr.splice(ax, 1);
        }
    }
    return arr;
tion removeA(arr) {
    var what, a = arguments, L = a.length, ax;
    while (L > 1 && arr.length) {
 }*/




// xoa 1 per
/*	var per_id= [];
	$(document).on('click','.inp_per',function(){
		var value = $(this).val();
		
		if($(this).prop('checked') == true){
			per_id[per_id.length] = $(this).val();	
		}
		else{
			var index = $.inArray(value, per_id);
			per_id.splice(index, 1);	
		}
		//alert(per_id);
	});

	$(document).on('click','.btn_g',function(){
		//alert(1);
		var attr = $(this).val();
		//alert(attr);
		var user_id = $("#inp_userid").val()
		var url =  $("#baseUrl").val()+"index.php/grant_user/"+attr;
		alert(url);
		$.post(url, {per_id:per_id, user_id:user_id}, function(){
			//$("#body_panel").html(data);
			)
		});
			
	});*/
	
})