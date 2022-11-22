<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Practice</title>
    <link rel="icon" type="image/x-icon" href="/logo/stayfit-logo.png">
    <!-- Latest compiled and minified CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Latest compiled JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <style>
        body{
            background-image: url('back2.jpg');
            background-size: cover;
            background-repeat: no-repeat;
            height:100vh;
        }
        .container{
            position: absolute;
            top: 30%;
            left: 50%;
            transform: translate(-50%, -30%);
            width:50%;
           
        }
        .user-data-form{
            border: 1px solid #efecec;
            box-shadow: 0px 4px 10px #e8e4e4;
            background-color: white;
            padding: 20px;
            border-radius: 5px;
        }
        .logo{
            display: flex;
            flex-direction: row;
            justify-content: center;
            align-items: center;
        }
        .logo img{
            height: 85px;
        }

        button{
            border-radius: 25px;
            padding-left: 30px;
            padding-right: 30px;
            background-color: #046e04;
            border: 1px solid #047c04;
            box-shadow: 0px 3px 10px #a0a2a0;
            font-weight: 800;
            padding-top: 10px;
            padding-bottom: 10px;
            color: white;
            font-size: 9px;
        }

        label{
            font-size:14px;
            font-weight:500;
        }

        ::placeholder{
            font-size:12px;
        }

        hr{
            border: 0.5px solid #dcdbdb;
        }

        .user-content{
            margin-top: 30px;
        }
        .user-content h4{
            color: #df310b;
            font-size: 13px;
            font-weight: 500;
        }

        .resend-label{
            display:flex;
            flex-direction: row;
            justify-content: space-between;
            align-items: center;
        }
        
    </style>
</head>
<body>
    <div class="container">
        <div class="user-data-form">
            <div class="logo">
                <img src="/logo/stayfit-logo.png" alt="logo">
                {{-- <h3>Brand Logo</h3> --}}
            </div>
            <hr>
            <div class="user-content mb-3">
                <h6>Hello, Dipankar Kataki</h6>
                <h4>A code has been sent to your mobile number <span id="phone"></span></h4>
            </div>

            <form id="verifyOtpForm">
                <div class="form-group mb-3">
                    <label for="" class="form-label resend-label">
                        <span> Please Enter OTP</span>
                        <span style="color: green;cursor:pointer;" id="resendOTP">Resend OTP.</span>
                    </label>
                    <input type="text" name="otp" class="form-control" id="otpValue" placeholder="e.g 123456" required>
                </div>

                <div class="form-group mb-3 mt-4 text-center">
                    <button id="verifyBtn" type="submit">VERIFY</button>
                </div>
            </form>
            {{-- <form id="dataCollectForm" class="form-horizontal">
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label"></label>
                </div>
                <div class="mb-3 mt-3">
                    <label for="phone" class="form-label">Enter Mobile Number ( Please Provide WhatsApp Only ):</label>
                    <input type="text" class="form-control" id="phone" placeholder="e.g 7896541230" name="phone">
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Enter Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="e.g jhondoe@xyz.com" name="email">
                </div>
                <div class="mb-3 mt-3">
                    <label for="city" class="form-label">Enter City:</label>
                    <input type="text" class="form-control" id="city" placeholder="e.g Guwahati" name="city">
                </div>
                <div class="mb-3 mt-4 text-center">
                    <button id="continueBtn">CONTINUE</button>
                </div>
            </form> --}}
        </div>
    </div>
</body>

    <script>
        $(document).ready(function(){
           $('#name').html(sessionStorage.getItem('name'));
           $('#phone').html(sessionStorage.getItem('phone'));
        });

        $('#resendOTP').on('click',function(){
            $.ajax({
                url:"{{route('send-otp')}}",
                type:'POST',
                data:{
                    '_token' : "{{ csrf_token() }}",
                    phone: sessionStorage.getItem('phone'),
                    name : sessionStorage.getItem('name'),
                    email : sessionStorage.getItem('email'),
                    city:sessionStorage.getItem('city')
                },
                success:function(data){
                    if(data.status === 1){
                        Swal.fire({
                            title: 'Great!',
                            text: data.message,
                            icon: 'success',
                        }).then((result) => {
                            window.location.reload();
                        })
                    }else{
                        Swal.fire({
                            title: 'Oops!',
                            text: data.message,
                            icon: 'error',
                        })
                    }
                },
                error:function(xhr, error, status){
                    console.log(error);
                }
            });
        });


        $('#verifyOtpForm').on('submit', function(e){

            e.preventDefault();

            $('#verifyBtn').text('Please Wait....');
            $('#verifyBtn').attr('disabled', true);


            $.ajax({
                url:"{{route('verify-otp')}}",
                type:'POST',
                data:{
                    '_token' : "{{ csrf_token() }}",
                    'otp' : $('#otpValue').val(),
                    'phone': sessionStorage.getItem('phone'),
                    'name' : sessionStorage.getItem('name'),
                    'email': sessionStorage.getItem('email'),
                    'city' : sessionStorage.getItem('city')
                },
                success:function(data){
                    if(data.status === 1){
                        Swal.fire({
                            title: 'Great!',
                            text: data.message,
                            icon: 'success',
                        }).then((result) => {
                            window.location.replace('/');
                        })
                    }else{
                        Swal.fire({
                            title: 'Oops!',
                            text: data.message,
                            icon: 'error',
                        })

                        $('#verifyBtn').text('VERIFY');
                        $('#verifyBtn').attr('disabled', false);
                    }
                },
                error:function(xhr, error, status){
                    console.log(error);
                }
            });
        });
    </script>
</html>