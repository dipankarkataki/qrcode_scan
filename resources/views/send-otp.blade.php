<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>QR Registration - The Stayfit Kitchen </title>
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
        .coupon-div{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                margin-right: 50px;
                width: 100%;
                height: 300px;
                background-image: linear-gradient(to right top, #0e254e, #31426a, #516188, #7282a6, #95a4c5, #95a4c4, #94a3c2, #94a3c1, #71809f, #4f5e7e, #2f3e5f, #0d2141);
                border-radius: 5px;
                display: none;
        }
        .coupon-div img{
            width:500px;
            border-radius:10px;
        }

        .coupon-div #voucherId{
            position: absolute;
            top: 50px;
            font-size: 10px;
            color: #c4c1c1;
            font-weight: 800;
            left: 20px;
        }

        .coupon-div #offPercent{
            position: absolute;
            top: 12%;
            font-size: 38px;
            color: white;
            font-weight: 800;
            left: 23%;
        }

        .coupon-div #couponCode{
            position: absolute;
            top: 20%;
            font-size: 24px;
            color: white;
            font-weight: 800;
            left: 10%;
        }
        .coupon-div h5{
                text-align: center;
                margin-top: 9px;
                margin-bottom: 0px;
                color: white;
            }
        .coupon-div h6{
            margin-top: 12px;
            text-align: center;
            color: white;

        }

        @media only screen and (max-width: 600px) {
            .container{
                width:90%;
            }

            label{
                font-size:12px;
                font-weight:500;
            }

            .coupon-div{
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                margin-right: 50px;
                width: 100%;
                height: 300px;
                background-image: linear-gradient(to right top, #0e254e, #31426a, #516188, #7282a6, #95a4c5, #95a4c4, #94a3c2, #94a3c1, #71809f, #4f5e7e, #2f3e5f, #0d2141);
                border-radius: 5px;
                display: none;
            }
           
            .coupon-div img{
                width: 350px;
                border-radius: 10px;
                margin-top: 50px;
            }

            .coupon-div #voucherId{
               
                position: fixed;
                top: 39.5%;
                font-size: 6px;
                color: #c4c1c1;
                font-weight: 800;
                left: 18px;

            }

            .coupon-div #offPercent{
                position: fixed;
                top: 50%;
                font-size: 25px;
                color: white;
                font-weight: 800;
                left: 60%;
            }

            .coupon-div #couponCode{
               
                position: fixed;
                top: 62%;
                font-size: 23px;
                color: #eeeeee;
                font-weight: 800;
                left: 26%;

            }
        }

        
        
    </style>
</head>
<body>
    <div class="container">

        <div class="coupon-div">
            <h5>Hey! You Have Won A COUPON</h5>
            <img src="/CouponCode.png" alt="coupon">
            <p id="voucherId">#12345</p>
            <p id="offPercent">25%</p>
            <p id="couponCode">FIT360</p>

            <h6 id="goBack">GO BACK</h6>
        </div>
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
                            $('.coupon-div').css("display", "block");
                            // window.location.replace('/');
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

        $('#goBack').on('click', function(){
            window.location.replace('/');
        });
    </script>
</html>