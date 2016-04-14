LOGIN

<?php
	//Security::checkAdminByPass(); //TODO
?>

<script type="text/javascript">
    
	entrer = function(e)
	{
		var code;
		if (e.keyCode) code = e.keyCode;
		else if (e.wich) code = e.wich;
		if (code == 13)
		{
			check_user_login();
		}
    }

    check_user_login = function()
	{
		Helper.secure('login_form', {'action': 'login'}, false, function(data)
		{
			if ( data.code > 0)
			{				
				var s = data.messages.toString();
				var t = s.split("|");
				if (t[0] == "querystring") 
				{						
					document.location.href = "index.php?" + t[1];						
				}
				else
				{					
					Helper.load('header_page',{'action' : 'updateheader'});
					Helper.load('content',{'action' : 'home'});
				}
			}
			else
			{
				Helper.showErrorMessage(data.messages);
			}
		});
    }
	
	$(document).ready(function(){	
		$('#bt_login').click(function()
		{
			check_user_login();
		});
		$('#bt_lpwd').click(function()
		{			
			Helper.load('content',{'action' : 'lostpassword'});
		});
	});
	
</script>

<form id="login_form">
<table border="0" cellspacing="0" cellpadding="0" align="center"  width="986" height="298" style=" margin-top:-24px;	background-image:url(assets/images/back_login.jpg); background-repeat:no-repeat" >
<tr align="center">
	<td>
    	<table><tr><td>
		<table border="0" cellspacing="0" cellpadding="0" align="center">
			<tr>
				<td  align="right"  style="padding-right:4px; padding-bottom:8px"  class="color_white"><strong><?=BackendTexts::get('auth_login')?></strong></td>
				<td  style="padding-bottom:8px"><input type="text" name="in_login" /></td>
			</tr>
			<tr>
				<td  align="right" style="padding-right:4px;padding-bottom:8px" class="color_white"><strong><?=BackendTexts::get('auth_pwd')?></strong></td>
				<td  style="padding-bottom:12px"><input type="password" name="in_password" onkeypress="entrer(event)"/></td>
			</tr>

			<tr>
				<td align="right">&nbsp;</td>
			  <td align="center" style="padding-bottom:8px"><input type="button" class="button_login" id="bt_login" value="<?=BackendTexts::get('auth_button')?>"/>
				</td>
		    </tr>
			<tr>
			  <td align="right">&nbsp;</td>
			  <td align="center" style="padding-bottom:10px"><a href="#" id="bt_lpwd" class="color_white"><?=BackendTexts::get('auth_lostpwd')?></a></td>
		  </tr>
		</table>
        </td><td width="30">&nbsp;</td><td><img src="assets/images/authentification.jpg" border=0/></td></tr></table>
		</td>
       
  </tr>
</table></form>
