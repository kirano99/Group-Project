window.onload = function(){
    
    var tmp_id;
    
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
    });
    
    $(".likeBtn").click(function (){
        var obj = this.id;
        
        $.ajax ({
            type: 'POST',
            url: 'includes/like.php',
            data: {
                check: "likeBtn",
                P_id: obj
            },
            
            success: function(data) {
                console.log(data);
            },
             error: function (xhr, ajaxOptions, thrownError) {
                   alert(xhr + " - " + ajaxOptions + " - " + thrownError);
                 
            },
        });
    });
    
     $(".DisBtn").click(function (){
        var obj = this.id;
        var clsobj = this.className;
        
        $.ajax ({
            type: 'POST',
            url: 'includes/like.php',
            data: {
                check: clsobj,
                P_id: obj
            },
            
            success: function(response) {
                console.log(response);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr + " - " + ajaxOptions + " - " + thrownError);
                 
            },
        });
    });
    
    $(".ComBtn").click(function (){
        var obj = this.id;
        
        $.ajax ({
            type: 'POST',
            url: 'includes/gather.php',
            data: {
                check:'comm',
                P_id: obj
            },
            
            success: function(response) {
                
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr + " - " + ajaxOptions + " - " + thrownError);
              
         },
        });
    });
    
    $(".Delbtn").click(function (){
        var obj = this.id;
        var clsobj = "Delbtn";
        
        $.ajax ({
            type:'POST',
            url:'includes/like.php',
            data: {
                check:clsobj,
                P_id: obj
            },     

            success: function(response) {
                alert(response);
            },
             error: function (xhr, ajaxOptions, thrownError) {
                   alert(xhr + " - " + ajaxOptions + " - " + thrownError);
                 
            },
        });
    });
    
    $("button#LogBtn").click(function (){
        
        var sid = $("#studentid").val();
        var pass = $("#password").val();
        
        if($("#password").val()==""||$("#studentid").val()=="")
            $("div#ack").html("Please enter username and password");
        else {
            $.ajax ({
                type:'POST',
                url:'includes/check.php',
                data: {
                    check: "check",
                    studentid:sid,
                    password:pass
                },
                success:function(response) {
                    if (response==1)
                        {
                           window.location.href = "index.php";
                        }
                    else 
                        {
                            msg = "not found";
                        }
                    $("#ack").html(msg);
                },
            });
            }
        $("#myLogin").submit( function(){
            return false;
        });
    });
    
        $("button#CreateBtn").click(function (){
        var pass = $("#password2").val();
        var studid = $("#username").val();
        var email = $("#email").val();
        
        if(pass==""||studid==""||email=="")
            $("div#CreateAck").html("Please fill all the details");
        else {
            $.ajax ({
                type:'post',
                url:'includes/createSQL.php',
                data: {
                    check: "new",
                    password:pass,
                    username:studid,
                    email:email
                },
                success:function(response) {
                    if (response==1)
                        {
                            msg = "Account created";
                            window.location = "EditProf.php";
                        }
                    else 
                        {
                            msg = "OOF account failed to be created";
                        }
                    $("#CreateAck").html(msg);
                },
            });
            }
        $("#myCreate").submit( function(){
            return false;
        });
    });
    
    $("button#logout").click(function (){
        $.ajax ({
            type:'post',
            url:'includes/logout.php',
            success:function(response) {
                window.location.href = "login.php";
            }
        }) 
    });
    
    $("#post_btn").click(function (){
        var val = $("#post_txt").val();
        
        if (val=="")
            $("#PostAck").html("Please fill all the details");
        else {
        $.ajax ({
            type: 'POST',
            url:'includes/post.php',
            data: {
                check:"insert",
                txt:val,
            },
            
            success:function(response) {
                if (response==1)
                    {
                        alert("Post made");
                        location.reload();
                    } else {
                        msg = "Failed to create post";
                    }
                $("#PostAck").html(msg);
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr + " - " + ajaxOptions + " - " + thrownError);
            }
            });
        }
        $("#myPost").submit( function(){
            return false;
        });
    });
    

    $("button.Edtbtn").click(function (){
        tmp_id = this.id;
        
        
        $.ajax ({
            type: 'POST',
            url: 'includes/gather.php',
            dataType: "json",
            data: {
                check: "check",
                id: tmp_id
            },
            
            success:function(response) {
                document.getElementById("dash").value = response;
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr + " - " + ajaxOptions + " - " + thrownError);
            },
        });
    });
    
    $("#ChngPost").click(function (){
        var obj = $("#dash").val();
        
        $.ajax ({
           type: 'POST',
            url: 'includes/post.php',
            data: {
                check: "alter",
                id: tmp_id,
                txt:obj
            },
            
            success:function(response) {
                alert("Post changed");
                location.reload();
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr + " - " + ajaxOptions + " - " + thrownError);
            },
        });
    });
    
    $("#AccBtn").click(function (){
        var first = $("#fname").val();
        var last = $("#lname").val();
        var dob = $("#dob").val();
        //var list = $("#clist").val();
        
        if(first==""||last==""||dob=="") {
            
        } else {
            $.ajax ({
                type: 'POST',
                url: 'includes/createSQL.php',
                data: {
                    check: "profile",
                    first:first,
                    last:last,
                    dob:dob,
                    //list:list
                },
                success:function(response) {
                    alert("Account updated");    
                },
                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr + " - " + ajaxOptions + " - " + thrownError);    
                },
            });
        }
        $("#myAccount").submit(function (){
           return false; 
        }); 
    });
    
    $("#BioBtn").click(function (){
    var val = $("#BioTxt").val();
        
        if (val=="") {
            $("div#ack").html("Please enter data to your bio.");
        }
        else {
            $.ajax ({
                type: 'POST',
                url: 'includes/createSQL.php',
                data: {
                    check: "Bio",
                    txt: val
                },
                success:function(response) {
                    alert("Bio updated");    
                },

                error: function (xhr, ajaxOptions, thrownError) {
                    alert(xhr + " - " + ajaxOptions + " - " + thrownError);    
                },
            });
        } 
        $("#myBio").submit(function (){
           return false; 
        });           
    });
    
}
                          