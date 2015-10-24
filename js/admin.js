/**
 * @author user
 */

//刪除警告

$(document).ready(function(){
	$("a.del").on("click", function(){
		var yesorno = confirm("確定刪除?");
		if(yesorno){
			//確定
			
		}else{
			//取消
			return false;
		}
	});
});
//退回警告

$(document).ready(function(){
	$("a.return").on("click", function(){
		var yesorno = confirm("確定退回?");
		if(yesorno){
			//確定
			
		}else{
			//取消
			return false;
		}
	});
});
