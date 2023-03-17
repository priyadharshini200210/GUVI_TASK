<script src = "https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
<script type="text/javascript" src="../js/index.js"></script>
<script type="text/javascript">
  function submitData(){
    $(document).ready(function(){
      var data = {
        name: $("#name").val(),
        dob: $("#dob").val(),
        email: $("#email").val(),
        password: $("#password").val(),
        c_password: $("#c_password").val(),
        action: $("#action").val(),
      };
      $.ajax({
        url: 'function.php',
        type: 'post',
        data: data,
        success:function(response){
          alert(response);

          if(response == "Login Successful"){

            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            localStorage.setItem("EMAIL",email);
            localStorage.setItem("PASSWORD",password);
          }
          else if(response == "Registration Successful"){
            const name = document.getElementById('name').value;
            const dob = document.getElementById('dob').value;
            const email = document.getElementById('email').value;
            const password = document.getElementById('password').value;
            const c_password = document.getElementById('c_password').value;

            sessionStorage.setItem("NAME",name);
            sessionStorage.setItem("DOB",dob);
            sessionStorage.setItem("EMAIL",email);
            sessionStorage.setItem("PASSWORD",password);
            sessionStorage.setItem("C_PASSWORD",c_password);
            window.location.href = 'login.php';
          }
        }
      });
    });
  }
</script>
