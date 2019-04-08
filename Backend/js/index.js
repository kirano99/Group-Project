window.onload = function() {
    $('#exampleModal').on('show.bs.modal', function (event) {
          var button = $(event.relatedTarget) // Button that triggered the modal
          var recipient = button.data('whatever') // Extract info from data-* attributes
          var modal = $(this);
          var dataString = 'id=' + recipient;

            $.ajax({
                type: "GET",
                url: "includes/modal.php",
                data: dataString,
                cache: false,
                success: function (data) {
                    console.log(data);
                    modal.find('.dash').html(data);
                },
                error: function(err) {
                    console.log(err);
                }
            });  
    })
    
$("button#submit").click(function (){
        var sid = $("#studentid").val();
        var pass = $("#password").val();
        
        if($("#password").val()==""||$("#studentid").val()=="")
            $("div#ack").html("Please enter username and password");
        else
            $.ajax ({
                type:'post',
                url:'/includes/check.php',
                data: {
                    check: "check",
                    studentid:sid,
                    password:pass
                },
                success:function(response) {
                    if (response==1)
                        {
                           msg = "Found";
                        }
                    else 
                        {
                            msg = "not found";
                        }
                    $("#ack").html(msg);
                },
                 error: function (xhr, ajaxOptions, thrownError) {
                        
                },
            });
        $("#myForm").submit( function(){
            return false;
        });
    });
$("button#signupSubmit").click(function (){
    var email = $("#email").val();
    var firstname = $("#firstname").val();
    var lastname = $("#lastname").val();
    var studentID = $("#signupstudentID").val();
    var course = $("#course").val();
    var pass = $("#signuppassword").val();
    var passConfirm = $("#passwordConfirm").val();
        
    if($("#signuppassword").val()!== $("#passwordConfirm").val())
        $(window.alert('Passwords must match'));     
    else
        $.ajax({
            type:'POST',
            url:'/includes/signup_validation.php',
            data:{
                U_email:email,
                U_fname:firstname,
                U_lname:lastname,
                U_course:course,
                StudentID:studentID,
                password:passConfirm
            },
            success:function(data) {
                $(window.alert(data));
            },
        });
    $('#signupForm').submit(function(){
        return false;
    });
});
}

