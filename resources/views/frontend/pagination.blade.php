<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MapBirdy contact us</title>
    <link rel="shortcut icon" href="{{ asset('public/frontend/images/Favocon.png') }}" type="image/x-icon">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-BJ03FN4K68"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-BJ03FN4K68');
</script>
</head>
<body>
    <div class="container">
        
        <h3 class="text-center mb-4 he">Map Birdy</h3>
        <p class="pp"> See Pagination of Comments</p>

           <div id="table_data">
               @include('frontend/pagination_data')
           </div>

       

      
      
    <script src="https://code.jquery.com/jquery-3.6.4.min.js" integrity="sha256-oP6HI9z1XaZNBrJURtCoUT5SUnxFr8s3BzRl+cbzUq8=" crossorigin="anonymous"></script>
 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
	<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
	<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
<script>
    $(document).ready(function(){
        $(document).on('click', '.pagination a', function(e){
                e.preventDefault();
                console.log($(this).attr('href'));
                var page = $(this).attr('href').split('page=')[1];
                console.log(page);
                fetch_data(page);
        });


        function fetch_data(page){
            var base_url = "{{url('/')}}";
            console.log('base_url => '+base_url);
            $.ajax({
                url:base_url+"/pagination/fetch_data?page="+page,
                success:function(data){
                    console.log('success pagination');
                    console.log(data);
                    $('#table_data').html(data);
                },
                error:function(data){
                    console.log('error pagination');
                    console.log(data.responseText);
                }
            });

        }
    });
</script>

</body>
</html>
