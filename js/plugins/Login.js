$("#loginform").on("submit", function(event) {
    event.preventDefault();

    var formData = {
        'email': $('input[name=email]').val(), //for get email
        'password': $('input[name=password]').val(), //for get email 
        'secrate_key' : 'demokey'
    };
$.ajax({
url: "Api/Admin/Login",
method: 'POST',
data: formData,
})
.done(function(data) {
let response = JSON.parse(data);
if (response.status == 200){
    top.location.href = "Dashboard";
    setTimeout(3000);
    swal({
        title: "Success",
        text: response.message,
        icon: "success",
        button: false,
        timer: "1500",
        });
}
else if(response.status == 404)
{
        swal({
        title: "Oops!",
        text: response.message,
        icon: "error",
        button: false,
        timer: "1500",
        });
}
else if(response.status == 400)
{
        swal({
        title: "Oops!",
        text: response.message,
        icon: "error",
        button: false,
        timer: "1500",
        });
}
   
});
});

var modal = document.getElementById('myModal');
		
		var btn = document.getElementById("popup");

		var span = document.getElementsByClassName("close")[0];

		btn.onclick = function() {
			modal.style.display = "block";
		}
		
		span.onclick = function() {
			modal.style.display = "none";
		}

		window.onclick = function(event) {
			if (event.target == modal) {
				modal.style.display = "none";
			}
		}