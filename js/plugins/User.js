$(document).ready(function(){
    $.ajax({
        url: "Api/General/BloodGroup",
        method: 'POST',
        data: {
            secrate_key : 'demokey'
        },
        }).done(function(data) {
            let response = JSON.parse(data);
            var html = '';
            html +='<option value="">Select Blood Group</option>';
			var i;
            for(i=0; i < response.data.blood.length; i++){
            html += '<option value='+response.data.blood[i].b_group+'>'+response.data.blood[i].b_group+'</option>';
           }
         $('select#blood').html(html);
           
    });
});
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
                    html +='<div class="contact-box center-version"style="border: 6px solid #0cf008; border-radius: 10px"; }><a><img alt="" class="rounded-circle" src="'+response.data.list[i].image+'"><h3 class="m-b-xs"><strong>'+response.data.list[i].name+'</strong></h3><div class="fa fa-user-secret">'+response.data.list[i].status+'</div><div class="font">C/O-'+response.data.list[i].co+'</div><div class="font">Blood Group-'+response.data.list[i].blood+'</div><address class="m-t-md"><h5>'+response.data.list[i].address+'</h5><abbr title="Phone" class="fa fa-phone">'+response.data.list[i].mobile+'</abbr><br><abbr title="Email" class="fa fa-envelope">'+response.data.list[i].email+'</abbr></address></a><div class="contact-box-footer"><button onclick="inactiveuser('+response.data.list[i].slno+')" type="button" class="btn btn-warning fa fa-check-circle-o"></button><button data-toggle="modal" data-target="#myModal22" type="button" class="btn btn-info fa fa-pencil"></button><button onclick="deleteuser('+response.data.list[i].slno+')" type="button" class="btn btn-danger fa fa-trash"></button><button type="button" data-toggle="modal" data-target="#myModal20" class="btn btn-success fa fa-eye"></button></div></div><br>';
                }
                else if (response.data.list[i].nstatus == 1){
                    html +='<div class="contact-box center-version" style="border: 6px solid #f60b36; border-radius: 10px"><a><img alt="" class="rounded-circle" src="'+response.data.list[i].image+'"><h3 class="m-b-xs"><strong>'+response.data.list[i].name+'</strong></h3><div class="fa fa-user-secret">'+response.data.list[i].status+'</div><div class="font">C/O-'+response.data.list[i].co+'</div><div class="font">Blood Group-'+response.data.list[i].blood+'</div><address class="m-t-md"><h5>'+response.data.list[i].address+'</h5><abbr title="Phone" class="fa fa-phone">'+response.data.list[i].mobile+'</abbr><br><abbr title="Email" class="fa fa-envelope">'+response.data.list[i].email+'</abbr></address></a><div class="contact-box-footer"><button onclick="activeuser('+response.data.list[i].slno+')" type="button" class="btn btn-primary fa fa-check-circle-o"></button><button type="button" data-toggle="modal" data-target="#myModal22" class="btn btn-info fa fa-pencil"></button><button onclick="deleteuser('+response.data.list[i].slno+')" type="button" class="btn btn-danger fa fa-trash"></button><button type="button" data-toggle="modal" data-target="#myModal20" class="btn btn-success fa fa-eye"></button></div></div><br>';
                }
            }
		   $('#user').html(html);
    });
});

function readURL(input) {

    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $("#preview1").css("display", "");
            $('#preview1').attr('src', e.target.result);
        }
        reader.readAsDataURL(input.files[0]);
    }
    else
    {
        $('#preview1').attr('src', '');
        $("#preview1").css("display", "none");
    }
}

$("#image").change(function(){
    readURL(this);
});



$("#addform").on("submit", function(event) {
    event.preventDefault();

    var formData = {
        'name': $('input[name=name]').val(),//Name
		'co': $('input[name=co]').val(),// C/O
		'dob': $('input[name=dob]').val(),// D.O.B
		'mobile': $('input[name=mobile]').val(),//Mobile
		'mobile2': $('input[name=mobile2]').val(),//Mobile2
		'email': $('input[name=email]').val(), //Email
		'address': $('input[name=address]').val(), // Address
		'image': $('input[name=image]').val(), // Image
		'blood': $('input[name=blood]').val(), // Blood
		'role': $('input[name=status]').val(), // Role
		'gender': $('input[name=gender]').val(),//Gender
        'secrate_key' : 'demokey'
    };
$.ajax({
url: "<?=site_url('Api/User/Add');?>",
method: 'POST',
data: formData,
})
.done(function(data) {
let response = JSON.parse(data);
if (response.statuss == 200){
   	swal({
        title: "Success",
        text: response.message,
        icon: "success",
        button: false,
        timer: "1500",
        });
	Userlist();
	$('#myModal21').modal('hide');
}
else if(response.statuss == 403)
{
	swal({
        title: "Oops!",
        text: response.message,
        icon: "error",
        button: false,
        timer: "1500",
        });
}
else if(response.statuss == 402)
{
	top.location.href = "ErrorUserbyPermission";
}
else if(response.status == 404)
{
	top.location.href = "admin";  
} 
});
});