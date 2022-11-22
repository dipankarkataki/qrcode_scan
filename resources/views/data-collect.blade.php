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
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
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
            height: 100px;
        }

        button{
            border-radius: 25px;
            padding-left: 30px;
            padding-right: 30px;
            background-color: #016c01;
            border: 1px solid #04af04;
            box-shadow: 0px 0px 10px #01480159;
            font-weight: 600;
            padding-top: 10px;
            padding-bottom: 10px;
            color: white;
            font-size: 12px;
        }

        label{
            font-size:14px;
            font-weight:500;
        }

        ::placeholder{
            font-size:12px;
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
            <form id="dataCollectForm" class="form-horizontal">
                @csrf
                <div class="mb-3 mt-3">
                    <label for="name" class="form-label">Enter Full Name:</label>
                    <input type="text" class="form-control" id="name" placeholder="e.g Jhon Doe" name="name" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="phone" class="form-label">Enter Mobile Number ( Please Provide WhatsApp Only ):</label>
                    <input type="text" class="form-control" id="phone" placeholder="e.g 7896541230" name="phone" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="email" class="form-label">Enter Email:</label>
                    <input type="email" class="form-control" id="email" placeholder="e.g jhondoe@xyz.com" name="email" required>
                </div>
                <div class="mb-3 mt-3">
                    <label for="city" class="form-label">Enter City:</label>
                    <input type="text" class="form-control" id="city" placeholder="e.g Guwahati" name="city" required>
                </div>
                <div class="mb-3 mt-4 text-center">
                    <button id="continueBtn" type="submit">CONTINUE</button>
                </div>
            </form>
        </div>
    </div>
</body>

    <script>
        $('#dataCollectForm').on('submit', function(e){
            e.preventDefault();

            $('#continueBtn').text('Please Wait....');
            $('#continueBtn').attr('disabled', true);

            const name = $('#name').val();
            const phone = $('#phone').val();
            const email = $('#email').val();
            const city = $('#city').val();

            sessionStorage.setItem('phone', phone);
            sessionStorage.setItem('name', name);
            sessionStorage.setItem('email', email);
            sessionStorage.setItem('city', city);


            $.ajax({
                url:"{{route('send-otp')}}",
                type:'POST',
                data:{
                    '_token' : "{{ csrf_token() }}",
                    phone: phone,
                    name : name,
                    email : email,
                    city:city
                },
                success:function(data){
                    if(data.status === 1){
                        Swal.fire({
                            title: 'Great!',
                            text: data.message,
                            icon: 'success',
                        }).then((result) => {
                            window.location.replace("{{route('get-send-otp')}}");
                        })
                    }else{
                        Swal.fire({
                            title: 'Oops!',
                            text: data.message,
                            icon: 'error',
                        })

                        $('#continueBtn').text('CONTINUE');
                        $('#continueBtn').attr('disabled', false);
                    }
                },
                error:function(xhr, error, status){
                    console.log(error);

                }
            });

            // window.location.replace("{{route('get-send-otp')}}");
            
        });
    </script>
</html>