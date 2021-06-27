$(document).ready(function Userlist(){
    $.ajax({
        url: "Api/User/List",
        method: 'POST',
        data: {
            secrate_key : 'demokey'
        },
        }).done(function(data) {
            let response = JSON.parse(data);
			if (response.status == 404)
            {
            top.location.href = "admin";
            }
            else if (response.status == 402){
                top.location.href = "ErrorUserbyPermission";
            }
			var html = '';
            var i;
			for(i=0; i < response.data.list.length; i++){
                if (response.data.list[i].nstatus == 0){
                    html +='<div class="contact-box center-version"style="border: 6px solid #0cf008; border-radius: 10px;width: 25%;"><a><img alt="" class="rounded-circle" src="'+response.data.list[i].image+'"><h3 class="m-b-xs"><strong>'+response.data.list[i].name+'</strong></h3><div class="fa fa-user-secret">'+response.data.list[i].status+'</div><div class="font">C/O-'+response.data.list[i].co+'</div><div class="font">Blood Group-'+response.data.list[i].blood+'</div><address class="m-t-md"><h5>'+response.data.list[i].address+'</h5><abbr title="Phone" class="fa fa-phone">'+response.data.list[i].mobile+'</abbr><br><abbr title="Email" class="fa fa-envelope">'+response.data.list[i].email+'</abbr></address></a><div class="contact-box-footer"><button onclick="inactiveuser('+response.data.list[i].slno+')" type="button" class="btn btn-warning fa fa-check-circle-o"></button><button type="button" onclick="edituser('+response.data.list[i].slno+')" class="btn btn-info fa fa-pencil"></button><button onclick="deleteuser('+response.data.list[i].slno+')" type="button" class="btn btn-danger fa fa-trash"></button><button type="button" data-toggle="modal" data-target="#myModal20" class="btn btn-success fa fa-eye"></button></div></div><br>';
                }
                else if (response.data.list[i].nstatus == 1){
                    html +='<div class="contact-box center-version" style="border: 6px solid #f60b36; border-radius: 10px;width: 25%;"><a><img alt="" class="rounded-circle" src="'+response.data.list[i].image+'"><h3 class="m-b-xs"><strong>'+response.data.list[i].name+'</strong></h3><div class="fa fa-user-secret">'+response.data.list[i].status+'</div><div class="font">C/O-'+response.data.list[i].co+'</div><div class="font">Blood Group-'+response.data.list[i].blood+'</div><address class="m-t-md"><h5>'+response.data.list[i].address+'</h5><abbr title="Phone" class="fa fa-phone">'+response.data.list[i].mobile+'</abbr><br><abbr title="Email" class="fa fa-envelope">'+response.data.list[i].email+'</abbr></address></a><div class="contact-box-footer"><button onclick="activeuser('+response.data.list[i].slno+')" type="button" class="btn btn-primary fa fa-check-circle-o"></button><button type="button" onclick="edituser('+response.data.list[i].slno+')" class="btn btn-info fa fa-pencil"></button><button onclick="deleteuser('+response.data.list[i].slno+')" type="button" class="btn btn-danger fa fa-trash"></button><button type="button" data-toggle="modal" data-target="#myModal20" class="btn btn-success fa fa-eye"></button></div></div><br>';
                }
            }
		   $('#user').html(html);
    });
});