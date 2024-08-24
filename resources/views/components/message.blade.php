<div class="plan-box" >
    <div style="" >
    <h6 style=" color:{{$type == 'success' ? '#FF0000' : '#FF0000'}};
    text-transform: capitalize">{{$type}}</h6>
    <p style="">{{$message}}</p>
    </div>
    </div>
    <script>
            setTimeout(() => {
                   document.querySelector('.plan-box').style.display = 'none'
            }, 6000)
    </script>