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
    
    
    $("button#submit").click(function (){
        var sid = $("#studentid").val();
        var pass = $("#password").val();
        
        if($("#password").val()==""||$("#studentid").val()=="")
            $("div#ack").html("Please enter username and password");
        else
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
                           window.location.href = "https://barnumdesigns.xyz/uni/index.php";
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
    
    $(".likeBtn").click(function (){
        var obj = this.id;
        var clsobj = this.className;
        
        $.ajax ({
            type: 'POST',
            url: 'includes/like.php',
            data: {
                check: clsobj,
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
            
            success: function(data) {
                console.log(data);
            },
             error: function (xhr, ajaxOptions, thrownError) {
                   alert(xhr + " - " + ajaxOptions + " - " + thrownError);
                 
            },
        });
    });
    
    $(".Delbtn").click(function (){
        var obj = this.id;
        var clsobj = this.className;
        
        $.ajax ({
            type: 'POST',
            url: 'includes/like.php',
            data: {
                check:clsobj,
                P_id: obj
            },
            
             success: function(data) {
                console.log(data);
                 location.reload();
            },
             error: function (xhr, ajaxOptions, thrownError) {
                   alert(xhr + " - " + ajaxOptions + " - " + thrownError);
                 
            },
        })
    });
    
        $("button#CreateSub").click(function (){
        var sid = $("#studentid2").val();
        var pass = $("#password2").val();
        var first = $("#firstname").val();
        var last = $("#lastname").val();
        var email = $("#email").val();
        var course = $("#course").val();
            
        
        if(sid==""||pass==""||first==""||last==""||email==""||course=="")
            $("div#CreateAck").html("Please fill all the details");
        else
            $.ajax ({
                type:'post',
                url:'includes/createSQL.php',
                data: {
                    check: "check",
                    studentid:sid,
                    password:pass,
                    firstname:first,
                    lastname:last,
                    email:email,
                    course:course
                },
                success:function(response) {
                    if (response==1)
                        {
                           msg = "Account created";
                        }
                    else 
                        {
                            msg = "OOF account failed to be created";
                        }
                    $("#CreateAck").html(msg);
                },
            });
        $("#myCreate ").submit( function(){
            return false;
        });
    });
    
    $("button#logout").click(function (){
        $.ajax ({
            type:'post',
            url:'includes/logout.php',
            success:function(response) {
                window.location.href = "https://barnumdesigns.xyz/uni/login.php";
            }
        }) 
    });
    
    $("button#post_btn").click(function (){
        var val = $("#post_txt").val();
        var tit = $("#title_txt").val();
        
        if (tit==""||val=="")
            $("#PostAck").html("Please fill all the details");
        else {
        $.ajax ({
            type: 'POST',
            url:'includes/post.php',
            data: {
                check:"insert",
                txt:val,
                title:tit
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
        $("#MyPost").submit( function(){
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
                
            },
            error: function (xhr, ajaxOptions, thrownError) {
                alert(xhr + " - " + ajaxOptions + " - " + thrownError);
                alert(xhr + " - " + ajaxOptions + " - " + thrownError);
            },
        });
    });
}
                          