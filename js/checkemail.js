/* 
 * this ajx file is used to check email is already exist or not
 */
    
   function requestPostAjax(url, data, datatype){    
        var type='POST'; 
        var async = false;
        var result;
        if(datatype == '')
        {
            datatype = 'text';
        }
        $.ajax({
            url:url,
            type: type,
            async: async,
            data:data,
            dataType: datatype,
            success: function(data){
                 result = data;              
            },
            error: function(data){
                console.log(data);
            }
        });
        return result;
    }
    
    function emailExistAllUser(r){
        var Email = r.val();
        if(Email.length>9){
            var data = {email : Email};
            var url = 'emailexist.php';
            var datatype = 'json';
            var result = requestPostAjax(url, data, datatype);
            console.log(result);
            if(result > 0){
                return "Email address already exist !!!";
            }else{
                return true;
            }
        }   
    }
    
    function takeDataByMail(r){
        var Email = r.val();
        if(Email.length>9){
            var data = {email : Email};
            var url = baseurl+'users/emailUserData';
            var datatype = 'json';
            var result = requestPostAjax(url, data, datatype);
            console.log(result);
            if(result.status==1){
                var user = result.User;
                $("#firstName").val(user.fname);
                $("#lastName").val(user.lname);
                return true;
            }else{
                $("#errormsg").html(result.msg);
                return "Please Register First !!!";
            }
        }   
    }