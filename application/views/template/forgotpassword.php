<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta name="viewport" content="width=device-width" />
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <title></title>
<style>
	@import url('https://fonts.googleapis.com/css?family=Poppins:400,400i,500,500i,600,600i,700,700i&display=swap');
	.container{
		display: block !important;
		max-width: 600px !important;
		margin: 0 auto !important;
		clear: both !important;
	}
	.contain{
		max-width: 600px;
		margin: 0 auto;
		display: block;
		padding: 20px;
	}
	.main{
		background: #f3ebeb38;
		border: 3px solid #382475;
		border-radius: 10px;
	}
	.content-wrap{
		padding: 20px;
	}
	.content-block{
		padding: 0 0 20px;
		text-align: justify;
	}
	.aligncenter{
		text-align: center;
	}
	.btn-primary{
		text-decoration: none;
		color: #FFF;
		background-color: #1ab394;
		border: solid #1ab394;
		border-width: 5px 10px;
		line-height: 2;
		font-weight: bold;
		text-align: center;
		cursor: pointer;
		display: inline-block;
		border-radius: 5px;
		text-transform: capitalize;
	}
	.body-wrap{
		background-color: #f6f6f6;
		width: 100%;
	}
</style>
</head>

<body>

<table class="body-wrap">
    <tr>
        <td></td>
        <td class="container" width="600">
            <div class="content">
                <table class="main" width="100%" cellpadding="0" cellspacing="0">
                    <tr>
                        <td class="content-wrap">
                            <table  cellpadding="0" cellspacing="0">
                                <tr>
                                    <td style="text-align: center;">
                                        <img class="img-fluid" style= "width:200px; height: 200px;" src="https://sangbadraatdin.in/uploads/general/logo_login.png"/>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        <h3>Hi, <?=$name;?></h3>
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                        Welcome to Sangbad Raatdin. To reset your password Click on button and set your password.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block">
                                       This link only valid for 10 minutes.
                                    </td>
                                </tr>
                                <tr>
                                    <td class="content-block aligncenter">
                                        <a href="<?=base_url('');?>Forgotpassword/resetlink?url=<?=$url;?>" class="btn-primary">Confirm email address</a>
                                    </td>
                                </tr>
                              </table>
                        </td>
                    </tr>
                </table>
                <div class="footer">
                    <table width="100%">
                        <tr>
                            <td class="aligncenter content-block"><a href="#"></td>
                        </tr>
                    </table>
                </div></div>
        </td>
        <td></td>
    </tr>
</table>

</body>
</html>
