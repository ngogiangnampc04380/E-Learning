<div class="plan-box" >
    <div>
    <h6 style="color:{{$type == 'success' ? '#249c46' : '#c24143'}}; text-transform: capitalize">{{$type}}</h6>
    <p style="">{{$message}}</p>
    </div>
    </div>
    <script>
            setTimeout(() => {
                   document.querySelector('.plan-box').style.display = 'none'; 
            }, 3000);
    </script>